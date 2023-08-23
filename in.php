<?php
session_start();
include "connection.php";

$username=$_POST['username'];
$password=$_POST['password'];

// clean the strings 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

//----------------- FIND USERNAME AND PASSWORD ------------------------------
$sql="SELECT * FROM `user` WHERE username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
// mysqli_num_rows is counting table row

//----------------- IF USER EXIST ------------------------------
if(mysqli_num_rows($result) > 0){
    $rows = mysqli_fetch_array($result);
    $_SESSION['id']=$rows['id']; //GET USER ID
    //
    $userid=$_SESSION['id']; //FOR ACTIVITY LOG


//Direct pages with different user levels

if ($rows['userole'] == 'admin'){
	$acheck="SELECT * FROM `user` WHERE user_id='$userid'";
	$ares=mysqli_query($conn,$acheck);

	if(mysqli_num_rows($ares) > 0)
	{
		header('location:dashboard.php');
}

}
else
if ($rows['userole'] == 'client') {
	$acheck="SELECT * FROM `clients` WHERE user_id='$userid'";
	$ares=mysqli_query($conn,$acheck);

	if(mysqli_num_rows($ares) > 0) //if client already exists save login info and direct to client dashboard
	{
		mysqli_query($conn,"insert into `user_log` (activity,clientid) values('$activity','$clientid')");
		header('location:cli-dash.php');
	
	
}
else{
	//if not insert null data
	mysqli_query($conn,"insert into `clients` (fullname,contact_n,department,designation,user_id) values('$fullname','$contact_n','$department','$designation','$userid')");
	header('location: cli-dash.php'); 
}


 
} 
else
if ($rows['userlevel'] == 'StoreKeeper') {
	header('location: a-accounts.php'); //user 3 
	session_register("username");
	session_register("password"); 
 
} 

else
{ 
	$_SESSION['message']="User not found!";
	header('location:ulogin.php');
} 
}

?>