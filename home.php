<?php include_once "includes/header.php";
	error_reporting(0);
?>

	<div style="">
		<!-- Maps are loaded here-->
		<div class="col-lg-9" style="padding: 10px; margin-top: 20px;">
			<div id="map" style="width:100%; height:80%; color: #01A185"></div>
		</div>
		<!-- Right side profile details are loaded here-->
		<div class="col-lg-3" style="margin-top: 30px; background-color: orange; margin-left: 0px; height: 80%">
			<div style=" padding-top: 10px;">
				<h1 class="text-center" style="background-color: #C70D0D; color: white; padding-top: 12px; margin-top: 5px; padding-bottom: 11px; font-weight: bold;  margin-bottom: 10px; border-radius: 4px;" > Hi <?php echo $_SESSION['fname']; ?>! <br>Welcome <br>to <br>Park Easy :)</h1>
			</div>
			<div>
				<hr>
				<h4>Click on the parking locations to check their details</h4>
				<hr>
				<h4>Your Details are: <br></h4>
				<label>Name: <?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></label><br>
				<label>Email: <?php echo $_SESSION['email_id']; ?></label><br>
				<label>Vehicle Type: <?php echo $_SESSION['vehicle_type']; ?></label><br>
				<label>Vehicle No: <?php echo $_SESSION['vehicle_no']; ?></label><br>
				<label>Mobile: <?php echo $_SESSION['mobile_no']; ?></label><br>
			</div>
		</div>
	</div>
</div>
<?php include_once "includes/footer.php" ?>


<script>
	
	$(function() {
		$("#login-form").reset();
    	$("#loginErrorText").html("");
    });

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
			var infoWindowContent_SN = '<div class="info_content" style="color: #01A185">' + '<h4>Sarojini Nagar</h4>' + '<p>Total Parkings : 19</p><p>Available Parkings : 18</p><p>Charges : Rs 10/hr</p>' + '<a href="parking.php?location=SN"><button class="btn btn-sm btn-primary col-lg-12" id="btn_SN_book">Show Details</button></a>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_SN = new google.maps.InfoWindow({
		        content: infoWindowContent_SN
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_SN, 'click', function() {
		        infoWindow_SN.open(map, marker_SN);
		    });

			var infoWindowContent_LN = '<div class="info_content">' + '<h4>Lajpat Nagar</h4>' + '<p>Total Parkings : 20</p><p>Available Parkings : 7</p><p>Charges : Rs 15/hr</p>' +  '<a href="parking.php?location=LN"><button class="btn btn-sm btn-primary col-lg-12" id="btn_LN_book">Show Details</button></a>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_LN = new google.maps.InfoWindow({
		        content: infoWindowContent_LN
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_LN, 'click', function() {
		        infoWindow_LN.open(map, marker_LN);
		    });


		    var infoWindowContent_NP = '<div class="info_content" >' + '<h4>Nehru Place</h4>' + '<p>Total Parkings : 15</p><p>Available Parkings : 5</p><p>Charges : Rs 15/hr</p>' +  '<a href="parking.php?location=NP"><button class="btn btn-sm btn-primary col-lg-12" id="btn_NP_book">Show Details</button></a>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_NP = new google.maps.InfoWindow({
		        content: infoWindowContent_NP
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_NP, 'click', function() {
		        infoWindow_NP.open(map, marker_NP);
		    });


		    var infoWindowContent_CP = '<div class="info_content">' + '<h4>Cannaught Place</h4>' + '<p>Total Parkings : 15</p><p>Available Parkings : 2</p><p>Charges : Rs 30/hr</p>' +   '<a href="parking.php?location=CP"><button class="btn btn-sm btn-primary col-lg-12" id="btn_CP_book">Show Details</button></a>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_CP = new google.maps.InfoWindow({
		        content: infoWindowContent_CP
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_CP, 'click', function() {
		        infoWindow_CP.open(map, marker_CP);
		    });


		    var infoWindowContent_HK = '<div class="info_content">' + '<h4>Hauz Khas</h4>' + '<p>Total Parkings : 20</p><p>Available Parkings : 6</p><p>Charges : Rs 20/hr</p>' +  '<a href="parking.php?location=HK"><button class="btn btn-sm btn-primary col-lg-12" id="btn_HK_book">Show Details</button></a>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_HK = new google.maps.InfoWindow({
		        content: infoWindowContent_HK
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_HK, 'click', function() {
		        infoWindow_HK.open(map, marker_HK);
		    });


		    var infoWindowContent_LG = '<div class="info_content">' + '<h4>Lodhi Garden</h4>' + '<p>Total Parkings : 15</p><p>Available Parkings : 8</p><p>Charges : Rs 10/hr</p>' +  '<a href="parking.php?location=LG"><button class="btn btn-sm btn-primary col-lg-12" id="btn_LG_book">Show Details</button></a>' + '</div>';

		    // Initialise the inforWindow for SN
		    var infoWindow_LG = new google.maps.InfoWindow({
		        content: infoWindowContent_LG
		    });
		      //on click event for SN
			google.maps.event.addListener(marker_LG, 'click', function() {
		        infoWindow_LG.open(map, marker_LG);
		    });
/**************************geolocation code*******************************************************************************************************/
		    
		var infoWindow_geo = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) 
        {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow_geo.setPosition(pos);
            infoWindow_geo.setContent('You are here.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow_geo, map.getCenter());
          });
        } 
        else 
        {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow_geo, map.getCenter());
        }

        var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map);

        centerControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) 
      	{
        infoWindow_geo.setPosition(pos);
        infoWindow_geo.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      	}
/********************TO show available parkings***************************************************************************************/

      var map;
      var lodhi_garden = {lat: 28.5931 , lng: 77.2197};

      function CenterControl(controlDiv, map) {

        // Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Click to recenter the map';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Find Parking Locations';
        controlUI.appendChild(controlText);

        // Setup the click event listeners: simply set the map to Chicago.
        controlUI.addEventListener('click', function() {
          map.setCenter(lodhi_garden);
        });

      }



</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2XzJrnMFxxDSY6gLbouCxoIcyDuuPnU&callback=initMap">
</script>

