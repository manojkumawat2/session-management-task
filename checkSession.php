<?php 
session_start();
//First check if the user logged in or not
//If not than ask the user to login first before accessing a particular page
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$expireTime = 60;

if((time() - $_SESSION['timestamp']) >= $expireTime){
    header("Location: logout.php");
    exit();
}
else{
    $_SESSION['timestamp'] = time();
}

?>