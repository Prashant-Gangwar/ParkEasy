<?php 
	
	include_once 'includes/header.php';
	include_once 'database/db_connection.php';
	
	//$_SESSION["user_id"] = 12; 
	$user_details = qSelectObject('users', 'fname, lname, email_id, vehicle_no, mobile_no, vehicle_type, account_created_on', array('user_id'=>$_SESSION['user_id'])); 
	//echo $user_details->fname; 
	//error_reporting(0);
 ?>


<!-- Edit Details Box -->
<div class="modal fade" id="url-modal" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">
			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline" id="modal-heading">Edit URL details</h1>
				</div>

				<div class="vertical-space-30"></div>
				<span id="url-modal-error" class="text-red"></span>
				<div class="vertical-space-30"></div>

				<div class="form-horizontal">
					<form class="form-horizontal" id="url-modal-form" method="post" action="edit_delete.php">
						<div class="form-group" hidden>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="id" id="url-modal-id" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Short URL</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="Short URL" id="url-modal-short-url" name="url-modal-short-url" disabled>
							</div>
						</div>

						<div class="form-group" hidden>
							<label class="col-sm-3 control-label">Original URL</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-url" placeholder="Original URL" name="url-modal-url" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Message</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-message" placeholder="Message about URL" name="url-modal-message">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label" id="total-clicks-scans">Total Clicks</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-clicks" name="url-modal-clicks" placeholder="Total Clicks" disabled>
							</div>
						</div>

						<div class="form-group" >
							<label class="col-sm-3 control-label">Status</label>
							<div class="dropdown col-sm-9 ">
								<button class="btn btn-primary dropdown-toggle col-sm-5" type="button" data-toggle="dropdown" >
									<span id="url-modal-status"></span>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" style="margin-left: 20px;">
						    		<li class="text-center" id="update_active"><b>Active</b></li>
						    		<li class="text-center" id="update_not_active"><b>Not Active</b></li>
							  	</ul>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Created On</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="url-modal-created-on" placeholder="Link created date" name="url-modal-created-on" disabled>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" onClick="javascript:void(0);" name="url_update" id="url_update" class="btn btn-default login">
									Update
								</button>
								<button type="submit" onClick="javascript:void(0);" name="qr_update" id="qr_update" class="btn btn-default login">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer" style="border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
				<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; padding-right: 3px;"></i> Close
				</button>
			</div>

		</div>
	</div>
</div>


<!-- Delete Link Box -->
<div class="modal fade" id="url-delete-modal" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">
			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline">Delete Short Link</h1>
				</div>

					<form class="form-horizontal" id="url-modal-form" method="post" action="edit_delete.php">
					<br>
						<div class="form-group text-center">
							<label class="col-sm-12 text-center">Are you sure you want to delete this link?</label>
						</div>

						<div class="form-group">
							<div class="col-sm-6">
								<button type="submit" onClick="javascript:void(0);" name="url-delete-yes" id="delete" class="btn btn-success">
									Yes
								</button>
							</div>
							<div class="col-sm-6">
								<button type="submit" onClick="javascript:void(0);" name="url-delete-no" id="nodelete" class="btn btn-danger">
									No
								</button>
							</div>
						</div>
					</form>
				</div>
			
			<div class="modal-footer" style="border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
				<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; padding-right: 3px;"></i> Close
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Pic Profile Pic Uploader Modal -->
<div class="modal fade" id="pic-uploader-modal" role="dialog">
	<div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
		<div class="modal-content" style="text-align: center;color:#337ab7;">
			<div class="modal-body">

				<div class="row">
					<h1 class="main-heading" style="text-decoration: underline">Upload Profile Pic</h1>
				</div>

				<div class="container">
	        	<form role="form" action="upload_image.php" method="post" enctype="multipart/form-data" id="upload_pic_form" >
		          	<br>
	          		<label class="form-group pull-left">Select image to upload: </label>
		          	<div class="form-group pull-left" >
			         	<input type="file"  name="fileToUpload" id="fileToUpload" class="pull-left"><br>
		          		<input class="btn btn-success pull-left" type="submit" value="Upload Pic" name="submit" id="upload_pic_button" onclick="javascript:void(0);" style="margin-top: 10px;"> 
		        	</div>
		        	<br><br>
		      	</form>
		      	</div>
				
				<div class="modal-footer" style="border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
					<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
						<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; padding-right: 3px;"></i> Close
					</button>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- This is the display part of the page -->
