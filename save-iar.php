<?php include "connection.php";
session_start();

//for iar table

//iar_no,iar_date,invoice_no,in_date,rc_code,req_officer,date_insp,date_receive,chairperson,member,supp_officer,status,year,total_cost

$iar_no = $_POST['iar_no'];//
$date = $_POST['date'];
$in_no = $_POST['in_no'];//
$in_date = $_POST['in_date'];//
$res_code = $_POST['res_code'];//
$req_off = $_POST['req_off']; //
$date_ins = $_POST['date_ins'];//
$date_received = $_POST['date_received'];//
$statt = 1;
$chairperson = $_POST['chairperson'];//
$member = $_POST['member'];//
$officer = $_POST['officer'];//
$tot_cost = $_POST['tot_cost'];//
$yearr = date("Y");



//for xicspar table
$iar_id = $_POST['iar_id'];
$idx = $_POST['idx'];

//insert record to iar table
$que = "INSERT INTO `iar` (iar_no,invoice_no,in_date,rc_code,req_officer,date_insp,date_receive,chairperson,member,supp_officer,statt,yearr,tot_cost) 
VALUES ('$iar_no','$in_no','$in_date','$res_code','$req_off','$date_ins','$date_received','$chairperson','$member','$officer','$statt','$yearr','$tot_cost')";
$res = mysqli_query($conn,$que);




if($_POST['save']){
    //update items containing this iar no.
foreach($_POST['idx'] as $count => $id){
    $query2 = "UPDATE xicspar SET id_iar = '".$iar_id."', date = '".$date."' WHERE idx = '".$idx[$count]."'";
    $result2 = mysqli_query($conn,$query2);
}

}



//


        header("location:x-iar-per.php?iar_id=$iar_id");





?>