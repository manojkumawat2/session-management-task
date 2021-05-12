<?php

session_start();
if(empty($_SESSION['user'])){
    header("Location: index.php");
}

unset($_SESSION['user']);
unset($_SESSION['timestamp']);

$_SESSION['mess'] = "Your Session has Expired. Please login again.";
header("Location: index.php");

?>