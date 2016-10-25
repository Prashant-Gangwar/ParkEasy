<?php 

	include_once 'db_connection.php';
	$include_success = include_once 'sqli.php';
	session_start();

	if (!$include_success || !$q)
		die("Couldn't connect to database: " . mysqli_connect_error());


	$type = $_POST['type']; 					
	//echo "\n";
	$fname = $_POST['fname']; 					
	//echo "\n";
	$lname = $_POST['lname']; 					
	//echo "\n";
	$mobile = $_POST['mobile']; 				
	//echo "\n";
	$email_id = $_POST['email_id']; 			
	//echo "\n";
	$password = md5($_POST['password']); 		
	//echo "\n";
	//echo 
	$vehicle_type = $_POST['vehicle_type']; 	
	//echo "\n";
	$vehicle_no = $_POST['vehicle_no'];		
	//echo "\n";
	//echo $_SESSION['user_id'];						echo "\n";

	if($type == 'register')
	{	
		//to check if email exists in database or not
		$check_email = qExecute("SELECT email_id FROM users WHERE email_id = '$email_id'");
		if($check_email->num_rows)
		{
			echo "email_error"; 
			return 0;
		}	

		//to check if mobile no exists in database or not
		$check_mobile = qExecute("SELECT mobile_no FROM users WHERE mobile_no = '$mobile'");
		if($check_mobile->num_rows)
		{
			echo "mobile_error"; 
			return 0;
		}

		//to insert user data in database
		$data = array('fname' => $fname, 'lname' => $lname, 'email_id' => $email_id, 'password' => $password, 'mobile_no' => $mobile, 'vehicle_no' => $vehicle_no, 'vehicle_type' => $vehicle_type, 'account_created_on' => date("Y-m-d"), 'account_status' => 1 );
		$insert_details = qInsert('users', $data);

		//to ger user id and save it in a SESSION variable 
		$user_id = qExecute("SELECT user_id FROM users WHERE email_id = '$email_id'");
		$_SESSION['user_id'] = $user_id->fetch_object()->user_id;
		echo "Registeration Successful!";

		return 1;
	}

?>