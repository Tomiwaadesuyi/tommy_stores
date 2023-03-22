<?php session_start();
include 'tommystoreclass.php';
?>


<!DOCTYPE html> 
<html>
<head>
	<title>Tommy's Store</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name='keyword' content="Tommy's store">
<meta name="description" content="">
<meta name='author' content='Tomiwa Adesuyi'>
<!-- Bootstrap CSS -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

 <link rel="stylesheet" href="indexstyle.css">

<!-- fontawesome -->
  <link href="fontawesome/fontawesome/css/all.css" rel="stylesheet"> 
<style type="text/css">
	 div{
		/*border:1px dashed #000000;
		min-height:100px;*/
	}
</style>

</head>
<body>

  <?php 
  if(!empty($_SESSION)){
 $userobj = new Users; 
$user = $userobj->getuser($_SESSION['user_id']);
}
?>

<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg  fixed-top" style='background-color:yellow'>
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

          <?php
          if(empty($_SESSION)){
          ?>
           <li class="nav-item">
            <a class="nav-link" href="registerform.php">signup</a>
          </li>
          <?php
        }
        ?>
           <li class="nav-item">
            <a class="nav-link" href="#abt">About</a>
          </li>
         
           <li class="nav-item dropdown">
            <p class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <?php if(!empty($_SESSION['name'])){
              echo $_SESSION['name'];
             }else{
              ?>
              <img src="images/avater.png" class="img-fluid" style="height: 30px">
              <?php
             } ?>
                </p>
                 <?php
          if(!empty($_SESSION)){
            ?>
          
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="profilepage.php">Edit Profile</a>
              <a class="dropdown-item" href="payments.php">My Payments</a>
              <?php
              if($user['role_id'] == 2) {
                ?>
                <a class="dropdown-item" href="viewcustomers.php">view Customers</a>
                <a class="dropdown-item" href="uploadcategory.php">Upload Category</a>
                 <a class="dropdown-item" href="uploadproducts.php">Upload Products</a>
                 <a class="dropdown-item" href="showcart.php">cart</a>
                <?php
              }elseif($user['role_id'] == 3){
                ?>
                 <a class="dropdown-item" href="uploadproducts.php">Upload Products</a>
                 <a class="dropdown-item" href="showcart.php">cart</a>
                <?php
              }else{
                ?>
                <a class="dropdown-item" href="showcart.php">cart</a>
                <?php
              }
            }
              ?>

              
            </div>
          </li>&nbsp;&nbsp;&nbsp;
         <!--  <li class="nav-item" style='background-color:yellow;margin-left:60px !important;'>
            <a class="nav-link" style='color:green' href='#' data-toggle="modal" data-target="#exampleModal" >Login</a>
          </li> -->

           <li class="nav-item">
            <?php
            if(empty($_SESSION['name'])){
              ?>
             <a class="nav-link" href="signinform.php">login</a>
             <?php
            }else{
            ?>
            <a class="nav-link" href="Logout.php">Logout</a>
            <?php
          }
        
          // var_dump($_SESSION);

          ?>
          </li>
           
         
        </ul>
      </div>
    </div>
  </nav>
