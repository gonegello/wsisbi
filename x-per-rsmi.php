<?php
//get user information
       include "a-session.php";
       include "gen_rsmi.php";


       $ris_month = $_GET['ris_month'];
       $ris_year = $_GET['ris_year'];
       $idrsmi = $_GET['idrsmi'];


       $query=mysqli_query($conn,"select * from `rsmi`where idrsmi = $idrsmi");
       while($row=mysqli_fetch_array($query))
      {
          $rsmi_no = $row['rsmi_no'];
          $rsmi_date = $row['rsmi_date'];
          $cert_id = $row['cert_id'];
          $accountant = $row['accountant'];
   
      } 

      
      $query=mysqli_query($conn,"select * from `people`where idc = $cert_id");
      while($row=mysqli_fetch_array($query))
     {
         $cert_f = $row['fullname'];
         $cert_pos = $row['position'];
  
     } 
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>RSMI Report </title>

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
  outline:1px solid black;
  font-size:17px;

  
}
td{
    padding:8px;
 
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


<body style="background:whitesmoke;">

<div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:2%;">
    <div class="col">
    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> 
    Reports</a><span style="font-size:20px;"> / <i class="bx bx-folder"></i> RSMI</span>
     <span style="font-size:20px;">/ <?php echo $rsmi_no;?></span> </h1>
    </div>

        <div class="col" style="">
        <button type="submit" style="float:right;" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
        <form action="export-xperrsmi.php?ris_month=<?php echo $ris_month;?>&ris_year=<?php echo $ris_year;?>&idrsmi=<?php echo $idrsmi;?>" method="post">
        <button type="submit" id="csv" name="csvv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>
        </div>
       
        </div>

<div class="card-body" style="margin-right:10%;margin-left:10%;margin-top:5%;margin-bottom:10%;">
<div class="section-to-print">
<div class="row">

    <div class="col" style="text-align:right;margin-top:2%;">
       <span>Appendix 63</span>
    </div>
    
</div>

<div class="row">
    <div class="col" style="text-align:center;">
 
    </div>
</div>


<div class="row" style="margin-top:1%;">
    <div class="col">

    </div>
    <div class="col" style="text-align:right;">
  
    </div>
</div>

<table style="">
    <tr>
    <td colspan="8">
    <div class="row">
        <div class="col" style="text-align:center;">
            <h5>REPORT OF SUPPLIES AND MATERIALS ISSUED</h5><h5 style="text-transform:uppercase;"><?php echo $univ_name;?></h5>
            <h5><?php echo $univ_ad;?></h5>
        </div>
    </div>
</td>
</tr>

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

</tr>

<tr>
    <td>Date:</td>
    <td style="border-bottom:1px solid black;"><?php echo $rsmi_date;?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>No.:</td>
    <td style="border-bottom:1px solid black;"><?php echo $rsmi_no;?></td>

</tr>

<tr>
    <td colspan="8" style="border-bottom:none;"></td>
</tr>


<tr>
    <td colspan="8" style="border-top:2px solid black;border-bottom:2px solid black;color:transparent;"> style</td>
</tr>

<tr>
    <td style="border:1px solid black;text-align:center;">RIS<br>No.</td>
    <td style="border:1px solid black;text-align:center;">Responsibility<br>Center Code</td>
    <td style="border:1px solid black;text-align:center;">Stock No.</td>
    <td style="border:1px solid black;text-align:center;">Item</td>
    <td style="border:1px solid black;text-align:center;">Unit</td>
    <td style="border:1px solid black;text-align:center;">Qty.<br>Issued</td>
    <td style="border:1px solid black;text-align:center;">Unit<br>Cost</td>
    <td style="border:1px solid black;text-align:center;">Amount</td>
</tr>

<!-- for looping-->


<?php
  // $stat = "1";
  $query=mysqli_query($conn,"SELECT * FROM ris JOIN req on req.id_ris = ris.idris JOIN xris on xris.idx = req.item_id
  JOIN fc ON fc.ar_id = xris.sn_id 
  WHERE  ris_month = '{$ris_month}' AND ris_year = '{$ris_year}' AND ris.id_rmsi = $idrsmi");
  while($row=mysqli_fetch_array($query))

{
    $amount = $row['app_quan'] * $row['unit_cost'];
 
    ?>

<tr>
    <td style="text-align:center;border-bottom:none;border-right:1px solid black;"><?php echo $row['ris_no'];?></td>
    <td style="text-align:center;border-bottom:none;border-right:1px solid black;"><?php echo $row['res_code'];?></td>
    <td style="text-align:center;border-bottom:none;border-right:1px solid black;"><?php echo $row['stock_num'];?></td>
    <td style="border-bottom:none;border-right:1px solid black;"><?php echo $row['article']; echo " "; echo $row['descr'];?></td>
    <td style="text-align:center;border-right:1px solid black;">
    <?php
    if($row['unit'] == "pc" && $row['app_quan'] > 1)
    {
        echo "pcs.";
    }
    else{
        echo $row['unit'];
    }


?>
      
    </td>
    <td style="text-align:center;border-right:1px solid black;"><?php echo $row['app_quan'];?></td>
    <td style="text-align:right;border-right:1px solid black;"><?php echo number_format($row['unit_cost'],2);?></td>
    <td style="text-align:right;border-right:1px solid black;">
    <?php echo number_format($amount,2);?>

   


</td>
</tr>

<?php

}
?>






<tr>
    <td colspan="3" style="border:1px solid black;text-align:center;">Recapitulation</td>
    <td rowspan="2" colspan="2" style="border:1px solid black;"></td>
    <td colspan="3" style="border:1px solid black;text-align:center;">Recapitulation</td>

</tr>

<tr>
    <td colspan="2" style="border:1px solid black;text-align:center;">Stock No.</td>
    <td style="border:1px solid black;text-align:center;">Qty.</td>
    <td colspan="2"style="border:1px solid black;text-align:center;"> Unit Cost Total Cost</td>
    <td style="border:1px solid black;text-align:center;">Account Code</td>

</tr>



<tr>
    <td colspan="2"></td>
    <td ></td>
    <td colspan="2"></td>
    <td></td>

</tr>




<tr>
    <td colspan="5">
        I HEREBY CERTIFY to the correctness of the above information

        <div class="row" style="margin-top:2%;">
            <div class="col" style="text-align:center;">
           
            <span style="text-transform:uppercase;font-weight:bold;"><?php echo $cert_f;?></span>
            <br><span><?php echo $cert_pos;?></span>
            </div>

        </div>
    
    </td>
    
    <td colspan="3">
        Posted by/date:
        <div class="row" style="margin-top:2%;">
            <div class="col" style="text-align:center;">
            <span style="text-transform:uppercase;font-weight:bold;"><?php echo $accountant;?></span>
            <br>    
           Accountant
            </div>
           
        </div>

    </td>
</tr>

</table>



</div>
</div>
</div>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>



 

 
</body>
</html>
