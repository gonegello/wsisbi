<?php
ini_set('date.timezone', 'Asia/Manila');
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$passw = randomPassword();
if(!$_POST)
{
    echo json_encode(["code" => 3, "message" => "Invalid request"]);
    return;
}

$usern = $_POST['username'];
$userole = $_POST['userole'];
$dc = $_POST['dc'];
$time_created = $_POST['time_created'];
$created_by = $_POST['created_by'];
$status = $_POST['status'];


$validationMessage = "";
if(empty($usern))
{
    $validationMessage = "Username is required.";
}

  

if(!empty($validationMessage))
{    
    echo json_encode(["code" => 4, "message" => $validationMessage]);
    return;
}
/*
$servername = "localhost";
$username = "root";
$password = "Godknowsme@1810039-2";
$dbname = "wsis";
*/

include "confil.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createdAt =  date("Y-m-d H:i:s");

$sql = "INSERT INTO user 
        (username,password,status,userole,created_by,dc,time_created)
            VALUES
        ('".$usern."','".$passw."', '".$status."', '".$userole."', '".$created_by."', '".$dc."', '".$time_created."');";

$result = $conn->query($sql);

$message = ['code' => 1, 'message' => 'Error adding this record.'];
if($result)
{
    $message = ['code' => 0, 'message' => 'Successfully added'];
    
}

echo json_encode($message);
return;