
<?php
include "a-session.php";
//include "gen_iarno.php";
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

input[type="submit"]{
    padding:10px 15px;
    outline:none;

}
    
table {
  border-collapse: collapse;
  width: 100%;
  outline:3px solid black;
  border:none;
}


th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #ddd;
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
input.larger{
    width:30px;
    height:30px;
    
}

.top{
    outline:none;
}
.top td{
    border:none;
    
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

<!--Side bar-->
<?php 
//require_once "a-sidebar.php";


$getfc = $_GET['fc'];
$getfc_id = $_GET['fc_id'];
?>




        
<div class="row" style="margin-left:2%;margin-right:2%;margin-top:2%;margin-bottom:2%;">

  <div class="col">
  <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a><span style="font-size:20px;"> / 
 <a href="x-xpci.php" class="second"><i class="bx bx-folder"></i> PCI</span></a><span style="font-size:20px;"> / 
 <?php
 if($getfc_id == 1)
 {
  echo 'Fund Cluster 01';
 }
 if($getfc_id == 2)
 {
  echo 'Fund Cluster 05';
 }
 if($getfc_id == 3)
 {
  echo 'Fund Cluster 07';
 }

 ?>

</span></h1>
  
  </div>
  <div class="col">
  <button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
  <form action="export-xpc.php?fc=<?php echo $getfc;?>&fc_id=<?php echo $getfc_id;?>" method="post">
          <button type="submit" id="csv" name="csv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
</form>

  </div>
        
      
        </div>  
    
     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border-radius:10px;margin-right:2%;margin-left:2%;margin-top:5%;" >
    <div class="section-to-print">
      <div class="row" style="margin-bottom:2%;">
          <div class="col">

          </div>
          <div class="col">
              <span style="float:right;font-style:italic;font-size:27px;">Appendix 66</span>

          </div>
      </div>

      <div class="row" >
      <div class="col" style="text-align:center;">
        
      <h4 style="font-weight:bold;">REPORT ON THE PHYSICAL COUNT OF INVENTORIES<br>OFFICE SUPPLIES INVENTORY (1040401000)</h4>
      <span>(Type of Inventory Item)</span><br><br>
      <span style="font-weight:bold;">As of <?php echo $date_a;?></span>

      </div>
     

      </div>


     
<div class="row" style="margin-bottom:1%;font-weight:bold;">
  <div class="col">
    <span>Fund Cluster :</span> <span style="border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $getfc;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
</div>

  <div class="row" style="margin-bottom:2%;">
    <div class="col" style="font-weight:bold;">
      <span>For which </span><span style="border-bottom:2px solid black;"> <?php echo $fullname;?> </span>&nbsp;&nbsp;,&nbsp;&nbsp;<span style="border-bottom:2px solid black;">&nbsp;&nbsp;<?php echo $office;?>&nbsp;&nbsp;</span>&nbsp;&nbsp;,
      <span style="border-bottom:2px solid black;"><?php echo $univ_abb;?></span>&nbsp;&nbsp;&nbsp;
      <span> is accountable, having assumed such accountability on </span>&nbsp;&nbsp;&nbsp;<span style="border-bottom:2px solid black;"> Date Here 2022 </span>
    </div>
  </div>



  <table>
    <tr>
      <th rowspan="2" style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Article</th>
      <th rowspan="2" style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Description</th>
      <th rowspan="2" style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Stock<br>Number</th>
      <th rowspan="2" style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Unit of<br>Measure</th>
      <th rowspan="2" style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Unit Value</th>
      <th style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Balance Per<br>Card</th>
      <th style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">On Hand Per<br>Count</th>
      <th colspan="2" style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Shortage/Overage</th>
      <th rowspan="2" style="border-bottom:3px solid black;text-align:center;">Remarks</th>
    </tr>

    <tr>
     
      
      <td style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">(Quantity)</td>
      <td style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">(Quantity)</td>
      <td style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Quantity</td>
      <td style="border-bottom:3px solid black;border-right:3px solid black;text-align:center;">Value</td>
</tr>



<?php
                include('connection.php');
               // $fc = "1";
                $query=mysqli_query($conn,"SELECT * FROM fc
                WHERE cluster_id = $getfc_id  ORDER BY ar_id ASC");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>

                    <tr>
                      <td style="border:none;border-right:3px solid black;"><?php echo $row['article'];?></td>
                      <td style="border:none;border-right:3px solid black;"><?php echo $row['descr'];?></td>
                      <td style="border:none;border-right:3px solid black;text-align:center;"><?php echo $row['stock_num'];?></td>
                      <td style="border:none;border-right:3px solid black;"><?php echo $row['unit_meas'];?></td>
                      <td style="border:none;border-right:3px solid black;text-align:right;"><?php echo $row['unit_val'];?></td>
                      <td style="border:none;border-right:3px solid black;text-align:right;"><?php echo $row['bpc'];?></td>
                      <td style="border:none;border-right:3px solid black;text-align:right;"><?php echo $row['ohpc'];?></td>
                      <td style="border:none;border-right:3px solid black;"><?php echo "-";?></td>
                      <td style="border:none;border-right:3px solid black;"><?php echo "-";?></td>

                </tr>

                <?php

                }
                ?>

</table>




       

<div class="row">
    <div class="col">

    </div>

    <div class="col" style="text-align:right;">
       
</div>
            </form>   
   


           
    </div>

     





 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

<script>

$(function() {
    $( "#member" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


 $(function() {
    $( "#chairperson" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

 $(function() {
    $( "#officer" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


</script>


 

 
</body>
</html>
