<?php
defined('BASEPATH') or exit();

/**
 * 
 */
class tes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$a = "rgb(122,112,101)";
		$exp = explode(')', $a);
		// print_r($exp[0]);
		$imp = implode(',.5)', $exp);
		var_dump($imp);

	}
}