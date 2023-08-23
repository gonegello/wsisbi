<?php
include "connection.php";
session_start();



//for ics table
$par_no = $_POST['par_no']; //
$by_date = $_POST['by_date'];
$from_id = $_POST['from_id'];
$by_id = $_POST['by_id'];
$par_stat = 1;

//update icspar_details table
$pn_id = $_POST['pn_id'];
$par_id = $_POST['par_id'];

//insert record to ics table
$que = "INSERT INTO `par` (par_no,from_id,by_id,par_date,par_stats) VALUES ('$par_no','$from_id','$by_id','$by_date','$par_stat')";
$res = mysqli_query($conn,$que);


//update icspar_details
if($_POST['save'])
{
    foreach($_POST['pn_id'] as $count => $id)
    {
        $query = "UPDATE icspar_details SET icsxpar_no = '".$par_id."' WHERE pn_id = '".$pn_id[$count]."'";
        $result = mysqli_query($conn,$query);
    }
}

header("location:x-xpar.php");




?>