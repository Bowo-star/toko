<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/icon.png" type="image/png">


  <title>ABN - Spv. Produksi</title>

  <link href="<?php echo base_url()."assets/"; ?>css/style.default.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"; ?>css/jquery.datatables.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
    <div class="logopanel">
        <img height="80" src="<?php echo base_url()."assets/"; ?>images/abn.jpg">
          <h5>PT. ABN Medical Indonesia <br>
  Jl. Bihbul Raya No.8 Kopo	<br>
	Margahayu, Bandung, Jawa Barat 40228
</h5>
<h6> (022) 5426290 </h6>
    </div><!-- logopanel -->
   <div class="pageheader">
      <h2><i class="fa fa-book"></i> <span>Data Produksi</span></h2>
      <div class="breadcrumb-wrapper">

      
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>c_inventory/dashboardspv">Spv. Produksi</a></li>
          <li><a href="<?php echo base_url();?>c_barang">Data Produksi</a></li>
          <li class="active">Laporan Produksi</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">



      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">

            <a href="#" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">Lapran Produksi</h3>

        </div>
       <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                 <tr>
                <th hidden="1">No</th>
                <th>ID</th>
											<th>ID Work Order</th>
											<th>Jenis Work Order</th>
											<th>Jumlah</th>
											<th>Tgl. Produksi</th>
											<th>Status</th>
                 </tr>
              </thead>
              <tbody>
                 <?php
									$no = 1;
									foreach ($produksi as $data) { ?>

									<tr>
									<td hidden="1"><?php echo $no; ?></td>
                 					<td><?php echo $data['id_produksi']; ?></td>
									<td><?php echo $data['id_wo']; ?></td>
									<td><?php echo $data['jenis_wo']; ?></td>
									<td><?php echo $data['jumlah']; ?></td>
									<td><?php echo $data['tgl_produksi']; ?></td>
									<td><?php echo $data['status']; ?></td>
									</tr>
									<?php $no++;?>
									<?php } ?>
              </tbody>
           </table>

           
               
          </div><!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->

      

</section>


<script src="<?php echo base_url()."assets/"; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/modernizr.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/toggles.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/retina.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.cookies.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/custom.js"></script>
<script>
  jQuery(document).ready(function() {

    jQuery('#table1').dataTable();

    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });

    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });

    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });

        return false;
    });

    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });


  });
</script>

</body>
</html>
