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
        $old_pass=$_POST["oldpass"];
        $new_pass=$_POST["newpass"];
        $sql="UPDATE `users` SET `pass`=$new_pass WHERE email ='$email'";
        $query="SELECT * FROM users";

        $result = $newconnect->conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $found=false;
                if($row["email"]==$email && $row["pass"]==$old_pass)
                {
                    $found=true;
                    break;
                    
                }
                
            }
            if($found==true)
            {
                if ($newconnect->conn->query($sql) === TRUE) {
                    ?>
                        <div class="cong">
                            <form>
                                <h2 style="color: white">Congratulations you update password successfully!!!</h2>
                                <a href="index.php" style="text-decoration: none">Go back to login page</a>
                                <br><br>
                            </form>
            
                        </div>
                    <?php
                    header("refresh:2;url=index.php");
                } else {
                    echo "Error updating record: " . $newconnect->conn->error;
                }
                header("refresh:2;url=index.php");
            }
            else {
                # code...
                ?>
                        <div class="cong">
                            <form>
                                <h2 style="color: white">Email Or password are Wrong, Please try again!!!</h2>
                                <a href="index.php" style="text-decoration: none">Go back to login page</a>
                                <br><br>
                            </form>
            
                        </div>
                    <?php
                    header("refresh:2;url=index.php");
            }

        }else {
            ?>
                        <div class="cong">
                            <form>
                                <h2 style="color: white">Email Or password are Wrong, Please try again!!!</h2>
                                <a href="index.php" style="text-decoration: none">Go back to login page</a>
                                <br><br>
                            </form>
            
                        </div>
                    <?php
                    header("refresh:2;url=index.php");
        }


    ?>

</body>
</html>