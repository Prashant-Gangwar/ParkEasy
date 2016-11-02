/* --------1756415924618786
-------------------------------------f22f89635f1fe3c929026ede7fb1d563----------------------------------------------------------------------------------------*/

function check_vehicle_no(vehicle_no)
{
	var filter = /(([A-Za-z]){2,3}(|-)(?:[0-9]){1,2}(|-)(?:[A-Za-z]){2}(|-)([0-9]){1,4})|(([A-Za-z]){2,3}(|-)([0-9]){1,4})/ig
	if(filter.test(value) ==  true)
	{
		return "true";
	}
	else
	{
		return "false";
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

