<?php
session_start();
include "connection.php";
date_default_timezone_set('Asia/Manila');

$c_date = date("F d, Y");
$c_time = date("h:i A");

    $req_id = $_POST['req_id'];
    $req_stat = "head";
    $reason = $_POST['reason'];
   

    if(empty($reason))
    {
      $_SESSION['null'] = "`Your Purpose of Request field must not be empty!`";
       header("location:xc-myreq.php");
    }
    else{
      foreach($_POST['req_id'] as $count => $id)
      {
        $query2 = "UPDATE req SET req_stat = '".$req_stat."', c_date = '".$c_date."', c_time = '".$c_time."' ,req_purpose = '".$reason."' WHERE idreq = '".$req_id[$count]."'";
        $result2 = mysqli_query($conn,$query2);
      }

        $_SESSION['requested'] = "`Sent To Your Department Head`";

        header("location:xc-myreq.php");
    }

   
 
?>