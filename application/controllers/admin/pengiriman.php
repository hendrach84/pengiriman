<?php
defined('BASEPATH') or exit();

/**
 * @author : WeSoft
 */
class pengiriman extends CI_Controller
{
	var $table = 'tb_trx_pengiriman'; //nama tabel dari database
    var $column_order = array('', 'idx', 'ekspedisi', 'total_resi', 'timestamp'); //field yang ada di table user
    var $column_search = array('idx', 'ekspedisi', 'total_resi', 'timestamp'); //field yang diizin untuk pencarian 
    var $order = array('idx' => 'desc'); // default order 
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('query');
		$this->load->model('datatables');
        $this->load->model('auth_model','auth');

        // if (!$this->auth->check_login() ) {
        //     redirect(site_url('admin_login'));
        // }
	}

	function index()
	{
		$data['query'] = $this->query;
		$this->load->view('admin/v_pengiriman', $data);
	}

	function get_datatable()
    {
    	$tb_ekspedisi = 'tb_ekspedisi';
    	$on_join = 'tb_ekspedisi.id_ekspedisi='.$this->table.'.id_ekspedisi';
        $list = $this->datatables->get_datatables($this->table, $this->column_order, $this->column_search, $this->order, $tb_ekspedisi, $on_join); // echo $this->db->last_query();// die();
        // var_dump($list);die();
        $data = array();
        // $no = $_POST['start'];
        
	        foreach ($list as $field) {
	            $data_ecom = json_decode($field['id_ecom']); //var_dump($data_ecom); die();
	            $ecom = '';
	            foreach ($data_ecom as $val) {
		            $qArr = $this->query->get_by_key('tb_ecom','id_ecom',$val)[0]['nama_ecom'];
	            	$ecom .= '<span class="badge badge-primary">'.$qArr.'</span> &nbsp;';
	            }

	            $noresi = '<div class="block block-rounded">
	                        <div class="block-content">
	                            <table class="table table-hover table-vcenter">
	                                <thead>
	                                    <tr>
	                                        <th class="text-center" style="width: 50px;">#</th>
	                                        <th>Resi &nbsp; <code style="font-size: 20px;">'.$field['ekspedisi'].'</code></th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                        
	                    ';
	            $qArr2 = $this->query->get_by_key('tb_det_trx','idx',$field['idx']); 
	            $ttl_noresi = count($qArr2);
	            // var_dump($ttl_noresi);
	            $count_res = 1;
	            foreach ($qArr2 as $val2) {
	            	if ($count_res < $ttl_noresi) {
		            	$noresi .= '<tr>
		            				    <th class="text-center" scope="row">'.$count_res.'</th>
		            				    <td class="font-w600">
		            				   		<span class="badge badge-danger" style="font-size:14px;">'.$val2['resi'].'</span>
		            				   	</td>
		            				</tr>';
	            	} else {
		            	$noresi .= '<tr>
		            				    <th class="text-center" scope="row">'.$count_res.'</th>
		            				    <td class="font-w600">
		            				   		<span class="badge badge-danger" style="font-size:14px;">'.$val2['resi'].'</span>
		            				   	</td>
		            				</tr>
					            	</tbody>
					            	<tfoot>
	                                    <tr>
	                                        <th class="text-center" style="width: 50px;">#</th>
	                                        <th>Resi &nbsp; <code style="font-size: 20px;">'.$field['ekspedisi'].'</code></th>
	                                    </tr>
	                                </tfoot>
					            	</table></div></div>';            		
	            	}
		            	$count_res++;
	            }

	            $row = array();
	            $row['idx'] = $field['idx'];
	            $row['ekspedisi'] = $field['ekspedisi'];
	            $row['total_resi'] = $field['total_resi'];
	            $row['timestamp'] = $field['timestamp'];
	            $row['id_ecom'] = $ecom;
	            $row['resi'] = $noresi;
	 
	            $data[] = $row;
	        }
                    
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatables->count_all($this->table, $tb_ekspedisi, $on_join),
            "recordsFiltered" => $this->datatables->count_filtered($this->table, $this->column_order, $this->column_search, $this->order, $tb_ekspedisi, $on_join),
            "data" => $data,
        );

        // var_dump($_POST['draw']);

        //output dalam format JSON
        echo json_encode($output);
    }

}