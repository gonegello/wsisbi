<?php

// Get the user id
$category = $_REQUEST['category'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";

if ($category !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT idcategory FROM category WHERE category_name ='$category'");
	$row = mysqli_fetch_array($query);

	// Get the first name
	$categoryid = $row["idcategory"];
	// Get the first name
	
	//$typeid = $row["typeid"];

}

$result = $categoryid;

// Store it in a array
//$result = array("$categoryid","$date_encoded");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
