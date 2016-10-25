<?php?>

<html>
<head>
	<title>Park Easy</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- my javascript file - common.js -->
    <script src="js/common.js"></script>
	<!-- CSS STYLE link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Google font link -->
	<link href="https://fonts.googleapis.com/css?family=Quattrocento:700" rel="stylesheet">
	<!-- FONT AWESOME LINKS -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div>
	<nav class="navbar navbar-inverse" style="margin-bottom:0">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php" style="color: orange"><i class="fa fa-car" aria-hidden="true"></i> Park Easy</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home" ></span> Home</a></li>
	      <li><a href="about_us.php"><i class="fa fa-users" aria-hidden="true"></i> About Us</a></li>
	      <li><a href="contact_us.php"><span class="glyphicon glyphicon-phone" ></span> Contact Us</a></li> 
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li id="my_bookings"><a href="my_bookings.php"><span class="glyphicon glyphicon-calendar" ></span> My Bookings</a></li>
	    	<li id="my_bookings"><a href="profile.php"><span class="glyphicon glyphicon-briefcase" ></span> Account</a></li>
	      	<li id="register-button"><a href="#register-box"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
	      	<li id="login-button"><a href="#login-box"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
	    </ul>
	  </div>
		<hr style="margin:0">
	</nav>
</div>
<!-- Login Box -->
<div class="modal fade" id="login-box" role="dialog">
    <div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
        <div class="modal-content" style="text-align: center;color:#337ab7;">
            <div class="modal-body">

                <div class="row">
                    <h1 class="main-heading" style="text-decoration: underline">LOGIN</h1>
                </div>

                <span id="loginErrorText" class="text-red"></span>
                <div class="vertical-space-30"></div>

                <div class="form-horizontal">
                    <form class="form-horizontal" id="login-form" method="post" action="database/login_register.php">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" placeholder="Email" id="email_log" name="login_email" data-pattern="^\w+\@\w+\.[a-zA-Z]{2,5}$">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control clearform" id="password_log" placeholder="Password" data-pattern="^.{6,32}$" name="login_pass">
                                <input type="hidden" id="type_log">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <div class="checkbox">
                                    <input type="checkbox" checked="checked" name="autologin">
                                    Remember me
                                </div>
                            </div>
                            <div class="col-sm-6 text-center" style="">
                                <div class="checkbox">
                                    <a href="javascript:void(0);" id="forgot-password-link">Forgot Password?</a>
                                </div>
                            </div>
                        </div>

                        <div class="vertical-space-10"></div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" onClick="javascript:void(0);" name="login" class="btn btn-default login">
                                    Sign in
                                </button>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <div class="checkbox" style="color: #337ab7">
                                    Not a member yet? <a id="login-register-button" href="javascript:void(0);">Register</a>
                                </div>
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
<!-- Forgot Password Box -->
<div class="modal fade" id="forgot-password" role="dialog">
    <div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
        <div class="modal-content" style="text-align: center;color:#337ab7;">

            <div class="modal-body">
                <div class="row">
                    <h2 class="main-heading" style="text-decoration: underline">Forgot Password?</h2>
                </div>
                <div class="vertical-space-30"></div>
                <span id="forgotErrorText" class="text-red"></span>
                <div class="vertical-space-30"></div>

                <div class="form-horizontal">
                    <div class="form-horizontal" id="forgotpwd-form" method="post" action="">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control reset_email" placeholder="Email" data-pattern="^\w+\@\w+\.\w{2,5}$" name="reset_email" id="reset_email" autocomplete="on">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" name="reset_pass" id="email_r" onclick="forgotPassword()">
                                    Reset Password
                                </button>
                                <span class="error_span"></span>
                            </div>
                        </div>

                    </div>
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

<!-- Register Box -->
<div class="modal fade" id="register-box" role="dialog">
    <div class="modal-dialog" style="border-radius: 10px;border: 4px solid #00A2B5;">
        <div class="modal-content" style="text-align: center;color:#337ab7;">

            <div class="modal-body">

                <div class="row">
                    <h1 class="main-heading" style="text-decoration: underline">REGISTER</h1>
                </div>
                <div class="vertical-space-10"></div>
                <span id="registerErrorText" class="text-red"></span>
                <div class="vertical-space-10"></div>

                <div class="form-horizontal">
                    <form class="form-horizontal" id="register-form" method="post" action="database/login_register.php">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="fname" placeholder="Eg: Prashant" name="fname" data-pattern="^[a-zA-Z ]+$" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lname" placeholder="Eg: Gangwar" name="lname" data-pattern="^[a-zA-Z ]+$" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mobile" placeholder="Eg: 9876543210" name="mobile" data-pattern="^[1-9]{1}[0-9]{9}$">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email_id" placeholder="Eg: abc@gmail.com" data-pattern="^\w+\@\w+\.[a-zA-Z]{2,5}$" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" placeholder="************"  data-pattern="^.{6,32}$" name="password">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="cpassword" placeholder="************" data-pattern="^.{6,32}$" name="cpassword" >
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle Type</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="vehicle_type" placeholder="Eg: Car, Bike, etc." name="vehicle_type" data-pattern="^[a-zA-Z ]+$" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="vehicle_no" placeholder="Eg: DL 1234 HA" name="vehicle_no" data-pattern="^[1-9]{1}[0-9]{9}$">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary register" name="register" value="register" id="register" onclick="javascript:void(0);">
                                    Register
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

