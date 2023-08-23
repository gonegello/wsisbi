<?php
 session_start();
include('connection.php');


if(isset($_POST['save']))
    {
         
        $article=$_POST['article'];//article
        $descr=$_POST['descr'];//descr
        $stock_num=$_POST['stock_num'];//stock_num
        $unit_meas=$_POST['unit_meas'];//unit_meas
        $unit_val = $_POST['unit_val'];//unit_val
        $bpc = $_POST['bpc'];  //bpc
        $ohpc = $_POST['ohpc']; //ohpc
        $fund_id = $_POST['fund_id']; //cluster_id

        $arr = array($article,$descr);
        $combine = join(" ",$arr);


    $check_q = mysqli_query($conn, "select *from `fc` where ='$article' and descr = '$descr'");
    $check = mysqli_num_rows($check_q);

    if($check>0)
    {   
        //NOT SAVED IF ALREADY EXIST
        $_SESSION['unsuccessful'] = "` Article ( ` $article `) Description ( `$descr` )! Already Exists.`";
        header("Location: x-pci.php");
    }
    else
    {

        //SAVED ITEM NAME
        $insert = mysqli_query($conn, "insert into `fc` (article,descr,stock_num,unit_meas,unit_val,bpc,ohpc,combine,cluster_id) values ('$article','$descr','$stock_num','$unit_meas','$unit_val','$bpc','$ohpc','$combine','$fund_id')");
        

        if($insert)
        {
            if($fund_id == "1" || $fund_id == "2" || $fund_id == "3")
            {
                $_SESSION['addedpci'] = "` Article ( ` $article `) Description ( `$descr` ) Added Successfully!.`";
                header("Location: x-pci.php?#f01");

            }
          
           
        }
        else
        {
            $_SESSION['unsuccessful'] = "` Error Adding Article ( ` $article `) Description ( `$descr` ) !`";
            header("Location: x-pci.php");
        // when error occur
        }
        
    }

    }


?>