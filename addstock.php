<?php
session_start();
include "connection.php";
/*
   // create function for generate random password
function genCode() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $code = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $alphaLength);
        $code[] = $alphabet[$n];
    }
    return implode($code); //turn the array into a string
}

*/

  

if(isset($_POST["save"]))
{
     
    $typeid = $_POST['typeid'];
    $yearr = date("Y-m-d");
    $s_id = $_POST['s_id']; // stock_id
    $quantity = $_POST['quantity']; //in quantity
    $p_code = $_POST['p_code']; //p_code;
    
    $i = 0; 
    $p_code = $p_code + 1; //increase one pcode

    $abb = $_POST['abb'];
    $s_code = $_POST['s_code'];
    


       $ris = '2'; //consumables
       $ics = '1'; // < 15k non consumables
       $par = '3'; //non consumable >= 15k with warranty

    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./stock_photo/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "stock_photo/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	$status = "available";
    //$productcode = genCode();
    $check = mysqli_query($conn,"insert into stocks(photo,sscon,stock_name,brand,description,category_id,quantity,in_quantity,unit,unit_price, total_price,status,date_arrived,officer,int_typeid) values
    ('$dst_db','$_POST[sscon]','$_POST[gen]','$_POST[brand]','$_POST[description]','$_POST[category_id]','$_POST[quantity]','$_POST[quantity]','$_POST[unit]','$_POST[unit_price]',
    '$_POST[total_cost]','$status','$_POST[date_arrive]','$_POST[officer_id]','$_POST[typeid]')");  // executing insert query


    
    
    if($check)
    {
        if($typeid == $ics or $typeid == $par) //if typeid is ics or par generate property number to stock_details
        {
        $num_padded = sprintf("%03s", $p_code);
        $arr = array($yearr,$num_padded);
        $property_number = join("-",$arr);

            while($i < $quantity)
            {
            mysqli_query($conn, "insert into `stock_pn` (property_number,stock_id) values ('$property_number','$s_id')");
            $i++;
            $p_code++;
            $num_padded = sprintf("%03s", $p_code);
            $arr = array($yearr,$num_padded);
            $property_number = join("-",$arr);

            }
      
            $_SESSION['addedStock'] = "` Item ( ` $_POST[gen] `) Added Successfully! `";
        }

        else //if typeid is ris (consumables) 
        {
            $s_padded = sprintf("%03s", $s_code);
            $s_arr = array($abb,$s_id,$s_padded);
            $stock_number = join("-", $s_arr);

            while($i < $quantity)
            {
                mysqli_query($conn, "insert into `stock_details` (stock_number,stock_id) values ('$stock_number','$s_id')");
                $i++;
                $s_code++;
                $s_padded = sprintf("%03s", $s_code);
                $s_arr = array($abb,$s_id,$s_padded);
                $stock_number = join("-", $s_arr);


            }

            $_SESSION['addedStock'] = "` Item ( ` $_POST[gen] `) Added Successfully! `";

        }

        
    
    
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Adding Stock!"); </script>';  // when error occur
      
    }
    header("location:a-stockroom.php");

}



?>