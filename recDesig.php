<?php

// Get the user id
$received = $_REQUEST['received'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($received !== "") {
	
		
	$query = mysqli_query($conn, "SELECT idc,position FROM people WHERE fullname ='$received'");
	$row = mysqli_fetch_array($query);

	$position = $row["position"];
	$idc = $row["idc"];

}



// Store it in a array
$result = array("$position","$idc");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
