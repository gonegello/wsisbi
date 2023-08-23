<?php
session_start();
include "connection.php";
$idreq=$_GET['idreq'];

mysqli_query($conn, "delete from `req` where idreq = '$idreq'");
$_SESSION['delReq'] = "` You Successfuly Deleted An Item In Your Cart ! `";

header('location:xc-myreq.php');
   

   ?>