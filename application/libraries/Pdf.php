<?php
defined('BASEPATH') or exit();
    // include_once APPPATH . '/third_party/fpdf/fpdf.php';
    // require(APPPATH . '/third_party/fpdf/fpdf.php');

class Pdf {// extends fpdf {
 
    
    // Page header
	function Header()
	{

		$logo = FCPATH.'/logo.png'; 
	    // Logo
	    $this->Image($logo,10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'Title',1,0,'C');
	    // Line break
	    $this->Ln(20);
	}

    public function getInstance(){
        return new Pdf();
    }


}
?>