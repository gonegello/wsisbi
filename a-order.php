<?php
include('connection.php');

if(isset($_POST['checkout'])){
    //orders table
    $item_id =$_POST['item_id']; //item id
    $client_id =$_POST['client_id']; //client id
    $order_amount =$_POST['order_amount'];//order price per item
    $order_quan =$_POST['order_quan']; //quantity
    $date_ordered = $_POST['date_ordered'];
    $order_time = $_POST['order_time'];
    //CART table
    $idcart = $_POST['idcart'];

    //stocks table
    $quantity = $_POST['quantity'];
   // $stock = "0";
   // $status = "out-of-stock";

    $status = "out-of-stock";
    $quan = "0";
    $remarks ="waiting";
   

    //order price = order quantity * price
    $order_amount=$order_quan*$order_amount;
   //if checkout button is pressed insert data to `orders` table
   $check =  mysqli_query($conn, "insert into `orders` (item_id,client_id,oo_quan,order_quan,order_amount,date_ordered,order_time,remarks) values ('$item_id','$client_id','$order_quan','$order_quan','$order_amount','$date_ordered','$order_time','$remarks')");
   
  
   if($check)
    {
    //if data is already inserted delete data from cart using idcart
    mysqli_query($conn, "delete from `cart` where idcart = '$idcart'");
    header("location: cli-order.php");
    }

    if($check)
    {
        $up_quantity = $quantity - $order_quan; 
        mysqli_query($conn, "UPDATE `stocks` SET `quantity` = '$up_quantity' WHERE `s_id` = '$item_id'");

       
    }

    if($check)
    {
        $check_s = mysqli_query($conn, "SELECT *FROM `stocks` WHERE quantity ='$quan'");
        $checkered = mysqli_num_rows($check_s);

        if($checkered > 0)
        { 
            mysqli_query($conn, "UPDATE `stocks` SET `status` = '$status' WHERE `s_id` = '$item_id'") or die(mysqli_error());
        }

    }
       

    

   
    
}



?>
