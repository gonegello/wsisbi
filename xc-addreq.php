<?php
session_start();
include('connection.php');
//client_id,item_id,req_quan,r_date,r_time,req_stat
if(isset($_POST['save'])){
   //
   date_default_timezone_set('Asia/Manila');

    $client_id = $_POST['client_id'];  
    $item_id = $_POST['item_id'];
    $req_quan = $_POST['req_quan'];
    $r_date = date("F d, Y");
    $r_time = date("h:i A");
    $req_stat = "cart";

    $item_name = $_POST['item_name'];

    $i = 1;
    while($i < 2)
    {
        mysqli_query($conn, "insert into `req` (client_id,item_id,req_quan,r_date,r_time,req_stat) values 
        ('$client_id','$item_id','$req_quan','$r_date','$r_time','$req_stat')");

       
        $i = $i + 1;
    }

    $_SESSION['added'] = "`You Successfully Added `<b> $req_quan </b>`  <b>`$item_name`</b> To Your Request Cart!`";
    header("location:xc-store.php");
   
  
    }





?>
