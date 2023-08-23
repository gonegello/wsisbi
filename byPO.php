<?php

// Get the client name
$by = $_REQUEST['by'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($by !== "") {
	
		
	$query = mysqli_query($conn, "SELECT idc,position,office FROM people WHERE fullname ='$by'");
	$row = mysqli_fetch_array($query);

	$position = $row["position"];
	$office = $row["office"];
	$idc = $row["idc"];

}

$join = array($position,$office);
$combine = join("/",$join);


// Store it in a array
$result = array("$combine","$idc");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
