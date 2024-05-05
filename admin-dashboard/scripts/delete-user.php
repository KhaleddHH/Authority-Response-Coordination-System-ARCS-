<?php
 session_start();
    if (!isset($_SESSION["username"])){
        header("location:../../index.php");
    }

    $i = 0;
$arr = [];
$handle = fopen("../../csv/users.csv", "r");
$user = $_GET["user"];
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {      

    //skip all instances of user (passed through GET request) from being written into file
    if ($data[0] == $user) {
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
$fp = fopen('../../csv/users.csv', 'w');    
foreach ($arr as $rows) {
    fputcsv($fp, $rows);
}    
fclose($fp);

    
  
    header("location:../manage-users.php");
?>