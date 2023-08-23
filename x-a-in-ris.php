<?php
session_start();
include "connection.php";

$idx = $_POST['idx'];
$stat = $_POST['stat'];
$item_details =$_POST['item_details'];

mysqli_query($conn,"UPDATE xris SET stat = '$stat' WHERE idx = '$idx'")or die(mysqli_error());
$_SESSION['archived'] = "` Item ( ` $item_details `)saved to archive. `";
header('location:x-full-ris.php'); 



?>