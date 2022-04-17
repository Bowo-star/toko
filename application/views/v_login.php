<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Abok Custom</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<style>
body {
  font-family: 'Varela Round', sans-serif;
}
.form-control {
  box-shadow: none;
  border-radius: 4px;
} 
.navbar {
  background: #fff;
  padding-left: 16px;
  padding-right: 16px;
  border-bottom: 1px solid #dfe3e8;
  border-radius: 0;
}
.nav-link img {
  border-radius: 50%;
  width: 36px;
  height: 36px;
  margin: -8px 0;
  float: left;
  margin-right: 10px;
}
.navbar .navbar-brand {
  padding-left: 0;
  font-size: 20px;
  padding-right: 50px;
}
.navbar .navbar-brand b {
  color: #5c6ac4;   
}
.navbar .form-inline {
  display: inline-block;
}
.navbar .navbar-nav {
  position: relative;
}
.navbar a, .navbar a:active {
  color: #888;
  font-size: 15px;
  background: transparent;
}
.search-box {
  position: relative;
} 
.search-box input {
  padding-right: 35px;
  border-color: #dfe3e8;
  border-radius: 4px !important;
  box-shadow: none
}
.search-box .input-group-text {
  min-width: 35px;
  border: none;
  background: transparent;
  position: absolute;
  right: 0;
  z-index: 9;
  padding: 7px;
  height: 100%;
}
.search-box i {
  color: #a0a5b1;
  font-size: 19px;
}
.navbar .btn-primary, .navbar .btn-primary:active {
  color: #fff;
  background: #5c6ac4 !important;
  padding-top: 8px;
  padding-bottom: 6px;
  border-radius: 4px;
  vertical-align: middle;
  border: none;
  min-width: 120px;
  margin: 2px 0;
}
.navbar .btn-primary:hover, .navbar .btn-primary:focus {    
  color: #fff;
  background: #5765c1 !important;
}
.navbar .action-buttons .dropdown-toggle::after {
  display: none;
}
.search-box .btn span {
  transform: scale(0.9);
  display: inline-block;
}
.navbar .nav-item i {
  font-size: 18px;
}
.navbar .dropdown-item i {
  font-size: 16px;
  min-width: 22px;
}
.navbar .dropdown-menu {
  border-radius: 1px;
  border-color: #e5e5e5;
  box-shadow: 0 2px 8px rgba(0,0,0,.05);
}
.navbar .navbar-nav .dropdown-menu a {
  padding: 8px 20px;
  line-height: normal;
}
.navbar .navbar-form {
  border: none;
}
.navbar .navbar-form-wrapper {
  padding: 0 15px;
}
.navbar .login-form label {
  color: #888;
  font-weight: normal;
}
.navbar .dropdown-menu.login-form {
  width: 280px;
  padding: 20px;
  left: auto;
  right: 0;
  font-size: 14px;
}
.navbar .navbar-nav .dropdown-menu.login-form a {
  padding: 0 !important;
  color: #5c6ac4;
  font-weight: normal;
}
.navbar .navbar-nav .dropdown-menu.login-form a:hover{
  text-decoration: underline;
}
.navbar .dropdown-menu.login-form .checkbox-inline {
  margin-top: 10px;
}
@media (min-width: 1200px){
  .form-inline .input-group {
    width: 300px;
    margin-left: 30px;
  }
}
@media (max-width: 768px){
  .navbar .dropdown-menu.login-form {
    width: 100%;
    padding: 10px 15px;
    background: transparent;
    border: none;
  }
  .navbar .form-inline {
    display: block;
  }
  .navbar .input-group {
    width: 100%;
  }
  .navbar .navbar-nav .btn-primary, .navbar .navbar-nav .btn-primary:active {
    display: block;
  }
  .container{
            width: 300px;
            margin: auto;
            background: #9ddb44;
            padding: 10px;
            font-family: arial
        }
        .container p {
            color:#777;
            font-weight: bold;
        }
        .container .wspc{
            background-color: green;
            color: white;
            padding: 1em;
            word-spacing: 2em;
        }
       
</style>
<script>
// Prevent dropdown menu from closing when click inside the form
$(document).on("click", ".navbar-right .dropdown-menu", function(e){
  e.stopPropagation();
});
</script>
</head> 
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="#" class="navbar-brand">@Abok<b>Custom</b></a>     
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Collection of nav links, forms, and other content for toggling -->
  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
    <div class="navbar-nav">    
    
        </div>
   
    <div class="navbar-nav action-buttons ml-auto">
      <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle mr-3">Login</a>
      <div class="dropdown-menu login-form">
        <form method="post" action="<?php echo base_url();?>c_toko/ceklogin" name="form_login">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required="required">
          </div>
          <div class="form-group">
            <div class="clearfix">
              <label>Password</label>
            </div>                            
            <input type="password" name="password" class="form-control" required="required">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>         
      </div>      
      <a href="<?php echo base_url();?>c_toko/tambah_customer" class="btn btn-primary">Sign Up</a>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url()."assets/"; ?>images/abokbg.jpeg" alt="First slide">
    </div>
    <div class="carousel-item" align="center">
      <img class="d-block w-50" src="<?php echo base_url()."assets/"; ?>images/abok8.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item" align="center">
      <img class="d-block w-50" src="<?php echo base_url()."assets/"; ?>images/abok9.jpeg" alt="Third slide">
    </div>
    <div class="carousel-item" align="center">
      <img class="d-block w-50" src="<?php echo base_url()."assets/"; ?>images/abok11.jpeg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div class="jumbotron">
  <h2 class="display-5">@Abok_Custom</h2>
   <p class="lead">
  Vendor Jam Tangan Bandung.  
  </p>
  <hr class="my-4">
  <p>Perum Mulya Sari, Jl. Candi Mendut No.36, RT 011/RW 005 (Belakang Polsek Lowokwaru), Kel. Cibeber, Kec. Gunung Batu, Kota Bandung, Jawa Barat, 65142</p>
 
</div>

</body>
</html>                            