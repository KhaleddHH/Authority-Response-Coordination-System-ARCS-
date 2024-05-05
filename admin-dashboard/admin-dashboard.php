
<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
  <head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styling/admin-dashboard-styling.css" />
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
          <a href="admin-dashboard.php" class="active" >Admin Dashboard</a>
          <a href="incidents.php" >Incident Reports</a>
          <a href="manage-users.php">Manage users</a>
          
  
          <div class="links">
            <span></span>
            <!-- <a href="metrics.html">Metrics</a> -->
            <a href="../pages/logout.php">Logout</a>
          </div>
        </div>
      </nav>
  
  <div class="main-body">
        <h2>Admin Dashboard</h2>
        <div class="promo_card">
          <h1>Hello <?php echo $_SESSION["username"];?>! Welcome to A.R.C.S.</h1>
          <div>The police dispatch and reporting system that will revolutionizing law enforcement operations</div>
          <button>Learn More</button>
        </div>
  
        <div class="history_lists">
          
          <div class="list1" style="width: 100%;">
            <div class="row">
              
              <h2 class="sub-page-title">Incident history</h2>
              
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
                  <th>Reported By</th>
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
                $incident_id =  $row[0];
                $incident_type =  $row[1];
                $date =  $row[2];
                $time =  $row[3];
                $location =  $row[4];
                $description =  $row[5];
                $reported_by =  $row[6];
                echo '<tr>';
                echo '<td>' . $incident_id.'</td>' ;
                echo '<td>' . $incident_type.'</td>' ;
                echo '<td>' . $date.'</td>' ;
                echo '<td>' . $time.'</td>' ;
                echo '<td>' . $location.'</td>' ;
                echo '<td>' . $description.'</td>' ;
                echo '<td>' . $reported_by.'</td>' ;
                echo '</tr>';
              }
            
            ?>
                
              </tbody>
            </table>
            <a href="incidents.php" style="float: right";>See all</a>
          </div>
  
          

    </div>
  </body>
  </html>
  </span>