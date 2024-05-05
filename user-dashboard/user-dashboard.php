<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <head>
      <title>User Dashboard</title>
      <link rel="stylesheet" href="styling/admin-dashboard-styling.css" />
      <link rel="stylesheet" href="../styling/metrics.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <a href="user-dashboard.php" class="active" >User Dashboard</a>
            <a href="history.php" >User Report History</a>
            <a href="report-incident.php">Report Incident</a>
    
            <div class="links">
            <a href="../pages/logout.php">Logout</a>
          </div>
          
          </div>
        </nav>
    
    <div class="main-body">
          <h2>User Dashboard</h2>
          <div class="promo_card">
            <h1>Welcome to A.R.C.S</h1>
            <div>The police dispatch and reporting system that will revolutionizing law enforcement operations</div>
            <div>Welcome <?php echo $_SESSION["username"];?>!</div>
            <button>Learn More</button>
          </div>
          <div class="main-body">
        <!-- Example Metric Card 1 - Line Chart -->
<div class="metric-card" style="width: 45%;">
  <h2>Incident Reports Over Time</h2>
  <div class="graph">
    <canvas id="incidentReportsLineChart"></canvas>
  </div>
</div>

<!-- Example Metric Card 2 - Bar Chart -->
<div class="metric-card" style="width: 45%;">
  <h2>Dispatch Response Time</h2>
  <div class="graph">
    <canvas id="dispatchResponseBarChart"></canvas>
  </div>
</div>

<!-- JavaScript to create the charts -->
<script>
  // Example data for the graphs
  const incidentReportsData = [20, 35, 45, 60, 30, 25, 40]; // Replace with actual data
  const dispatchResponseData = [10, 20, 15, 25, 30]; // Replace with actual data

  // Function to create a line chart for incident reports over time
  function createIncidentReportsLineChart(containerId, data) {
    const ctx = document.getElementById(containerId).getContext("2d");

    new Chart(ctx, {
      type: "line",
      data: {
        labels: Array.from({ length: data.length }, (_, i) => i + 1),
        datasets: [
          {
            label: "Incident Reports",
            data: data,
            borderColor: "blue",
            borderWidth: 2,
            fill: false,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: "top",
          },
          title: {
            display: true,
            text: "Incident Reports Over Time",
            fontSize: 18,
          },
        },
      },
    });
  }

  // Function to create a bar chart for dispatch response time
  function createDispatchResponseBarChart(containerId, data) {
    const ctx = document.getElementById(containerId).getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: Array.from({ length: data.length }, (_, i) => i + 1),
        datasets: [
          {
            label: "Response Time (minutes)",
            data: data,
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: "top",
          },
          title: {
            display: true,
            text: "Dispatch Response Time",
            fontSize: 18,
          },
        },
      },
    });
  }

  // Ensure the DOM is ready before running the script
  document.addEventListener("DOMContentLoaded", function () {
    try {
      // Create the charts on page load
      createIncidentReportsLineChart("incidentReportsLineChart", incidentReportsData);
      createDispatchResponseBarChart("dispatchResponseBarChart", dispatchResponseData);
    } catch (error) {
      console.error("Error:", error);
    }
  });
</script>
    </body>
    </html>
    </span>