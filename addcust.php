<?php
include "connection.php";

$pn_id = $_POST['pn_id'];
$custodian = $_POST['custodian'];

//for passing
$idx = $_POST['idx'];
$item = $_POST['item'];
$num = $_POST['num'];
$po_date = $_POST['po_date'];
$po_num = $_POST['po_num'];



if($_POST['save']){
    //update prop_num containing persons i

foreach($_POST['pn_id'] as $count => $id){
    $query2 = "UPDATE icspar_details SET custodian = '".$custodian[$count]."' WHERE pn_id = '".$pn_id[$count]."'";
    $result2 = mysqli_query($conn,$query2);
}
header("location:x-full-prop.php?idx=$idx&item=$item&num=$num&po_num=$po_num&po_date=$po_date");

}




?>