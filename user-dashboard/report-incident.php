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
            <a href="history.php">User Report History</a>
            <a href="report-incident.php" class="active">Report Incident</a>
    
            <div class="links">
            <a href="../pages/logout.php">Logout</a>
          </div>
          </div>
        </nav>
      <div class="main-body">
        <div class="history_lists">
          <div class="list1">
            <div class="row">
              
            </div>
            <div class="report-form">
              <h1>Report Incident</h1>
              <form action="report.php" method="POST" id="submit-form">
               
                      
                <label for="incident-type">Incident Type</label>
                <br>
                <select name="incident-type" id="incident-type" class="text-field">
                  <option value="Accident">Accident</option>
                  <option value="Theft">Theft</option>
                  <option value="Assault">Assault</option>
                  <option value="Vandalism">Vandalism</option>
                  <option value="Burglary">Burglary</option>
                  <option value="Suspicious Activity">Suspicious Activity</option>
                  <option value="Domestic Dispute">Domestic Dispute</option>
                  <option value="Missing Person">Missing Person</option>
                  <option value="Drug-related Incident">Drug-related Incident</option>
                  <option value="Noise Complaint">Noise Complaint</option>
                </select>
                <br>
                
                <label for="date">Date</label>
                <br>
                <input type="date" name="date" id="date" class="text-field">
                <br>
                
                <label for="time">Time</label>
                <br>
                <input type="time" name="time" id="time" class="text-field">
                <br>
                
                <label for="location">Location</label>
                <br>
                <input type="text" name="location" id="location" class="text-field">
                <br>
                
                <label for="description">Description</label>
                <br>
                <textarea name="description" id="description" class="text-field" rows="10"></textarea>
                <br>
                  
                  
                  
                  <input type="button" value="Submit Report" onclick="submit()" id="submit-button" class="submit-button">
              
          </div>
          </div>
    
          
        
    </div>
    <script>
      function submit(){
          var form =document.querySelector("form[id='submit-form']");
          var incident_type = form.elements["incident-type"].value;
          var date = form.elements["date"].value;
          var time = form.elements["time"].value;
          var location = form.elements["location"].value;
          var description = form.elements["description"].value;
          if (incident_type == ""|| date == "" || time == "" || location == ""  || description == "" ){
              alert("All fields must be filled!");
          }else{
              document.getElementById("report-form").submit();   
              alert("Report successfully submitted"); 
          }
          
  
      }
  </script>
  </body>
  </html>
  </span>