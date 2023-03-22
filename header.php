<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IT Professionals</title>

  <!-- Bootstrap core CSS -->
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  
<style type="text/css">
.nav-link{ color:white;}
.nav-link:hover{
	color:grey;
}

#showmember{
  border: 2px solid #fff;
  position: absolute;
  top: 35px;
  left: 20px;
  width: 676px
}
.searchimg{
  width: 20px
}
</style>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg  fixed-top" style='background-color:green'>
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/product.jpeg" width='100'></a>
     <div class="container">
      <div class="row">
      <div class="col-md-12">
      <input type="text" name="search" id="searchmember" placeholder="search" class="form-control">
      <!-- <div id="showmember" style="background-color: white">Dispaly member</div> -->
      </div>
</div>
</div>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
		   <li class="nav-item dropdown">
            <p class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tomiwa
            </p>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="profile.php">Edit Profile</a>
              <a class="dropdown-item" href="payments.php">My Payments</a>
              <a class="dropdown-item" href="shop.php">Shop</a>
            </div>
          </li>
         <!--  <li class="nav-item" style='background-color:yellow;margin-left:60px !important;'>
            <a class="nav-link" style='color:green' href='#' data-toggle="modal" data-target="#exampleModal" >Login</a>
          </li> -->

           <li class="nav-item">
            <a class="nav-link" href="login.php">login</a>
          </li>
           
         
        </ul>
      </div>
    </div>
  </nav>

<?php
ob_flush()
?>