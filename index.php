<?php include_once "includes/header.php"; ?>
<div>
	<div class="jumbotron text-center index-jumbotron" style="margin-bottom:0; ">
		<div>
			<h1>WELCOME TO PARK EASY</h1>
		</div>
		<div>
			<i class="fa fa-car fa-5x" aria-hidden="true"></i>
		</div>
		<div>
			<h2>An efficient parking system!</h2>
		</div>
		<div>
			<button type="button" class="btn btn-info">SIGN UP NOW</button>
		</div>
		<br>
	</div>
	<hr style="margin:0">

	<div class="col-lg-12 jumbotron" style="color: white; background-color: black; padding-top: 60px !important; padding-bottom: 0px !important;">
		<div class="text-center" style="color:white">
			<h2><big>BENEFITS</big></h2>
			<br><br>
		</div>
	    <div class="col-lg-3 col-sm-6 text-center btn-danger" style="margin-bottom: 10px; border: 10px solid black;" >
	  		<br><br><br>
		  		<i class="fa fa-heart fa-3x"></i>
		  		<h4>Simple & easy</h4>
		  	<br><br><br><br>
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
	<br class="text-center">Total vehicles parked, so far : 1320<br>
	<div id="map" style="width:100%;height:500px"></div>

	<script>
		function initMap()
		{
			var delhi = {lat: 28.631137 , lng: 77.212626};
			var delhi1 = {lat: 28.631137 , lng: 78.212626};
			var delhi2 = {lat: 28.631137 , lng: 79.212626};
			var map = new google.maps.Map(document.getElementById('map'),{
				zoom:15,
				center: delhi,
			});
			var marker = new google.maps.Marker({
				position: delhi,
				map:map
			});
			var marker = new google.maps.Marker({
				position: delhi1,
				map:map
			});
			var marker = new google.maps.Marker({
				position: delhi2,
				map:map
			});
		
		}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2XzJrnMFxxDSY6gLbouCxoIcyDuuPnU&callback=initMap">
	</script><!-- 
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2XzJrnMFxxDSY6gLbouCxoIcyDuuPnU"
  type="text/javascript"></script> -->
</div>

<?php include_once "includes/footer.php" ?>
