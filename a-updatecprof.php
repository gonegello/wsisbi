<?php include "connection.php";

$last_update = date("F d, Y");
$last_time = date("h:i A ");

//lastname,firstname,m_initial,position,office,stat,fullname, exten,last_update,last_time,user_id,profile,contact_n - people table
$username = $_POST['username'];
$password = $_POST['password'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$m_initial = $_POST['m_initial'];
$exten = $_POST['exten'];

$office = $_POST['office'];
$contact_n = $_POST['contact_n;'];
$userid = $_POST['user_id'];


$join = array($_POST['firstname'],$_POST['m_initial'],$_POST['lastname']);
$fullname = join(" ",$join);

$act = "Updated";
$details = "Profile Info";


//mysqli_query($conn,"insert into `adminlog`(fullname,activity,details,user_id) values ('$fullname','$act','$details','$userid')");

mysqli_query($conn,"UPDATE `user` SET `username` = '$_POST[username]', `password` = '$_POST[password]' WHERE `id` = '$_POST[userid]'")or die(mysqli_error());


mysqli_query($conn,"UPDATE `people` SET `lastname`= '$_POST[lastname]',`firstname` ='$_POST[firstname]',`m_initial` = '$_POST[m_initial]' 
,`office`='$_POST[office]',`fullname` = '$fullname', `exten`='$_POST[exten]',`last_update`='$last_update',`last_time`='$last_time',`contact_n`='$_POST[contact_n]'
WHERE `user_id` = '$_POST[userid]'");  // executing insert query
header('location:xc-profile.php'); 

?>