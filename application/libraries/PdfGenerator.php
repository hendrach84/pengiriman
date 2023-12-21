<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./application/third_party/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();

    // Parameters
    $x          = 525;
    $y          = 800;
    $text       = "{PAGE_NUM} of {PAGE_COUNT}";     
    $font       = $dompdf->getFontMetrics()->get_font('Helvetica', 'normal');   
    $size       = 10;    
    $color      = array(0,0,0);
    $word_space = 0.0;
    $char_space = 0.0;
    $angle      = 0.0;

    $dompdf->getCanvas()->page_text(
      $x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle
    );

    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}