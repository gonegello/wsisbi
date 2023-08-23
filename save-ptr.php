<?php
include "connection.php";
session_start();

//save (ptr_no,t_type,rrt,app_by,app_date,iss_by,iss_date,rec_by,rec_date,ptr_date,ptr_stat)

$ptr_no = $_POST['ptr_no'];
$ttype = $_POST['ttype'];
$app_id = $_POST['app_id'];//
$iss_id = $_POST['iss_id'];//
$rec_id = $_POST['rec_id'];//

$app_date = $_POST['app_date'];//
$iss_date = $_POST['iss_date'];//
$rec_date = $_POST['rec_date'];//
$rrt = $_POST['trans_reason'];//
$ptr_date = $_POST['ptr_date'];//

$ptr_stat = 1;


//id
$pn_id = $_POST['pn_id'];
$ptr_id = $_POST['ptr_id'];

$ptr_custodian = $_POST['ptr_custodian'];
$custodian = $_POST['custodian'];
$fc_id = $_POST['fc_id'];

$i = 1;

while($i < 2 )
{

//insert record to ptr table
$que = "INSERT INTO `ptr` (ptr_no,t_type,rrt,app_by,app_date,iss_by,iss_date,rec_by,rec_date,ptr_date,ptr_stat) VALUES 
('$ptr_no','$ttype','$rrt','$app_id','$app_date','$iss_id','$iss_date','$rec_id','$rec_date','$ptr_date','$ptr_stat')";
$res = mysqli_query($conn,$que);

$i = $i + 1;

}

//update icspar_details
if($_POST['save'])
{
    foreach($_POST['pn_id'] as $count => $id)
    {
        $query = "UPDATE icspar_details SET ptr_id = '".$ptr_id."' WHERE pn_id = '".$pn_id[$count]."'";
        $result = mysqli_query($conn,$query);
    }
}
$_SESSION['ptr'] = "`Saved as PTR $ptr_no.`";
header("location:x-per-ptr.php?ptr_custodian=$ptr_custodian&custodian=$custodian&fc_id=$fc_id&ptr_id=$ptr_id");








