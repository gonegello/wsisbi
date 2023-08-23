<?php

// Get the user id
$cert = $_REQUEST['cert'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($cert !== "") {
	
		
	$query = mysqli_query($conn, "SELECT idc,position FROM people WHERE fullname ='$cert'");
	$row = mysqli_fetch_array($query);

	$position = $row["position"];
	//$office = $row["office"];
	$idc = $row["idc"];


	

}




// Store it in a array
$result = array("$position","$idc");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
