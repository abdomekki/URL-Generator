<?php
    session_start();
    include "connection.php";

    //class generate rondom string
    class random{
        public $chars;
        public $charlength;
        public $randomString;
        public $length;
        public $shortUrlprefix;


        function __construct($length)
        {
            $this->chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $this->charlength= strlen($this->chars);
            $this->randomString="";
            $this->shortUrlprefix="http://localhost/route/ass6/redirect.php?c=";

            for ($i=0; $i <$length ; $i++) { 
                # code...

                $this->randomString .= $this->chars[rand(0,$this->charlength - 1)];

                
            }
        }//end function

        // concat code to prefix URL
        function toShortUrl($shortUrlprefix,$randomString)
        {
            $shortUrlprefix .= $randomString;
            return $shortUrlprefix;
        }


    } // end class




    


    //call code
    $newRand = new random("6");
    $newRand->randomString;
    
    //call URL
    $longurl=$_GET["longUrl"];
    $id=$_SESSION["id"];
    

    $query1="select longUrl from urls";
    $result = $newconnect->conn->query($query1);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $found=false;
                if($row["longUrl"]==$longurl)
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
                            <h2 style="color: white">This URl Is already Exist!!!</h2>
                            <a href="Home.php" style="text-decoration: none">Go back to Home page</a>
                            <br><br>
                        </form>
        
                    </div>
                <?php
                header("refresh:2;url=home.php");
            }else {
                $shortUrl=$newRand->toShortUrl($newRand->shortUrlprefix,$newRand->randomString);


                        //insert long & short URl in Database
                        $sql = "INSERT INTO urls (longUrl,shortUrl, shortCode,user_id) VALUES ('$longurl','$shortUrl','$newRand->randomString','$id')";
                        
                        if ($newconnect->conn->query($sql) === TRUE) {
                            ?>
                                <div class="cong">
                                    <form>
                                        <h2 style="color: white">New record created successfully !!!</h2>
                                        <a href="Home.php" style="text-decoration: none">Go back to Home page</a>
                                        <br><br>
                                    </form>
                    
                                </div>
                            <?php
                            
                        } else {
                            echo "Error: " . $sql . "<br>" . $newconnect->conn->error;
                        }// end insert into DB

                        

                        header("location:home.php");                
            }


        } else {
            $shortUrl=$newRand->toShortUrl($newRand->shortUrlprefix,$newRand->randomString);


                        //insert long & short URl in Database
                        $sql = "INSERT INTO urls (longUrl,shortUrl, shortCode,user_id) VALUES ('$longurl','$shortUrl','$newRand->randomString','$id')";
                        
                        if ($newconnect->conn->query($sql) === TRUE) {
                            ?>
                                <div class="cong">
                                    <form>
                                        <h2 style="color: white">New record created successfully !!!</h2>
                                        <a href="Home.php" style="text-decoration: none">Go back to Home page</a>
                                        <br><br>
                                    </form>
                    
                                </div>
                            <?php
                            
                        } else {
                            echo "Error: " . $sql . "<br>" . $newconnect->conn->error;
                        }// end insert into DB

                        

                        header("location:home.php");
                        
        }






    

    ?>