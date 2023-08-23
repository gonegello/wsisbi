<?php
	include('connection.php');
	
	if(ISSET($_POST['submit'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userole = $_POST['userole'];
		
		mysqli_query($conn, "UPDATE `user` SET `username` = '$username', 
		`password` = '$password', `userole` = '$userole' WHERE `id` = '$id'") or die(mysqli_error());

		header("location: accounts.php");
	}
?>