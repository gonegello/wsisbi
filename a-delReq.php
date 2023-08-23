<?php
include "connection.php";
$req_id=$_GET['req_id'];

mysqli_query($conn, "delete from `request` where req_id = '$req_id'");
echo '<script>alert("Welcome to Geeks for Geeks")</script>';
header('location:cli-ris.php');
   

   ?>