<?php
include 'frontheader.php';
?>

<div>
			<h2 style="text-align: center">Categories</h2>
			<hr style="color: yellow">
		</div>
	    <div class="row">

           <?php 
$objuser = new Users;
$users = $objuser->getproducts();
if(!empty($users)){
  foreach($users as $key=> $value){

      ?>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="box card">
                    <div class="box cardImg">
                        <?php if(empty($value['pro_image'])){
                           ?>
                        <img src="photo/cart.jpg" alt="...">
                        <?php
                    }else{
                        ?>
               <img src="photo/<?php echo $value['pro_image']?>" alt=""></a>
                 <?php }?>
                    </div>
                    <div class="info">
                        <h3><?php echo $value['pro_name']?></h3>
                       <h3>&#8358;<?php echo number_format($value['pro_price'])?></h3>
                       <a href="cart.php?productid=<?php echo $value['pro_id'];?>"> <button class="btn btn-warning">Add To Cart</button></a>
                    </div>
                </div>
            </div>
           
           
           <?php
        }
        }
           ?>	
           </div>	

<?php
include 'frontfooter.php';
?>