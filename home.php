<?php
include('checkSession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to admin panel</title>
    <!--Javascript code to check if the user is active or not-->
    <!--If the user is not active for 60 seconds than the user will be logged out automatically and redirected to the login page -->
    <script type="text/javascript">
    console.log(<?php echo $_SESSION['timestamp'] ?>);
        function checkUserActivity() {
            var t;

            // If the user is active
            window.onmousemove = resetTimer;
            window.onmousedown = resetTimer;
            window.onclick = resetTimer;
            window.onscroll = resetTimer;
            window.onkeypress = resetTimer;


            //function to reset the timer
            function resetTimer() {
                //Reset the timestamp session, it will helpfull when the user closed the window and open the window
                //after 60 seconds than the user will be logged out and redirected to the login page 
                <?php $_SESSION['timestamp'] = time(); ?>
                
                //clear the previous setTimeout and reset the timer
                clearTimeout(t);
                t = setTimeout(() => {
                    window.location.href = "logout.php";
                }, 60000);

            }
        }
        checkUserActivity();
    </script>

</head>
<body>
    <h1>Welcome <?php echo $_SESSION['user']; ?> </h1>
    <p></p>
    <a href="logout.php">Logout</a>
</body>
</html>