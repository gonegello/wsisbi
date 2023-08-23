<?php

// Get the user id
$approve = $_REQUEST['approve'];

// Database connection
//$con = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");;
include "confil.php";

if ($approve !== "") {
	
		
	$query = mysqli_query($conn, "SELECT idc,position,exten FROM people WHERE fullname ='$approve'");
	$row = mysqli_fetch_array($query);

	$position = $row["position"];
	$idc = $row["idc"];
    $exten = $row['exten'];

}


    $result = array("$position","$idc");


// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
