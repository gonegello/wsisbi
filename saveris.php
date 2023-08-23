<?php
include "connection.php";

//insert (ris_no,res_code,division,req_by,req_date,req_time,
//app_by,app_date,app_time,iss_by,iss_date,iss_time,rec_by,rec_date,rec_time,ris_month,id_rmsi)

$ris_no = $_POST['ris_no'];//
$res_code = $_POST['res_code'];
$division = $_POST['division'];

$req_by = $_POST['req_by'];// --> location header variable
$req_date = $_POST['req_date'];//
$req_time = $_POST['req_time'];//

$app_by = $_POST['app_by'];//
$app_date = $_POST['app_date'];//
$app_time = $_POST['app_time'];//

$iss_by = $_POST['iss_by'];//
$iss_date = $_POST['iss_date'];//
$iss_time = $_POST['iss_time'];//

$rec_by = $_POST['received_by'];
$rec_date = $_POST['rec_date'];//
$rec_time = $_POST['rec_time'];//

$fc = $_POST['fc'];//

$a_quan = $_POST['a_quan'];
$idx = $_POST['idx'];


$ris_month = date("F");
$ris_year = date("Y");
$current_year = date("Y");
$date_ind = date("F d, Y");
$s_stat = "ris";


//update (app_quan,yes_no,remarks,id_ris,)

$idreq = $_POST['idreq'];//
$id_ris = $_POST['id_ris']; //not array
$app_quan = $_POST['app_quan'];//array
$yesno = $_POST['yesno'];//
$remarks = $_POST['remarks'];//
$req_stat = "saved";


$iar_id = $_POST['iar_id']; //array
$sn_id = $_POST['sn_id']; //array
$last_qty = $_POST['last_qty'];//array


//insert record to ptr table
$que = "INSERT INTO `ris` (ris_no,res_code,division,req_by,req_date,req_time,app_by,app_date,app_time,iss_by,iss_date,iss_time,rec_by,rec_date,rec_time,
ris_month,ris_year,fc) VALUES 
('$ris_no','$res_code','$division','$req_by','$req_date','$req_time','$app_by','$app_date','$app_time','$iss_by','$iss_date','$iss_time','$rec_by',
'$rec_date','$rec_time','$ris_month','$ris_year','$fc')";
$res = mysqli_query($conn,$que);



//req
if($_POST['save'])
{
    foreach($_POST['idreq'] as $count => $id)
    {
        $query = "UPDATE req SET app_quan = '".$app_quan[$count]."', yes_no = '".$yesno[$count]."',
        remarks = '".$remarks[$count]."', id_ris = '".$id_ris."', req_stat = '".$req_stat."' WHERE idreq = '".$idreq[$count]."'";
        $result = mysqli_query($conn,$query);
    }
}


if($_POST['save'])
{
  //update quantity ris
  $up_quantity = 0;
  foreach($idx as $key => $value)
  {
      
      $up_quantity=$a_quan[$key]-$app_quan[$key]; //decrease quantity from items
      mysqli_query($conn, "UPDATE `xris` SET `a_quan` = '$up_quantity' WHERE `idx` = '$value'") or die(mysqli_error()); //update quantity of items after order in `items` table
      

  }

}


if($_POST['save'])
{

//insert approved quantity
//minus last balance from approved quantity
//

    $current = 0;
    foreach($sn_id as $key => $value)
    {
        
        $current = $last_qty[$key]-$app_quan[$key];
        $save = "INSERT INTO `stock_card` (sn_id,iar_i,ris_i,quan,id_item,s_year,bal_qty,date_ind,s_stat)
        VALUES ('".$value."','".$iar_id[$key]."','".$id_ris."','".$app_quan[$key]."','".$idx[$key]."','".$current_year."','".$current."','".$date_ind."','".$s_stat."')";
        $qsave=mysqli_query($conn,$save);
    }

}

header("location:xc-persupp.php?client_id=$req_by");

?>