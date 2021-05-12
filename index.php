<?php
session_start();
//First check if the user logged in or not
//If not than ask the user to login first before accessing a particular page
if(isset($_SESSION['user'])){
    $expireTime = 60;

    if((time() - $_SESSION['timestamp']) >= $expireTime){
        header("Location: logout.php");
        exit();
    }
    else{
        $_SESSION['timestamp'] = time();
        header("Location: home.php");
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manoj Kumawat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!---Top Navbar-->
    <nav class="navbar navbar-light fixed-top bg-light shadow-sm p-3 mb-5 bg-body rounded">
        <div class="container logo" style="text-align: center;">
            <a class="navbar-brand" href="#">
              <img src="img/logo.png" alt="" height="35">
            </a>
        </div>
    </nav>

    <!---Login and Register Form-->
    <div class="container login_register">
    <!---Show Errors to the users---->
    <?php 
    if(isset($_SESSION['mess'])){

    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['mess']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } 
    unset($_SESSION['mess']); 
    ?>

        <div class="row gx-5 gy-5">
            <div class="col-md card shadow-sm p-3 mb-5 bg-body rounded">
                <h3 style="text-align: center; padding: 4px;">Login</h3>
                <hr>
                <!---Login Form Start-->
                <form action="login.php" method="POST" autocomplete="on">
                    <!---Email Input----->
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <!----Password Input---->
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <!---Login Submit Button--->
                    <button type="submit" name="submit" class="mt-3 btn btn-success">Login</button>
                </form>
                <!---Login Form End-->
            </div>
            <div class="col-md card shadow-sm p-3 mb-5 bg-body rounded">
                <h3 style="text-align: center; padding: 4px;">Register</h3>
                <hr>
                <!---Register Form Start-->
                <form action="register.php" method="POST">
                    <!---Name Input--->
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name" required>
                        <label for="floatingInput">Enter Name</label>
                    </div>
                    <!---Email Input--->
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <!----Password Input---->
                    <div class="form-floating">
                        <input type="password" name="password1" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <!----Confirm Input---->
                    <div class="form-floating mt-3">
                        <input type="password" name="password2" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
                        <label for="floatingPassword">Confirm Password</label>
                    </div>
                    <!---Register Submit Button--->
                    <button type="submit" name="submit" class="mt-3 btn btn-success">Register</button>
                </form>
                <!---Register Form End-->
            </div>
        </div>
    </div>
</body>
</html>