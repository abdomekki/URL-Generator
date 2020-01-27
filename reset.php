<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="reset">

    <form action="handreset.php" method="post">
        <h2 align="center" style="color:#fff;">Reset password</h2>
        <input type="email" name="email" placeholder="Email" /><br /><br />
        <input type="password" name="oldpass" placeholder="Old password" /><br /><br />
        <input type="password" name="newpass" placeholder="New password" /><br /><br />
        <input type="submit" class="save-btn" value="Save" onclick="myFunction()"/><br /><br />
        <a href="index.php" style="text-decoration:none;">Go back to login page</a><br /><br />
        <div id="msg">Your password changed successfully!!</div>
    </form>
</div>




<script src="js/reset.js">
</body>
</html>