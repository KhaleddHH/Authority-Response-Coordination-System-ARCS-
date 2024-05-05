<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
  <head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../user-dashboard/styling/progress-bar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
          <a href="incidents.php" >Incident Reports</a>
          <a href="manage-users.php">Manage users</a>
          
  
          <div class="links">
            <span></span>
            <!-- <a href="metrics.html">Metrics</a> -->
            <a href="../pages/logout.php">Logout</a>
          </div>
        </div>
      </nav>
  
      <div class = "container2">
        <div class = "container-bar">
          <div class = "progress-bar"> 
            <div class = "details">
              <div class = "order">
                <h1>Inicident <span> #<?php
                  $incident_id = $_GET['incident-id'];
                  echo $incident_id;
                ?></span></h1>
              </div>
              <div class = "date">
                <p>Expected Arrival: <?php
                  $incident_id = $_GET['incident-id'];
                  $random = ($incident_id + 10)%15 + 2;
                  echo $random;
                ?> minutes</p>
                <p>Incident type <b> <?php
                  $incident_type = $_GET['incident-type'];
                  echo $incident_type;
                ?></b></p>
              </div>

             
              
            </div>
           
          </div>
        </div>
      <div id="map"></div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
      <script>
          const map = L.map('map').setView([40, -74.5], 9);
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '© OpenStreetMap contributors'
          }).addTo(map);
    
          const truckIcon = L.icon({
              iconUrl: '../user-dashboard/images/car.png', 
              iconSize: [32, 32],
              iconAnchor: [16, 16],
              popupAnchor: [0, -16],
          });
    
          const truckMarker = L.marker([40, -74.5], { icon: truckIcon }).addTo(map);
    
          function moveTruck() {
              const truckLatLng = truckMarker.getLatLng();
              const newLng = truckLatLng.lng - 0.001;
              const newLatLng = L.latLng(truckLatLng.lat, newLng);
              truckMarker.setLatLng(newLatLng);
              setTimeout(moveTruck, 1000); 
          }
    
          moveTruck();
      </script>














  </body>
  </html>
  </span>