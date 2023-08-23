<?php include "connection.php";
session_start();

    $hd_aprvd = $_POST['hd_aprvd'];
    $idcart = $_POST['idcart'];
    $stat = $_POST['stat'];
    $notif_stat = "1";

    $time = $_POST['time'];
    $client_id = $_POST['client_id'];
    $act = $_POST['act'];
    $by = $_POST['by'];

    $client_name = $_POST['client_name'];

    foreach($_POST['idcart'] as $count => $id)
    {
        $query2 = "UPDATE cart SET stat = '".$stat[$count]."', hd_aprvd = '".$hd_aprvd[$count]."' WHERE idcart = '".$idcart[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }


    foreach($client_id as $key => $value){

        $save="INSERT INTO `notif` (client_id,act,notif_time,notif_date,byy,notif_stat) VALUES ('".$value."','".$act[$key]."','".$time[$key]."','".$hd_aprvd[$key]."','".$by[$key]."','".$notif_stat."')";
        $query=mysqli_query($conn,$save);
        
    }
    
    $_SESSION['head_approve'] = "` You approved ($client_name) purchase request. Purchase request is now sent to Campus Director`";
    header("location:cli-head-notif.php");
?>