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
        $email=$_POST["email"];
        $pass=$_POST["pass"];

        
        

        $sql="INSERT INTO `users`( `email`, `pass`) VALUES ('$email','$pass')";
        $query="SELECT * FROM users";

        $result = $newconnect->conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $found=false;
                if($row["email"]==$email)
                {
                    $found=true;
                    break;
                    
                }
                
            }
            if($found==true)
            {
                ?>
                    <div class="cong">
                        <form>
                            <h2 style="color: white">This Email are already Exist!!!</h2>
                            <a href="index.php" style="text-decoration: none">Go back to login page</a>
                            <br><br>
                        </form>
        
                    </div>
                <?php
                header("refresh:2;url=index.php");
            }else {
                # code...
                if ($newconnect->conn->query($sql) === TRUE) {
                    ?>
                    <div class="cong">
                        <form>
                            <h2 style="color: white">Congratulations you Register successfully!!!</h2>
                            <a href="index.php" style="text-decoration: none">Go back to login page</a>
                            <br><br>
                        </form>
        
                    </div>
                <?php
                header("refresh:2;url=index.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $newconnect->conn->error;
                }
            }

        }else {
            if ($newconnect->conn->query($sql) === TRUE) {
                ?>
                <div class="cong">
                    <form>
                        <h2 style="color: white">Congratulations you Register successfully!!!</h2>
                        <a href="index.php" style="text-decoration: none">Go back to login page</a>
                        <br><br>
                    </form>
    
                </div>
            <?php
            header("refresh:2;url=index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $newconnect->conn->error;
            }
        }
    ?>

</body>
</html>