<?php 

	include_once 'db_connection.php';
	$include_success = include_once 'sqli.php';
	session_start();

	if (!$include_success || !$q)
		die("Couldn't connect to database: " . mysqli_connect_error());


	echo $type = $_POST['type']."\n";
	echo $fname = $_POST['fname']."\n";
	echo $lname = $_POST['lname']."\n";
	echo $mobile = $_POST['mobile']."\n";
	echo $email_id = $_POST['email_id']."\n";
	echo $password = $_POST['password']."\n";
	echo $vehicle_type = $_POST['vehicle_type']."\n";
	echo $vehicle_no = $_POST['vehicle_no']."\n";

	if($type == "register")
	{

		$data = array('fname' => $fname, 'lname' => $lname, 'mobile' => $mobile, 'email_id' => $email_id, 'password' => $password, 'vehicle_type' => $vehicle_type, 'vehicle_no' => $vehicle_no, 'active' => 1, 'account_created_on' => date("Y-m-d"));
		echo $insert_id = qInsert('users', $data);


	}
	else if($type == "login")
	{

	}
	else
	{

	}

?>