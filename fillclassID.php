<?php

// Get the user id
$classf = $_REQUEST['classf'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($classf !== ""){
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT classID FROM classification WHERE classification ='$classf'");
	$row = mysqli_fetch_array($query);
	// Get the first name
	$class_id = $row["classID"];
	// Get the first name
	
	//$item = $row["ar_id"];

}



// Store it in a array
$result = array("$class_id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
