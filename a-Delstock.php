<?php
include "connection.php";
$id=$_GET['id'];




         //mysqli_query($conn,"insert into `arstock` (type_id) values ('$insert')");

         mysqli_query($conn,"delete from `stocks` where id= '$id'");
         header("Location: stockroom.php");

   //mysqli_query($conn, "insert into `arstock` (photo,stock_name,brand,description,quantity,unit,unit_price,total_price,date_arrived,input_date,type_id)
  // values ('$photo','$stock_name','$brand','$description','$quantity','$unit','$unit_price','$total_price','$date_arrived','$input_date','$type_id')");
  // mysqli_query($conn, "delete from `stocks` where id = '$stock_id'");
  
	


         



#delete from stocks table

      
    

   ?>