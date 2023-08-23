<?php
session_start();
include "connection.php";

if(isset($_POST["save"])){
    date_default_timezone_set('Asia/Manila');
    $date_a = date("F d, Y");
    $time = date("h:i A ");
    $month_year = date("F Y");

    //for auto generated property number
    $classf = $_POST['classf']; //classification
    $fund = $_POST['fund']; //fund cluster
    $year = date("y"); //year acquired
    $p_code = $_POST['p_code'];
    $p_code = $p_code + 1;

    $idx = $_POST['idx'];

    $quantity = $_POST['quantity'];

    $user_id = $_POST['user_id'];

    $his_stat = "item";

    $join = array($_POST['quantity'], $_POST['item']);
    $details_ = join(" ",$join);



    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./icspar/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "icspar/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	$status = "available";
    //$productcode = genCode();
    $check = mysqli_query($conn,"insert into xicspar(class_id,fc_id,item_details,in_quan,a_quan,unit,unit_cost,total_cost,stat,e_life,supplier,stock_img,date,time,po_num,po_date,month_year) values
    ('$_POST[class_id]','$_POST[fund_id]','$_POST[item]','$_POST[quantity]','$_POST[quantity]','$_POST[unit]','$_POST[unit_price]','$_POST[total_cost]',
    '$_POST[stat]','$_POST[e_life]','$_POST[supplier]','$dst_db','$date_a','$time','$_POST[po_no]','$_POST[po_date]','$month_year')");  // executing insert query


    if($check)
    {

        $num_padded = sprintf("%04s", $p_code);
        $arr = array($classf,$fund,$year,$num_padded);
        $property_number = join("-",$arr);

            while($i < $quantity)
            {
            mysqli_query($conn, "insert into `icspar_details` (prop_num,x_id) values ('$property_number','$idx')");
            $i++;
            $p_code++;
            $num_padded = sprintf("%04s", $p_code);
            $arr = array($classf,$fund,$year,$num_padded);
            $property_number = join("-",$arr);

            }
      
            $query = "INSERT INTO `history` (user_id,his_stat,details_,his_date,his_time) VALUES ('$user_id','$his_stat','$details_','$date_a','$time')";
            $result = mysqli_query($conn,$query);

            $_SESSION['addedStock'] = "` Item ( ` $_POST[item] `) Added Successfully! `";

           

    }
    else
    {
        $_SESSION['errorStock'] = "` Item ( ` $_POST[item] `) was unsuccesfull! `";  // when error occur
      
    }
    header("location:x-input-ics.php?#icspar-acc");



}



?>