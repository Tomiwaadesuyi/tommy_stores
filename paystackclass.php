<?php 
   #include constants file
   include("constants.php");

#Begin class payment
class Payment{
	//member variables/properties
	var $amount;
	var $emailaddress;
	var $dbconnect;  //database connection handler

	//member methods/functions
	function __construct(){
		$this->dbconnect = new MySqli(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		if($this->dbconnect->connect_error){
			die("There was a connection error".$this->dbconnect->connect_error);
		}else{
			// echo "You have been connected successfully";
		}
	}
	// First Leg :initialize paystack transaction method
	function initializePaystack($email,$amount){
        $url = "https://api.paystack.co/transaction/initialize";
        $reference = "ITP".time().rand();
        $callbackurl = "http://localhost/main-project/index.php";

        $fields = [
    'email' => $email,
    'amount' => (float)$amount * 100,
    'reference' => $reference,
    'callback_url' => $callbackurl
  ];
  $fields_string = http_build_query($fields);

  $secretkey = "sk_test_dc3ff936da6763953c5835a79eff1151c3993b99";

  // step 1: open connection, initialize curl session 
  $ch = curl_init();

  //step 2: //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $secretkey",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);


  // step 3: execute curl
  $response = curl_exec($ch);

  if (curl_error($ch)) {
  	echo curl_error($ch);
  }

  // step 4: close curl session
  curl_close($ch);

  // step 5: convert json to object
  $result = json_decode($response);
  return $result;
	}

	// insert payment transaction details
	function insertTransactionDetails($userid,$amount,$name,$reference){
		$paymentmode="paystack";
		$transstatus = "completed";
		$dueyear = 2021;
		$datepaid = date('Y-m-d h:i:s');
        $sql ="INSERT INTO orders(user_id,order_price,status,transref,paymentmode,ordername) values('$userid','$amount','$transstatus','$reference','$paymentmode','$name')";

        $result = $this->dbconnect->query($sql);
        if($this->dbconnect->affected_rows == 1){
        	return true;
        }else{
        	return false;
        }
	}

// Second Leg
	// verify paystack transaction
	function verifyPaystack($reference){
		 $url = "https://api.paystack.co/transaction/verify/".$reference;
		 $secretkey = "sk_test_dc3ff936da6763953c5835a79eff1151c3993b99";

		 // step 1: open connection
		 $ch = curl_init();

		 // step 2: set curl options
		 curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $secretkey",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

  // step 3: execute curl
  $response = curl_exec($ch);

  if (curl_error($ch)) {
  	echo curl_error($ch);
  }

  // step 4: close curl session
  curl_close($ch);

  // step 5: convert json to object
  $result = json_decode($response);
  return $result;

	}

	// update payment transaction details
	function updateTransactionDetails($reference){
		
        $sql ="UPDATE orders SET status='completed' WHERE transref='$reference'";

        $result = $this->dbconnect->query($sql);
        if($this->dbconnect->affected_rows == 1){
        	return true;
        }else{
        	return false;
        }
	}

}
#end payment class
