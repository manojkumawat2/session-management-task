<?php
session_start();
include('config.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $checkUser = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
    $isUserExist = $conn->query($checkUser);
    if($isUserExist->num_rows > 0){
        $_SESSION['user'] = $email;
        $_SESSION['timestamp']=time();
        header("Location: home.php");
        exit(0);
    }
    else{
        $_SESSION['mess'] = "You have entered wrong credentials!";
        header("Location: index.php");
        exit();
    }
}

?>