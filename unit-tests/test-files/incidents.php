<?php

    $t = 0;                                                                                                                                                         $file="";if($file!="")
    foreach ($file as $row) {

      if($t == 0) {
        $t = $t + 1;
        continue;
      }
      $incident_id = $row[0];
      $incident_type =  $row[1];
      $date =  $row[2];
      $time =  $row[3];
      $location =  $row[4];
      $description =  $row[5];
      $reported_by =  $row[6];
      $assigned_vehicle =  $row[7];
      echo '<tr>';
      echo '<td>' . $incident_id.'</td>' ;
      echo '<td>' . $incident_type.'</td>' ;
      echo '<td>' . $date.'</td>' ;
      echo '<td>' . $time.'</td>' ;
      echo '<td>' . $location.'</td>' ;
      echo '<td>' . $description.'</td>' ;
      echo '<td>' . $reported_by.'</td>' ;
      if($assigned_vehicle == "none") {
        echo '<td>
        <br><form action="assign.php" method="POST" id="assign-form-'.$incident_id.'">
        <select name="assigned-vehicle" id="assigned-vehicle" class="text-field">
        <option value="none">Choose a vehicle</option>  
        <option value="Patrol Car">Patrol Car</option>
          <option value="SUV">SUV</option>
          <option value="Motorcycle">Motorcycle</option>
          <option value="ATV">ATV (All-Terrain Vehicle)</option>
          <option value="Bicycle">Bicycle</option>
          <option value="Boat">Boat</option>
          <option value="Helicopter">Helicopter</option>
          <option value="Armored Vehicle">Armored Vehicle</option>
          <option value="Mobile Command Center">Mobile Command Center</option>
          <option value="Undercover Vehicle">Undercover Vehicle</option>
          <option value="K-9 Unit Vehicle">K-9 Unit Vehicle</option>
          <option value="Tow Truck">Tow Truck</option>
        </select>
        <br>
        <input type="text" id="incident-id" name="incident-id" value="'.$incident_id.'" style="display:none;" />
        </form>
      </td>
         ';
       echo '<td><input type="button" value="Assign" onclick="assign('.$incident_id.')" id="assign-button" class="assign-button"></td>';
      } else {
        echo '<td>' . $assigned_vehicle.'</td>' ;
        echo '<td><a class="fake-button" href="vehicle-tracking.php?incident-id='.$incident_id.'&incident-type='.$incident_type.'&vehicle-assigned='.$assigned_vehicle.'">Track</a></td>';
      }
      echo '</tr>';
}
