<?php
session_start();
include "connection.php";

if(isset($_POST["save"])){

   
    date_default_timezone_set('Asia/Manila');
    $date_a = date("F d, Y");
    $time = date("h:i A ");
    $s_year = date("Y");
    $month_year = date("F Y");
    $s_stat = "iar";

    //for auto generated property number
    
    $year = date("y"); //year acquired
    $month2 = date("m"); //month acquired
    $r_code = $_POST['r_code'];
    $r_code = $r_code + 1;

    $idx = $_POST['idx'];
    $user_id = $_POST['user_id'];

    $his_stat = "item";
 
    $join = array($_POST['quantity'], $_POST['item']);
    $details_ = join(" ",$join);

   


    $quantity = $_POST['quantity'];
    $sn_id = $_POST['sn_id'];
    $bal_qty = $_POST['quantity'];


    $getlast_bal = mysqli_query($conn, "select * from `stock_card` where sn_id = $sn_id order by id_st desc limit 1");
    while($row=mysqli_fetch_array($getlast_bal))
    {

        //  2. get the last bal_qty on the last quan
        $last_balance = $row['bal_qty'];
    }

    $bal_qty = $bal_qty + $last_balance;



    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./ris/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "ris/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	$status = "available";
    //$productcode = genCode();
    $check = mysqli_query($conn,"insert into xris(sn_id,fc_id,item_details,in_quan,a_quan,unit,unit_cost,total_cost,stat,supplier,stock_img,date,time,po_num,po_date,month_year) values
    ('$_POST[sn_id]','$_POST[fund_id]','$_POST[item]','$_POST[quantity]','$_POST[quantity]','$_POST[unit]','$_POST[unit_price]','$_POST[total_cost]','$_POST[stat]',
    '$_POST[supplier]','$dst_db','$date_a','$time','$_POST[po_no]','$_POST[po_date]','$month_year')");  // executing insert query


    if($check)
    {

        //put zero if its only one char
        /*

        $numlength = strlen((string)$r_code);
        if($numlength <= 1)
        {

        $num_padded = sprintf("%02s", $r_code);
        $arr = array($year,$month2,$num_padded);
        $ris_no = join("-",$arr);

            while($i < $quantity)
            {
            mysqli_query($conn, "insert into `ris_details` (ris_no,x_id) values ('$ris_no','$idx')");
            $i++;
            $r_code++;
            $num_padded = sprintf("%02s", $r_code);
            $arr = array($year,$month2,$num_padded);
            $ris_no = join("-",$arr);

            }
            */

          


            $que = "INSERT INTO `stock_card` (sn_id,quan,id_item,s_year,bal_qty,date_ind,s_stat) VALUES ('$sn_id','$quantity','$idx','$s_year','$bal_qty','$date_a','$s_stat')";
            $res = mysqli_query($conn,$que);
      
            $_SESSION['addedStock'] = "` Item ( ` $_POST[item] `) Added Successfully! `";




            $query = "INSERT INTO `history` (user_id,his_stat,details_,his_date,his_time) VALUES ('$user_id','$his_stat','$details_','$date_a','$time')";
            $result = mysqli_query($conn,$query);

            
       
  /*
        else
        {
          

           // $num_padded = sprintf("%01s", $r_code);
            $arr = array($year,$month2,$r_code);
            $ris_no = join("-",$arr);
    
                while($i < $quantity)
                {
                mysqli_query($conn, "insert into `ris_details` (ris_no,x_id) values ('$ris_no','$idx')");
                $i++;
                $r_code++;
               // $num_padded = sprintf("%04s", $p_code);
                $arr = array($year,$month2,$r_code);
                $ris_no = join("-",$arr);
    
                }

               
                $_SESSION['addedStock'] = "` Item ( ` $_POST[item] `) Added Successfully! `";


        }
         */
          


    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Adding Stock!"); </script>';  // when error occur
      
    }
    header("location:x-input-iar.php?#ready-acc");



}



?>