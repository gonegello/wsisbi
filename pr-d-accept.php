<?php include "connection.php";

    session_start();
    $dd_aprvd = $_POST['dd_aprvd'];
    $idcart = $_POST['idcart'];
    $stat = $_POST['stat'];
    

    $dd_aprvd2 = $_POST['dd_aprvd2'];
    $idcart2 = $_POST['idcart2'];
    $stat2 = $_POST['stat2'];
    $notif_stat = "2";


    $time = $_POST['time'];
    $client_id = $_POST['client_id'];
    $act = $_POST['act'];
    $by = $_POST['by'];
    
    $time2 = $_POST['time2'];
    $client_id2 = $_POST['client_id2'];
    $act2 = $_POST['act2'];
    $by2 = $_POST['by2'];

    //for session
    $client_name = $_POST['client_name'];

    foreach($_POST['idcart'] as $count => $id){
        $query2 = "UPDATE cart SET stat = '".$stat[$count]."', dd_aprvd = '".$dd_aprvd[$count]."' WHERE idcart = '".$idcart[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }


    foreach($_POST['idcart2'] as $counts => $ids){
        $query1 = "UPDATE cart SET stat = '".$stat2[$counts]."', dd_aprvd = '".$dd_aprvd2[$counts]."' WHERE idcart = '".$idcart2[$counts]."'";
        $result1 = mysqli_query($conn,$query1);
    }

    foreach($client_id as $key => $value){

        $save="INSERT INTO `notif` (client_id,act,notif_time,notif_date,byy,notif_stat) VALUES ('".$value."','".$act[$key]."','".$time[$key]."','".$hd_aprvd[$key]."','".$by[$key]."','".$notif_stat."')";
        $query=mysqli_query($conn,$save);
        
    }

    foreach($client_id2 as $keys => $values){

        $ss="INSERT INTO `notif` (client_id,act,notif_time,notif_date,byy,notif_stat) VALUES ('".$values."','".$act2[$keys]."','".$time2[$keys]."','".$hd_aprvd[$keys]."','".$by2[$keys]."','".$notif_stat."')";
        $qry=mysqli_query($conn,$ss);
        
    } 

    $_SESSION['dean_approve'] = "` You approved ($client_name) purchase request. Purchase request will be reviewed in Supply Office. `";


        header("location:cli-dean-notif.php");
 
?>