<?php
 session_start();
    if (!isset($_SESSION["username"])){
        header("location:../../index.php");
    }

    $i = 0;
$arr = [];
$handle = fopen("../../csv/incidents.csv", "r");
$id = $_POST["incident-id"];
$assigned_vehicle = $_POST["assigned-vehicle"];
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {      

    // Inicident ID,Incident type, Date, Time, Location, Description, reported by,Assigned Vehicle
    if ($data[0] == $id) {
        $arr[$i][] = $data[0];          
        $arr[$i][] = $data[1];    
        $arr[$i][] = $data[2];      
        $arr[$i][] = $data[3];    
        $arr[$i][] = $data[4];    
        $arr[$i][] = $data[5];
        $arr[$i][] = $data[6];    
        $arr[$i][] = $assigned_vehicle;
        $i++;
        continue;
    }  
    $arr[$i][] = $data[0];          
        $arr[$i][] = $data[1];    
        $arr[$i][] = $data[2];      
        $arr[$i][] = $data[3];    
        $arr[$i][] = $data[4];    
        $arr[$i][] = $data[5];
        $arr[$i][] = $data[6];    
        $arr[$i][] = $data[7];
    $i++;    
}

// EXPORT CSV
$fp = fopen('../../csv/incidents.csv', 'w');    
foreach ($arr as $rows) {
    fputcsv($fp, $rows);
}    
fclose($fp);

    
  
    header("location:../incidents.php");
?>