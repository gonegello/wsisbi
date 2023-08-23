<?php
include('connection.php');

    $orderid = $_POST['order_id'];
    $stock_quan = $_POST['stock_quan'];
    $order_quan = $_POST['order_quan'];
    $remarks = "accepted";


if(isset($_POST['accept'])){
  
        $check_s = mysqli_query($conn, "select *from `orders` where orderid='$orderid'");
        $checkered = mysqli_num_rows($check_s);

        if($checkered > 0)
        { 
        mysqli_query($conn, "UPDATE `orders` SET `remarks` = '$remarks' WHERE `orderid` = '$orderid'") or die(mysqli_error());
        header("location:a-orders.php");
        }
  
    
}
//if button decline is pressed return order quantity to stock
if(isset($_POST['decline'])){
    $orderid = $_POST['order_id'];
    $stock_quan = $_POST['stock_quan'];
    $order_quan = $_POST['order_quan'];
    $stock_id = $_POST['stock_id'];
    $status = "declined";

    $update = mysqli_query($conn, "select *from `orders` where orderid='$orderid'");
    $returnquan = mysqli_num_rows($update);

    if($returnquan > 0)
    { 
    $stock_quan = $stock_quan + $order_quan;
    mysqli_query($conn, "UPDATE `stocks` SET `quantity` = '$stock_quan' WHERE `s_id` = '$stock_id'") or die(mysqli_error());
    mysqli_query($conn, "UPDATE `orders` SET `remarks` = '$status' WHERE `orderid` = '$orderid'") or die(mysqli_error());

    header("location:a-orders.php");
    }


}



?>
