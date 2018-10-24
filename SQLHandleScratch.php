<?php


/**
 *
 * Handle as a Go-between for MySQL as a "REST" inteface
 *
 *@author Zachary higgs
 *
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$username = $_GET['username'];
$password = $_GET['password'];
//This points to the Overarching Database name
$Database = $_GET['db'];

echo $username . $password . $Database;

$o = new SQLHandle($username, $password, $Database);
class SQLHandle {

    private $conn;
    private $data;

    public function __construct($username, $password, $db){
        $this->conn = mysqli_connect("localhost", $username, $password, $db);

        if(mysqli_connect_errno($this->conn)){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        //Run a test function, you can replace this internally with a 'Enum'-based function
        $this->testFunc();
    }

    /**
     * Safely destroy this Class
     *
     */
    public function __destruct(){
        mysqli_close($this->conn);
    }
    
    public function testFunc(){
        $result = mysqli_query($this->conn, "SELECT * FROM test;");
        //This is a strange Multi assositive array
        $row = mysqli_fetch_array($result);
        $this->data = $row[0];

        print_r($row);
        echo $this->data;
    }

    public function closeConnection(){
        mysqli_close($this->con);
    }
} 
