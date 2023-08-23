<?php
session_start();
include "connection.php";
date_default_timezone_set('Asia/Manila');
$date_a = date("F d, Y");
$time = date("h:i A ");

$idx = $_POST['idx'];
$stat = $_POST['stat'];
$item_details =$_POST['item_details'];

$user_id = $_POST['user_id'];

$place = $_POST['place'];
$join = array($_POST['quantity'], $_POST['item_details']);
$details_ = join(" ",$join);

if($place == "stockroom")
{
    $his_stat = "archivein";
}
else if($place == "archives")
{
    $his_stat = "archiveout";

}


mysqli_query($conn,"UPDATE xicspar SET stat = '$stat' WHERE idx = '$idx'")or die(mysqli_error());


$query = "INSERT INTO `history` (user_id,his_stat,details_,his_date,his_time) VALUES ('$user_id','$his_stat','$details_','$date_a','$time')";
$result = mysqli_query($conn,$query);


if($place == "stockroom")
{
    $_SESSION['archived'] = "` Item ( ` $item_details `)was archive in. `"; 
    header('location:x-full-par.php'); 
}


if($place == "archives")
{
    $_SESSION['archivedOUt'] = "` Item ( ` $item_details `)was archive out. `"; 
    header('location:x-archives.php'); 
}




?>  