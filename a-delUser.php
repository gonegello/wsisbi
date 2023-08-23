<?php
include "connection.php";
$id=$_GET['id'];

mysqli_query($conn, "delete from `user` where id = '$id'");
header('location:accounts.php');
   

   ?>