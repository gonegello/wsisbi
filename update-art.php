<?php include "connection.php";
session_start();
$fund_c = $_POST['fund_c'];
$article = $_POST['article'];
$descr = $_POST['descr'];
$stock_num = $_POST['stock_num'];
$unit_meas = $_POST['unit_meas'];
$unit_val = $_POST['unit_val'];
$bpc = $_POST['bpc'];
$ohpc = $_POST['ohpc'];
$fund_id = $_POST['fund_id'];
$ar_id = $_POST['ar_id'];

$arr = array($article,$descr);
$combine = join(" ",$arr);



mysqli_query($conn, "UPDATE `fc` SET `article` = '$article', `descr` = '$descr', `stock_num` = '$stock_num', `unit_meas` = '$unit_meas', `unit_val` = '$unit_val', `bpc` = '$bpc', `ohpc` = '$ohpc', `cluster_id` = '$fund_id', `combine` = '$combine'
WHERE  `ar_id`='$ar_id'")or die(mysqli_error());

$_SESSION['updatedpci'] = "` Article ( ` $article `) Description ( `$descr` ) Updated Successfully!.`";

header('location:x-pci.php#list'); 