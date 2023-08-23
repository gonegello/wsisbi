<?php
include "connection.php";

$idc = $_POST['idc'];
$rsmi_date = $_POST['rsmi_date'];
$id_rsmi = $_POST['id_rsmi'];
$accountant = $_POST['accountant'];
$idris = $_POST['idris'];
$rsmi_no = $_POST['rsmi_no'];


$que = "INSERT INTO `rsmi` (rsmi_no,cert_id,accountant,rsmi_date) 
VALUES ('$rsmi_no','$idc','$accountant','$rsmi_date')";
$res = mysqli_query($conn,$que);



if($_POST['save']){
    
foreach($_POST['idris'] as $count => $id){
    $query2 = "UPDATE ris SET id_rmsi = '".$id_rsmi."' WHERE idris = '".$idris[$count]."'";
    $result2 = mysqli_query($conn,$query2);
}

}

header("location:x-xrsmi.php");


?>