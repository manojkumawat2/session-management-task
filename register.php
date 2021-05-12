<?php
session_start();
include('config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password1 = md5($_POST['password1']);
    $password2 = md5($_POST['password2']);
    $_SESSION['mess'] = "Message";
    if($password1 != $password2){
        $_SESSION['mess'] = "Password is not matching!";
        header("Location: index.php");
        exit();
    }
    //Check If the user is already exist or not
    $alreadyExist = "SELECT * FROM users WHERE email = '".$email."'";
    if($alreadyExist->num_rows > 0){
        $_SESSION['mess'] = "User Already Exist!";
        header("Location: index.php");
        exit();
    }
    //Now insert this new data into the database
    $insertNewData = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password1')";
    $isDataInserted = $conn->query($insertNewData);
    if($isDataInserted){
        $_SESSION['user'] = $email;
        $_SESSION['timestamp']=time();
        header('Location: home.php');
        exit(0);
    }
    else{
        $_SESSION['mess'] = "Please Try Again!";
        header("Location: index.php");
        exit();
    }
}

?>
