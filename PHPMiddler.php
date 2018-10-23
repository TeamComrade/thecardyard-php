<?php

/*
 * Purpose: Middler between Android and MySQl
 * Author:
 * Date:
 */

/**
 * Description of PHPMiddler
 *
 * @author Zach-Win
 */

#IP USER PASS

$username = $_POST['user'];
$password = $_POST['password'];
$dbName = $_POST['DBNAME'];
$SQL = $_POST['SQL'];



$o = new PHPMiddler($username,$password,$dbName);

class PHPMiddler {
    private $con;
    private $data;
    public function __construct($username, $password, $dbName) {
        $this->con = mysqli_connect("172.16.176.104", $username, $password, $dbName);
        
        if(mysqli_connect_errno($this->con)){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    
    public function __destruct() {
        mysqli_close($this->con);
    }


    public function selectAll(){
        $result = mysqli_query($con, "SELECT * FROM CARDS");
        $row = mysqli_fetch_array($result);
        $this->data = $row[0];
        
    }
    
    public function closeConnection(){
        mysqli_close($this->con);
    }
    
    public function exfilData(){
        if($this->data){
            echo $data;
        }
        echo NULL;
    }
}
