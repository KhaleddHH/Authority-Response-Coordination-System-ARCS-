<?php

$username = $_POST["username"];
$password = $_POST["password"];

$file = fopen("../csv/users.csv", "r");

$loggedIn = false;
$access = "";

while (($row = fgetcsv($file)) !== false) {
    if (($username == $row[0]) && ($password == $row[1])) {
        $loggedIn = true;
        $access = $row[2];
        break;
    }
}

fclose($file);


if ($loggedIn) {
    session_start();
    if($access == "admin") {
        header("location:../admin-dashboard/admin-dashboard.php");
    } else {
        header("location:../user-dashboard/user-dashboard.php");
    }
    $_SESSION["username"] = $username;
} else {
    echo '<script>alert("Incorrect username or password");';
    echo 'window.location.href="../index.php";</script>';
}

// if ($username == "user" && $password == "user") {
//     header("location:../user-dashboard/user-dashboard.php");
// } else if ($username == "admin" && $password == "admin") {
//     header("location:../admin-dashboard/admin-dashboard.php");
// }
?>