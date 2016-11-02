<?php include_once 'includes/header.php'; 
  
  include_once 'database/db_connection.php';

  function park_slot_status($location, $slot_no)
  {
    $query_user_urls = qExecute("SELECT * FROM bookings WHERE parking_location = '$location' AND booking_status = 1 AND $parking_slot = '$slot_no'");
    
    if($query_user_urls->num_rows)
      return 1;
    else 
      return 0;
  }
?>


<div id="url_tab" style="overflow: auto; padding-left: 100px; padding-right: 100px; margin: 0px;">
  <table class="table table-striped text-center" id="" style="border: 3px solid red; overflow: auto; margin: 0">
    <br>
    <br>
    <h1 class="text-center" style="color: orange;">Select Parking</h1>
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
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_1" <?php  if(park_slot_status('SN',1)) echo 'disable'; ?> >1</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_2">2</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_3">3</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_4">4</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_5">5</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_6">6</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_7">7</button>
          </td>   
      </tr>
      <tr style="background-color: white;">
          <td style="background-color: gray;">
            <button class="btn btn-lg btn-danger text-center" style="height: 200px; width: 150px;">Exit</button>
          </td>
          <td colspan="5" style="background-color: gray;">
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_8">8</button>
          </td> 
      </tr>
      <tr>
          <td>
            <button class="btn btn-lg btn-primary" style="height: 200px; width: 150px;" id="SN_park_9">9</button>
          </td>
          <td style="background-color: gray;">
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_10">10</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_11">11</button>
          </td>
          <td>
            <button class="text-center btn btn-lg btn-primary text-center" style="height: 200px; width: 150px; background: url(images/Handicapped_Parking_Only.jpg) no-repeat; background-size: 95%;"></button>
          </td>
          <td style="background-color: gray;">
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_12">12</button>
          </td> 
      </tr>
      <tr>
        <td colspan="7" style=" height: 150px; background-color: gray">
        </td>
      </tr>
      <tr style="background-color: white;">
        <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px" id="SN_park_13">13</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px; background: url(images/Handicapped_Parking_Only.jpg) no-repeat; background-size: 95%;"></button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_14">14</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_15">15</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_16">16</button>
          </td>
          <td style="background-color: gray;">
            <button class="btn btn-lg btn-danger text-center" style="height: 200px; width: 150px;" >Entry</button>
          </td>
          <td>
            <button class="btn btn-lg btn-primary text-center" style="height: 200px; width: 150px;" id="SN_park_17">17</button>
          </td> 
      </tr>


      <tbody>
      
      </tbody>
  </table>
</div>


<?php include_once 'includes/footer.php'; ?>
