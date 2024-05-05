<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
  <head>
    <title>History</title>
    <link rel="stylesheet" href="styling/admin-dashboard-styling.css" />
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
            <a href="user-dashboard.php" >User Dashboard</a>
            <a href="history.php" class="active">User Report History</a>
            <a href="report-incident.php">Report Incident</a>
            <div class="links">
            <a href="../pages/logout.php">Logout</a>
          </div>
          
          </div>
        </nav>
      <div class="main-body">
        <div class="history_lists">
          <div class="list1">
            <div class="row">
              <h2 class="sub-page-title">My reports</h2>
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
                if($reported_by != $_SESSION['username']){
                  continue;
                }
                echo '<tr>';
                echo '<td>' . $incident_id.'</td>' ;
                echo '<td>' . $incident_type.'</td>' ;
                echo '<td>' . $date.'</td>' ;
                echo '<td>' . $time.'</td>' ;
                echo '<td>' . $location.'</td>' ;
                echo '<td>' . $description.'</td>' ;
                echo '</tr>';
              }
            
            ?>
               
                
                
              </tbody>
            </table>
          </div>
    
          
        
    </div>
  </body>
  </html>
  </span>