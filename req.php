<?php
include('connection.php');

if(isset($_POST['save'])){
    $item =$_POST['item'];
    $quantity=$_POST['quantity'];
    $req_purpose=$_POST['req_purpose'];
    $client_id=$_POST['client_id'];
    $req_status=$_POST['req_status'];
    $date_ = $_POST['date_'];
    $time_ = $_POST['time_'];
    
 
    foreach($item as $key => $value){

        $save="INSERT INTO `request` (item,quantity,req_purpose,req_status,date_,time_,client_id) VALUES ('".$value."','".$quantity[$key]."','".$req_purpose."','".$req_status[$key]."','".$date_[$key]."','".$time_[$key]."','".$client_id[$key]."')";
        $query=mysqli_query($conn,$save);
        header("location: cli-ris.php");
    }


}

else if(isset($_POST['draft'])){
    $item =$_POST['item'];
    $quantity=$_POST['quantity'];
    $client_id=$_POST['client_id'];
    
 
    foreach($item as $key => $value){

        $save="INSERT INTO `draft` (item,quantity,client_id) VALUES ('".$value."','".$quantity[$key]."','".$client_id[$key]."')";
        $query=mysqli_query($conn,$save);
        header("location: cli-ris.php");
    }

}
else{
    
}




?>
