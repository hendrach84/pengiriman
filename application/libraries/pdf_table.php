<?php

    require(APPPATH . '/third_party/fpdf/fpdf.php');

class pdf_table extends FPDF
{
    protected $data;
	protected $begin_date;
	protected $end_date;
    protected $CI;

    // public function __construct()
    // {
        // Assign the CodeIgniter super-object
        // $this->CI =& get_instance();
    // }
	
	function begindate($date)
	{
		$this->begin_date = $date;
	}
	
	function enddate($date)
	{
		$this->end_date = $date;
	}
	
    function count_data($data)
    {
        $data = explode(',', $data);
        $idx = array();
        for ($i=0; $i < count($data); $i++) { 
            array_push($idx, $data[$i]);
        }

        $this->CI =& get_instance();
        $this->CI->db->select('count(resi) as total');
        $this->CI->db->where_in('idx', $idx);
        $this->CI->db->from('tb_det_trx');

        $total = $this->CI->db->get()->row_array()['total'];
        $this->data = $total;
    }

    // Page header
    function Header()
    {

        $logo = FCPATH.'/logo.png'; 
        // Logo
        // $this->Image($logo,10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        // $this->Cell(50);
        // Title
        $this->Cell(50,10,'Report Pengiriman',0,0,'L');
        // Line break
        $this->Ln(8);
        $total_packing = $this->data;

        $this->SetFont('Arial','B',9);
        $this->Cell(210,10,'Tgl Pengiriman : '.$this->begin_date.' s/d '.$this->end_date,0,0,'L');
        $this->ln(5);
        $this->Cell(190,10,'Total Resi : '.$total_packing,'B',0,'L');
        $this->ln(15);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        //print_r($data); exit();
         return $data;
    }

    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach($header as $col)
            $this->Cell(40,7,$col,1);
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }

    // Better table
    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(40, 35, 40, 45);
        // Header
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }

    // Colored table
    function FancyTable($header, $data, $width)
    {
        // Colors, line width and bold font
        // $this->SetFillColor(255,0,0);
        $this->SetFillColor(231, 76, 60);
        $this->SetTextColor(255);
        // $this->SetDrawColor(128,0,0);
        $this->SetDrawColor(23, 32, 42 );
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        // Header
        $w = $width;
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        // Data
        $fill = false;
        $i = 1;
        $this->CI =& get_instance();
        // $this->CI->load->library('database');
        // echo "string";exit();
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$i.'.','LR',0,'C',$fill);
            $this->Cell($w[1],6,$row['id_kirim'],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row['ekspedisi'],'LR',0,'L',$fill);

                $this->CI->db->select('resi');
                $this->CI->db->from('tb_det_trx');
                $this->CI->db->where('idx', $row['id_kirim']);
                $qArr2 = $this->CI->db->get()->result_array();

            $total_id_kirim = count($qArr2);
                

            $exp = json_decode($row['id_ecom']);
            $total_id_ecom = count($exp);

            if ($total_id_kirim > $total_id_ecom) 
            {
                for ($a=0; $a < $total_id_kirim ; $a++) {
                    $this->CI->db->select('*');
                    $this->CI->db->from('tb_ecom');
                    $this->CI->db->where('id_ecom', $exp[$a]);
                    $qArr = $this->CI->db->get()->row_array(); 

                    $idx = 1 + $a;
                    
                    if ($a < 1) {
                        $this->Cell($w[3],6,$qArr['nama_ecom'],'L',0,'L',$fill);
                        $this->Cell($w[4],6,$idx.' => '.$qArr2[$a]['resi'],'LR',0,'L',$fill);
                        $this->Cell($w[5],6,$row['tgl_kirim'],'LR',0,'L',$fill);
                        $this->ln();
                    } else {
                        $this->Cell($w[0],6,'','LR',0,'L',$fill);
                        $this->Cell($w[1],6,'','LR',0,'L',$fill);
                        $this->Cell($w[2],6,'','LR',0,'L',$fill);
                        $this->Cell($w[3],6,$qArr['nama_ecom'],'L',0,'L',$fill);
                        
                        if ($qArr2[$a]['resi']) {
                            $this->Cell($w[4],6,$idx.' => '.$qArr2[$a]['resi'],'LR',0,'L',$fill);
                        } else {
                            $this->Cell($w[4],6,'','LR',0,'L',$fill);
                        }
                            
                        $this->Cell($w[5],6,'','LR',0,'L',$fill);
                        $this->ln();
                    }                  
                }                  
            } 
            else
            {
                for ($a=0; $a < $total_id_ecom ; $a++) {
                    $this->CI->db->select('*');
                    $this->CI->db->from('tb_ecom');
                    $this->CI->db->where('id_ecom', $exp[$a]);
                    $qArr = $this->CI->db->get()->row_array(); 

                    $idx = 1 + $a;
                    
                    if ($a < 1) {
                        $this->Cell($w[3],6,$qArr['nama_ecom'],'L',0,'L',$fill);
                        $this->Cell($w[4],6,$idx.' => '.$qArr2[$a]['resi'],'LR',0,'L',$fill);
                        $this->Cell($w[5],6,$row['tgl_kirim'],'LR',0,'L',$fill);
                        $this->ln();
                    } else {
                        $this->Cell($w[0],6,'','LR',0,'L',$fill);
                        $this->Cell($w[1],6,'','LR',0,'L',$fill);
                        $this->Cell($w[2],6,'','LR',0,'L',$fill);
                        $this->Cell($w[3],6,$qArr['nama_ecom'],'L',0,'L',$fill);
                        
                        if ($qArr2[$a]['resi']) {
                            $this->Cell($w[4],6,$idx.' => '.$qArr2[$a]['resi'],'LR',0,'L',$fill);
                        } else {
                            $this->Cell($w[4],6,'','LR',0,'L',$fill);
                        }
                        
                        $this->Cell($w[5],6,'','LR',0,'L',$fill);
                        $this->ln();
                    }                   
                }  
            }
    
            for ($a=0; $a < $total ; $a++) { 
                // var_dump($qArr); 

            }
            // var_dump($nama_ecom); exit();
                // exit();
            
            // $this->Ln();
            $fill = !$fill;
            $i++;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }


    public function getInstance(){
        return new pdf_table();
    }

}


?>