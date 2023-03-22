<?php
include 'frontheader.php';
?>


<?php


// check if button is clicked
if (isset($_POST['btn']) && $_POST['btn']== 'Upload Product') {
	echo "<div class = 'alert alert-success'><p style='text-align:center; font-size:30px '>Product Has Been Added</p></div>";
 //header("location:index.php");
	// create instance of MyContacts class

	// create instance of MyContacts class

$objuser = new Users;
$output = $objuser->uploadproduct($_POST['proname'], $_POST['proprice']);

echo $output;

}
?>

<!-- Page Content -->
  <div class="container-fluid"  style="background-color: yellow">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
      <small>Upload Categories</small>
    </h1>
<?php 
 $userobj = new Users;
$user = $userobj->getuser($_SESSION['user_id']);
?>
   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
	  <div>
      <?php 
       if(empty($user['profilephoto'])){
      ?>
	  <img src='images/avater.png' class='img-fluid'>
	 <?php 
    }else{
   ?>
   <img src='images/<?php echo $user['profilephoto']?>' class='img-fluid'>
   <?php 
    }
   ?>
	  </div>
        <div class="list-group">
          <a href="index.html" class="list-group-item">Home</a>
          <a href="" class="list-group-item">Edit Profile</a>
          <a href="payment.html" class="list-group-item">My Payments</a>
          <a href="shop.html" class="list-group-item">Shop</a>
          <a href="logout.php" class="list-group-item">Logout</a>
         
          
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
       <h4>Upload Products</h4>
	   <form method="post" action="" enctype="multipart/form-data">
	    
    <div class="form-group row">
      <div class="col-sm-12">
         <label class="col-sm-2 col-form-label">Product Name</label>
     <input type='text' name='proname' id="proname" class="form-control">
    </div>

    <div class="col-sm-12">
         <label class="col-sm-2 col-form-label">Product Price</label>
     <input type='text' name='proprice' id="proprice" class="form-control">
    </div>
    
    <div class="col-sm-12">
    	<label class="col-sm-2 col-form-label">Upload Picture</label>
     <input type='file' name='mypix'  class="form-control">
    </div>
  </div>
   
  <hr>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-12">
      <input type="submit" class="btn btn-info btn-block" name="btn" value="Upload Product">
    </div>
  </div>
</form>


      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


<?php
include 'frontfooter.php';
?>