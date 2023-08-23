<?php

$q = isset($_GET['q']) ? $_GET['q'] : '';

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

$sql = "SELECT *
            FROM user 
        WHERE 
            username LIKE '%". $q ."%'
        OR
            userole LIKE '%". $q ."%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    //Array
    $arr = [];
    while($row = $result->fetch_assoc()) {
    //    echo $row["first_name"]. " " . $row["last_name"] . '<br />';
        $arr[] = [
            'username'            => $row['username'],
            'password'    => $row['password'], 
            'userole'     => $row['userole'],
            'status'    => $row['status']
        ];
    }
    // print_r($arr);
    echo json_encode($arr);
    return;
} else {
//   echo "0 results";
    echo json_encode([]);
    return;
}
$conn->close();