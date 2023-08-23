<?php

// Get the user id
$gen = $_REQUEST['gen'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($gen !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT unit, typeid FROM gen WHERE gen ='$gen'");
	$row = mysqli_fetch_array($query);

	// Get the first name
	$unit = $row["unit"];
	// Get the first name
	
	$typeid = $row["typeid"];

}



// Store it in a array
$result = array("$unit", "$typeid");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