<div class="row" style="background-color: black; font-family: 'Montserrat'; margin:0">
	<div class="col-lg-12" style="margin-bottom: 10px ">
		<div class="text-center" style="margin: 0px;">
			<h1 style="background-color: #C70D0D; color: white; padding-top: 5px; margin-top: 10px; padding-bottom: 5px; font-weight: bold;  margin-bottom: 10px; border-radius: 4px;" > Hi Prashant! Welcome to ParkEasy :)
			</h1>
		</div>
		<div class="col-lg-12" style="background-color: #fff; color: white; border-radius: 4px; opacity: 0.9;">
			<div class="col-lg-push-1 col-lg-2 text-center" id="profile" >
				<div class="vertical-space-60"></div>
				<div class="vertical-space-10"></div>

					<div class="text-left" hidden>
			       		<img src="images/<?php echo "car.png"/*$dp = qSelectObject('users', 'dp_name', array('user_id'=>$_SESSION['user_id'])); if($dp->dp_name) echo $dp->dp_name; else echo "Please Upload your image";*/ ?>" width="200" height="200" class="img-rounded" alt="Upload your Profile Pic" style="border: 2px solid black; margin:0; background-color: black; box-shadow: 0px 0px 30px #000; ">
			      	</div>
			      	<div class="form-group text-left" style="margin-bottom: 40px; margin-left: 20px;" hidden>

			      		<button type="button" class="btn btn-warning text-left" style="margin-top: 10px; " id="change_pic" data-toggle="modal" data-target='#pic-uploader-modal'>Change Profile Pic</button>
				    </div>
			</div>

<style type="text/css">
	label{
		color: black;
		margin-left: 20px !important;
	}
</style>

			<div class="col-lg-8">
			<h1 style="color: black"> Profile Details</h1>
				<div class="form-horizontal" >
		            <form class="form-horizontal" id="register-form" method="post" action="database/login_register.php" style="background-color: #00A2B5; box-shadow: 0px 0px 30px #000; border-radius: 4px; border: 2px solid black;">
		            <br>
		                <div class="form-group" style="padding-left: 10%;">
		                    <label class="control-label">First Name : <?php echo $user_details->fname; ?></label>
		                </div>

		                <div class="form-group" style="padding-left: 10%;">
		                    <label class="control-label">Last Name : <?php echo $user_details->lname; ?></label>
		                </div>

		                <div class="form-group" style="padding-left: 10%;">
		                    <label class="control-label">Mobile : <?php echo $user_details->mobile_no; ?></label>
		                </div>

		                <div class="form-group" style="padding-left: 10%;">
		                    <label class=" control-label">Email : <?php echo $user_details->email_id; ?></label>
		                </div>

		                <div class="form-group" style="padding-left: 10%;">
		                    <label class="control-label">Vehicle Type : <?php echo $user_details->vehicle_type; ?></label>
		                </div>

		                <div class="form-group" style="padding-left: 10%;">
		                    <label class="control-label">Vehicle Number : <?php echo $user_details->vehicle_no; ?></label>
		                </div>

		                <div class="form-group" style="padding-left: 10%;">
		                    <label class="control-label">Account created on : <?php echo $user_details->account_created_on; ?></label>
		                </div>

		            </form>
		    	</div>
		    	<div class="vertical-space-60"></div>
			</div>
			<br>
		</div>
	</div>
</div>

