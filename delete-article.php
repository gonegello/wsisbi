<?php
session_start();
include "connection.php";
$ar_id=$_GET['ar_id'];
$article=$_GET['article'];

mysqli_query($conn, "delete from `fc` where ar_id = '$ar_id'");


$_SESSION['deletedpci'] = "You have successfully deleted article $article";
header('location:x-pci.php#list');
   ?>