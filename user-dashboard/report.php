<?php
 session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }

    $incident_type = $_POST["incident-type"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $incident_file = fopen("../csv/incidents.csv", "a");
    $file = fopen("../csv/incidents.csv", "r");
    $incident_id = 0;
    while (($row = fgetcsv($file)) !== false) {
       
        $incident_id = $row[0];
        
      }
      $incident_id = $incident_id+1;
    fwrite($incident_file, $incident_id.','.$incident_type . ',' . $date . ',' . $time  . ',' . $location  . ',' . $description . ',' . $_SESSION["username"]. ',none' . "\n");
    fclose($incident_file);
    header("location:report-incident.php");
?>