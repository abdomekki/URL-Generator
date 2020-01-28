<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>LogIn</title>
</head>
<body>
    <?php 
        session_start();
        include "connection.php";
        if(empty($_SESSION["username"]))
        {
    ?>

    <div class="signin">

            <form action="handlogin.php" method="post">
                <h2>Log In</h2>

                <input type="email" name="username" placeholder="Email" required/><br /><br />
                <input type="password" name="password" placeholder="Password" required /><br /><br />
                <input type="submit" value="Log In" name="login" class="login-btn"/>
                <br /><br />

                    <div id="container-form">
                        <a href="reset.php" class="reset" >Reset password?</a>
                        
                        </div>
                        <br /><br /><br /><br /><br /><br />
                Don't have account?<a href="signup.php" style="font-family:'Play', sans-serif;">&nbsp;Sign Up</a>

            </form>



            
    </div>
    <?php
        }else {
            header("location:home.php");
        }
    ?>

</body>
</html>