<?php 
include_once 'includes/header.php'; 

include_once 'database/db_connection.php';

$user_id = $_SESSION['user_id'];
//$users = qSelectObject("bookings", "booking_id, parking_location, booking_date, payment_date, in_time, out_time, total_payment, , booking_status, parking_slot", array('user_id'=>$user_id));

  //to get full forms
  function get_parking_name($location)
  {
    if($location == "SN")
      return "Sarojini Nagar";
    else if($location == "CP")
      return "Cannaught Place";
    else if($location == "LG")
      return "Lodhi Garden";
    else if($location == "LN")
      return "Lajpat Nagar";
    else if($location == "HK")
      return "Hauz Khas";
    else if($location == "NP")
      return "Nehru Place";
    else "location_error";
  }

?>

<div class="text-center" style="margin: 10px;">
	<h1 style="background-color: #C70D0D; color: white; padding-top: 5px; margin-top: 10px; padding-bottom: 5px; font-weight: bold; margin-bottom: 0px; border-radius: 4px;" > Hi Prashant! Welcome to ParkEasy :)
	</h1>
	<br>
	<h3 class="text-center" style="color: orange; ">My Bookings</h3>

	<div class="container-fluid col-lg-12" style="background-color: #31b0d5; color: white; border-radius: 4px; width: 100%; margin-top: 10px; ">
		<h3 style="font-family: 'Montserratbold'">Your Current Booking</h3>

		<?php 
      		$active_booking = qSelect("bookings", "booking_id, parking_location, booking_date, payment_date, in_time, out_time, total_payment, booking_status, parking_slot",array('user_id'=>$user_id, 'booking_status'=>0));
      		$i=0;
      	
			echo '<div id="url_tab" style="overflow: auto; ">';
		  	echo '<table class="table table-striped text-center" id="url_table" style="border: 3px solid black; overflow: auto; margin: 0">';
			
			$FLAG_ACTIVE_BOOKING=1;
			while($row_url = $active_booking->fetch_assoc()) 
	      	{ 	
	      		$FLAG_ACTIVE_BOOKING=0;
	      		$i=1;
				//<!-- Table for URL shortener history -->
				if($i==1)
				{   echo '<thead>';
				      	echo '<tr style="font-family: \'Montserratbold\'">';
					        echo '<th class="text-left" style="min-width: 20px; max-width: 100px;">S.No.</th>';
					        echo '<th class="text-left" hidden>id</th>';
					        echo '<th class="text-left" style="min-width: 150px;">Parking Location</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Booked Date</th>';
					        echo '<th class="text-left" style="min-width: 100px;">In (time)</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Payment Mode</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Parking slot</th>';
					        echo '<th class="text-center"></th>';
					    echo '</tr>';
			    	echo '</thead>';
			    	echo '<tbody>';
					
					echo "<tr id='url_" . $row_url['booking_id'] . "'>";
				    	echo "<td class='text-left' style='padding-left:20px'>" . $i . "</td>";
				        echo "<td class='text-left' id='url_msg_" . $row_url['parking_location'] . "'>" . get_parking_name($row_url['parking_location']) . "</td>";
				        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_url['booking_date'])); "</td>";
				        echo "<td class='text-left'>" . $row_url['in_time'] . "</td>";
				        echo "<td class='text-left'> Online </td>";
				        echo "<td class='text-left'>" . $row_url['parking_slot'] . "</td>";
				        $billing_id = $row_url['booking_id'];
				        echo "<td class='text-center'><i class='fa fa-lg fa-2x fa-calculator delete_active' aria-hidden='true' style='color:green' onclick='end_booking($billing_id)'> End Transaction </i></td>";
				    echo "</tr>";
				}
			}

			if($FLAG_ACTIVE_BOOKING)
				echo "<h4>NO Active Booking!</h4>";
		?>
		        </tbody>
		  	</table>
		</div>
		<br>
	</div>

	<div class="container-fluid col-lg-12" style="background-color: #1171a0; color: white; border-radius: 4px; width: 100%; margin-top: 20px;">
		<h3 style="font-family: 'Montserratbold'">Your Recent Bookings</h3>
	  	

	  	 <?php 
	      	$res_url = qSelect("bookings", "booking_id, parking_location, booking_date, payment_date, in_time, out_time, total_payment, booking_status, parking_slot",array('user_id'=>$user_id, 'booking_status'=>1));
	      	$i=1;

	      	//<!-- Table for URL shortener history -->
			echo '<div id="url_tab" style="overflow: auto;">';
		  	echo  '<table class="table table-striped text-center" id="url_table" style="border: 3px solid black; overflow: auto; margin: 0">';
			
			$FLAG_EARLIER_BOOKINGS=1;	    
	    	while($row_url = $res_url->fetch_assoc()) 
	      	{ 
				$FLAG_EARLIER_BOOKINGS=0;

			    if($i==1)
				{	
		    		echo '<thead>';
				      	echo '<tr style="font-family: \'Montserratbold\'">';
					        echo '<th class="text-left" style="min-width: 20px; max-width: 100px;">S.No.</th>';
					        echo '<th class="text-left" hidden>id</th>';
					        echo '<th class="text-left" style="min-width: 150px;">Parking Location</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Parking Slot</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Date</th>';
					        echo '<th class="text-left" style="min-width: 100px;">In (time)</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Payment Date</th>';
			   		        echo '<th class="text-left" style="min-width: 100px;">Out (time)</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Payment</th>';
					        echo '<th class="text-left" style="min-width: 100px;">Payment Mode</th>';
					        echo '<th class="text-center" hidden>Delete</th>';
					    echo '</tr>';
			    	echo '</thead>';
			  		echo '<tbody>';
		  		} 	
    			    echo "<tr id='url_" . $row_url['booking_id'] . "'>";
				    	echo "<td class='text-left' style='padding-left:20px'>" . $i . "</td>";
				        echo "<td class='text-left' id='url_msg_" . $row_url['parking_location'] . "'>" . get_parking_name($row_url['parking_location']) . "</td>";
				        echo "<td class='text-left'>" . $row_url['parking_slot'] . "</td>";
				        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_url['booking_date'])); "</td>";
				        echo "<td class='text-left'>" . $row_url['in_time'] . "</td>";
					        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_url['payment_date'])); "</td>";
					        echo "<td class='text-left'>" . $row_url['out_time'] . "</td>";
					        echo "<td class='text-left'>" . $row_url['total_payment'] . "</td>";
				        echo "<td class='text-left'> Online </td>";
				    echo "</tr>";
				    $i++;
			}
			if($FLAG_EARLIER_BOOKINGS)
				echo "<h4>No Earlier Booking History</h4>";
	    ?>
		        </tbody>
		  	</table>
		</div>
		<br><button hidden class="btn-danger btn-sm col-sm-3 col-lg-2 col-xs-12 pull-right">Delete All History <i class='fa fa-lg fa-2x fa-trash-o delete_all' aria-hidden='true' data-toggle='modal' data-target='#url-delete-modal' hidden ></i> </button><br><br>
	</div>
