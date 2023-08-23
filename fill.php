<?php

// Get the user id
$item = $_REQUEST['item'];

// Database connection
//$conn = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($item !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT unit_meas, ar_id, stock_num FROM fc WHERE combine ='$item'");
	$row = mysqli_fetch_array($query);

	// Get the first name
	$unit = $row["unit_meas"];
	// Get the first name
	
	$item = $row["ar_id"];

	$stock_num = $row['stock_num'];

}



// Store it in a array
$result = array("$unit", "$item", "$stock_num");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
