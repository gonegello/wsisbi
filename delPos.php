<?php
session_start();
include('connection.php');

$pos = $_GET['pos'];
$idpos=$_GET['idpos'];
  
//working delete
 
 mysqli_query($conn,"delete from `position` where idposition='$idpos'");
 $_SESSION['deletepos'] = "You Successfully Deleted `$pos` Position.";
 header('location:x-people.php#pos');
 


?>
