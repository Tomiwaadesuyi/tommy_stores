<?php session_start();
include 'frontheader.php';

?>
<!-- 2nd row-->
         <div class="row">
         <div class="col-12">
<!-- begin carousel slide -->
 		<div id="carouselslider" class="carousel slide" data-ride="carousel">
 			<!-- carousel indicator -->
 			<ol class="carousel-indicators">
 				<li data-target="#carouselslider" dat-slide-to="0" class="active"></li>
 				<li data-target="#carouselslider" dat-slide-to="1" class="active"></li>
 				<li data-target="#carouselslider" dat-slide-to="2" class="active"></li>
 			</ol>
 			<div class="carousel-inner">
 			
 				<!-- item 1 -->
 				<div class="carousel-item active">
 					<img src="images/fashion.jpg" alt="slider1"class="d-block w-100">
 						<div class="carousel-caption d-none d-md-block">
 							<p><b>girls clothings available</b></p>
                    </div>

 				</div>
 				<!-- item 2 -->
 				<div class="carousel-item ">
 					<img src="images/feet.jpg" alt="slider2" class="d-block w-100">
 					<div class="carousel-caption d-none d-md-block">
 						<p><b>running shoes</b></p>
                    </div>
 				</div>
 				<!-- item 3 -->
 				<div class="carousel-item ">
 					<img src="images/model.jpg" alt="slider3" class="d-block w-100">
 					<div class="carousel-caption d-none d-md-block">
                  </div>
 				</div>
<!-- item 4 -->
 				<div class="carousel-item ">
 					<img src="images/nike.jpg" alt="slider4" class="d-block w-100">
 					<div class="carousel-caption d-none d-md-block">
                  </div>
 				</div>
 				</div>
 				<!-- control: prev next -->
 				<a href="#carouselslider" class="carousel-control-prev" role="button" data-slide="prev">
 					<span class="carousel-control-prev-icon" aril-hidden="true"></span>
 				</a>
 				<a href="#carouselslider" class="carousel-control-next" role="button" data-slide="next">
 					<span class="carousel-control-next-icon" aril-hidden="true"></span>
 				</a>
 			</div>
 		</div>
 	</div>
 	<!-- end corousel slide -->
		
<!-- 3rd row -->
				<div>
			<h2 style="text-align: center">Categories</h2>
			<hr style="color: yellow">
		</div>
	    <div class="row">

           <?php 
$objuser = new Users;
$users = $objuser->getcategories();
if(!empty($users)){
  foreach($users as $key=> $value){

      ?>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="box card">
                    <div class="box cardImg">
                        <?php if(empty($value['cat_img'])){
                           ?>
                        <img src="photo/cart.jpg" alt="...">
                        <?php
                    }else{
                        ?>
               <img src="photo/<?php echo $value['cat_img']?>" alt=""></a>
                 <?php }?>
                    </div>
                    <div class="info">
                        <h3><?php echo $value['cat_name']?></h3>
                        <a href="productpage.php" class="btn btn-primary">See all</a>
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