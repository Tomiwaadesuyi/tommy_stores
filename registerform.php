<?php
include 'tommystoreclass.php';
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="loginstyle.css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery-3.6.0.js/3.2.1"></script>

<!-- fontawesome -->
   <link href="fontawesome/fontawesome/css/all.css" rel="stylesheet">

	<title><?php echo MY_APP_NAME ?></title>
	<script defer src="Register.js"></script>
</head>

<body style="background-color: yellow">

<?php


// check if button is clicked
if (isset($_POST['btn']) && $_POST['btn']== 'Register') {
	//echo "<div class = 'alert alert-success'><p style='text-align:center; font-size:30px '>Submitted successfully</p></div>";
 header("location:index.php");
	// create instance of MyContacts class

	// create instance of MyContacts class

$objuser = new Users;
$output = $objuser->insertcustomers($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['gender'],$_POST['password']);

echo $output;

}
?>

		<div class="container-fluid" style="background-color: yellow">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Tommy's Store</h1>
	               		<!-- <hr /> -->
	               	</div>
	            </div>
				<div class="main-login main-center">
					
					<form class="form-horizontal" name='myform' method="post" action="#" id="form">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"  required="reqired"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" required="reqired"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="address" id="address"  placeholder="Enter your address" required="reqired"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Phone number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone" id="address"  placeholder="Enter your number" required="reqired"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
                   <label>Gender :</label>
					<input type="radio"  name="gender" value="male">Male
					<input type="radio"  name="gender" value="female">Female
				</div>

						<div class="form-group ">
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register" name="btn">
						</div>
						<div class="login-register">
				            <a href="signinform.php">alrady have an account? sign in here</a>

				        </div>
					</form>
				</div>
			</div>
		</div>
		

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<?php
	include 'frontfooter.php';
	?>