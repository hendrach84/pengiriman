<?php 
defined('BASEPATH') or exit();

/**
 * 
 */
class report extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('query');
		$this->load->library('Pdf');
	}

	function index()
	{
		$data['ekspedisi']=$this->query->get_all('tb_ekspedisi');

		$this->load->view('admin/v_report', $data);
	}

	function fpdf(){
		$this->load->library('pdf');
	    $pdf = $this->pdf->getInstance();

	    $pdf->AliasNbPages();
	    $pdf->AddPage();
	    // $pdf->header('Arial');
	    $pdf->SetFont('Times','',12);
	    for($i=1;$i<=40;$i++)
	        $pdf->Cell(0,10,'Printing line number '.$i,0,1);
	    $pdf->Output(); 

	}

	function result_report()
	{
		error_reporting(0);

		$ekspedisi = $this->input->post('ekspedisi');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$data = $this->_data_report($ekspedisi, $tgl_awal, $tgl_akhir);
		$total_idx = $this->_count_total_resi($ekspedisi, $tgl_awal, $tgl_akhir);
		// echo $this->db->last_query(); exit();
		// $a = explode(',', $total_idx);
		//       var_dump($a); exit();
		$this->load->library('pdf_table');
		$pdf = $this->pdf_table->getInstance(); //exit();
		
		$exp_dateBegin = explode('-', $tgl_awal);
		$begin_date = $exp_dateBegin[2].'-'.$exp_dateBegin[1].'-'.$exp_dateBegin[0]; 
		
		$exp_dateEnd = explode('-', $tgl_akhir);
		$end_date = $exp_dateEnd[2].'-'.$exp_dateEnd[1].'-'.$exp_dateEnd[0]; 
		
		$pdf->count_data($total_idx); 
		$pdf->begindate($begin_date);
		$pdf->enddate($end_date);
		
		// $pdf->AddPage();
	    $pdf->AliasNbPages();


		// Column headings
	    $width = array(13, 30, 35, 35, 44, 33);
		$header = array('#', 'ID Pengiriman', 'Ekspedisi', 'E-Commerce', 'Resi', 'Tgl Pengiriman');
		// Data loading
		// $txt_file = FCPATH.'/countries.txt';
		// $data = $pdf->LoadData($txt_file);

		$pdf->SetFont('Arial','',8);
		$pdf->AddPage();
	    // $pdf->header();

		// $pdf->BasicTable($header,$data);
		// $pdf->AddPage();
		// $pdf->ImprovedTable($header,$data);
		// $pdf->AddPage();
		$pdf->FancyTable($header,$data,$width);
		$pdf->Output();
	}

	function _data_report($ekspedisi, $tgl_awal, $tgl_akhir)
	{
		$data = array();
		if ($ekspedisi) 
		{
			$this->db->where("a.id_ekspedisi", $ekspedisi);
		}

		if ($tgl_awal && $tgl_akhir) 
		{
			$this->db->where("a.`timestamp` between '".$tgl_awal." 00:00:00' and '".$tgl_akhir." 23:59:59'" );
		}

		$this->db->select('a.idx as id_kirim, c.ekspedisi, a.id_ecom, a.total_resi');
        $this->db->select('DATE_FORMAT(a.timestamp, "%d-%m-%Y %H:%i:%S") as tgl_kirim ');

		$this->db->join('tb_ekspedisi c', 'c.`id_ekspedisi`=a.`id_ekspedisi`', 'left');
		$this->db->from('tb_trx_pengiriman a');
		$this->db->order_by('a.timestamp', 'asc');
		$data = $this->db->get()->result_array();

		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

	function _count_total_resi($ekspedisi, $tgl_awal, $tgl_akhir)
	{
		$data = array();
		if ($ekspedisi) 
		{
			$this->db->where("a.id_ekspedisi", $ekspedisi);
		}

		if ($tgl_awal && $tgl_akhir) 
		{
			$this->db->where("a.`timestamp` between '".$tgl_awal." 00:00:00' and '".$tgl_akhir." 23:59:59'" );
		}

		$this->db->select('GROUP_CONCAT(a.idx) as total');
        // $this->db->select('DATE_FORMAT(a.timestamp, "%d-%m-%Y %H:%i:%S") as tgl_kirim ');

		$this->db->join('tb_ekspedisi c', 'c.`id_ekspedisi`=a.`id_ekspedisi`', 'left');
		$this->db->from('tb_trx_pengiriman a');
		$this->db->order_by('a.timestamp', 'asc');
		$data = $this->db->get()->row_array()['total'];

		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

	function tcpdf_test()
	{
		$this->load->library('tc_pdf');

		error_reporting(1);

		// $ekspedisi = $this->input->post('ekspedisi');
		// $tgl_awal = $this->input->post('tgl_awal');
		// $tgl_akhir = $this->input->post('tgl_akhir');

		$ekspedisi = 'EKS20210306/001'; //$this->input->post('ekspedisi');
		$tgl_awal = '2021-12-12'; //$this->input->post('tgl_awal');
		$tgl_akhir = '2021-12-12'; //$this->input->post('tgl_akhir');
		
		$this->load->library('pdfgenerator');

		$this->db->select('a.idx as id_kirim, c.ekspedisi, a.id_ecom');
        $this->db->select('DATE_FORMAT(a.timestamp, "%d-%m-%Y %H:%i:%S") as tgl_kirim ');
		if ($ekspedisi) {
			$this->db->where("a.id_ekspedisi", $ekspedisi);
		}
		$this->db->join('tb_ekspedisi c', 'c.`id_ekspedisi`=a.`id_ekspedisi`', 'left');
		$this->db->where("a.`timestamp` between '".$tgl_awal." 00:00:00' and '".$tgl_akhir." 23:59:59'" );
		$this->db->from('tb_trx_pengiriman a');
		$this->db->order_by('a.timestamp', 'asc');
		$qArr = $this->db->get();

		if ($qArr->num_rows() > 1) {
			$qArr = $qArr->result_array();
		} else if($qArr->num_rows() == 1) {
			$qArr = $qArr->row_array();
		} else {
			$qArr = array();
		}

		$data['kiriman'] = $qArr;

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
 
		$html = $this->load->view('admin/table_report', $data, true); 		
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('file-pdf-codeigniter.pdf', 'I');
    
	}

	function dompdf_test()
	{
		// echo $_SERVER['DOCUMENT_ROOT']."/src/assets/media/photos/photo12.jpg"; die();
		// echo base_url('src/assets/media/photos/photo12.jpg'); die();
		$this->load->library('pdfgenerator');
		$data['users']=array(
			array('firstname'=>'I am','lastname'=>'Programmer','email'=>'iam@programmer.com'),
			array('firstname'=>'I am','lastname'=>'Designer','email'=>'iam@designer.com'),
			array('firstname'=>'I am','lastname'=>'User','email'=>'iam@user.com'),
			array('firstname'=>'I am','lastname'=>'Quality Assurance','email'=>'iam@qualityassurance.com')
		);
		$html = $this->load->view('admin/table_report', $data, true);
		$filename = 'report_'.time();
		$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}

	function test()
	{
		// while($hasil=mysqli_fetch_array($data)){
		    $cellWidth=20; //lebar sel
			$cellHeight=1; //tinggi sel satu baris normal
			
			//periksa apakah teksnya melibihi kolom?
			if($pdf->GetStringWidth($hasil['pesan']) < $cellWidth){
				//jika tidak, maka tidak melakukan apa-apa
				$line=1;
			}else{
				//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
				//dengan memisahkan teks agar sesuai dengan lebar sel
				//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
				
				$textLength=strlen($hasil['pesan']);	//total panjang teks
				$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
				$startChar=0;		//posisi awal karakter untuk setiap baris
				$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
				$textArray=array();	//untuk menampung data untuk setiap baris
				$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
				
				while($startChar < $textLength){ //perulangan sampai akhir teks
					//perulangan sampai karakter maksimum tercapai
					while( 
					$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
					($startChar+$maxChar) < $textLength ) {
						$maxChar++;
						$tmpString=substr($hasil['pesan'],$startChar,$maxChar);
					}
					//pindahkan ke baris berikutnya
					$startChar=$startChar+$maxChar;
					//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
					array_push($textArray,$tmpString);
					//reset variabel penampung
					$maxChar=0;
					$tmpString='';
					
				}
				//dapatkan jumlah baris
				$line=count($textArray);
			}
			
		    //tulis selnya
		    $pdf->SetFillColor(255,255,255);
			$pdf->Cell(1,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
			$pdf->Cell(4,($line * $cellHeight),$hasil['tanggal'],1,0); //sesuaikan ketinggian dengan jumlah garis
			
			//memanfaatkan MultiCell sebagai ganti Cell
			//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
			//ingat posisi x dan y sebelum menulis MultiCell
			$xPos=$pdf->GetX();
			$yPos=$pdf->GetY();
			$pdf->MultiCell($cellWidth,$cellHeight,$hasil['pesan'],1);
			
			//kembalikan posisi untuk sel berikutnya di samping MultiCell 
		    //dan offset x dengan lebar MultiCell
			$pdf->SetXY($xPos + $cellWidth , $yPos);
			
		    $pdf->Cell(3,($line * $cellHeight),$hasil['pengirim'],1,1); //sesuaikan ketinggian dengan jumlah garis
	}

	function result_report_old()
	{
		error_reporting(0);

		$ekspedisi = $this->input->post('ekspedisi');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		
		$this->load->library('pdfgenerator'); ## DOMPDF

		$this->db->select('a.idx as id_kirim, c.ekspedisi, a.id_ecom, a.total_resi');
        $this->db->select('DATE_FORMAT(a.timestamp, "%d-%m-%Y %H:%i:%S") as tgl_kirim ');
		if ($ekspedisi) {
			$this->db->where("a.id_ekspedisi", $ekspedisi);
		}
		$this->db->join('tb_ekspedisi c', 'c.`id_ekspedisi`=a.`id_ekspedisi`', 'left');
		$this->db->where("a.`timestamp` between '".$tgl_awal." 00:00:00' and '".$tgl_akhir." 23:59:59'" );
		$this->db->from('tb_trx_pengiriman a');
		$this->db->order_by('a.timestamp', 'asc');
		$qArr = $this->db->get();

		if ($qArr->num_rows() > 1) {
			$qArr = $qArr->result_array();
		} else if($qArr->num_rows() == 1) {
			$qArr = $qArr->row_array();
		} else {
			$qArr = array();
		}
		$data['kiriman'] = $qArr;

		$exp_tgl1 = explode('-', $tgl_awal);
		$data['tgl_awal'] = $exp_tgl1[2].'-'.$exp_tgl1['1'].'-'.$exp_tgl1[0];
		$exp_tgl2 = explode('-', $tgl_akhir);
		$data['tgl_akhir'] = $exp_tgl2[2].'-'.$exp_tgl2['1'].'-'.$exp_tgl2[0];

		$html = $this->load->view('admin/table_report', $data, true); //$this->load->view($html);exit();
		$filename = 'Report_Pengiriman_'.date("d-M-Y");

		$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

        
	}

	function WordWrap($text, $maxwidth)
	{
	    $text = trim($text);
	    if ($text==='')
	        return 0;
	    $space = $this->GetStringWidth(' ');
	    $lines = explode("\n", $text);
	    $text = '';
	    $count = 0;

	    foreach ($lines as $line)
	    {
	        $words = preg_split('/ +/', $line);
	        $width = 0;

	        foreach ($words as $word)
	        {
	            $wordwidth = $this->GetStringWidth($word);
	            if ($wordwidth > $maxwidth)
	            {
	                // Word is too long, we cut it
	                for($i=0; $i<strlen($word); $i++)
	                {
	                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
	                    if($width + $wordwidth <= $maxwidth)
	                    {
	                        $width += $wordwidth;
	                        $text .= substr($word, $i, 1);
	                    }
	                    else
	                    {
	                        $width = $wordwidth;
	                        $text = rtrim($text)."\n".substr($word, $i, 1);
	                        $count++;
	                    }
	                }
	            }
	            elseif($width + $wordwidth <= $maxwidth)
	            {
	                $width += $wordwidth + $space;
	                $text .= $word.' ';
	            }
	            else
	            {
	                $width = $wordwidth + $space;
	                $text = rtrim($text)."\n".$word.' ';
	                $count++;
	            }
	        }
	        $text = rtrim($text)."\n";
	        $count++;
	    }
	    $text = rtrim($text);
	    return $count;
	}

} ## End of Class