<?php
session_start();
include "connection.php";
include "pr-no.php";

//send request that contains consumable items only
    $h_id = $_POST['h_id'];
   

    $r_date2 = $_POST['r_date2'];
    $idcart2 = $_POST['idcart2'];
    $stat2 = $_POST['stat2'];
    $purpose2 = $_POST['purpose2'];


    foreach($_POST['idcart2'] as $counts => $ids){
        $query1 = "UPDATE cart SET stat = '".$stat2[$counts]."', r_date = '".$r_date2[$counts]."', h_id = '".$h_id."', purpose = '".$purpose2."', pr_no = '".$next_pr_no."' WHERE idcart = '".$idcart2[$counts]."'";
        $result1 = mysqli_query($conn,$query1);
    }

    if($result1)
    {
    $_SESSION['requested'] = "`Sent to ";
    header("location:cli-order.php");
    }
 
?>