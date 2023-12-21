<?php 
defined('BASEPATH') or exit();

/**
 * @author : WeSoft
 */
class Users extends CI_Controller
{
	var $table = 'tb_user'; //nama tabel dari database
    var $column_order = array('username', 'fullname', 'role', 'createdate'); //field yang ada di table user
    var $column_search = array('username', 'fullname', 'role', 'createdate'); //field yang diizin untuk pencarian 
    var $order = array('username', 'fullname', 'role', 'createdate'); // default order 
	
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
                table = $("#user").DataTable({ 
         
                    "processing": true, 
                    "serverSide": true, 
                    "order": [[3, "desc"]], 
                     
                    "ajax": {
                        "url": "'.site_url('admin/users/get_datatable').'",
                        "type": "POST"
                    },
         
                     
                    "columnDefs": [
                    { 
                        "targets": [ 4 ], 
                        "orderable": false, 
                    },
                    ],
         
                });
         
            });
         
        </script>';
		$this->load->view('admin/v_users', $data);
	}

	function get_datatable()
    {
    	$tb_role = 'tb_role';
    	$on_join = 'tb_role.id_role='.$this->table.'.id_role';
        $list = $this->datatables->get_datatables($this->table, $this->column_order, $this->column_search, $this->order, $tb_role, $on_join);
        // var_dump($list);die();
        $data = array();
        // $no = $_POST['start'];
        foreach ($list as $field) {
            // $no++;
            $row = array();
            $row[] = $field['username'];
            $row[] = $field['fullname'];
            $row[] = $field['role'];
            $row[] = $field['createdate'];
            $row[] = "<a class='btn btn-hero-sm btn-hero-primary' href='javascript:void(0)'><i class='fa fa-fw fa-user-edit mr-1'></i>Edit</a>";
 
            $data[] = $row;
        }

        
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatables->count_all($this->table, $tb_role, $on_join),
            "recordsFiltered" => $this->datatables->count_filtered($this->table, $this->column_order, $this->column_search, $this->order, $tb_role, $on_join),
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

    }

    function simpan()
    {
        $nama_ekspedisi = $this->input->post('ekspedisi');
        $alamat         = $this->input->post('alamat');
        $telp1          = $this->input->post('telp1');
        $telp2          = $this->input->post('telp2');
        $insert_id      = $this->query->create_id($this->table,'id_ekspedisi','create_date','EKS');
        
        $data = array(
                    'id_ekspedisi' => $insert_id,
                    'ekspedisi' => $nama_ekspedisi,
                    'alamat' => $alamat,
                    'tlp1' => $telp1,
                    'tlp2' => $telp2,
                    'create_date' => date("Y-m-d H:i:s")
                );
        $this->query->insert($this->table, $data); 
        redirect('admin/ekspedisi');
    }

    function simpan_edit() 
    {

    }
}