<div class="vertical-space-10"></div>

<div class="container" style="padding-left: 100px; margin-bottom: 10px; margin-top: 10px;">
	<a href="my_bookings.php"><button class="btn btn-sm btn-danger">Click Here</button></a> to see your booking history
</div>
<div class="container" hidden>
	<a href="settings.php"><button class="btn btn-sm btn-warning">Click Here</button></a> to update your profile
</div>
<div class="vertical-space-60"></div>

<hr style="margin-bottom:0;">
<?php include_once 'includes/footer.php'; ?>

<style type="text/css">

img:hover{
		-webkit-filter:contrast(120%) brightness(100%);
}

#profile_table{
    font-size: 130%;
}
th {
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

	
$(function(){

	$("#upload_pic_form").hide();

	//to show change pic uploader
	$("#change_pic").click(function(){

		$("#upload_pic_form").slideDown();
	});


	$("#nodelete").on('click', function(e){

			$("#url-delete-modal").modal('toggle');
			event.preventDefault();
			return false;
		});	
		

	//TO upload the Profile Pic using AJAX
	$("#upload_pic_form").bind('submit', function (e){
			
		$.ajax({
				type: "POST",
			    url: 'upload_image.php',
			    enctype: 'multipart/form-data',
				data: {	'url': url	},
				success: function(response){
						
						//alert(response);
						$("#profile").load();
				}
		});
		event.preventDefault();
		return false;	
	});


	//TO set active and not active option in Edit MODAL 	
   	$("#update_active").on('click', function(e){
		$('#url-modal-status').html("Active");   	
	});

	$("#update_not_active").on('click', function(e){
		$('#url-modal-status').html("Not Active");
	});


	//To Edit url rows
	$('.url_edit').on('click', function (e) {

		$("#modal-heading").text('Edit URL Details');
		$("#total-clicks-scans").text('Total Clicks');
		$("#qr_update").hide();
		$("#url_update").show();

		var id = $(this).closest('tr').find('td:eq(1)').text();
		var short_url = $(this).closest('tr').find('td:eq(2)').text();
		var msg = $(this).closest('tr').find('td:eq(3)').text();
		var created_on = $(this).closest('tr').find('td:eq(4)').text();
		var clicks = $(this).closest('tr').find('td:eq(5)').text();
		var status = $(this).closest('tr').find('td:eq(6)').text();

		//alert(short_url);

       	document.getElementById('url-modal-id').value = id;
       	document.getElementById('url-modal-short-url').value = short_url;
       	document.getElementById('url-modal-message').value = msg;
       	document.getElementById('url-modal-created-on').value = created_on;
       	document.getElementById('url-modal-clicks').value = clicks;
       	$('#url-modal-status').html(status);

	});

	$('#url_update').on('click', function (e) {

	var id = document.getElementById("url-modal-id").value;
	var msg = document.getElementById("url-modal-message").value;
	var status = $("#url-modal-status").html();

		$.ajax({
			type: "POST",
			url: 'edit_delete.php',
			data: {	"id": id, 'table_type': "url", "msg": msg, "status": status, 'option': 'edit'	},
			
			success: function(response){
					//console.log(response);
					$("#url-modal").modal('toggle');
					$("#url_msg_"+id).html(msg);
					$("#url_status_"+id).html(status);

			}
		});
		event.preventDefault();
		return false;
	
	});

	//To delete url rows
	$('.url_delete').on('click', function (e) {


		var id = $(this).closest('tr').find('td:eq(1)').text();
		//alert(id);

		$("#delete").on('click', function(e){

			$.ajax({
				type: "POST",
				url: 'edit_delete.php',
				data: {	"id": id, "table_type": "url", "option": "delete"	},
				
				success: function(response){
						console.log(response);
						$("#url_"+id).hide();
						$("#url-delete-modal").modal('toggle');

				}

			});
			event.preventDefault();
			return false;
		});	
		
	});

	
});


</script>
