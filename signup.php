<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/signup.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        include "connection.php";
        if(empty($_SESSION["username"]))
        {
    ?>
    <div class="signup">
        <form action="handreg.php" method="post">
        <h2 style="color: #fff;">Sign Up</h2>
        <input type="text" name="username" placeholder="First name" required><br><br>
        <input type="text" name="username" placeholder="Last name" required><br><br>
        <input type="password" name="pass" placeholder="Password" required><br><br>      
        <input type="email"  name="email" placeholder="Email address" required><br><br> 
        <input type="submit" value="Sign up" name="signup" class="regist-btn"  onclick="myFunction()"/> <br><br>
        
            <div id="msg">Congratulations You Sign Up successfully!!</div>

            Already have account?<a href="index.php" style="text-decoration: none; font-family: 'Play', sans-serif; color: yellow;">&nbsp;Log In</a>

        </form>
    </div>
    <?php
        }else {
            header("location:home.php");
        }
    ?>

    <script src="js/signup.js">
</body>
</html>