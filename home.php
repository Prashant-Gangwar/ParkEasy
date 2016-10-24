<?php include_once "includes/header.php" ?>

	<div style="">
		<!-- Maps are loaded here-->
		<div class="col-lg-9" style="padding: 10px; margin-top: 20px;">
			<div id="map" style="width:100%;height:80%"></div>
		</div>
		<!-- Right side profile details are loaded here-->
		<div class="col-lg-3" style="margin-top: 30px; background-color: orange; margin-left: 0px;">
			<div style=" padding-top: 10px;">
				<h1 class="text-center" style="background-color: #C70D0D; color: white; padding-top: 12px; margin-top: 5px; padding-bottom: 11px; font-weight: bold;  margin-bottom: 10px; border-radius: 4px;" > Hi Prashant! <br>Welcome <br>to <br>Park Easy :)</h1>
			</div>
			<div>
				<hr>
					<h4>Click on the parking locations to check their details</h4>
				<hr>
				<h4>Your Details are: <br></h4>
				<label>Name: Prashant</label><br>
				<label>Email: Prashantgangwar23@gmail.com</label><br>
				<label>Vehicle No: MP 09 AB 1234</label><br>
				<label>Mobile: 9876543210</label><br>
				<br><br><br>
			</div>
		</div>
	</div>
</div>
<?php include_once "includes/footer.php" ?>

<script>
	function initMap()
	{
		var delhi = {lat: 28.631137 , lng: 77.212626};
		var delhi1 = {lat: 28.661147 , lng: 77.226626};
		var delhi2 = {lat: 28.621137 , lng: 77.234636};
		var map = new google.maps.Map(document.getElementById('map'),{
			zoom:13,
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
</script>


