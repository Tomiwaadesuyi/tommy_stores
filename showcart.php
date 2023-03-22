
		<?php 
         include("frontheader.php");
		?>
		<div class="row">
	<div class="col-md-12" style="margin-top: 40px;">
		<h1 align="center">YOUR CART ITEMS</h1>
		<hr style="width:20%; color:rgba(203,32,38,0.9); border-top:4px solid black; border-radius:10px;">
	</div>
</div>

<div class="row" class="divimage">
<?php
// include("tommystoreclass.php");
if(empty($_SESSION['cart'])){
	echo "<h2>No items in your cart yet</h2>";
}else{
	$obj = new Users; 

	foreach($_SESSION['cart'] as $productId=>$qty){
		$objuser = $obj->getproduct($productId) ;
?>
<div class="col-md-3 divimage1 divimage" style="border:0px solid black;  border-radius:10px; margin-top: 100px; margin-bottom:90px;">
<img src="photo/<?php echo $objuser['pro_image']?>" style="height:80%; width:100%;">
<p style="font-size: 20px; font-weight:bold;"><span><?php echo "$qty of ".$objuser['pro_name']?></span></p>
<p style="font-size: 18px; font-weight:bold; line-height:9px;"><span>&#8358;</span><?php echo number_format(($objuser['pro_price'] * $qty));?></p>
<a href="paydue.php?productid=<?php echo  $objuser['pro_id'];?>" class="btn btn-primary">CHECKOUT</a>
</div>
<?php 
}
}
?>
</div>
</div>
</body>
</html>
	