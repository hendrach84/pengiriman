<?php
defined('BASEPATH') or exit();

/**
 * @author : WeSoft
 */
class proses extends CI_Controller
{
	var $tb_kirim = 'tb_trx_pengiriman';
	var $tb_det = 'tb_det_trx';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('query');

	}

	function index()
	{
		$data['ekspedisi']=$this->query->get_all('tb_ekspedisi');
		$data['ecommerce']=$this->query->get_all('tb_ecom');
		$this->load->view('admin/v_input_pengiriman', $data);
	}

	function save()
	{
		$id_ekspedisi = $this->input->post('ekspedisi');
		// $id_ecom 	  = implode(',', $this->input->post('ecom'));
		$arrayEcom 	  = $this->input->post('ecom');
		$ttlEcom = count($arrayEcom)-1;
		// var_dump($ttlEcom); die();
		$id_ecom = '';
		$count_val = 0;
		foreach ($arrayEcom as $val) {
			if ($count_val < $ttlEcom) {
				$id_ecom .=  '"'.$val.'",';
			} else if($count_val == $ttlEcom  ) {
				$id_ecom .= '"'.$val.'"';
			}
			$count_val++;
		}
		
		$insert_id    = $this->query->create_id($this->tb_kirim,'idx','timestamp','SHIP');
		$resi 	      = explode(PHP_EOL, $this->input->post('resi'));

		## idx  id_ekspedisi  id_ecom  total_resi  timestamp  		
		$total_resi = 1;
		$check_input_resi = '';
		foreach ($resi as $val) {
			if ($val) {
				$this->db->insert($this->tb_det, array('idx'=>$insert_id, 'resi'=>$val));
				$total_resi++;				
				$check_input_resi = 1;
			} 
		} 		

		if ($total_resi == 1) {
			$total_resi = 1;
		} else if ($total_resi >= 2) {
			$total_resi = $total_resi - 1;
		}

		if ($check_input_resi) {
			$data = array(
						'idx' => $insert_id,
						'id_ekspedisi' => $id_ekspedisi,
						'id_ecom' => '['.$id_ecom.']',
						'total_resi' => $total_resi
					);
		 	$this->query->insert($this->tb_kirim, $data); 		
		}
		
		redirect('admin/proses');
		// var_dump($resi);
		// var_dump($total_resi);

		
	}
}