<?php 

	include_once 'db_connection.php';
	$include_success = include_once 'sqli.php';
	session_start();
	error_reporting(0);

	$user_id = $_SESSION['user_id'];
	$function = $_POST['function']; 					
	

	if (!$include_success || !$q)
		die("Couldn't connect to database: " . mysqli_connect_error());

	if($function == "booking")
	{
		$location = $_POST['location']; 					
		$slot = $_POST['slot']; 					

		//to check if user has already active booking in database or not
		$check_booking = qExecute("SELECT parking_slot FROM bookings WHERE user_id = '$user_id' AND booking_status = 0");
		if($check_booking->num_rows)
		{
			echo "booking_error";
			return 0;
		}
		else
		{
			$date = date("Y-m-d");
			$in_time = date("h:i:sa");

			//to insert user data in booking table
			$data = array('user_id' => $user_id, 'parking_location' => $location, 'booking_date' => $date, "in_time" => $in_time, 'parking_slot' => $slot);
			$insert_details = qInsert('bookings', $data);
			echo "Parking slot Booked!";
			return 0;
		}

	}
	
	if($function == "end_booking")
	{
		$booking_id = $_POST['booking_id']; 
		$users = qSelectObject("bookings", "booking_id, parking_location, booking_date, payment_date, in_time, out_time",array('booking_id'=>$booking_id));
		

		$location = $users->parking_location;
		//date difference
		$in_date = $users->booking_date;

		$current_date = date("Y-m-d");
		$date1=date_create($in_date);
		$date2=date_create($current_date);
		$diff=date_diff($date1,$date2);
		
		$date_diff = $diff->format("%a");
		$date_bill = $date_diff * 24 * rate($location);

		// Time difference  
		$in_time = $users->in_time;
		$out_time = date("h:i:sa");

		//TOtal bill
		$time_bill = get_time_difference($in_time, $out_time) * rate($location); 
		$total_bill = $date_bill + $time_bill;
		echo "Pay Total Bill : Rs " . $total_bill;

		//to update user data in bookings table
		$success = qExecute("UPDATE bookings SET payment_date = NOW(), out_time = '$out_time', total_payment = '$total_bill', booking_status = 1 WHERE booking_id = '$booking_id'");

		return 0;
	}

	function get_time_difference($in_time, $out_time) 
	{ 
	    $time1 = strtotime("1/1/1980 $in_time"); 
	    $time2 = strtotime("1/1/1980 $out_time"); 
	     
	    if ($time2 < $time1) 
	    { 
	        $time2 = $time2 + 86400; 
	    } 
	     
	    return ($time2 - $time1) / 3600; 
	}

	//to get rate of parking on the basis of location
	  function rate($location)
	  {
	    if($location == "SN")
	      return 10;
	    else if($location == "CP")
	      return 30;
	    else if($location == "LG")
	      return 10;
	    else if($location == "LN")
	      return 15;
	    else if($location == "HK")
	      return 20;
	    else if($location == "NP")
	      return 20;
	  }

?>