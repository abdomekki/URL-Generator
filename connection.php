<?php



class connection{
    
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;


    function __construct($servername, $username, $password,$dbname)
    {
        $this->conn = new mysqli($servername, $username, $password,$dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
    }

}


$newconnect =new connection("localhost","root","","url_g");


?>