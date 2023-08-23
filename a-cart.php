<?php
session_start();
include('connection.php');

if(isset($_POST['cart'])){
    $item_id =$_POST['item_id']; //item id
    $order_price =$_POST['order_price'];//order price per item
    $quan =$_POST['quan']; //quantity
    $client_id =$_POST['client_id']; //client id
    $datte = $_POST['datte'];
    $timee = $_POST['timee'];
    $stat = $_POST['stat'];
    $stock_name = $_POST['stock_name'];

    //order price = order quantity * price
    $order_price=$quan*$order_price;

    if($quan > 0)
    {
        $item = "Items";
    }
    else{
        $item = "Item";
    }
   
    mysqli_query($conn, "insert into `cart` (item_id,client_id,quan,order_price,datte,timee,stat) values ('$item_id','$client_id','$quan','$order_price','$datte','$timee','$stat')");
    $_SESSION['added'] = "`You Successfully Added `<b> $quan </b>`  <b>`$stock_name`</b> in Your Cart!`";
    header("location: cli-stock.php");
    }





?>
