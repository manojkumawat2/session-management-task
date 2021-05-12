<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "task";

$conn = new mysqli($host, $username, $password, $db) or die($conn);

if($conn->connect_error){
    die("Connection Field: ".$conn->connect_error);
}

?>