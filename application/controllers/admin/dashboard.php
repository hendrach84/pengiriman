<?php 
defined('BASEPATH') or exit();

/**
 * @author : WeSoft Hendra
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Query');
	}

	function index()
	{
		// date_default_timezone_set('Asia/Jakarta');
		$cmd1 = "select sum(total_resi) as total_resi from tb_trx_pengiriman where timestamp between '".date('Y-m-d')." 00:00:00' and '".date('Y-m-d')." 23:59:59'"; 
		$qArr1 = $this->db->query($cmd1)->row_array()['total_resi']; 
		$data['total_today'] = $qArr1 ? $qArr1 : 0;

		$cmd2 = "select total_resi from tb_trx_pengiriman where timestamp between '".date('Y-m-d')." 00:00:00' and '".date('Y-m-d')." 23:59:59' order by timestamp desc limit 1";

		if($this->db->query($cmd2)->num_rows() > 0){
			$qArr2 = $this->db->query($cmd2)->row_array()['total_resi']; //var_dump($qArr2); exit();
		} else {
			$qArr2 = 0;
		}
		$data['last_ship'] = $qArr2;

		$cmd3 = "select sum(total_resi) as total_resi from tb_trx_pengiriman where timestamp between '".date('Y-m')."-01 00:00:00' and '".date('Y-m-d')." 23:59:59'";
		$qArr3 = $this->db->query($cmd3)->row_array()['total_resi'];
		$data['total_month'] = $qArr3 ? $qArr3 : 0; 


		### Kode Warna Cart
		$cmd4 = "select * from tb_ekspedisi";
		$qArr4 = $this->db->query($cmd4)->result_array();
		$data['ekspedisi'] = $qArr4;	
		// var_dump($qArr4); die();

		$this->load->view('admin/vdashboard', $data);
	}
}