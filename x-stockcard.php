<?php
//get user information
       include "a-session.php";
       include "gen_icsno.php";

       //select last


      // $idx = $_GET['idx'];
        $sn_id = $_GET['sn_id'];



        //COMPUTE Previous YEAR
        //1.get the current year
        $current_year = date("Y");
        //2. convert the current year to int
        $con_currenct_year = intval($current_year);

        //3. Subtract 1 from Current Year
        $last_year = $con_currenct_year - 1;

        $str_last_year = strval($last_year);
        $str_current_year = strval($current_year);

        //  1. if last year bal > 0 or == 0
        $lastbalance = mysqli_query($conn, "select * from `stock_card` where sn_id = $sn_id and s_year = '{$str_last_year}' order by id_st desc limit 1");
        while($row=mysqli_fetch_array($lastbalance))
        {
 
            //  2. get the last bal_qty on the last quan
            $last_bal_last_year = $row['bal_qty'];
        }



        //  3.  if last year bal is empty, set $last_bal_last_year = 0;
        if(empty($last_bal_last_year))
        {
            $last_bal_last_year = 0;
       

           
        }


	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title></title>

    <?php require_once "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
      table {
font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:17px;
  
}
.row .col input[type="text"], #officer{
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-bottom:1px solid black;
}
span{
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
th[colspan="6"] {
    text-align: center;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
th[rowspan="2"]{
  text-align:center;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
table th{
    text-align:center;
    border:2px solid black;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    font-weight:bold;

    
    

}

td, th {
  
  text-align: left;
  padding: 8px;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
td{

}


input[type="text"]{
background:white;
outline:none;

border-radius:0px;
}
input[type="text"]:focus{
    background:none;
    box-shadow:none;
    border-radius:0px;
}
#csv{
    background:#77DD77;
    color:white;

}
#print-btn{
    background:#78A2CC;
    color:white;
}
.stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }

      .second{
    color:grey;
}
.second:hover{
    color:#A3A3FF;
    text-decoration:none;
}
  


  </style>



<?php

//stock_num,idx,year,



$que=mysqli_query($conn,"select * from `fc` where ar_id = $sn_id");
while($rw=mysqli_fetch_array($que))
{
   $article = $rw['article'];
   $descr = $rw['descr'];
   $stock_num = $rw['stock_num'];

   

   
}


?>
<body style="background:whitesmoke;">



<div class="row" style="margin-left:9%;margin-right:9%;margin-top:2%;margin-bottom:2%;">
<div class="col">
<h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a>
 <span style="font-size:20px;"> / <a href="x-sc.php" class="second"><i class="bx bx-folder"></i> Stockcard </a></span> <span style="font-size:20px;"> / <i class="bx bx-file"></i> <?php echo $stock_num; echo " ";
 echo $article; echo " "; echo $descr; echo " "; echo $current_year;?></span></h1>
  
 
</div>

<div class="col">
<button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT <?php echo $article; echo " "; echo $current_year;?></button>
        <form action="export-xstockcard.php?sn_id=<?php echo $sn_id; ?>" method="post">
        <button type="submit" id="csv" name="csvv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>

</div>
        
        

        </div> 

   <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border-radius:10px;margin-right:10%;margin-left:10%;" >
<div class="section-to-print">
<div class="row">
    <div class="col">
       
    </div>
</div>

<table>
    <tr>
        <td colspan="7" style="border-bottom:3px solid black;"></td>
</tr>

<tr>
        <td colspan="7" style="text-align:center;border-right:3px solid black;border-left:3px solid black;">
        <h2 style="padding-bottom:0;">STOCK CARD</h2>
        <h4 style="padding-top:0;"><?php echo $univ_name;?></h4>
        <h4 style="padding-top:0;"><?php echo $univ_ad;?></h4>

    </td>
</tr>

<tr>
    <td colspan="3" style="border-top:3px solid black;border-left:3px solid black;border-right:2px solid black;">Item :</td>
    <td colspan="2" style="border-top:3px solid black;border-right:2px solid black;">Description :</td>
    <td colspan="2" style="border-top:3px solid black;border-left:2px solid black;border-right:3px solid black;">Stock No. <?php echo $stock_num;?><br>Re-order Point</td>

</tr>


<tr>
    <td colspan="3" style="border-left:3px solid black;border-right:2px solid black;border-bottom:2px solid black;text-align:center;font-size:20px;font-weight:bold;">
    <?php echo $article;?></td>
    <td colspan="2" style="border-right:2px solid black;border-bottom:2px solid black;font-size:20px;text-align:center;font-weight:bold;">
    <?php echo $descr;?>
</td>
    <td colspan="2" style="border-left:2px solid black;border-right:3px solid black;border-bottom:2px solid black;"></td>

</tr>

<tr>
    <td rowspan="2" style="border-left:3px solid black;border-bottom:2px solid black;">Date</td>
    <td rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;">Reference<br>IAR#/RIS#</td>
    <td rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;">Receipt<br>Qty.</td>
    <td colspan="2" style="border-left:2px solid black;border-bottom:2px solid black;">Supplier/Employee/Officer</td>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Balance</td>
    <td rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;border-right:3px solid black;">No. of Days<br>to Consume</td>

</tr>

<tr>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Qty.</td>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Supplier/Requisitioning Officer</td>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Qty.</td>

</tr>


<tr>
    <td colspan="2" style="border-left:3px solid black;border-bottom:2px solid black;">Total Brought Forward:</td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">

    <?php
    if($last_bal_last_year > 0)
    {
        echo $last_bal_last_year;
    }

    ?>

</td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">
    <?php
    if($last_bal_last_year > 0)
    {
        echo $last_bal_last_year;
    }

    ?>

</td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;border-right:3px solid black;"></td>

</tr>

<!--for looping-->


        <?php
        $s_stat = "iar";
        $i = 0;
            $query = mysqli_query($conn, "select * from `stock_card`
            where stock_card.sn_id = $sn_id and stock_card.s_year = '{$current_year}' and stock_card.iar_i is not null
            order by stock_card.date_ind asc ");
            while($row= mysqli_fetch_array($query))
             {
                 $s_id = $row['id_st'];
                 $iar_id = $row['iar_i'];
                 $ris_id = $row['ris_i'];
               
                

        ?>
        
                <?php
                 if ($row['s_stat'] == "iar")
                 {
                     $iar = mysqli_query($conn, "select * from `iar` join xris on xris.id_iar = iar.iar_id 
                     join stock_card on stock_card.iar_i = iar.iar_id where xris.id_iar = $iar_id
                     group by iar_id");
                     while($i = mysqli_fetch_array($iar))
                     {
                        echo '   <tr>

                        <td style="border-left:3px solid black;border-right:2px solid black;border-bottom:2px solid black;
                        color:deeppink;font-weight:bold;text-align:center;">'.$i['date'].'</td>
                        <td style="border-bottom:2px solid black;font-weight:bold;color:deeppink;">'.$i['iar_no'].'</td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;
                        color:deeppink;font-weight:bold;text-align:center;text-align:center;">'.$row['quan'].'</td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;color:deeppink;font-weight:bold;text-transform:uppercase;">'.$i['supplier'].'</td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;font-weight:bold;color:deeppink;">'.$row['bal_qty'].'
                      </td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;border-right:3px solid black;"></td>
            
                        </tr>';
                     }
                  
                 }
                 ?>



<?php
                 if ($row['s_stat'] == "ris")
                 {
                     $ris = mysqli_query($conn, "select * from `ris` join req on req.id_ris = ris.idris join stock_card on stock_card.ris_i = ris.idris 
                     join people on people.idc = ris.req_by
                     where req.id_ris = $ris_id group by idris
                     ");
                     while($r = mysqli_fetch_array($ris))
                     {
                        echo '   <tr>

                        <td style="border-left:3px solid black;border-right:2px solid black;border-bottom:2px solid black;
                        text-align:center;">'.$r['iss_date'].'</td>
                        <td style="border-bottom:2px solid black;">'.$r['ris_no'].'</td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;"></td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">'.$r['quan'].'</td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;">'.$r['fullname'].'</td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">'.$row['bal_qty'].'
                      </td>
                        <td style="border-bottom:2px solid black;border-left:2px solid black;border-right:3px solid black;"></td>
            
                        </tr>';
                     }
                  
                 }
                 ?>


          





        <?php
         }
         ?>
 







    

</table>

</div>

        </div>


 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 

 

 
</body>
</html>
