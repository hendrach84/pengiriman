<?php
defined('BASEPATH') or exit();

/**
 * login class
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		// $this->load->view('vlogin');
		redirect(site_url('admin/dashboard'));
	}
}