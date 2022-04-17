n<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/icon.png" type="image/png">


  <title>ABOK - Edit Produk</title>

  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.default.css" />

  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/bootstrap-timepicker.min.css" />
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/jquery.tagsinput.css" />
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/colorpicker.css" />
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/dropzone.css" />


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
                <img alt="" src="<?php echo base_url()."assets/"; ?>images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                    <h4>User</h4>
                    <span>"nip"</span>
                </div>
            </div>

            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

        <h5 class="sidebartitle">Navigasi</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li><a href="<?php echo base_url();?>c_toko/dashboardgudang"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
           <li class="active"><a href="<?php echo base_url();?>c_toko/tampilproduk"><i class="fa fa-book"></i> <span>Data Produk</span></a></li>
        </ul>
         
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
                <img src="<?php echo base_url()."assets/"; ?>images/photos/loggeduser.png" alt="" />
                <strong></strong>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">

                <li><a href="<?php echo base_url();?>dashboard/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->

  <div class="pageheader">
      <h2><i class="fa fa-home"></i><span>Data Produk</span></h2>
      <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">
          <li><a href="#">Abok</a></li>
          <li><a href="<?php echo base_url();?>root/user">Data Produk</a></li>
          <li class="active">Ubah Data</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">

      <<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">

            <a href="#" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">Data Produk</h3>

        </div>
        <div class="panel-body">

          <div class="error"></div>
            <form action="<?php echo base_url();?>c_toko/proses_edit_produk" method="post">

                 <div class="form-group">
                  <label class="col-sm-3 control-label">ID Produk<span class="asterisk">*</span></label>
                  <div class="col-sm-7">
                    <input readonly="true" type="text" name="id_produk" value="<?php echo $produk->id_produk;?>" class="form-control" maxlength="12" required/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Barang<span class="asterisk">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" name="nama_barang" value="<?php echo $produk->nama_barang;?>" class="form-control"  placeholder="Nama Pasien" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Harga<span class="asterisk">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" name="harga" value="<?php echo $produk->harga;?>" class="form-control"  placeholder="Nama Kepala Keluarga" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Stok Barang<span class="asterisk">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" name="stok" value="<?php echo $produk->stok;?>" class="form-control"  placeholder="Tanggal Lahir" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Deskripsi<span class="asterisk">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" name="deskripsi" value="<?php echo $produk->deskripsi;?>" class="form-control"  placeholder="Tempat Lahir" required />
                  </div>
                 
                <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Ubah</button>
                    <button type="reset" class="btn btn-default">Batal</button>
                  </div>
                </div>
              </div>
        </div><!-- panel-body -->

      </div><!-- panel -->

    </div><!-- contentpanel -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->

</section>
<script src="<?php echo base_url()."assets/"; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/modernizr.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/toggles.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/retina.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.cookies.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/jquery.autogrow-textarea.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/dropzone.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/colorpicker.js"></script>


<script src="<?php echo base_url()."assets/"; ?>js/custom.js"></script>
<script language='javascript'>
        function validAngka(a)
        {
            if(!/^[0-9.]+$/.test(a.value))
            {
            a.value = a.value.substring(0,a.value.length-1000);
            }
        }
        </script>



<script>
jQuery(document).ready(function(){

  // Chosen Select
  jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});

  // Tags Input
  jQuery('#tags').tagsInput({width:'auto'});

  // Textarea Autogrow
  jQuery('#autoResizeTA').autogrow();

  // Color Picker
  if(jQuery('#colorpicker').length > 0) {
   jQuery('#colorSelector').ColorPicker({
      onShow: function (colpkr) {
        jQuery(colpkr).fadeIn(500);
        return false;
      },
      onHide: function (colpkr) {
        jQuery(colpkr).fadeOut(500);
        return false;
      },
      onChange: function (hsb, hex, rgb) {
        jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
        jQuery('#colorpicker').val('#'+hex);
      }
   });
  }

  // Color Picker Flat Mode
  jQuery('#colorpickerholder').ColorPicker({
    flat: true,
    onChange: function (hsb, hex, rgb) {
      jQuery('#colorpicker3').val('#'+hex);
    }
  });

  // Date Picker
  jQuery('#datepicker').datepicker();

  jQuery('#datepicker-inline').datepicker();

  jQuery('#datepicker-multiple').datepicker({
    numberOfMonths: 3,
    showButtonPanel: true
  });

  // Spinner
  var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);

  // Input Masks
  jQuery("#date").mask("99/99/9999");
  jQuery("#phone").mask("(999) 999-9999");
  jQuery("#ssn").mask("999-99-9999");

  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});


});
</script>

</body>
</html>
