<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/home.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>URl Generator</title>
</head>
<body class="py-4">
    <div class="form-group"> 
        <form action="logout.php" method="post" class="float-right mr-3" >
            <input type="submit" name="logout" value="Log out" class="btn btn-outline-danger  mb-2" >
        </form>
    </div>    
    <div  class="container" >
        <div class="m-auto text-center">
    <?php
        session_start();
        include "connection.php";
        if(isset($_SESSION["username"]))
        {

    ?>
    <div class="form-group">
        <form action="handgen.php" method="get">
            <input type="text"  name="longUrl" placeholder="Enter URL Here..."  class="form-control" required>
            <br>    
            <input type="submit" name="generate" value="Generate" class="btn btn-outline-primary btn-lg mb-2">
        </form>
        

    </div>
    

    <?php
        
        $id=$_SESSION["id"];
        $sql = "SELECT * FROM urls where user_id='$id'";
        $result = $newconnect->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                 
                ?>
                    <div class="list-group mb-2">
                        <a href="<?php echo $row["shortUrl"] ?>" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo  $row["longUrl"] ?></h5>
                            
                            </div>
                            <p class="mb-1"><?php echo  $row["shortUrl"] ?></p>
                            
                        </a>
                    </div>
                <?php

            }
        } else {
            echo "0 results";
        }


        }
        else {
            # code...
            ?>
                        <div class="cong">
                            <form>
                                <h2 style="color: white">Please Login !!!</h2>
                                <a href="index.php" style="text-decoration: none">Go back to login page</a>
                                <br><br>
                            </form>
            
                        </div>
                    <?php
            header("refresh:2;url=index.php");
            
        }    
    ?>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>