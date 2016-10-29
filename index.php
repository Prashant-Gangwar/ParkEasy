<?php include_once "includes/header.php"; ?>
<div>
	<div class="jumbotron text-center index-jumbotron" style="margin-bottom:0; ">
		<div>
			<h1 id="welcome_top_line">WELCOME TO PARK EASY</h1>
		</div>
		<div  id="car">
			<i class="fa fa-car fa-5x" aria-hidden="true"></i>
		</div>
		<div>
			<h2 id="welcome_bottom_line" >An efficient parking system!</h2>
		</div>
		<div>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target='#register-box' >SIGN UP NOW</button>
		</div>
		<br>
	</div>
	<hr style="margin:0">

	<div class="col-lg-12 jumbotron" style="color: white; background-color: black; padding-top: 60px !important; padding-bottom: 0px !important;">
		<div class="text-center" style="color:white">
			<h2><big>BENEFITS</big></h2>
			<br><br>
		</div>
	    <div class="col-lg-3 col-sm-6 text-center btn-danger" style="margin-bottom: 10px; padding-bottom: 3px; border: 10px solid black;" >
	  		<br><br><br>
		  		<i class="fa fa-heart fa-3x"></i>
		  		<h4>Simple & easy</h4>
		  	<div class="vertical-space-60"></div>
		  	<div class="vertical-space-10"></div>
		  	<div class="vertical-space-10"></div>
	    </div>

	    <div class="col-lg-3 col-sm-6 text-center btn-danger" style="margin-bottom: 10px; padding-bottom: 25px; border: 10px solid black;">
	      	<br><br><br>
		      	<i class="fa fa-rupee fa-3x"></i>
		    	<h4>Check out parking status<br>and<br>rates from anywhere</h4>
		    <br>
	    </div>

	    <div class="col-lg-3 col-sm-6 text-center btn-danger" style="margin-bottom: 10px; border: 10px solid black;">
	    	<br><br><br>
	    		<i class="fa fa-thumbs-up fa-3x"></i>
				<h4>Pre-book your slot</h4>
	    	<br><br><br><br>
	    </div>

	    <div class="col-lg-3 col-sm-6 text-center btn-danger" style="margin-bottom: 10px; padding-bottom: 25px; border: 10px solid black;"> 
		    <br><br><br>
			    <i class="fa fa-shopping-bag fa-3x"></i>
			    <h4>Get discounts, offers<br>and<br>many more</h4>
	    	<br>
	    </div>
	</div><!-- /row -->
</div>

<br>&nbsp;<br>&nbsp;
<!-- This div is to give spaces -->
<div class="col-lg-12 index-jumbotron">
	<br>Total vehicles parked so far : 1320
	<br>*NOTE : Parking faciltity is only at these places
	<div id="map" style="width:100%;height: 80%"></div>

	<script>

		function initMap()
		{
			var sarojini_nagar = {lat: 28.5757 , lng: 77.1990};
			var lajpatpat_nagar = {lat: 28.5677 , lng: 77.2433};
			var nehru_place = {lat: 28.5483 , lng: 77.2522};
			var cannaught_place = {lat: 28.6315 , lng: 77.2167};
			var hauz_khas = {lat: 28.5494 , lng: 77.2001};
			var lodhi_garden = {lat: 28.5931 , lng: 77.2197};

			//To load maps
			var map = new google.maps.Map(document.getElementById('map'),{
				zoom:12,
				center: lodhi_garden,
			});
			
			//Marker for sarojini nagar
			var marker_SN = new google.maps.Marker({
				position: sarojini_nagar,
				map:map,
				title: "Sarojini Nagar"
			});
			
			//Marker for lajpat nagar
			var marker_LN = new google.maps.Marker({
				position: lajpatpat_nagar,
				map:map,
				title: "Lajpat Nagar"
			});
			
			//marker for nehru place
			var marker_NP = new google.maps.Marker({
				position: nehru_place,
				map:map,
				title: "Nehru Place"
			});

			//marker for cannaught place
			var marker_CP = new google.maps.Marker({
				position: cannaught_place,
				map:map,
				title: "Cannaught Place"
			});

			//Marker for hauz khas
			var marker_HK = new google.maps.Marker({
				position: hauz_khas,
				map:map,
				title: "Hauz Khas"
			});

			//marker for lodhi garden
			var marker_LG = new google.maps.Marker({
				position: lodhi_garden,
				map:map,
				title: "Lodhi Garden"
			});

/***********************************************************************************************************************************/

			//info window content here for SN
			var infoWindowContent_SN = '<div class="info_content">' + '<h4>Sarojini Nagar</h4>' + '<p>Total Space - 15</p>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_SN = new google.maps.InfoWindow({
		        content: infoWindowContent_SN
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_SN, 'click', function() {
		        infoWindow_SN.open(map, marker_SN);
		    });

			var infoWindowContent_LN = '<div class="info_content">' + '<h4>Lajpat Nagar</h4>' + '<p>Total Space - 15</p>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_LN = new google.maps.InfoWindow({
		        content: infoWindowContent_LN
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_LN, 'click', function() {
		        infoWindow_LN.open(map, marker_LN);
		    });


		    var infoWindowContent_NP = '<div class="info_content">' + '<h4>Nehru Place</h4>' + '<p>Total Space - 15</p>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_NP = new google.maps.InfoWindow({
		        content: infoWindowContent_NP
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_NP, 'click', function() {
		        infoWindow_NP.open(map, marker_NP);
		    });


		    var infoWindowContent_CP = '<div class="info_content">' + '<h4>Cannaught Place</h4>' + '<p>Total Space - 15</p>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_CP = new google.maps.InfoWindow({
		        content: infoWindowContent_CP
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_CP, 'click', function() {
		        infoWindow_CP.open(map, marker_CP);
		    });


		    var infoWindowContent_HK = '<div class="info_content">' + '<h4>Hauz Khas</h4>' + '<p>Total Space - 15</p>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_HK = new google.maps.InfoWindow({
		        content: infoWindowContent_HK
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_HK, 'click', function() {
		        infoWindow_HK.open(map, marker_HK);
		    });


		    var infoWindowContent_LG = '<div class="info_content">' + '<h4>Lodhi Garden</h4>' + '<p>Total Space - 15</p>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_LG = new google.maps.InfoWindow({
		        content: infoWindowContent_LG
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_LG, 'click', function() {
		        infoWindow_LG.open(map, marker_LG);
		    });
/*********************************************************************************************************************************/
			  	
		}
		
		$(document).ready(function(){
		   
		//Car animation
		var car = $("#car");
        car.animate({left: '40%'}, "slow");
        car.animate({fontSize: '3em'}, "slow");		    
		});

	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2XzJrnMFxxDSY6gLbouCxoIcyDuuPnU&callback=initMap">
	</script>
	<!-- 
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2XzJrnMFxxDSY6gLbouCxoIcyDuuPnU"
  type="text/javascript"></script> -->

</div>

<?php include_once "includes/footer.php" ?>
