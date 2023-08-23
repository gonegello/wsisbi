<?php include "connection.php";
session_start();

    //supply officer approves purchase request
    $sup_aprvd = $_POST['sup_aprvd'];
    $idcart = $_POST['idcart'];
    $stat = $_POST['stat'];
    $quan = $_POST['quan'];
    $off_id = $_POST['off_id'];

    $status = "out-of-stock"; //stocks table

   

    //for stockpn
    $client_id = $_POST['cli_id'];
    $ss_id = $_POST['ss_id'];
    $orig_quan = $_POST['orig_quan'];
    $stats = $_POST['stats'];

    //for stock details
    
   
    $by_id = $_POST['by_id'];
    $zero = 0;

    $client_name = $_POST['client_name'];
   
    
    //for updating status in cart:
    foreach($_POST['idcart'] as $count => $id){
        $query2 = "UPDATE cart SET stat = '".$stat[$count]."', app_quan = '".$quan[$count]."', sup_aprvd = '".$sup_aprvd[$count]."', off_id = '".$off_id[$count]."' WHERE idcart = '".$idcart[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }

  //for updating the item's custodian with property number; ( I C S)
  foreach($_POST['ss_id'] as $item => $sss)
  {
      
      $query3 = "UPDATE stock_pn SET custodian = '".$client_id[$item]."', stats = '".$stats[$item]."' WHERE stock_id = '".$ss_id[$item]."' AND custodian IS NULL LIMIT $quan[$item]";
      $result3 = mysqli_query($conn,$query3);
  
  }

  //update quantity ics
  foreach($ss_id as $key => $value)
  {
      
      $up_quantity=$orig_quan[$key]-$quan[$key]; //decrease quantity from items
      mysqli_query($conn, "UPDATE `stocks` SET `quantity` = '$up_quantity' WHERE `s_id` = '$value'") or die(mysqli_error()); //update quantity of items after order in `items` table
      
      
      if($up_quantity == $zero)
      {
          mysqli_query($conn, "UPDATE `stocks` SET `status` = '$status' WHERE `s_id` = '$value'") or die(mysqli_error());

      }
  }

    

    

     //update approved quantity in cart

     $_SESSION['supp_approve'] = "` You approved ($client_name) purchase request.`";

        header("location:a-admin-notif.php");
 
?>