<?php
session_start();
include "connection.php";
$id=$_GET['id'];

mysqli_query($conn, "delete from `user` where id = '$id'");
$_SESSION['delUser'] = "` User succesfully deleted ! `";

header('location:x-people.php');
   

   ?>