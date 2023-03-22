

<?php session_start();
include 'tommystoreclass.php';
//$st = new Users;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //validate login form
  $errors = array();
  if(empty($_POST['email'])){
      $errors[] = "username field is required!";
  }
  if(empty($_POST['password'])){
      $errors[] = "password field is required!";
  }
  if(empty($errors)){
// make reference to login method
    $userobj = new Users;
    $output=$userobj->login($_POST['email'],$_POST['password']);
if(!empty($output)){
  var_dump($output);
   //create session variables
  		$_SESSION['user_id'] = $output['cust_id'];
        $_SESSION['name'] = $output['cust_name'];
        $_SESSION['orptiyek'] = "__ToMiWaisadeveloper";
        $_SESSION['myemail'] = $output['cust_email'];

        //redirect to dashboard
        header("Location: http://localhost/main-project/index.php");
        exit;
}else{
  echo "<div class='alert alert-danger'>Invalid username or password!</div>";
}
  }else{
     echo "<ul class='alert alert-danger'>";
     foreach ($errors as $key => $value) {
       echo "<li>$value</li>";
     }
     echo "</ul>";
  }
}

?>
<!DOCTYPE html>
<html>
<head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="signinstyle.css">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery-3.6.0.js/3.2.1"></script>

<!-- fontawesome -->
   <link href="fontawesome/fontawesome/css/all.css" rel="stylesheet">

	<title><?php echo MY_APP_NAME ?></title>


</head>
<body style="background-color: yellow">
<div class="container-fluid">
	<div class="row">
    <div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Tommy's Store</h1>
	               		<!-- <hr /> -->
	               	</div>
	            </div> 
		<div class="col-md-6 offset-md-3">
			<div class="main-login main-center">
			<form method="post" action="">
				
				<div class="form-group">
							<label for="email" class="cols-sm-2">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
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

				<input type="submit" class="btn btn-success btn-lg btn-block login-button" name="btn" value="Login"><br>
				<p style="text-align: center;"><a href="index.php" class="link-underline">BACK</a></p>
			</form>
		</div>
		</div>
	</div>
</div>
<?php
	include 'frontfooter.php';
	?>