</div>
&nbsp;
<hr style="margin:0px;">

<?php include_once 'includes/footer.php'; ?>

<style type="text/css">

table{
	font-size: 12px !important;
}

table th{
	font-size: 14px !important;
}

img:hover{
		-webkit-filter:contrast(120%) brightness(100%);
}

#profile_table{
    font-size: 130%;
}

th{
	background-color: #C70D0D; color: white;
	font-size: 17px !important;
}

#profile_table tr {
	color: white;
	background: #C70D0D;
}

table tr:nth-child(even){
	background-color: white;
	color: black;

}

table tr:nth-child(odd){
	background-color: white;
	color: black;
}

table tr:nth-child(even):hover{
	background-color: orange;
	color: white;

}

table tr:nth-child(odd):hover{
	background-color: orange;
	color: white;
}
.dropdown-menu li:hover{
	background-color: orange;
	color: white;
}

</style>

<script type="text/javascript">
	
	function end_booking(booking_id)
	{
		//alert(billing_id);
	
		$.ajax({
	        type: "POST",
	        url: 'database/parking.php',
	        data: { "function": "end_booking", "booking_id": booking_id },
	        
	        success: function(response){
	            //console.log(response);
	            //alert(response);
	            if(response == "end_booking_error")
	            {
	              alert("You already have an active booking! \nEND it before booking another parking slot.");
	            }
	            else
	            {
	              alert(response);
	              window.location.reload();
	            }
	        }

	    });
	
	}

</script>