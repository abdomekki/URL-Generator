<?php
    session_start();
    include "connection.php";
    if(isset($_SESSION["username"]))
    {
        $shortcode=$_GET["c"];
        if(isset($shortcode))
        {

        $sql = "SELECT longUrl from urls where shortCode='$shortcode'";
            $result = $newconnect->conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    header("location:https://".$row["longUrl"]."");
                }                
            } else {
                echo "0 results";
            }
        }else {
            header("location:home.php");
        }
    }else {
        header("location:index.php");
    }
