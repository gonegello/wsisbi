<?php
session_start();
include "connection.php";

$pn_id = $_POST['pn_id'];
$ptr_condition = $_POST['ptr_condition'];
$ptr_custodian = $_POST['ptr_custodian'];


//for passing
$idc = $_POST['idc'];
if($_POST['save']){
    //update prop_num containing persons i

foreach($_POST['pn_id'] as $count => $id){
    $query2 = "UPDATE icspar_details SET ptr_custodian = '".$ptr_custodian[$count]."', ptr_condition = '".$ptr_condition[$count]."' WHERE pn_id = '".$pn_id[$count]."'";
    $result2 = mysqli_query($conn,$query2);

    
}

if($result2)
{
    $_SESSION['transferred']="Successfully Transferred!";
    header("location:x-per-cus.php?idc=$idc");
}
else{
    header("location:x-per-cus.php?idc=$idc");
}



}




?>