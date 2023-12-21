<?php 
defined('BASEPATH') or exit();

/**
 * @author : WeSoft
 */
class ekspedisi extends CI_Controller
{
	var $table = 'tb_ekspedisi'; //nama tabel dari database
    var $column_order = array('id_ekspedisi', 'ekspedisi', 'alamat', 'tlp1', 'tlp2', 'create_date'); //field yang ada di table user
    var $column_search = array('id_ekspedisi', 'ekspedisi', 'alamat', 'tlp1', 'tlp2', 'create_date'); //field yang diizin untuk pencarian 
    var $order = array('id_ekspedisi' => 'desc'); // default order 
	
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
		$data['dt'] = '<script type="text/javascript">
            var table;
            $(document).ready(function() {
         
                //datatables
                table = $("#ekspedisi").DataTable({ 
         
                    "processing": true, 
                    "serverSide": true, 
                    "order": [[0, "desc"]],
                    "ajax": {
                        "url": "'.site_url('admin/ekspedisi/get_datatable').'",
                        "type": "POST"
                    },
         
                     
                    "columnDefs": [
                    { 
                        "targets": [ 6 ], 
                        "orderable": false, 
                    }
                    ],

                    "columns": [
                        { "data": "id_ekspedisi" },
                        { "data": "ekspedisi" },
                        { "data": "alamat" },
                        { "data": "tlp1" },
                        { "data": "tlp2" },
                        { "data": "create_date" },
                        { "data": "action" }
                    ]
         
                });
         
            });
         
        </script>';
		$this->load->view('admin/v_ekspedisi', $data);
	}

	function get_datatable()
    {
    	$tb_role = 'tb_role';
    	$on_join = 'tb_role.id_role='.$this->table.'.id_role';
        $list = $this->datatables->get_datatables($this->table, $this->column_order, $this->column_search, $this->order);
        $data = array();
        foreach ($list as $field) {
            // $no++;
            $row = array();
            $row['id_ekspedisi'] = $field['id_ekspedisi'];
            $row['ekspedisi'] = $field['ekspedisi'];
            $row['alamat'] = $field['alamat'];
            $row['tlp1'] = $field['tlp1'];
            $row['tlp2'] = $field['tlp2'];
            $row['create_date'] = $field['create_date'];
            $row['action'] = 
            '<form action="'.site_url('admin/ekspedisi/edit_ekspedisi').'" method="post">
                <a class="btn btn-hero-sm btn-hero-primary" href="javascript:;" onclick="parentNode.submit();">
                    <i class="fa fa-edit mr-1"></i>Edit
                </a>
                <input type="hidden" name="id_ekspedisi" value="'.$field['id_ekspedisi'].'"/>
            </form>';

            // "<a class='btn btn-hero-sm btn-hero-primary' href='".site_url('admin/ekspedisi/edit_ekspedisi/').$field['id_ekspedisi']."'><i class='fa fa-edit mr-1'></i>Edit</a>";
 
            $data[] = $row;
        }

        
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatables->count_all($this->table),
            "recordsFiltered" => $this->datatables->count_filtered($this->table, $this->column_order, $this->column_search, $this->order),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function tambah()
    {        
        $this->load->view('admin/v_input_ekspedisi');
    }

    function edit_ekspedisi()
    {   
        $id_ekspedisi = $this->input->post('id_ekspedisi',true);
        if ($id_ekspedisi) {
            $data['ekspedisi'] = $this->query->get_by_key($this->table,'id_ekspedisi',$id_ekspedisi);
            $this->load->view('admin/v_edit_ekspedisi', $data);
        } else {
            redirect('admin/dashboard');
        }
    }

    function simpan()
    {
        $nama_ekspedisi = $this->input->post('ekspedisi');
        $alamat         = $this->input->post('alamat');
        $telp1          = $this->input->post('telp1');
        $telp2          = $this->input->post('telp2');
        $kodewarna      = $this->input->post('kodewarna'); 
        $insert_id      = $this->query->create_id($this->table,'id_ekspedisi','create_date','EKS');
        
        $data = array(
                    'id_ekspedisi' => $insert_id,
                    'ekspedisi' => $nama_ekspedisi,
                    'alamat' => $alamat,
                    'tlp1' => $telp1,
                    'tlp2' => $telp2,
                    'kodewarna' => $kodewarna,
                    'create_date' => date("Y-m-d H:i:s")
                );
				//var_dump($data);
        $this->query->insert($this->table, $data); 
		//var_dump($this->db->last_query());
        redirect('admin/ekspedisi');
    }

    function simpan_edit() 
    {
        $id_ekspedisi   = $this->input->post('id_ekspedisi');
        $nama_ekspedisi = $this->input->post('ekspedisi');
        $alamat         = $this->input->post('alamat');
        $telp1          = $this->input->post('telp1');
        $telp2          = $this->input->post('telp2');
        $kodewarna      = $this->input->post('kodewarna');

        $data = array(
                    'ekspedisi' => $nama_ekspedisi,
                    'alamat' => $alamat,
                    'tlp1' => $telp1,
                    'tlp2' => $telp2,
                    'kodewarna' => $kodewarna
                );
        if ($id_ekspedisi && $data) {
            $this->query->update($this->table, 'id_ekspedisi', $id_ekspedisi, $data); 
        }
        redirect('admin/ekspedisi');
    }
}