<?php
include "connection.php";
session_start();



//for ics table
$ics_no = $_POST['ics_no'];
$ics_date = $_POST['ics_date'];
$from_id = $_POST['from_id'];
$by_id = $_POST['by_id'];

//update icspar_details table
$pn_id = $_POST['pn_id'];
$ics_id = $_POST['ics_id'];

//for sending

$custodian = $_POST['custodian'];
$fc_id = $_POST['fc_id'];

//insert record to ics table
$que = "INSERT INTO `ics` (ics_no,from_id,by_id,ics_date) VALUES ('$ics_no','$from_id','$by_id','$ics_date')";
$res = mysqli_query($conn,$que);


//update icspar_details
if($_POST['save'])
{
    foreach($_POST['pn_id'] as $count => $id)
    {
        $query = "UPDATE icspar_details SET icsxpar_no = '".$ics_id."' WHERE pn_id = '".$pn_id[$count]."'";
        $result = mysqli_query($conn,$query);
    }
}

header("location:x-icsreport.php?custodian=$custodian&idics=$ics_id&fc_id=$fc_id");




?>