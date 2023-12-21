<?php 
defined('BASEPATH') or exit();

/**
 * @author : WeSoft
 */
class ecom extends CI_Controller
{
	var $table = 'tb_ecom'; //nama tabel dari database
    var $column_order = array('id_ecom', 'nama_ecom'); //field yang ada di table user
    var $column_search = array('id_ecom', 'nama_ecom'); //field yang diizin untuk pencarian 
    var $order = array('id_ecom', 'nama_ecom'); // default order
		
	function __construct()
	{
		parent::__construct();
		$this->load->model('query');
		$this->load->model('m_test');
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
                table = $("#ecom").DataTable({ 
         
                    "processing": true, 
                    "serverSide": true,
                     "order":[[0,"desc"]],
                    "ajax": {
                        "url": "'.site_url('admin/ecom/get_datatable').'",
                        "type": "POST"
                    },
         
                     
                    "columnDefs": [
                    { 
                        "targets": [ 3 ], 
                        "orderable": false, 
                    },
                    ],

                    "columns": [
                        { "data": "id_ecom" },
                        { "data": "nama_ecom" },
                        { "data": "create_date" },
                        { "data": "action" }
                    ]
         
                });
         
            });
         
        </script>';
		$this->load->view('admin/v_ecom', $data);
	}

	function get_datatable()
    {
    	// $tb_role = 'tb_role';
    	// $on_join = 'tb_role.id_role='.$this->table.'.id_role';
        ## $table, $column_order, $column_search, $order, $table_join='', $onColumn_join=''
        $list = $this->m_test->get_datatables();
        // var_dump($list);die();
        $data = array();
        // $no = $_POST['start'];
        foreach ($list as $field) {
            // $no++;
            $row = array();
            $row['id_ecom'] = $field['id_ecom'];
            $row['nama_ecom'] = $field['nama_ecom'];
            $row['create_date'] = $field['create_date'];
            $row['action'] = 
            '<form action="'.site_url('admin/ecom/edit_ecom').'" method="post">
                <a class="btn btn-hero-sm btn-hero-primary" href="javascript:;" onclick="parentNode.submit();">
                    <i class="fa fa-edit mr-1"></i>Edit
                </a>
                <input type="hidden" name="id_ecom" value="'.$field['id_ecom'].'"/>
            </form>';

            $data[] = $row;
        }

        
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_test->count_all(),
            "recordsFiltered" => $this->m_test->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output, true);
    }

    function tambah()
    {        
        $this->load->view('admin/v_input_ecom');
    }

    function edit_ecom()
    {
        $id_ecom = $this->input->post('id_ecom',true);
        if ($id_ecom) {
            $data['ecom'] = $this->query->get_by_key('tb_ecom','id_ecom',$id_ecom);
            $this->load->view('admin/v_edit_ecom', $data);
        } else {
            redirect('admin/dashboard');
        }
    }

    function simpan()
    {
         $nama_ecom = $this->input->post('ecom');
         $insert_id      = $this->query->create_id($this->table,'id_ecom','create_date','ECOM');
        
         $data = array(
                     'id_ecom' => $insert_id,
                     'nama_ecom' => $nama_ecom,
                     'create_date' => date("Y-m-d H:i:s")
                 );		 
				 
         $this->query->insert($this->table, $data); 
         redirect('admin/ecom');
    }

    function simpan_edit() 
    {
        $id_ecom   = $this->input->post('id_ecom');
        $nama_ecom = $this->input->post('ecom');

        $data = array(
                    'nama_ecom' => $nama_ecom
                );
        if ($id_ecom && $data) {
            $this->query->update('tb_ecom', 'id_ecom', $id_ecom, $data); 
        }
        redirect('admin/ecom');
    }
}