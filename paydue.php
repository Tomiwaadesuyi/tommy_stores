<?php 
include_once("paystackclass.php");
include_once("frontheader.php");
?>
  <!-- Page Content -->
 <div class="container" style="min-height: 500px;">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small>Pay Due</small>
    </h1>
<h5><?php echo $_SESSION['name'];?></h5>

<?php 
$object = new Users;
$objuser = $object->getproduct($_REQUEST["productid"]);

if($_SERVER['REQUEST_METHOD'] == 'POST'){


// create payment object
$payobj = new Payment;
// use initialize paystack method
$output = $payobj->initializePaystack($_POST['email'],$_POST['amount']);
echo "<pre>";
print_r($output);
echo "</pre>";

// insert transaction details & redirect to paystack
$redirecturl = $output->data->authorization_url;
$reference = $output->data->reference;
if(!empty($redirecturl)){
   $payobj->insertTransactionDetails($_SESSION['user_id'],$_POST['amount'],$objuser['pro_name'],$reference);
  header("Location: $redirecturl");
exit;
}


}

// echo '<pre>';
// print_r($objuser);
// echo '</pre>';
?>
<form action="" method="post">
  <div>
    <P>you are paying &#8358;<?php echo $objuser['pro_price']?> for<br>
  <?php echo $objuser['pro_name']?></P>
  <p>Click the button below to pay</p>
</div>


  <input type="hidden" name="email" value="<?php echo $_SESSION['myemail'];?>">

  <input type="hidden" name="amount" value="<?php echo $objuser['pro_price'];?>"><br>

  <input type="submit" class="btn btn-warning" name="submit" value="Pay Now">
</form>

		
	<!-- /.row -->

  </div>
  <!-- /.container -->

<?php 
include("frontfooter.php");
?>