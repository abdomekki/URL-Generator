<?php
    include "connection.php";

    $shortcode=$_GET["c"];

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

