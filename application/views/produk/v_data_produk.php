<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/icon.png" type="image/png">


  <title>Petugas Gudang</title>

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

  <div class="leftpanel">

    <div class="logopanel">
        <img height="125" src="<?php echo base_url()."assets/"; ?>images/abokbg.jpeg">
    </div><!-- logopanel -->

    <div class="leftpanelinner">

        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media userlogged">
                <img alt="" src="<?php echo base_url()."assets/"; ?>images/photos/user1.jpg" class="media-object">
                <div class="media-body">
                    <h4></h4>
                </div>
            </div>


        </div>

     <br>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="<?php echo base_url();?>c_toko/dashboardgudang"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

      <h5 class="sidebartitle">Data Master</h5>

        <li  class="active"><a href="<?php echo base_url();?>c_toko/tampilproduk"><i class="fa fa-book"></i> <span>Data Produk</span></a></li>
      </ul>

  
       <h5 class="sidebartitle">Lainya</h5>
       <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="<?php echo base_url();?>c_toko/do_logout"><i class="fa fa-sign-out"></i> <span>Log out</span></a></li>
      </ul>

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>



      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url()."assets/"; ?>images/photos/user1.jpg" alt="" />
                <strong></strong>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">

                <li><a href="<?php echo base_url();?>c_dashboard/do_logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->
    <br>
    
   <div class="pageheader">
      <h2><i class="fa fa-book"></i> <span>Data Produk</span></h2>
      <div class="breadcrumb-wrapper">

      
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>c_toko/dashboard">Petugas Gudang</a></li>
          <li><a href="<?php echo base_url();?>c_barang">Data Produk </a></li>
          <li class="active">Lihat Data</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">



      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">

            <a href="#" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title"> Data Produk</h3>

        </div>
       <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                 <tr>
                <th hidden="1">No</th>
                <th>ID</th>
											<th>Nama Barang</th>
											<th>Harga</th>
											<th>Stok Barang</th>
											<th>Deskripsi</th>

                 </tr>
              </thead>
              <tbody>
                 <?php
									$no = 1;
									foreach ($produk as $data) { ?>

									<tr>
									<td hidden="1"><?php echo $no; ?></td>
                  <td><?php echo $data['id_produk']; ?></td>
									<td><?php echo $data['nama_barang']; ?></td>
									<td><?php echo $data['harga']; ?></td>
									<td><?php echo $data['stok']; ?></td>
									<td><?php echo $data['deskripsi']; ?></td>
              
                  <td><a class="btn btn-lightblue btn-xs" href='<?php echo base_url()."c_toko/ubah_produk/".$data['id_produk'];?>'><i class="fa fa-edit"></i></a>
                   <a class="btn btn-orange btn-xs" href="<?php echo base_url()."c_toko/hapus_produk/".$data['id_produk'];?>"><i class="fa fa-trash-o"></i></a></td>
									</tr>
									<?php $no++;?>
									<?php } ?>
              </tbody>
           </table>
               
          </div><!-- table-responsive -->
           <center> <a href="<?php echo base_url();?>c_toko/tambah_produk"><button class="btn btn-success"> Tambah Data</button></a></center><br><br>

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
