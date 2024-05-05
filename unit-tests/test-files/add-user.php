<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $dateOfBirth = $_POST["date-of-birth"];
    $email = $_POST["email"];
    $permission = $_POST["permission"];
    $usersFile = fopen("../../csv/a.csv", "a");
    fwrite($usersFile, $username . ',' . $password . ','.$permission.',' . $firstName . ','  . $lastName . ','  . $email . ','  . $dateOfBirth . "\n");
    fclose($usersFile);
    
?>