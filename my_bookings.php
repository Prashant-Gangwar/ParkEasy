<?php include_once 'includes/header.php'; ?>

<div class="text-center" style="margin: 10px;">
	<h1 style="background-color: #C70D0D; color: white; padding-top: 5px; margin-top: 10px; padding-bottom: 5px; font-weight: bold; margin-bottom: 0px; border-radius: 4px;" > Hi Prashant! Welcome to ParkEasy :)
	</h1>
	<br>
	<h3 class="text-center" style="color: orange; ">My Bookings</h3>

	<div class="container-fluid col-lg-12" style="background-color: #31b0d5; color: white; border-radius: 4px; width: 100%; margin-top: 10px; ">
		<h3 style="font-family: 'Montserratbold'">Your Current Booking</h3>

		 <!-- Table for URL shortener history -->
		<div id="url_tab" style="overflow: auto; ">
		  	<table class="table table-striped text-center" id="url_table" style="border: 3px solid black; overflow: auto; margin: 0">
		    	<thead>
			      	<tr style="font-family: 'Montserratbold'">
				        <th class="text-left" style="min-width: 20px; max-width: 100px;">S.No.</th>
				        <th class="text-left" hidden>id</th>
				        <th class="text-left" style="min-width: 150px;">Parking Location</th>
				        <th class="text-left" style="min-width: 100px;">Date</th>
				        <th class="text-left" style="min-width: 100px;">In (time)</th>
				        <th class="text-left" style="min-width: 100px;">Payment Mode</th>
				        <th class="text-left" style="min-width: 100px;">Parking slot</th>
				        <th class="text-center"></th>
				    </tr>
		    	</thead>
		  		<tbody>
		  		<td class="text-left">12</td>
		  		<td class="text-left">Cannaught Place</td>
		  		<td class="text-left">21-05-1995</td>
		  		<td class="text-left">10:00 AM</td>
		  		<td class="text-left">Online</td>
		  		<td class="text-left">12</td>
		  		<td class="text-center"><button class="btn-primary">End</button></td>
				    <?php 
				      	/*	$res_url = qSelect("user_urls", "id, short_url, message, created_on, clicks, active");
				      	$i=0;
				    	while($row_url = $res_url->fetch_assoc()) 
				      	{ 	
				      		$i++;
	        			    echo "<tr id='url_" .$row_url['id'] . "'>";
						    	echo "<td class='text-left' style='padding-left:20px'>" . $i . "</td>";
						    	echo "<td class='text-left' hidden>" . $row_url['id'] . "</td>";
						        echo "<td class='text-left'><b><a href='http://www.cut-it.netne.net/prashant/{$row_url['short_url']}' >cut.netnet.net/" . $row_url['short_url'] . "<a></b></td>";
						        echo "<td class='text-left' id='url_msg_" . $row_url['id'] . "'>" . $row_url['message'] . "</td>";
						        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_url['created_on'])); "</td>";
						        echo "<td>" . $row_url['clicks'] . "</td>";
						        echo "<td id='url_status_" . $row_url['id'] . "'>"; if ($row_url['active'] ==1){ echo "Active"; } else { echo "Not Active"; } "</td>";
						        echo "<td><center><i class='fa fa-2x fa-pencil-square-o url_edit' aria-hidden='true' style='color:green' data-toggle='modal' data-target='#url-modal'></i></center></td>";
						        echo "<td><i class='fa fa-lg fa-2x fa-trash-o url_delete' aria-hidden='true' style='color: red' data-toggle='modal' data-target='#url-delete-modal'></i></td>";
						    echo "</tr>";
				  		}*/
				    ?>
		        </tbody>
		  	</table>
		</div>
		<br>
	</div>

	<div class="container-fluid col-lg-12" style="background-color: #1171a0; color: white; border-radius: 4px; width: 100%; margin-top: 20px;">
		<h3 style="font-family: 'Montserratbold'">Your Recent Bookings</h3>
	  	
		 <!-- Table for URL shortener history -->
		<div id="url_tab" style="overflow: auto;">
		  	<table class="table table-striped text-center" id="url_table" style="border: 3px solid black; overflow: auto; margin: 0">
		    	<thead>
			      	<tr style="font-family: 'Montserratbold'">
				        <th class="text-left" style="min-width: 20px; max-width: 100px;">S.No.</th>
				        <th class="text-left" hidden>id</th>
				        <th class="text-left" style="min-width: 150px;">Parking Location</th>
				        <th class="text-left" style="min-width: 100px;">Date</th>
				        <th class="text-left" style="min-width: 100px;">In (time)</th>
		   		        <th class="text-left" style="min-width: 100px;">Out (time)</th>
				        <th class="text-left" style="min-width: 100px;">Payment</th>
				        <th class="text-left" style="min-width: 100px;">Payment Mode</th>
				        <th class="text-center" >Delete</th>
				    </tr>
		    	</thead>
		  		<tbody>
		  		<td class="text-left">12</td>
		  		<td class="text-left">Cannaught Place</td>
		  		<td class="text-left">21-05-1995</td>
		  		<td class="text-left">10:00 AM</td>
		  		<td class="text-left">11:00 AM</td>
		  		<td class="text-left">1233</td>
		  		<td class="text-left">Online</td>
		  		<td class="text-center"><i class='fa fa-lg fa-2x fa-trash-o url_delete' aria-hidden='true' style='color: red' data-toggle='modal' data-target='#url-delete-modal'></i></td>
				    <?php 
				      	/*	$res_url = qSelect("user_urls", "id, short_url, message, created_on, clicks, active");
				      	$i=0;
				    	while($row_url = $res_url->fetch_assoc()) 
				      	{ 	
				      		$i++;
	        			    echo "<tr id='url_" .$row_url['id'] . "'>";
						    	echo "<td class='text-left' style='padding-left:20px'>" . $i . "</td>";
						    	echo "<td class='text-left' hidden>" . $row_url['id'] . "</td>";
						        echo "<td class='text-left'><b><a href='http://www.cut-it.netne.net/prashant/{$row_url['short_url']}' >cut.netnet.net/" . $row_url['short_url'] . "<a></b></td>";
						        echo "<td class='text-left' id='url_msg_" . $row_url['id'] . "'>" . $row_url['message'] . "</td>";
						        echo "<td class='text-left'>" . date("d-m-Y", strtotime($row_url['created_on'])); "</td>";
						        echo "<td>" . $row_url['clicks'] . "</td>";
						        echo "<td id='url_status_" . $row_url['id'] . "'>"; if ($row_url['active'] ==1){ echo "Active"; } else { echo "Not Active"; } "</td>";
						        echo "<td><center><i class='fa fa-2x fa-pencil-square-o url_edit' aria-hidden='true' style='color:green' data-toggle='modal' data-target='#url-modal'></i></center></td>";
						        echo "<td><i class='fa fa-lg fa-2x fa-trash-o url_delete' aria-hidden='true' style='color: red' data-toggle='modal' data-target='#url-delete-modal'></i></td>";
						    echo "</tr>";
				  		}*/
				    ?>
		        </tbody>
		  	</table>
		</div>
		<br><button class="btn-danger btn-sm col-sm-3 col-lg-2 col-xs-12 pull-right">Delete All History <i class='fa fa-lg fa-2x fa-trash-o url_delete' aria-hidden='true' data-toggle='modal' data-target='#url-delete-modal'></i> </button><br><br>
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
