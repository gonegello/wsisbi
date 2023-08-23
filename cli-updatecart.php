<?php
session_start();
include "connection.php";

$order_quan = $_POST['order_quan'];
$idcart = $_POST['idcart'];
$stock_name = $_POST['stock_name'];
$brand = $_POST['brand'];
$orig_quan = $_POST['orig_quan'];

mysqli_query($conn,"UPDATE `cart` SET `quan` = '$_POST[order_quan]' WHERE `idcart` = '$_POST[idcart]'")or die(mysqli_error());
$_SESSION['updated'] = "` You Successfuly Updated An Item In Your Cart ! ( <b>`$brand $stock_name 's`</b> quantity from <b>`$orig_quan`</b> to <b>`$order_quan`</b>` )";
header('location:cli-order.php'); 
?>