<?php

// testing for signup/login page separately

$serverName = "mariadb";
$dbUsername = "cs431s20";
$dbPassword = "ohShier8";
$dbName = "cs431s20";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
