<?php
	include 'connection.php';
	$id=$_POST['id'];
	$sql = "DELETE FROM `user` WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>