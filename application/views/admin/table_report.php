<!DOCTYPE html>
<html>
<head>
  <title>Report Pengiriman</title>
  <!-- <style type="text/css">
    .page_break {
      page-break-before: always;
    }

    #footer {
      position: fixed;
      right: 0px;
      bottom: 10px;
      text-align: center;
      border-top: 1px solid black;
    }

    #footer .page:after {
      content: counter(page, decimal);
    }

    @page {
      margin: 20px 30px 40px 50px;
    }

  </style> -->

  <link rel="stylesheet" type="text/css" href="<?= $_SERVER['DOCUMENT_ROOT'].'pengiriman/bootstrap341/css/bootstrap.min.css';?>" >


</head>
<body >
  <!-- In production server. If you choose this, then comment the local server and uncomment this one-->
  <!-- <img src="<?php // echo $_SERVER['DOCUMENT_ROOT']."/media/dist/img/no-signal.png"; ?>" alt=""> -->
  <!-- In your local server -->
  <!-- <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'pengiriman/src/assets/media/photos/photo12.jpg' ?>" width=120 height=120 alt=""> -->

  <!-- <div class="page-header" style="padding-top: 0px;text-align: center; margin-top: -20px;">
  </div> -->
    <h2 style="padding-top: 0px;text-align: center; margin-top: -20px; "><u>Report Pengiriman</u></h2> <br>
    <h4 style="">Tgl pengiriman : <i><?=$tgl_awal?> s/d <?=$tgl_akhir?></i></h4>

    <?php 
        $total_packing = 0;
        foreach ($kiriman as $total) {
          $total_packing = $total_packing + (int) $total['total_resi']; 
        }
    ?>

    <h4>Total Resi : <i><?=$total_packing?> </i> Resi</h4>
	<!-- <div id="outtable"> -->
  <!-- <div style="padding-right: 20px;"> -->
	  <table class="table table-striped table-bordered" style="width: 97%">
	  	<thead class="bg-primary" style="font-size: 12px;">
	  		<tr>
	  			<th style="text-align:center;width: 25px">#</th>
	  			<th style="width: 50px !important">ID Pengiriman</th>
	  			<th style="width: 50px">Ekspedisi</th>
          <th style="width: 80px">E-Commerce</th>
          <th style="width: 130px;">Resi</th>
	  			<th style="width: 80px">Tgl Pengiriman</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php $no=1; ?>
	  		<?php foreach($kiriman as $kirim): ?>
          <?php
            $exp = json_decode($kirim['id_ecom']);
            $total = count($exp);
            $ecom = '';
            $id='';
          ?>
            <tr style="font-size: 11px; font-style: italic;">
              <td style="text-align: center; padding-left: 1px; padding-right: 1px;"><?= $no; ?></td>
              <td><?= $kirim['id_kirim']; ?></td>
              <td><?= $kirim['ekspedisi']; ?></td>
              <td>
                  <?php 
                    for ($i=0; $i < $total ; $i++) { 
                      $this->db->select('*');
                      $this->db->from('tb_ecom');
                      $this->db->where('id_ecom', $exp[$i]);
                      $qArr2 = $this->db->get()->row_array(); 
                      echo $qArr2['nama_ecom']."<br>";
                    }
                  ?>
              </td>
              <td >
                  <?php 
                      $a = 1;
                    // for ($i=0; $i < $total ; $i++) { 
                      $this->db->select('*');
                      $this->db->from('tb_det_trx');
                      $this->db->where('idx', $kirim['id_kirim']);
                      $qArr3 = $this->db->get()->result_array();

                      foreach ($qArr3 as $val) {
                        echo $a." => ".$val['resi']." <br>";
                        $a++;
                      }
                    // }
                  ?>                
              </td>
              <td><?= $kirim['tgl_kirim'] ?></td>            
  	  		<?php $no++; ?>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 <!-- </div> -->

   <script src="<?= $_SERVER['DOCUMENT_ROOT'].'pengiriman/bootstrap341/js/bootstrap.min.js' ?>"></script>
</body>

</html>