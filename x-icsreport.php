<?php
//get user information
       include "a-session.php";
       include "gen_icsno.php";

       $code_format = date("dFY");
	?>

<?php
if(ISSET($_POST['prop_num'])){
    $code=$_POST['prop_num'];
    echo "<center><img alt='testing' scr='barcode.php?codetype=Code128&size=50&text=".$property_number."&print=true'/></center>";
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inventory Custodian Slip</title>

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
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
td{
    border:0px;
    padding-left:5px;
    padding-right:5px;
    padding-top:-5px;
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


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
//require_once "a-sidebar.php";
?>



<?php

    $idics = $_GET['idics'];
    $fc_id = $_GET['fc_id'];
    $custodian = $_GET['custodian'];

    
    $query=mysqli_query($conn,"select * from `fund_c` where fundc_id = $fc_id");
    while($row=mysqli_fetch_array($query))
   {
       $getfund_cluster = $row['fund_cluster'];
       
   } 

   $qr=mysqli_query($conn, "select * from `ics` where idics = $idics");
   while($rr = mysqli_fetch_array($qr))
   {
    $getics_no = $rr['ics_no'];
    $getfrom_id = $rr['from_id'];
    $getby_id = $rr['by_id'];
    $getics_date = $rr['ics_date'];
   }

   $fromid = mysqli_query($conn, "select * from `people` where idc = $getfrom_id");
   while($ff = mysqli_fetch_array($fromid))
   {
       $from = $ff['fullname'];
       $f_position = $ff['position'];
       $f_office = $ff['office'];

   }

   $byid = mysqli_query($conn, "select * from `people` where idc = $getby_id");
   while($bb = mysqli_fetch_array($byid))
   {
        $by = $bb['fullname'];
        $b_position = $bb['position'];
        $b_office = $bb['office'];
   }



?>


<div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:2%;">

<div class="col">
<h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a>
    <span style="font-size:20px;"> / <a href="x-xics.php" class="second"><i class="bx bx-folder"></i> ICS </a></span> 
    <span style="font-size:20px;"> / <i class="bx bx-file"></i> <?php echo $getics_no;?></span></h1>

<span><a href="x-full-ics.php" class="second"><i class="bx bx-box"></i> ICS Stockroom </a> | <a href="x-full-ics.php?#tobeiss" class="second"><i class="bx bx-user"></i> To be issued</a> | <a href="x-xptr.php" class="second"><i class="bx bx-refresh"></i> Transfer a Property</a></span>
 </div>

<div class="col" style="text-align:right;">
<a href="printsticker.php?fc_id=<?php echo $fc_id;?>&custodian=<?php echo $custodian;?>" target="_blank" ><button type="submit" id="print-btn"><i class='bx bx-printer'></i> </span> Print STICKER</button></a>        
        <button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
        <form action="export-xicsreport.php?idics=<?php echo $idics;?>&fc_id=<?php echo $fc_id;?>&custodian=<?php echo $custodian;?>" method="post">
        <button type="submit" id="csv" name="csvv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>
</div>
       
        </div>    

     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
     border-radius:10px;margin-right:10%;margin-left:10%;margin-top:5%;">
<div class="section-to-print">
      <div class="row">
          <div class="col">

          </div>
          <div class="col">
              <span style="float:right;font-style:italic;font-style:19px;">Appendix 59</span>
          </div>
      </div>
     <br><br><br>
    

          <center>
          <span style="font-weight:bold;font-size:20px;">INVENTORY CUSTODIAN SLIP</span>
        </center>


        <div class="row" style="margin-top:2%;">
            <div class="col">
                <span>Entity Name:</span>
            </div>

            <div class="col" style="margin-left:-80%;">
            <span style="border-bottom:2px solid black;text-transform:uppercase;">&nbsp;&nbsp;&nbsp;<?php echo $univ_name;?>&nbsp;&nbsp;&nbsp;</span>
            </div>
           
        </div>

        <div class="row">
            <div class="col">
                <span>Fund Cluster :</span>

            </div>

            <div class="col" style="margin-left:-35%;">
            <span style="border-bottom:2px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $getfund_cluster;?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>

            <div class="col" style="text-align:right;">
            <span>ICS No :</span><span style="font-weight:bold;border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $getics_no;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            
        </div>

       
        <table>
          

            <tr>
                <th width="3%" rowspan="2" style="border-left:3px solid black;border-bottom:3px solid black;" >Quantity</th>
                <th width="8%" rowspan="2" style="border-right:3px solid black;border-bottom:3px solid black;" >Unit</th>
                <th colspan="2" width="25%" style="border-right:3px solid black;border-bottom:3px solid black;" >Amount</th>
                <th rowspan="2" style="border-right:3px solid black;border-bottom:3px solid black;" >Description</th>
                <th rowspan="2" style="border-right:3px solid black;border-bottom:3px solid black;" >Property No.</th>
                <th rowspan="2" width="10%" style="border-bottom:3px solid black;">Estimated<br>Useful Life</th>

            </tr>

            <tr>
               
                <td style="border-bottom:3px solid black;border-right:3px solid black;">Unit Cost</td>
                <td style="border-bottom:2px solid black;border-right:3px solid black;">Total Cost</td>
                

            </tr>
          

            <!-- for looping-->
            <?php

            include('connection.php');
            $stat = "1";
            $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE
             xicspar.fc_id = $fc_id AND xicspar.unit_cost <= 50000 AND icspar_details.custodian = $custodian");
            while($row=mysqli_fetch_array($query))

{
?>
            <tr>
                <td style="border-right:3px solid black;border-left:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                <?php echo "1";?>
              
              
                
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                <?php echo $row['unit'];?>
               
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:right;">
                <?php echo number_format($row['unit_cost'],2);?>
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:right;">
                <?php echo number_format($row['unit_cost'],2);?>
                
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;">
                <?php echo $row['item_details'];?>

            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                <?php echo $row['prop_num'];?>
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                <?php echo $row['e_life'];?>
            </td>

            </tr>

            <?php
}
?>



            <tr>
                
                <td style="border-right:3px solid black;border-left:3px solid black;border-bottom:1px solid #ededed;color:transparent;">Sample</td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;">  
                

            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>

            </tr>

            <tr>
                <td style="border-right:3px solid black;border-left:3px solid black;border-bottom:3px solid black;color:transparent;">Sample</td>
                <td style="border-right:3px solid black;border-bottom:3px solid black;"></td>
                <td style="border-right:3px solid black;border-bottom:3px solid black;"></td>
                <td style="border-right:3px solid black;border-bottom:3px solid black;"></td>
                <td style="border-right:3px solid black;border-bottom:3px solid black;"></td>
                <td style="border-right:3px solid black;border-bottom:3px solid black;"></td>
                <td style="border-right:3px solid black;border-bottom:3px solid black;"></td>

            </tr>


            <tr>
                <td colspan="4" style="border:none;border-left:3px solid black;border-right:3px solid black;text-align:left;">Received from:</td>
                <td colspan="3" style="border-right:3px solid black;text-align:left;">Received by:</td>


            </tr>

            <tr>
                <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">
                <input type="text" name="from" id="from" style="border-bottom:1px solid black;width:80%;font-weight:bold;text-align:center;color:black;"
                value="<?php echo $from;?>">
                </td>
                <td colspan="3" style="border-right:3px solid black;text-align:center;">
                <input type="text" name="by" id="by" style="border-bottom:1px solid black;width:50%;font-weight:bold;text-align:center;color:black;"
                value="<?php echo $by;?>">
                 </td>


            </tr>
            <tr>
                <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">Signature Over Printed Name</td>
                <td colspan="3" style="border-right:3px solid black;text-align:center;">Signature Over Printed Name</td>


            </tr>

            <tr>
                <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">
                <input type="text" name="from" id="from" style="border-bottom:1px solid black;width:80%;text-align:center;color:black;"
                value="<?php echo $f_position; echo "/"; echo $f_office;?>">
               
                </td>
                <td colspan="3" style="border-right:3px solid black;text-align:center;">
              
                <input type="text" name="by" id="by" style="border-bottom:1px solid black;width:80%;text-align:center;color:black;"
                value="<?php echo $b_position; echo "/"; echo $b_office;?>">

                 </td>


            </tr>

            <tr>
                <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">Position / Office</td>
                <td colspan="3" style="border-right:3px solid black;text-align:center;">Position / Office</td>


            </tr>

            <tr>
                <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">
                <input type="text" name="from_date" id="from_date" style="border-bottom:1px solid black;width:80%;text-align:center;color:black;"
                value="<?php echo $getics_date;?>">
                </td>
                <td colspan="3" style="border-right:3px solid black;text-align:center;">
                <input type="text" name="by_date" id="by_date" style="border-bottom:1px solid black;width:50%;text-align:center;color:black;"
                value="<?php echo $getics_date;?>">
                

                 </td>


            </tr>


            <tr>
                <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;border-bottom:3px solid black;">Date</td>
                <td colspan="3" style="border-right:3px solid black;text-align:center;border-bottom:3px solid black;">Date</td>


            </tr>
           

        </table>
        
</div>


</div>





<div class="card-body" style=" border:1px solid #ededed; border-top:none;
     border-radius:10px;margin-right:10%;margin-left:10%;margin-top:5%;">


     <?php

       include('connection.php');
       $stat = "1";
       $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
       JOIN ics ON ics.idics = icspar_details.icsxpar_no JOIN people ON people.idc = icspar_details.custodian WHERE
        xicspar.fc_id = $fc_id AND xicspar.unit_cost <= 50000 AND icspar_details.custodian = $custodian");
       while($row=mysqli_fetch_array($query))

{

    $property_number = $row['prop_num'];

    
?>

    <div class="row">
        <div class="col">
        <table>
            <tr>
                <td style="border-right:1px solid black;text-align:center;" rowspan="2" width="20%">
                   <img src="<?php echo $univ_logo;?>" style= "object-fit:cover;" width="100px" height="100px" />
</td>
                <td width="15%" style="border:1px solid black;font-size:20px;font-weight:bold;">Property No. :</td>
                <td style="border:1px solid black;font-size:25px;font-weight:bold;" width="19%;"><?php echo $row['prop_num'];?></td>
                <td style="border-bottom:1px solid black;font-size:10px;color:grey;text-align:left;">
                <div class="row">
                    <div class="col" style="">

                    </div>
                    <div class="col" style="margin-left:-80%;">
                    Doc Code: SLSU-HC-QF-S001<br>
                    Revision: 00<br>
                    Date: <?php echo $code_format;?>
                    </div>
                </div>
               
            </td>

            </tr>
            <tr>
              
               
                <td style="border:1px solid black;">Name of Article:</td>
                <td colspan="2"  style="border:1px solid black;" width="35%"><?php echo $row['item_details'];?></td>
            </tr>

            <tr>
                <td style="border-right:1px solid black;" rowspan="3">
                <div class="row">
                <span style="font-weight:bold;display:inline-block;vertical-align:top;margin-top:-5%;">REPUBLIC OF THE PHILIPPINES</span>
                </div>
                <div class="row" style="margin-top:-5%;">
                <span style="font-size:25px;font-weight:bold;">SLSU-HINUNANGAN</span>
                </div>
                <div class="row" style="margin-top:-5%;">
                <span>Hinunangan, Southern Leyte</span>
                </div>

                <div class="row" style="margin-top:5%;">
                <span style="font-size:30px;">PROPERTY TAG</span>
                </div>
                <div class="row" style="margin-top:-5%;">
                <span>DO NOT REMOVE</span>

                </div>

                <div class="row" style="margin-top:5%;">
                    <!-- insert barcode-->
                   
                  <span><?php echo "<center><img alt='testing' src='barcode.php?codetype=Code128&size=20&text=".$row['prop_num']."&print=true'/></center>";?></span>
                 

                    
                </div>
               
               
                
            </td>
                
            
                <td style="border:1px solid black;">Code No. :</td>
                <td colspan="2"  style="border:1px solid black;"><?php echo $row['ics_no'];?></td> 
                <td></td>
               

</tr>

            
            <tr>
              
                <td style="border:1px solid black;">Date of Acquisition :</td>
                <td colspan="2"  style="border:1px solid black;"><?php echo $row['date'];?></td>
               

            </tr>

            <tr>
                
               
            </td>
                <td style="border:1px solid black;">Unit Cost :</td>
                <td colspan="2"  style="border:1px solid black;"><?php echo number_format($row['unit_cost'],2);?></td>
               

            </tr>

            <tr>
                <td></td>
                <td style="border:1px solid black;">End User :</td>
                <td colspan="2"  style="border:1px solid black;font-weight:bold;"><?php echo $row['fullname'];?></td>
               
            </tr>
        </table>
        </div>
    </div>


<?php

}
?>

    

</div>








  
       
     



  
   
     




  


 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 


 
</body>
</html>
