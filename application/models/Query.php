<?php
defined('BASEPATH') or exit();

/**
 * 
 */
class query extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_all($table='',$column_order='',$order=''){
		if ($table!='') {
			$this->db->select('*');

			if ($column_order) {
				$this->db->order_by($column_order,$order);
			}

			$query = $this->db->from($table);
			return $query->get()->result_array();
		} 
	}

	function get_by_key($table='',$column='',$key='',$group=''){
		if ($table!='') {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($column, $key);

			if ($group) {
				$this->db->group_by($group);
			}
			
			$query = $this->db->get();

			return $query->result_array();
			
		}
	}

	function insert($table='',$data=''){
		if ($table!='') {
			$this->db->insert($table,$data);

			return $this->db->insert_id();
		}
	}

	function update($table='',$column='',$key='',$data=''){
		if ($table!='') {
			$this->db->where($column,$key);
			$this->db->update($table,$data);
		}
	}

	function delete($table='',$column='',$key=''){
		if ($table!='') {
			$this->db->where($column,$key);
			$this->db->delete($table);
		}
	}
	
	function get_no_invoice(){
        $q = $this->db->query("SELECT MAX(RIGHT(id_transaksi,4)) AS kd_max FROM transaksi WHERE DATE(tgl_transaksi)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmY').$kd; 
    }

    function rating($table,$column,$id){
    	$this->db->select('ROUND(AVG(star),1) as rating_star');
	    $this->db->from($table);
	    $this->db->where($column, $id);
	    $query = $this->db->get();

	    return $query->row_array();
    }

    function total_row($table,$column,$id){
    	$this->db->select('count(*)*1 as total');
    	$this->db->from($table);
    	$this->db->where($column, $id);
    	$query = $this->db->get();

    	return $query->row_array();
    }
    
    function total_row_like($table,$column,$id){
    	$this->db->select('count(*)*1 as total');
    	$this->db->from($table);
    	$this->db->like($column, $id);
    	$query = $this->db->get();

    	return $query->row_array();
    }

    function get_range($table='',$column_min='',$column_min_as='',$column_max='',$column_max_as='',$column_id='',$key='',$between_column='',$between_key_1='',$between_key_2=''){
    	
    	$this->db->select('min(`'.$column_min.'`) as '.$column_min_as);
    	$this->db->select('max(`'.$column_max.'`) as '.$column_max_as);
    	$this->db->from($table);

    	if ($column_id && $key) {
	    	$this->db->where($column_id,$key);
    	}

    	if ($between_column && $between_key_1 && $between_key_2) {
    		$between = $between_column." between ".$between_key_1." and ".$between_key_2;
    		$this->db->where($between);
    	}

    	$query = $this->db->get();

    	return $query->result_array();

    }

    function get_all_by_limit($table='',$limit='', $start='', $data=''){
    	
    	if ($data) {
		    $query = $this->db->get_where($table, $data, $limit, $start);
    	} else {
		    $query = $this->db->get($table, $limit, $start);
    	}
        return $query->result_array();

    }

    function get_images($table='',$group=''){
    	$this->db->select('*');
    	$this->db->from($table);
    	if ($group) {
	    	$this->db->group_by($group);
    	}
    	$query = $this->db->get();

    	return $query->row_array();
    }

    function get_product_by_range($kategori='',$range_low='',$range_high='',$init_limit="",$limit='',$start=''){
		$kategori = $kategori == 'all' ? '' : 'id_kategori = '.$kategori ;
		$range_price = $range_high != 0 ? " `harga` between ".$range_low." and ".$range_high : '' ;
		
		$start = $start ? "limit ".$start : "limit 0";
		$limit = $limit ? ", ".$limit : "";
		$init_limit = $init_limit ? $start.$limit : "";
		$where = $kategori || $range_price ? "where " : "";

		$sql = "select * from `produk` ". $where . ($kategori ? $kategori." AND " : "") . $range_price ." ORDER BY id_produk ASC ".$init_limit ;
		
		return $this->db->query($sql)->result_array();
	}

	function get_product_by_range2($brands='',$range_low='',$range_high='',$init_limit="",$limit='',$start=''){
		$brands = $brands == 'all' ? '' : 'id_brands = '.$brands ;
		$range_price = $range_high != 0 ? " `harga` between ".$range_low." and ".$range_high : '' ;
		
		$start = $start ? "limit ".$start : "limit 0";
		$limit = $limit ? ", ".$limit : "";
		$init_limit = $init_limit ? $start.$limit : "";
		$where = $brands || $range_price ? "where " : "";

		$sql = "select * from `produk` ". $where . ($brands ? $brands." AND " : "") . $range_price ." ORDER BY id_produk ASC ".$init_limit ;
		
		return $this->db->query($sql)->result_array();
	}

	function review($id_produk){
		$this->db->select('*');
		$this->db->from('review');
		$this->db->limit(5);
		$sql = $this->db->get();

		return $sql->result_array();
	}
	
	function get_product_by_keyLimit($table, $column, $id, $init_limit, $start='', $limit=''){
	    
	    $start = $start ? "limit ".$start : "limit 0";
		$limit = $limit ? ", ".$limit : "";
		$init_limit = $init_limit ? $start.$limit : "";

		$sql = "select * from `produk` where nama_produk like '%". $id ."%' ESCAPE '!' ORDER BY nama_produk ASC ".$init_limit ;
		
		return $this->db->query($sql)->result_array();
	}
	
	function check_profile(){
	   $sess = @$_SESSION['is_login'] ? $_SESSION['is_login'] : '';
	   if($sess){
    	    if($_SESSION['is_update']!=0 || $_SESSION['is_update']!=0){
    	        return false;
    	    } else {
    	        return true;
    	    }
	   } else {
	       return false;
	   }
	    
	}

	function create_id($table,$id,$date,$kode){
        $q = $this->db->query("SELECT MAX(RIGHT(".$id.",3)) AS kd_max FROM ".$table." WHERE DATE(`".$date."`)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kode.date('Ymd').'/'.$kd; 
    }

}