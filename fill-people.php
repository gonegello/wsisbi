<?php

// Get the user id
$custodian = $_REQUEST['custodian'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($custodian !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT idc  FROM people WHERE fullname ='$custodian'");
	$row = mysqli_fetch_array($query);

	// Get the first name
	$idc = $row["idc"];
	// Get the first name


}

// Store it in a array
$result = array("$idc");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
