<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Content-Type: application/json; charset=UTF-8");

    // include_once './database.php';


    

    
class Database
{
  private $server;
  private $username;
  private $password;
  private $database;
  private $port;

  public function connect()
  {
    // echo __DIR__.'/../env.php';
    // include(__DIR__.'/../../env.php');
    $env_server = "localhost:3306";
    $env_username = "root";
    $env_password = "";
    $env_database = "task";
    $env_port = "3306";

    $this->server = $env_server;
    $this->username = $env_username;
    $this->password = $env_password;
    $this->database = $env_database;
    $this->port = $env_port;
    // echo $env_database;
    $conn = new mysqli($this->server, $this->username, $this->password, $this->database, $this->port);
    return $conn;
  }
}
    // include_once './apiFunc.php';
    $method = $_SERVER['REQUEST_METHOD'];



function submitReg()
{
    // echo "<script>alert('aa')</script>";
// echo "ertyt";
    $database = new Database();
    // print_r($database);
    $db = $database->connect();
    // print_r($db);
// echo $db;
    $fName = $_POST["fName"];
    $lName =  $_POST["lName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];

    // echo "qwewredtffsfgdhfdrafdf";

    $sql = "INSERT INTO `courseReg` (`fName`, `lName`, `email`, `phone`, `gender` , `course`) VALUES ('$fName', '$lName', '$email','$phone','$gender','$course');";
    // print_r($sql);
    // echo json_encode($sql);
        if ($db->query($sql) == true) {
            echo json_encode(
                array('message' => 'Form has been submitted')
            );
        } else {
            echo json_encode(
                array('message' => 'Internal Server Error. Try Again')
            );
        }

};
function getAllStudent(){
    $database = new Database();
    $db = $database->connect();
    $query = "SELECT * FROM courseReg";
    $result = mysqli_query($db,$query);

    if (mysqli_num_rows($result)>0) {

        // Post array
        $posts_arr = array();

        while ($row = $result->fetch_assoc()) {
            //    echo $row;
            $post_item = array(
                'id' => $row["id"],
                'fName' => $row["fName"],
                'lName' => $row["lName"],
                'email' => $row["email"],
                'phone' => $row["phone"],
                'gender' => $row["gender"],
                'course' => $row["course"],
            );
            // Push to "data"
            array_push($posts_arr, $post_item);
        }

        // Turn to JSON & output
        $sendResponse = json_encode($posts_arr);

        echo $sendResponse;

    } else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
 
};
function getWebStudent(){
    $database = new Database();
    $db = $database->connect();
    $query = "SELECT * FROM courseReg WHERE course='Web Development'";
    $result = mysqli_query($db,$query);

    if (mysqli_num_rows($result)>0) {

        // Post array
        $posts_arr = array();

        while ($row = $result->fetch_assoc()) {
            //    echo $row;
            $post_item = array(
                'id' => $row["id"],
                'fName' => $row["fName"],
                'lName' => $row["lName"],
                'email' => $row["email"],
                'phone' => $row["phone"],
                'gender' => $row["gender"],
                'course' => $row["course"],
            );
            // Push to "data"
            array_push($posts_arr, $post_item);
        }

        // Turn to JSON & output
        $sendResponse = json_encode($posts_arr);

        echo $sendResponse;

    } else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
 
};
function getAppStudent(){
    $database = new Database();
    $db = $database->connect();
    $query = "SELECT * FROM courseReg WHERE course='App Development'";
    $result = mysqli_query($db,$query);

    if (mysqli_num_rows($result)>0) {
        // Post array
        $posts_arr = array();

        while ($row = $result->fetch_assoc()) {
            //    echo $row;
            $post_item = array(
                'id' => $row["id"],
                'fName' => $row["fName"],
                'lName' => $row["lName"],
                'email' => $row["email"],
                'phone' => $row["phone"],
                'gender' => $row["gender"],
                'course' => $row["course"],
            );
            // Push to "data"
            array_push($posts_arr, $post_item);
        }

        // Turn to JSON & output
        $sendResponse = json_encode($posts_arr);

        echo $sendResponse;

    } else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
 
};
function getDesignStudent(){
    $database = new Database();
    $db = $database->connect();
    $query = "SELECT * FROM courseReg WHERE course='Graphic Designing'";
    $result = mysqli_query($db,$query);

    if (mysqli_num_rows($result)>0) {

        // Post array
        $posts_arr = array();

        while ($row = $result->fetch_assoc()) {
            //    echo $row;
            $post_item = array(
                'id' => $row["id"],
                'fName' => $row["fName"],
                'lName' => $row["lName"],
                'email' => $row["email"],
                'phone' => $row["phone"],
                'gender' => $row["gender"],
                'course' => $row["course"],
            );
            // Push to "data"
            array_push($posts_arr, $post_item);
        }

        // Turn to JSON & output
        $sendResponse = json_encode($posts_arr);

        echo $sendResponse;

    } else {
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
 
};


$q = $_GET['q'];
// echo $q;
switch ($q) {
    case 'checkCred':
        checkCred();
        break;
    case 'submitReg':
        submitReg();
        break;
    case 'getAllStudent':
        getAllStudent();
        break;
    case 'getWebStudent':
        getWebStudent();
        break;
    case 'getAppStudent':
        getAppStudent();
        break;
    case 'getDesignStudent':
        getDesignStudent();
        break;
    default:
        echo "Invalid Query";
}
?>