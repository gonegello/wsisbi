<?php

// Get the user id  
$fund = $_REQUEST['fund'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($fund !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT fundc_id FROM fund_c WHERE fund_cluster ='$fund'");
	$row = mysqli_fetch_array($query);

	// Get the first name
	$fund_id = $row["fundc_id"];
	// Get the first name
	
	//$item = $row["ar_id"];

}



// Store it in a array
$result = array("$fund_id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
