<?php
    $severName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "login-system";

    $conn = mysqli_connect($severName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>