<?php
session_start();
include "connection.php";
$idcart=$_GET['idcart'];

mysqli_query($conn, "delete from `cart` where idcart = '$idcart'");
$_SESSION['delCart'] = "` You Successfuly Deleted An Item In Your Cart ! `";

header('location:cli-order.php');
   

   ?>  