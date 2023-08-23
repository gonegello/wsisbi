<?php
session_start();
include "connection.php";

$idreq = $_POST['idreq'];
$req_quan = $_POST['req_quan'];


mysqli_query($conn,"UPDATE req SET req_quan = '$req_quan' WHERE idreq = '$idreq'")or die(mysqli_error());
$_SESSION['updateReq'] = "`Update successfully ! `";
header('location:xc-myreq.php'); 



?>