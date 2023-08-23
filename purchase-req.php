<?php
session_start();
include "connection.php";
include "pr-no.php";


    $r_date = $_POST['r_date'];
    $idcart = $_POST['idcart'];
    $stat = $_POST['stat'];
    $h_id = $_POST['h_id'];
    $purpose = $_POST['purpose'];

    $r_date2 = $_POST['r_date2'];
    $idcart2 = $_POST['idcart2'];
    $stat2 = $_POST['stat2'];
    $purpose2 = $_POST['purpose2'];


      foreach($_POST['idcart'] as $count => $id){
        $query2 = "UPDATE cart SET stat = '".$stat[$count]."', r_date = '".$r_date[$count]."', h_id = '".$h_id."', purpose = '".$purpose."', pr_no = '".$next_pr_no."' WHERE idcart = '".$idcart[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }

    foreach($_POST['idcart2'] as $counts => $ids){
        $query1 = "UPDATE cart SET stat = '".$stat2[$counts]."', r_date = '".$r_date2[$counts]."', h_id = '".$h_id."', purpose = '".$purpose2."', pr_no = '".$next_pr_no."' WHERE idcart = '".$idcart2[$counts]."'";
        $result1 = mysqli_query($conn,$query1);
    }

    $_SESSION['requested'] = "`Sent to ";

        header("location:cli-order.php");
 
?>