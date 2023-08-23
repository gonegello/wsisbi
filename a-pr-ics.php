<?php include "connection.php";


    $r_date = $_POST['r_date'];
    $idcart = $_POST['idcart'];
    $stat = $_POST['stat'];


      foreach($_POST['idcart'] as $count => $id){
        $query2 = "UPDATE cart SET stat = '".$stat[$count]."', sr_date = '".$r_date[$count]."' WHERE idcart = '".$idcart[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }

   
        header("location:cli-sendrequest.php");
 
?>