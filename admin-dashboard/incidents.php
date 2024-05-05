<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
  <head>
    <title>Incidents</title>
    <link rel="stylesheet" href="../user-dashboard/styling/admin-dashboard-styling.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  </head>
  <body>
  <header class="header">
      <div class="logo">
        <a href="#">Authority Response Coordination System (ARCS)</a>
      </div>
  
      <div class="profile-section">
        <div class="account">
          <img src="images/KOUSSA.png" alt="">
          <h4><?php echo $_SESSION["username"];?></h4>
        </div>
      </div>
    </header>
    <div class="container">
      <nav>
        <div class="side-nav">
          <span>Main Menu</span>
          <a href="admin-dashboard.php"  >Admin Dashboard</a>
          <a href="incidents.php" class="active">Incident Reports</a>
          <a href="manage-users.php">Manage users</a>
          
  
          <div class="links">
            <span></span>
            <!-- <a href="metrics.html">Metrics</a> -->
            <a href="../pages/logout.php">Logout</a>
          </div>
        </div>
      </nav>
      <div class="main-body">
        <div class="history_lists">
          <div class="list1">
            <div class="row">
              <h2 class="sub-page-title">Incident reports</h2>
            </div>
            <table>
              <thead>
                <tr>
                
                <th>Incident ID</th>
                  <th>Incident type</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  <th>Description</th>
                  <th>Reported by</th>
                  <th>Assigned Vehicle</th>
                </tr>
              </thead>
              <tbody>
              <?php

              $file = fopen("../csv/incidents.csv", "r");
              $t = 0;
              
              while (($row = fgetcsv($file)) !== false) {
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
                echo '<tr style="height:50px;">';
                echo '<td>' . $incident_id.'</td>' ;
                echo '<td>' . $incident_type.'</td>' ;
                echo '<td>' . $date.'</td>' ;
                echo '<td>' . $time.'</td>' ;
                echo '<td>' . $location.'</td>' ;
                echo '<td>' . $description.'</td>' ;
                echo '<td>' . $reported_by.'</td>' ;
                if($assigned_vehicle == "none") {
                  echo '<td>
                  <br><form action="scripts/assign.php" method="POST" id="assign-form-'.$incident_id.'">
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
            
            ?>
                
              </tbody>
            </table>
          </div>
    
          
        
    </div>
    <script>
      function assign(a){
              document.getElementById("assign-form-" + a).submit();    
          
  
      }
  </script>
  </body>
  </html>
  </span>