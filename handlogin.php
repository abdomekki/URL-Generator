<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/handreg.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
<?php
    session_start();
    include "connection.php";
    $email=$_POST["username"];
    $pass=$_POST["password"];

    $sql="SELECT * FROM users";
    $result = $newconnect->conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found=false;
        if($row["email"]==$email && $row["pass"]==$pass)
                {
                    $found=true;
                    $_SESSION["id"]=$row["user_id"];
                    
                    break;
                }
    }
    if($found==true)
            {
                $_SESSION["username"]=$email;
                $_SESSION["pass"]=$pass;
                
                ?>
                    <div class="cong">
                        <form>
                            <h2 style="color: white">Congratulations you login successfully!!!</h2>
                            <a href="index.php" style="text-decoration: none">Go back to login page</a>
                            <br><br>
                        </form>
        
                    </div>
                <?php
                header("location:home.php");
            }else {
                
                ?>
                    <div class="cong">
                        <form>
                            <h2 style="color: white">Email Or Password are Wrong , Please Try again!!!</h2>
                            <a href="index.php" style="text-decoration: none">Go back to login page</a>
                            <br><br>
                        </form>
        
                    </div>
                <?php
                header("refresh:3;url=index.php");

            }



} 




?>



</body>
</html>