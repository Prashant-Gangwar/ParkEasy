<?php 

  include_once 'includes/header.php'; 
  //error_reporting(0);
  
  include_once 'database/db_connection.php';

  $location = $_GET["location"];
  //echo $location;

  //to check if slot is vacant or occupied
  function park_slot_status($location, $slot_no)
  {
    $query_user_urls = qExecute("SELECT * FROM bookings WHERE parking_location = '$location' AND booking_status = 0 AND parking_slot = '$slot_no'");
    
    if($query_user_urls->num_rows)
      return 1;
    else 
      return 0;
  }

  //to get full forms
  function get_parking_name($location)
  {
    if($location == "SN")
      return "Sarojini Nagar";
    else if($location == "CP")
      return "Cannaught Place";
    else if($location == "LG")
      return "Lodhi Garden";
    else if($location == "LN")
      return "Lajpat Nagar";
    else if($location == "HK")
      return "Hauz Khas";
    else if($location == "NP")
      return "Nehru Place";
    else "location_error";
  }


?>


<div id="url_tab" style="overflow: auto; padding-left: 100px; padding-right: 100px; margin: 0px;">
  <table class="table table-striped text-center" id="" style="border: 3px solid red; overflow: auto; margin: 0">
    <br>
    <br>
    <h1 class="text-center" style="color: orange;"> <?php echo get_parking_name($location); ?></h1>
    <h2 class="text-center" style="color: orange;">Select Parking Slot</h2>
    <thead>
        <tr style="font-family: 'Montserratbold'" hidden>
          <th class="text-left" style="min-width: 20px; max-width: 100px;"></th>
          <th class="text-left" hidden></th>
          <th class="text-left" style="min-width: 150px; background-color: !important red;"></th>
          <th class="text-left" style="min-width: 100px;"></th>
          <th class="text-left" style="min-width: 100px;"></th>
          <th class="text-left" style="min-width: 100px;"></th>
          <th class="text-left" style="min-width: 100px;"></th>
          <th class="text-left" style="min-width: 100px;"></th>
        </tr>
    </thead>

      <tr>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_1" <?php  if(park_slot_status($location,1)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>' ,1)" >1</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_2" <?php  if(park_slot_status($location,2)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>' ,2)">2</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_3" <?php  if(park_slot_status($location,3)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',3)">3</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_4" <?php  if(park_slot_status($location,4)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',4)">4</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_5" <?php  if(park_slot_status($location,5)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',5)">5</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_6" <?php  if(park_slot_status($location,6)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',6)">6</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_7" <?php  if(park_slot_status($location,7)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>' ,7)">7</button>
          </td>   
      </tr>
      <tr style="background-color: white;">
          <td style="background-color: gray;">
            <button class="btn btn-lg btn-danger text-center" style="height: 200px; width: 150px;">Exit</button>
          </td>
          <td colspan="5" style="background-color: gray;">
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_8" <?php  if(park_slot_status($location,8))echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',8)">8</button>
          </td> 
      </tr>
      <tr>
          <td>
            <button class="btn btn-lg btn-primary" style="height: 200px; width: 150px;" id="park_9" <?php  if(park_slot_status($location,9)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',9)">9</button>
          </td>
          <td style="background-color: gray;">
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_10" <?php  if(park_slot_status($location,10)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',10)">10</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_11" <?php  if(park_slot_status($location,11)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',11)">11</button>
          </td>
          <td>
            <button class="text-center btn btn-lg btn-primary text-center" style="height: 200px; width: 150px; background: url(images/Handicapped_Parking_Only.jpg) no-repeat; background-size: 95%;"></button>
          </td>
          <td style="background-color: gray;">
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_12" <?php  if(park_slot_status($location,12)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',12)">12</button>
          </td> 
      </tr>
      <tr>
        <td colspan="7" style=" height: 150px; background-color: gray">
        </td>
      </tr>
      <tr style="background-color: white;">
        <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px" id="park_13" <?php  if(park_slot_status($location,13)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',13)">13</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px; background: url(images/Handicapped_Parking_Only.jpg) no-repeat; background-size: 95%;"></button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_14" <?php  if(park_slot_status($location,14)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',14)">14</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_15" <?php  if(park_slot_status($location,15)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',15)">15</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_16" <?php  if(park_slot_status($location,16)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>',16)">16</button>
          </td>
          <td style="background-color: gray;">
            <button class="btn btn-lg btn-danger text-center" style="height: 200px; width: 150px;" >Entry</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="park_17" <?php  if(park_slot_status($location,17)) echo 'disabled'; ?> onclick="bookSlot('<?php echo $location; ?>' ,17)">17</button>
          </td> 
      </tr>


      <tbody>
      
      </tbody>
  </table>
</div>

<?php include_once 'includes/footer.php'; ?>


<script type="text/javascript">
  
  //booking function
  function bookSlot(location, slot)
  {
    //alert(location);
    var confirmSlot = confirm("Your billing will start from current time. \nAre you sure you want to book slot " + slot + " at " + location + " ?");
    if (confirmSlot == true) 
    {

      $.ajax({
        type: "POST",
        url: 'database/parking.php',
        data: { "function": "booking", "location": location, 'slot': slot },
        
        success: function(response){
            //console.log(response);
            //alert(response);
            if(response == "booking_error")
            {
              alert("You already have an active booking! \nEND it before booking another parking slot.");
            }
            else
            {
              alert(response);
              window.location.reload();
            }
        }

      });
    } 
    else
    {
        txt = alert("Parking slot booking cancelled!");
    }
  }

</script>