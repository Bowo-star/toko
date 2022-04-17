
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/icon.png" type="image/.png">

  <title>Customer</title>

  <link href="<?php echo base_url()."assets/"; ?>css/style.default.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"; ?>css/jquery.datatables.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"; ?>css/morris.css" rel="stylesheet">


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
                <img alt="" src="<?php echo base_url()."assets/"; ?>images/user3.png" class="media-object">
                <div class="media-body">
                    <h4></h4>
                </div>
            </div>
        </div>

      <br>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="active"><a href="<?php echo base_url();?>c_toko/dashboardcustomer"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

      <h5 class="sidebartitle">Data Master</h5>

        <li><a href="<?php echo base_url();?>c_toko/tampilprodukcustomer"><i class="fa fa-book"></i> <span>Lihat Produk</span></a></li>
      

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
                <img src="<?php echo base_url()."assets/"; ?>images/photos/user2.png" alt="" />
                <strong></strong>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">

                <li><a href="<?php echo base_url();?>c_toko/do_logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->
    <br>
    
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> <span>Customer</span></h2>
      <div class="breadcrumb-wrapper">

      </div>
    </div>

    <div class="contentpanel">
     <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-btns">
                <a href="#" class="panel-close">&times;</a>
                <a href="#" class="minimize">&minus;</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
            <center><img height="175" src="<?php echo base_url()."assets/"; ?>images/petugas.jpg">
              <h4><p>Selamat datang anda masuk sebagai <b>Customer.</b></p><br></center></h4>
               <div class="col-md-7">
               <h5 class="subtitle mb5">Informasi</h5>
         
          </div>
            </div>
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

<script src="<?php echo base_url()."assets/"; ?>js/flot/flot.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/flot/flot.resize.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/flot/flot.symbol.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/flot/flot.crosshair.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/flot/flot.categories.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/flot/flot.pie.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/morris.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/raphael-2.1.0.min.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/custom.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/dashboard.js"></script>

</body>
</html>
