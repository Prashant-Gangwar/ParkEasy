<?php include_once 'includes/header.php'; ?>


<div>                 
    <div class="form-horizontal" style="margin: 10px;">
        <form class="form-horizontal" id="update_form" method="post" action="database/login_register.php">

        	<div class="text-center" style="margin: 0px;">
				<h3 style="background-color: #C70D0D; color: white; padding-top: 5px; margin-top: 10px; padding-bottom: 5px; font-weight: bold;  margin-bottom: 10px; border-radius: 4px;" > Hi Prashant! Welcome to Park Easy :)
				</h3>
			</div>
			<h3 class="text-center" style="color: orange">Settings</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="uupdate_fname" placeholder="Eg: Prashant" name="name" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update_lname" placeholder="Eg: Gangwar" name="name" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Mobile</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update_mobile" placeholder="Eg: 9876543210" name="mobile" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update_email" placeholder="Eg: abc@gmail.com"  name="email">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="update_password" placeholder="************"  name="password">
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="update_cpassword" placeholder="************"  name="cpassword">
                </div>
            </div>


 			<div class="form-group">
                <label class="col-sm-3 control-label">Vehicle Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update_type" placeholder="Eg: Car, Bike, etc." name="name" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Vehicle Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update_vehicle_no" placeholder="Eg: DL 1234 HA" name="mobile" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Account Status</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update_status" placeholder="Account Status" name="account_status" >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary update" name="update" id="update_details" value="Update" onclick="javascript:void(0);">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>             
</div>
<hr style="margin: 0px;">

<?php include_once 'includes/footer.php'; ?>

<script>

    $(function() {

		//To bind register button
	    $("#update_form").submit(function (event){

	        $.ajax({
	                type: "POST",
	                url: 'database/login_register.php',
	                data: { 'type': 'register' },
	                success: function(response){
	                        
	                        alert(response);
	                }
	        });
	        event.preventDefault();
	        return false;   
	    });
	});
</script>