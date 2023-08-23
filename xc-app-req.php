<?php
session_start();
include "connection.php";
date_default_timezone_set('Asia/Manila');

$a_date = date("F d, Y");
$a_time = date("h:i A");

    $req_id = $_POST['req_id'];
    $name = $_POST['name'];
    $req_stat = "supply";
    $a_id = $_POST['a_id'];
   


      foreach($_POST['req_id'] as $count => $id)
      {
        $query2 = "UPDATE req SET req_stat = '".$req_stat."', a_date = '".$a_date."', a_time = '".$a_time."', a_id = '".$a_id."' WHERE idreq = '".$req_id[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }

    

    
    $_SESSION['approved'] = "`You Approved $name`";

        header("location:xc-toheadreq.php");
 
?>