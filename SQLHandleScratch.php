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
<<<<<<< HEAD
$username = $_POST['username'];
$password = $_POST['password'];
$Database = $_POST['db'];
$Method = $_POST['method'];
$data = $_POST['data'];
if($Method == ''){
    $o = new SQLHandle($username, $password, $Database);
} else{
    $o = new SQLHandle($username, $password, $Database, $Method, $data);
}

=======


$username = $_GET['username'];
$password = $_GET['password'];
//This points to the Overarching Database name
$Database = $_GET['db'];

echo $username . $password . $Database;

$o = new SQLHandle($username, $password, $Database);
>>>>>>> 425964aa3e51eec169fdb671e6e7d23ab88f3de1
class SQLHandle {

    private $conn;
    private $data;

<<<<<<< HEAD
    public function __construct($username, $password, $db, $method = 0, $data = ""){
        $this->conn = mysqli_connect("172.16.176.104", $username, $password, $db);
=======
    public function __construct($username, $password, $db){
        $this->conn = mysqli_connect("localhost", $username, $password, $db);
>>>>>>> 425964aa3e51eec169fdb671e6e7d23ab88f3de1

        if(mysqli_connect_errno($this->conn)){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        //Run a test function, you can replace this internally with a 'Enum'-based function
<<<<<<< HEAD
        if($method == 0){
            $this->testFunc();
        } else if ($method == 1){
            insertData($data);
        }
=======
        $this->testFunc();
>>>>>>> 425964aa3e51eec169fdb671e6e7d23ab88f3de1
    }

    /**
     * Safely destroy this Class
     *
     */
    public function __destruct(){
        mysqli_close($this->conn);
    }
    
    public function testFunc(){
<<<<<<< HEAD
        $result = mysqli_query($this->conn, "SELECT * FROM players;");
        //This is a strange Multi assositive array
        $row = mysqli_fetch_array($result);
        $this->data = json_encode($row);
        echo $this->data;
    }
    
    public function insertData($data){
        mysqli_stmt_execute("INSERT INTO CARDS(cardJson) VALUES(" . $data . ");");
    }
=======
        $result = mysqli_query($this->conn, "SELECT * FROM test;");
        //This is a strange Multi assositive array
        $row = mysqli_fetch_array($result);
        $this->data = $row[0];

        print_r($row);
        echo $this->data;
    }
>>>>>>> 425964aa3e51eec169fdb671e6e7d23ab88f3de1

    public function closeConnection(){
        mysqli_close($this->con);
    }
} 
