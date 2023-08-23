<?php
include('connection.php');

if(isset($_POST['approve'])){

    $req_id=$_POST['req_id'];
    $approved_by = $_POST['approved_by'];
    $date_approved = $_POST['date_approved'];
    $approved_time = $_POST['approved_time'];
    
    $approved = "Approved";
 
    foreach($req_id as $key => $value)
    {
        
        $approved = "Approved";
        mysqli_query($conn, "UPDATE `request` SET `req_status` = '$approved', `approved_by` = '$approved_by[$key]' ,
        `date_approved` = '$date_approved[$key]', `approved_time` = '$approved_time[$key]' WHERE `req_id` = '$value'") or die(mysqli_error()); //update quantity of items after order in `items` table
        header("Location:par.php");
    }
  


}




?>
