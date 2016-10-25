/* -------------------------------------------------------------------------------------------------------------------------------------*/

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

    //To bind register button
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





/* --------------------------------------------------------------------------------------------------------------------------------------*/
		function check_len(value,max,text,btn,identifier,type) 
		{
			var timer = null;
			clearTimeout(timer); 
		                timer = setTimeout(slow_check, 500);
			
			function slow_check() 
			{
				remove_error_sugg_class(identifier);
				
				if(value.length>max)
				{
					//alert("sale_val");
					input_sugg_error(text,btn,max,identifier);	
				}
				else
				{
					if(value.trim() === false)
					{
						input_sugg_error("Remove space & enter some value.",btn,max,identifier,'error');
					}
					else 
					{
						if(value.length>0)
						{
						
						if(type=='space-inp')
						{
							if(check_inp(value)=="true")
							{
								if(check_space(value)=="true")
								{	
									if(check_start_zero(value) == "true")
									{
										input_sugg_error("Don't insert zero at beginning of number",btn,max,identifier,'error');	
									}
									else
									{
										input_sugg_succ(text,btn,identifier);
									}
								}
								else
								{
									input_sugg_error('No space allowed and',btn,max,identifier);	
								}
							}
							else
							{
								input_sugg_error('Only integer allowed and',btn,max,identifier);
							}
						}


						else if(type=='space')
						{
							if(check_space(value) == "true" && check_name(value) == "true")	// Prashant added this "check_name" function to check a single word
							{
								input_sugg_succ(text,btn,identifier);								
							}
							else 
							{
								input_sugg_error('Only alphabets are allowed and',btn,max,identifier);	
							}
						}


						else if(type=='full_name')	// Prashant added this function to check full name
						{	
							if(value.trim() == "")
							{
								input_sugg_error('Invalid '+text+ '!',btn,max,identifier,'error');		
							}
							/*else if(check_string_start_zero(value) == "true")
							{
								input_sugg_error('Dont give space at beginning',btn,max,identifier);
							}*/
							else if(check_name(value) == "true")	
							{
								input_sugg_succ(text,btn,identifier);								
							}
							else 
							{
								input_sugg_error('Only alphabets & Spaces are allowed and',btn,max,identifier);	
							}
						}


						else if(type=='inp')	// Prashant added this tp check new mobile validations
						{
							if(check_inp(value)=="true")
							{	
								if(identifier == "aadhaar")
								{
									if(value.length == 12)
									{
										input_sugg_succ(text,btn,identifier);
									}
									else
									{
										input_sugg_error('Invalid Aadhaar card no! Enter your correct 12 digit Aadhaar card no.',btn,max,identifier,'error');
									}
								}
								else
								{
									input_sugg_succ(text,btn,identifier);	
								}
							}
							else
							{
								input_sugg_error('Only integer are allowed and',btn,max,identifier);
							}
						}


						else if(type=="mobile")	// Prashant added this to check mobile number
						{
							if(check_start_zero(value)=="false")	// Prashant added to check the starting zero if any present
							{
								if(value.length == max)
								{
									input_sugg_succ(text,btn,identifier);
								}
								else
								{
									input_sugg_error("Mobile number must be of 10 digits.",btn,max,identifier,'error');	
								}
								
							}
							else
							{
								input_sugg_error("Don't add 0 in beginning of mobile number.",btn,max,identifier,'error');		
							}
						}


						else if(type=='date')	// Prashant added this to check the date 
						{	
							
							if(date_check(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{
								input_sugg_error('Invalid date! Date can only be in dd/mm/yyyy format',btn,max,identifier);		
							}
						}


						else if(type=='landline')
						{
							if(check_landline(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{
								input_sugg_error('Landline should be with STD code  0120-781092,',btn,max,identifier);		
							}
						}


						else if(type=='ifsc')	// Prashant added this to check the ifsc code
						{
							if(check_ifsc(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{
								input_sugg_error('IFSC should be like AAAA0123456,',btn,max,identifier);		
							}
						}


						else if(type=='acc')	// Prashant added this to check the account number
						{	
							if(check_acc(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{
								input_sugg_error('Incorrect Bank account number! It',btn,max,identifier);		
							}
						}


						else if(type=='email')		// Prashant added email validation
						{
							if(check_email(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{
								input_sugg_error('Invalid email!',btn,max,identifier,'error');		
							}
						}


						else if(type=='address_field')		// Prashant added address field validation
						{
							if(identifier == 'city' || identifier == "area")
							{	
								if(check_name(value) == 'true')
								{
									input_sugg_succ(text,btn,identifier);
								}
								else
								{
									input_sugg_error('Invalid '+text,btn,max,identifier,'error');	
								}
							}
							else if(identifier == 'flat')
							{
								if(check_name(value) == "true")
								{
									input_sugg_error('Invalid '+text,btn,max,identifier,'error');
								}
								else if(check_inp(value) == "true")
								{
									input_sugg_error('Invalid '+text,btn,max,identifier,'error');
								}
								else
								{
									input_sugg_succ(text,btn,identifier);	
								}
							}
							else if(check_alpha_numeric_special(value)=="true")	// Prashant added this
							{	
								if(check_inp(value) == "true")
								{
									input_sugg_error('Invalid '+text,btn,max,identifier,'error');
								}
								else
								{
									input_sugg_succ(text,btn,identifier);
								}
							}
							else
							{
								input_sugg_error('Invalid '+text,btn,max,identifier,'error');	
							}
						}


						else if(type=='pan')		// Prashant added email validation
						{	
							if(check_pan(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{	
								input_sugg_error('Incorrect PAN format eg: AAAAA4444A. PAN',btn,max,identifier);		
							}	
						}


						else if(type=='tan')		// Prashant added tan validation
						{	
							if(check_tan(value)=="true")
							{
								input_sugg_succ(text,btn,identifier);
							}
							else
							{	
								input_sugg_error('Incorrect TAN format eg: AAAA44444A. TAN',btn,max,identifier);		
							}	
						}
			

						else
						{
							input_sugg_succ(text,btn,identifier);
						}
							
					}
					}
				}
			}
		}


		function check_alpha_numeric_special(value) 	//--------- Prashant	
		{
			var filter = /^(?=[a-zA-Z0-9])([A-Za-z0-9 .(),#\&/-]*)+$/;
			
			if(filter.test(value) ==  true)
			{
				return "true";
			}
			else
			{
				return "false";
			}
		}

		function check_pan(value) 
		{
			if(value.length!=10)
			{	
				return "false";
			}
			else
			{	// where "P" is at 4th postion.
				//var filter = /^([a-zA-Z]){3}([p,t,P,T]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/g;

				//Universal regex for all valid pan card numbers.
				//var filter = ^[\w]{3}(p|P|c|C|h|H|f|F|a|A|t|T|b|B|l|L|j|J|g|G)[\w][\d]{4}[\w]$;

				//implemented code, where at 4th position we can have any alphabet
				var filter = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/g;

				if(filter.test(value) == true)
				{
					return "true";
				}
				else
				{
					return "false";
				}					
				
			}

		}

		function check_email(email) 
		{
		
			var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
			
			if (filter.test(email)) 
			{
				return "true";
			}
			else 
			{
				return "false";
			}
		}

		function check_acc(value) 
		{
			if(value.length>0)
			{
				//earlier regex for bank account number	
				//if((/[a-zA-Z0-9]([/-]?(((\d*[1-9]\d*)*[a-zA-Z/-])|(\d*[1-9]\d*[a-zA-Z]*))+)*[0-9]*/g).test(value) == true)

				if((/[a-zA-Z0-9]([/-]?(((\d*[1-9]\d*)*[a-zA-Z/-])|(\d*[1-9]\d*[a-zA-Z]*))+)*[0-9]*/).test(value) ==  true)
				{
					return "true";
				}
				else
				{
					return "false";
				}
			}
		}

		function date_check(value)			//-------------Prashant 
		{		

			    if((/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/).test(value) == true )
				{
					var date = value.split("/");
					if(date[2] < 1900 || date[2] > 2016)	
			    	{
			    		return "false";
			    	}
					return "true";
				}
				else
				{
					return "false";
				}


		}

		function check_string_start_zero(value)			//----------Prashant
		{
			if((/^[0]/).test(value) ==  true)
			{
				return "true";
			}
			else
			{
				return "false";
			}
		}
		

		function check_start_zero(value)			//----------------Prashant
		{
			if((/^[0][0-9]/).test(value) ==  true)
			{
				return "true";
			}
			else
			{
				return "false";
			}
		}
		
		function check_name(value)					//-----------------Prashant
		{
			if((/^[a-zA-Z ]+$/).test(value) ==  true)
			{
				return "true";
			}
			else
			{
				return "false";
			} 
		}


		function check_inp(value)
		{
			 if (isNaN(value)) 
			  {
			   	return "false";
			  }
			  else
			  {
			  	return "true";
			  }
			 
		}

		function check_space(value) 
		{

			   if(value.indexOf(' ') >= 0)
			   {
			   	return "false";
			   }
			   else
			   {
			   	return "true";
			   }
		}

		
	function register() 
	{	
		var name = $(".name").val();
		var mobile = $(".mobile").val();
		var email = $(".email").val();
		var pass = $(".pass").val();
		var confirm = $(".confirm").val();
		var option = $(".option").val();
		var type=$("#type").val();
		var plan = $("#plan").val();
		//alert(email);
		//alert(pass);
		//alert(confirm);
		//alert(option);

		//$('#form-register-button').attr('disabled', 'disabled');
		//setTimeout(function(){ enableButton('form-register-button'); }, 1000);

		show_gif();
		if(name.length>25)
		{
			$(".rgstr_err").text("Name too long.");
			hide_gif();
		}
		else if(name=="")
		{
			$(".rgstr_err").text("Please provide your name.");
			hide_gif();
		}
		else if(check_name(name) == "false")
		{
			$(".rgstr_err").text("Name must contain alphabets only.");
			hide_gif();
		}
		else if(mobile=="")
		{
			$(".rgstr_err").text("Enter your mobile number.");
			hide_gif();
		}
		else if(check_inp(mobile)=="false")
		{
			$(".rgstr_err").text("Mobile number must contain digits only.");
			hide_gif();
		}
		
		else if(check_space(mobile)=="false")
		{
			$(".rgstr_err").text("Number cannot have spaces.");
			hide_gif();
		}

		else if(mobile.length>10 || mobile.length < 10)
		{
			$(".rgstr_err").text("Enter a valid 10 digit mobile number.");
			hide_gif();
		}
		
		else if(check_start_zero(mobile)=="true")
		{
			$(".rgstr_err").text("Mobile number should not start with 0.");
			hide_gif();
		}
		
		else if(email=="")
		{
			
			$(".rgstr_err").text("Email cannot be empty.");
			hide_gif();
		}
		else if(pass=="")
		{
			
			$(".rgstr_err").text("Password cannot be empty.");
			hide_gif();
		}
		else if(confirm=="")
		{
			
			$(".rgstr_err").text("Confirm Password cannot be empty.");
			hide_gif();
		}
		else if(pass != confirm)
		{
			
			$(".rgstr_err").text("Password doesn't match.");
			hide_gif();
		}
		else if(pass.length < 6)
		{
			
			$(".rgstr_err").text("Password cannot be less than 6 characters.");
			hide_gif();
		}
		else
		{
			var ref = "register";
			$.ajax({	

			            type:"POST",
			            url:"ajax/common.php",
			            data:{mode:"common",ref:ref,email:email,pass:pass,option:option,name:name,mobile:mobile}
			        }).done(function(res){
			        	//alert(res);
			        	if(res == "failed")
			        	{
			        		//oops();
			        		oops();
			        		hide_gif();
			        	}
			        	else if(res=="found")
			        	{
			        		$(".rgstr_err").text("This email is already registered with us. Try login or forgot password.");
			        		hide_gif();
			        	}
			        	else if(res=="invalid_email")
			        	{
			        		$(".rgstr_err").text("Invalid email");
			        		hide_gif();
			        	}
			        	else if(res=="banned")
			        	{
			        		$(".rgstr_err").text("Sorry, we don't support this email id. Please use standard email services like gmail, yahoomail, hotmail etc.");
			        		hide_gif();
			        	}
			        	else 
			        	{
			        		if(type=="signup")
			        		{
			        			window.location.href=res;
			        		}
                            else if(type="signup-form")
                            {
                                $("#login-form").hide();
                                $("#signup-upload-form").show();
                                hide_gif();
                            }
			        		else if(type=="form")
			        		{
			        			var total_income_salary = $("#total_income_salary").val();
			        			var gross_income = $("#gross_income").val();
			        			var total_deduction = $("#total_deduction").val();
			        			var total_income = $("#total_income").val();
			        			var tax_due = $("#tax_due").val();
			        			var pan_user =$("#pan_user").val();
			        			var tax_paid = $("#tax_paid").val();
			        			//alert(total_income_salary);
			        			//alert(gross_income);
			        			//alert(total_deduction);
			        			//alert(total_income);
			        			//alert(tax_due);
			        			//alert(pan_user);
			        			//alert(tax_paid);
			        			//$(".modal").fadeOut();
			        			var ref = "form";
						$.ajax({
						            type:"POST",
						            url:"ajax/common.php",
						            data:{mode:"common",ref:ref,total_income_salary:total_income_salary,gross_income:gross_income,total_deduction:total_deduction,
						            total_income:total_income,tax_due:tax_due,pan_user:pan_user,tax_paid:tax_paid}
						        }).done(function(res){
						        	if(res == "failed")
						        	{
						        		//oops();
						        		oops();
						        		hide_gif();
						        	}
						        	else
						        	{
						        		window.location.href=res;
						        	}
						       });
			        		}
			        		else if(type=="buy")
			        		{
			        			window.location.href='cart/'+plan;
			        		}
			        		else
			        		{
			        			oops();	
			        			hide_gif();
			        		}

			        	}
							
			        });
		}
	}



	function login() 
	{	
		
		var email = $("#email_log").val();
		var pass = $("#password_log").val();
		var check = $("#remember").val();
		var type= $("#type_log").val();

		show_gif();

		if(email=="")
		{
			$(".error_span").text("Email cannot be empty.");	
			hide_gif();

		}
		else if(pass=="")
		{
			$(".error_span").text("Password cannot be empty.");	
			hide_gif();

		}
		else
		{
			var ref="login";
		
			
			$.ajax({
			            type:"POST",
			            url:"ajax/common.php",
			            data:{mode:"common",ref:ref,email:email,pass:pass,check:check}
			        }).done(function(res){
			        	
			        	if(res == "failed")
			        	{
			        		oops();
			        		hide_gif();
			        		//$("#sign-in").prop('disabled', false);
			        	}
			        	else if(res=="empty")
			        	{
			        		$(".error_span").text("Email & Password combination doesn't match.");	
			        		hide_gif();	
			        		
			        	}
			        	else if(res=="invalid")
			        	{
			        		$(".error_span").text("Please try a genuine email id and password combination.");		
			        		hide_gif();
			        		//$("#sign-in").prop('disabled', false);
			        	}
			        	else
			        	{
			        		if(type!="")
			        		{
			        			if(type=="form")
			        			{
			        				window.location.href='form/income';
			        			}
			        			else
			        			{
			        				window.location.href='cart/'+type;
			        			}
			        		}
			        		else
			        		{
			        			window.location.href=res;
			        		}
			        	}
			        	//$("#sign-in").delay(5000).prop('disabled', false);
			       });
		}
	}

	 function delete_tran(id) 
	 {
	 	//alert(id);
	 	show_gif();
	 	if(id=="")
	 	{
	 		oops();
	 	}
	 	else
	 	{
	 		
			var ref="tran_delete";
			$.ajax({
			            type:"POST",
			            url:"ajax/form.php",
			            data:{mode:"form",ref:ref,id:id}
			        }).done(function(res){
			        	if(res == "failed")
			        	{
			        		hide_gif();
			        		oops();
			        	}
			        	else
			        	{
			        		//alert(res);
			        		hide_gif();
			        		$("#tran_"+id).fadeOut();
			        	}
			       });
	 	}
	 }


	$("#donation_save").click(function(){
		var don_name = $(".don_name").val();
		var don_pan = $(".don_pan").val();
		var don_add = $(".don_add").val();
		var don_town = $(".don_town").val();
		var don_city = $(".don_city").val();
		var don_state = $(".don_state").val();
		var don_pin = $(".don_pin").val();
		var don_amnt = $(".don_amnt").val();
		var don_per = $(".per").val();
		
		var don_id = $(".don_id").val();
		//alert(don_counter);
		var ref="donation";
		show_gif();

		 if(don_name=="")
		 {
		 	error('don_name','Donee Name cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_pan=="")
		 {
		 	error('don_pan','Donee Pan cannot be empty.');
		 	hide_gif();
		 }
		else if(don_add=="")
		 {
		 	error('don_add','Donation Address cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_town=="")
		 {
		 	error('don_town','Town cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_city=="")
		 {
		 	error('don_city','City cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_state=="")
		 {
		 	error('don_state','State cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_pin=="")
		 {
		 	error('don_pin','Pin cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_amnt=="")
		 {
		 	error('don_amnt','Amount cannot be empty.');
		 	hide_gif();
		 }
		 else if(don_per=="")
		 {
		 	error('don_per','Percentage cannot be empty.');
		 	hide_gif();
		 }
		else
		{

			$.ajax({
			            type:"POST",
			            url:"ajax/form.php",
			            data:{mode:"form",ref:ref,don_name:don_name,don_pan:don_pan,don_add:don_add,don_town:don_town,don_city:don_city,
			            don_state:don_state,don_pin:don_pin,don_amnt:don_amnt,don_per:don_per,don_id:don_id}
			        }).done(function(res){
			        	//alert(res);
			        	if(res == "failed")
			        	{
			        		hide_gif();
			        		oops();
			        	}
			        	else
			        	{
			        		
			        		hide_gif();
			        		if(res == "failed")
				        	{
				        		oops();
				        		hide_gif();
				        	}
				        	else
				        	{
				        		//alert(res);
				        		window.location.href='form/deductions/donation';
				        	}
			        	}
			       });
		}
		
	});

