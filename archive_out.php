<?php
session_start();
include "connection.php";

$s_id = $_POST['s_id'];
$sscon = $_POST['sscon'];
$stock_name =$_POST['stock_name'];

mysqli_query($conn,"UPDATE stocks SET sscon = '$sscon' WHERE s_id = '$s_id'")or die(mysqli_error());
$_SESSION['archivedOut'] = "` Item ( ` $stock_name `)sent to active stocks. `";
header('location:a-item-archives.php'); 



?>