<?php
session_start();
include('connection.php');

$off = $_GET['off'];
$dept_id=$_GET['dept_id'];
  
//working delete
 
 mysqli_query($conn,"delete from `departments` where idept='$dept_id'");
 $_SESSION['deleteoff'] = "You Successfully Deleted `$off` Department.";
 header('location:x-people.php#pos');
 


?>