<script type="text/javascript">
    
    $(function() {

        //Login Modal Display from Login Button
        $("#login-button").click(function() {
            $("#login-box").modal('show');
        });

        //Register Modal Display from Register Button
        $("#register-button").click(function() {
            $("#register-box").modal("show");
            document.getElementById("register-form").reset();
            $("#registerErrorText").html("");
        });

        // Forget Password Modal Display from Login Modal
        $("#forgot-password-link").click(function() {
            $('#login-box').modal('hide');
            $("#forgot-password").modal();
        });

        // Register Modal Display from Login Modal
        $("#login-register-button").click(function() {
            $('#login-box').modal('hide');
            $("#register-box").modal('show');
        });

	});

    //Code for registeration
    $("#register-box").submit(function (event){

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var mobile = $('#mobile').val();
        var email_id = $('#email_id').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        var vehicle_type = $('#vehicle_type').val();
        var vehicle_no = $('#vehicle_no').val();

        event.preventDefault();

        if(fname == '' || lname == '' || mobile == '' || email_id == '' || password == '' || cpassword == '' || vehicle_type == '' || vehicle_no == '' )
        {
            $("#registerErrorText").html("Please fill all the fields");
            $("#registerErrorText").show();
        }
        else if(fname.length>25)
        {
            $("#registerErrorText").html("First name cannot be more than 25 characters.");
            $("#registerErrorText").show();
        }
        else if(fname=="")
        {          
            $("#registerErrorText").html("Enter yoour first name.");
            $("#registerErrorText").show();
        }
        else if(lname.length>25)
        {
            $("#registerErrorText").html("Last name cannot be more than 25 characters.");
            $("#registerErrorText").show();
        }
        else if(fname=="")
        {          
            $("#registerErrorText").html("Enter your last name.");
            $("#registerErrorText").show();
        }
        else if(check_name(fname) == "false")
        {
            $("#registerErrorText").html("Invalid First name! Only Alphabets are allowed.");
            $("#registerErrorText").show();
        }
        else if(check_name(lname) == "false")
        {
            $("#registerErrorText").html("Invalid Last name! Only Alphabets are allowed");
            $("#registerErrorText").show();
        }
        else if(mobile=="")
        {
            $("#registerErrorText").html("Enter Mobile number.");
            $("#registerErrorText").show();
        }
        else if(check_inp(mobile)=="false")
        {
            $("#registerErrorText").html("Invalid Mobile number. Enter 10 digit mobile no.");
            $("#registerErrorText").show();
        }
        
        else if(check_space(mobile)=="false")
        {
            $("#registerErrorText").html("Invalid Mobile Number.");
            $("#registerErrorText").show();
        }

        else if(mobile.length>10 || mobile.length < 10)
        {
            $("#registerErrorText").html("Enter valid 10 digit Mobile Number.");
            $("#registerErrorText").show();
        }
        
        else if(check_start_zero(mobile)=="true")
        {
            $("#registerErrorText").html("Starting digit of Mobile number can't be '0'.");
            $("#registerErrorText").show();
        }
        else if(email_id=="")
        {
            $("#registerErrorText").html("Enter your Email id.");
            $("#registerErrorText").show();
        }
        else if(check_email(email_id)=="false")
        {
            $("#registerErrorText").html("Invalid Email id! Enter your valid Email id.");
            $("#registerErrorText").show();
        } 
        else if(password=="")
        {
            $("#registerErrorText").html("Enter your password (max length 16 digits)");
            $("#registerErrorText").show();
        }
        else if(cpassword=="")
        {
            $("#registerErrorText").html("Enter Confirm Password.");
            $("#registerErrorText").show();
        }
        else if(password != cpassword)
        {
            $("#registerErrorText").html("Password mismatch.");
        }
        else if(password.length <= 16 && password.length >= 6)
        {
            $("#registerErrorText").html("Password length must be between 6 to 16 characters).");
            $("#registerErrorText").show();
        }
        else
        {
            $.ajax({
                type: "POST",
                url: 'database/login_register.php',
                data: { 'type': 'register', 'fname': fname, 'lname': lname, 'mobile': mobile, 'email_id': email_id, 'password': password, 'vehicle_type'    : vehicle_type, 'vehicle_no': vehicle_no },
                success: function(response){
                        
                        //alert(response);
                        if(response == "email_error")
                        {
                            $("#registerErrorText").html("Email id already in use!");
                            $("#registerErrorText").show();
                        }
                        else if(response == "mobile_error")
                        {
                            $("#registerErrorText").html("Email id already in use!");
                            $("#registerErrorText").show();
                        }
                        else 
                        {
                            alert(response);
                            $("#register-box").hide();
                            $("#register-form").reset();
                            $("#registerErrorText").html("");
                        }
                }
            });

            event.preventDefault();
            return false;    
        }

           
    });

</script>
















