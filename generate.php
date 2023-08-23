<?php
include "connection.php";



if(isset($_POST['s_id']))
    {
        $yearr = date("Y-m-d");
        $s_id = $_POST['s_id'];
        $in_quantity = $_POST['in_quantity'];
        $p_code = $_POST['p_code'];
        $i = 0;
        $p_code = $p_code + 1;
       // $num_padded = sprintf("%02d", $num);

       
   // $last = mysqli_query($conn, "select *from")
    $check_q = mysqli_query($conn, "select *from `stock_details` where stock_id='$s_id'");
    $check = mysqli_num_rows($check_q);

    if($check > 0)
    {
        #Do not save
        header("location:a-stockroom.php");
    }
    else
    {
        $num_padded = sprintf("%03s", $p_code);
        $arr = array($yearr,$num_padded);
        $property_number = join("-",$arr);
        while($i < $in_quantity){
        mysqli_query($conn, "insert into `stock_details` (property_number,stock_id) values ('$property_number','$s_id')");
        $i++;
        $p_code++;
        $num_padded = sprintf("%03s", $p_code);
        $arr = array($yearr,$num_padded);
        $property_number = join("-",$arr);
        
       
    }
        header("location:a-stockroom.php");

    }

    }


?>