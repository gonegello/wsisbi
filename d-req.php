<?php
include('connection.php');


if(isset($_POST['save'])){
    $item =$_POST['item'];
    $quantity=$_POST['quantity'];
    $req_purpose=$_POST['req_purpose'];
    $client_id=$_POST['client_id'];
    $req_status=$_POST['req_status'];
    $date_=$_POST['date_'];
    $time_=$_POST['time_'];
    
 
    foreach($item as $key => $value){

        $save="INSERT INTO `request` (item,quantity,req_status,req_purpose,date_,time_,client_id) VALUES ('".$value."','".$quantity[$key]."', '".$req_status[$key]."','".$req_purpose."','".$date_[$key]."','".$time_[$key]."','".$client_id[$key]."')";
        $query=mysqli_query($conn,$save);
        header("location: cli-ris.php");
    }


}

    if(isset($_POST['save'])) //delete from request table when request button is clicked
    {
        $client_id =$_POST['client_id'];

        for($i=0;$i<count($client_id);$i++)
        {

        $del_data = $client_id[$i];
        $sql = "DELETE FROM draft WHERE client_id ='$del_data'";
        $result = mysqli_query($conn,$sql);
        }
    // if successful redirect
        if($result)
        {
            header("Location:cli-ris.php");
        }

    }

?>
