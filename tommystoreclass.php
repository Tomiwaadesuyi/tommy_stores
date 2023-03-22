<?php
/**
/*author :Tomiwa Adesuyi
/*program:pro19 class
/*Date: November 10, 2021

*/
include_once 'constants.php';

#begin class definition
class Users{
	//member variables

	public $name;
	public $email;
	public $address;
	public $phone;
	public $gender;
	public $password;
	public $dbcon; //database connection handler

 function __construct(){
	//create object of mysqli class
    	$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
      #check if connection is successful
    	if ($this->dbcon->connect_error) {
    		die("connection failed: ". $this->dbcon->connect_error);
    	}else{
    		//echo "Connected successfully";
    	}
}

 function insertcustomers($name, $emailaddress, $address, $phone, $gender, $password){
    	//write quary
    	$encrypt = md5($password);
    	$sql = "INSERT INTO customers(cust_name, cust_email, cust_address, cust_phone, cust_gender, cust_pass) VALUES('$name', '$emailaddress', '$address', '$phone', '$gender', '$encrypt')";
    	//run quary
    		$result = $this->dbcon->query($sql);
        // check if quary ran succesfully
    		if ($this->dbcon->affected_rows == 1) {
                // create session variable

                session_start();
                session_unset();
                $_SESSION['user_id']= $this->dbconnect->insert_id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['orpdiyek'] = "__ToMiWaisadeveloper";

                // redirect to dashboard
                header("location: http://localhost/main-project/index.php");
                exit;
            }else{
                //return "Failed to add user :".$this->dbconnect->error;
            }
    }

       function login($email,$password){
        $pwd=md5($password);

        $query = "SELECT * FROM customers WHERE cust_email = '$email' && cust_pass='$pwd' LIMIT 1";

        $result= $this->dbcon->query($query);

        if (!empty($this->dbcon->error)) {
           die($this->dbcon->error);
        }

if ($result->num_rows < 1) {
   return false;
}
return $result->fetch_assoc();
    }

    //uploadprofilephoto and update profile name

function uploadPhoto($userid){
    // file variables 
    $filename = $_FILES['mypix']['name'];
    $filetype = $_FILES['mypix']['type'];
    $file_tmp_name = $_FILES['mypix']['tmp_name'];
    $file_error = $_FILES['mypix']['error'];
    $filesize = $_FILES['mypix']['size'];

    // validation 
    if($file_error > 0){
        $error= "You have not selected a file for upload";
        return $error;
    }

    //check for file size
    if($filesize > 2097152){
        $error = "Please upload image less than 2mb";
        return $error;
    }
    $extensions = array("gif", "png", "jpeg", "svg", "jpg");
    $file_ext = explode(".",$filename);
    $file_ext = end($file_ext);

    if(!in_array(strtolower($file_ext), $extensions)){
        $error = $file_ext."File format not supported";
        return $error;
    }

    //upload image
    $folder = "images/";
    $newfilename = time().rand().".".$file_ext;
    $destination = $folder.$newfilename;

    if(move_uploaded_file($file_tmp_name, $destination)){
        //write sql query
        $sql = "UPDATE customers SET profilephoto='$newfilename' WHERE cust_id='$userid'";

        //run the query
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            return true;
        }else{
            return $this->dbcon->error;
        }
    }
}

//fetch a specific user based on the user_id
    function getuser($userid){
     //write the query
        $sql = "SELECT * FROM customers WHERE cust_id='$userid'";

        $result = $this->dbcon->query($sql);

       // fetch the row
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            $row = array();
            return $row;
        }
    }

    function getusers(){
        //write the query
        $query = "SELECT * FROM customers WHERE role_id='1'";
        //run the query
        $result = $this->dbcon->query($query);

        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
    }

    function uploadcategory($catname){
        // file variables 
    $filename = $_FILES['mypix']['name'];
    $filetype = $_FILES['mypix']['type'];
    $file_tmp_name = $_FILES['mypix']['tmp_name'];
    $file_error = $_FILES['mypix']['error'];
    $filesize = $_FILES['mypix']['size'];

    // validation 
    if($file_error > 0){
        $error= "You have not selected a file for upload";
        return $error;
    }

    //check for file size
    if($filesize > 2097152){
        $error = "Please upload image less than 2mb";
        return $error;
    }
    $extensions = array("gif", "png", "jpeg", "svg", "jpg");
    $file_ext = explode(".",$filename);
    $file_ext = end($file_ext);

    if(!in_array(strtolower($file_ext), $extensions)){
        $error = $file_ext."File format not supported";
        return $error;
    }

    //upload image
    $folder = "photo/";
    $newfilename = time().rand().".".$file_ext;
    $destination = $folder.$newfilename;

    if(move_uploaded_file($file_tmp_name, $destination)){
        //write query
        $sql = "INSERT INTO category(cat_name, cat_img) VALUES('$catname', '$newfilename')";

        // run this query
        $result = $this->dbcon->query($sql);
    }
   } 

     // fetch all the categories
    function getcategories(){
        //write the query
        $query = "SELECT * FROM category";
        //run the query
        $result = $this->dbcon->query($query);

        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
    }

     function uploadproduct($proname, $proprice){
        // file variables 
    $filename = $_FILES['mypix']['name'];
    $filetype = $_FILES['mypix']['type'];
    $file_tmp_name = $_FILES['mypix']['tmp_name'];
    $file_error = $_FILES['mypix']['error'];
    $filesize = $_FILES['mypix']['size'];

    // validation 
    if($file_error > 0){
        $error= "You have not selected a file for upload";
        return $error;
    }

    //check for file size
    if($filesize > 3097152){
        $error = "Please upload image less than 2mb";
        return $error;
    }
    $extensions = array("gif", "png", "jpeg", "svg", "jpg");
    $file_ext = explode(".",$filename);
    $file_ext = end($file_ext);

    if(!in_array(strtolower($file_ext), $extensions)){
        $error = $file_ext."File format not supported";
        return $error;
    }

    //upload image
    $folder = "photo/";
    $newfilename = time().rand().".".$file_ext;
    $destination = $folder.$newfilename;

    if(move_uploaded_file($file_tmp_name, $destination)){
        //write query
        $sql = "INSERT INTO products(pro_name, pro_image, pro_price) VALUES('$proname', '$newfilename', '$proprice')";
       // var_dump($sql);
       // exit();
        // run this query
        $result = $this->dbcon->query($sql);
    }
   } 

   function getproducts(){
        //write the query
        $query = "SELECT * FROM products";
        //run the query
        $result = $this->dbcon->query($query);

        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
    }

    function vieworders(){
    $sql = "SELECT * FROM order";
    $result = $this->dbcon->query($sql);
    $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
}

function getproduct($productid){
     //write the query
        $sql = "SELECT * FROM products WHERE pro_id='$productid'";
    // var_dump($sql);
    // exit();
        $result = $this->dbcon->query($sql);

        //fetch the row
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            $row = array();
            return $row;
        }
    }

function addorder($userid,$price,$name,$location){
    $datepaid = date('Y-m-d h:i:s');
    $sql ="INSERT INTO productorder(user_id,order_price,order_name,order_date,order_location) VALUES('$userid','$price','$name','$datepaid','$location')";
    $result = $this->dbcon->query($sql);
    if($result){
             return "<div class='alert alert-success'>Your order was successful</div>";
    }else{
        //return //$this->dbcon->error;   
    }

}
}
#end User class definition
?>