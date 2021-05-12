<?php
include('checkSession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to admin panel</title>
    <script>
        setTimeout(() => {
            window.location.reload(1);
        }, 60000);
    </script>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['user']; ?> </h1>
    <p>Wait for the 60 seconds, you will be automatically logged out</p>
    <a href="logout.php">Logout</a>
</body>
</html>