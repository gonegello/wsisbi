<?php
//get user information
       include "a-session.php";
    
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Property Acknowlegdement Receipt</title>

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


<?php
    $fc_id = $_GET['fc_id'];
 
    $idc = $_GET['idc'];//custodian id
    $from_id = $_GET['from_id'];
    $by_id = $_GET['by_id'];
    $idpar = $_GET['idpar'];


    $query=mysqli_query($conn,"select * from `fund_c`where fundc_id = $fc_id");
    while($row=mysqli_fetch_array($query))
   {
       $fund_cluster = $row['fund_cluster'];
   } 

   $query=mysqli_query($conn,"select * from `people`where idc = $idc");
   while($row=mysqli_fetch_array($query))
  {
      $getfullname = $row['fullname'];
  } 

  
  $query=mysqli_query($conn,"select * from `people`where idc = $from_id");
  while($row=mysqli_fetch_array($query))
 {
     $from_full = $row['fullname'];
     $from_pos = $row['position'];
     $from_off = $row['office'];

 } 

 $query=mysqli_query($conn,"select * from `people`where idc = $by_id");
 while($row=mysqli_fetch_array($query))
{
    $by_full = $row['fullname'];
    $by_pos = $row['position'];
    $by_off = $row['office'];

    

} 


  $query=mysqli_query($conn,"select * from `par`where idpar = $idpar");
  while($row=mysqli_fetch_array($query))
 {
     $par_no = $row['par_no'];
     $par_date = $row['par_date'];
     
 
 } 

?>


<div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:2%;">
    <div class="col">

    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a>
    <span style="font-size:20px;"> / <a href="x-xpar.php" class="second"><i class="bx bx-folder"></i> PAR </a></span> 
    <span style="font-size:20px;"> / <i class="bx bx-file"></i> <?php echo $par_no;?></span></h1>

<span><a href="x-full-par.php" class="second"><i class="bx bx-box"></i> PAR Stockroom </a> | <a href="x-full-par.php?#tobeiss" class="second"><i class="bx bx-user"></i> To be issued</a> | <a href="x-xptr.php" class="second"><i class="bx bx-refresh"></i> Transfer a Property</a></span>

    </div>

    <div class="col">

    <a href="printsticpar.php?idpar=<?php echo $idpar;?>&fc_id=<?php echo $fc_id;?>&by_id=<?php echo $by_id;?>&from_id=<?php echo $from_id;?>&idc=<?php echo $idc;?>" target="_blank" ><button type="submit" id="print-btn"><i class='bx bx-printer'></i> </span> Print STICKER</button></a>        
        <button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
        <form action="export-xpareport.php?idpar=<?php echo $idpar;?>&fc_id=<?php echo $fc_id;?>&by_id=<?php echo $by_id;?>&from_id=<?php echo $from_id;?>&idc=<?php echo $idc;?>" method="post">
        <button type="submit" id="csv" name="csv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>

    </div>

     

        </div> 
    
     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
     border-radius:10px;margin-right:10%;margin-left:10%;margin-top:5%;margin-bottom:5%;">
<div class="section-to-print">
      <div class="row">
          <div class="col">

          </div>
          <div class="col">
              <span style="float:right;font-style:italic;font-style:19px;">Appendix 71</span>
          </div>
      </div>
     <br><br><br>
          <center>
          <span style="font-weight:bold;font-size:23px;">PROPERTY ACKNOWLEDGEMENT RECEIPT</span>
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
            <span style="border-bottom:2px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fund_cluster;?>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>

            <div class="col" style="text-align:right;">
            <span>PAR No :</span><span style="font-weight:bold;border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $par_no;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            
        </div>

       
        <table>
          

            <tr>
                <th width="3%" rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;" >Quantity</th>
                <th width="8%" rowspan="2" style="border-right:2px solid black;border-bottom:2px solid black;" >Unit</th>
                <th width="35%" style="border-right:2px solid black;border-bottom:2px solid black;" >Description</th>
                <th style="border-right:2px solid black;border-bottom:2px solid black;" >Property No.</th>
                <th style="border-right:px solid black;border-bottom:2px solid black;" >Date<br>Acquired</th>
                <th width="10%" style="border-bottom:2px solid black;">Unit<br>Price</th>
                <th width="10%" style="border-bottom:2px solid black;">Amount</th>


            </tr>

            <tr>
               
               
                

            </tr>
          

            <!-- for looping-->
            <?php

            include('connection.php');
            $stat = "1";
            $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.stat = $stat
            AND xicspar.fc_id = $fc_id AND icspar_details.icsxpar_no = $idpar AND xicspar.unit_cost > 50000 AND icspar_details.custodian = $idc");
            while($row=mysqli_fetch_array($query))

            {
            ?>
            <tr>
                <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;text-align:center;">
              
                <?php echo "1";?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                <?php echo $row['unit'];?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;">
                <?php echo $row['item_details'];?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                <?php echo $row['prop_num'];?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                <?php echo $row['date'];?>

                
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:right;">
                <?php echo number_format($row['unit_cost'],2);?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:right;">
                <?php echo number_format($row['unit_cost'],2);?>
            </td>

              

               
            </tr>

            <?php
            }
            ?>

            <tr>
                <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;color:transparent;">sample</td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>

              

               
            </tr>

            <tr>
                <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;color:transparent;">sample;</td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>

               
            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;"></td>
                <td colspan="4" style="border-right:2px solid black;"></td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;">Received by:</td>
                <td colspan="4" style="border-right:2px solid black;">Received from:</td>


            </tr>


            <tr>
                <td colspan="3" style="border-left:2px solid black;">
                <input type="text" name="by" id="by" value="<?php echo $by_full;?>" 
                style="border-bottom:2px solid black;width:80%;margin-left:-1%;text-align:center;color:black;text-transform:uppercase;">
            </td>
                <td colspan="4" style="border-right:2px solid black;text-align:right;">
                <input type="text" name="from" id="from"  value="<?php echo $from_full;?>" style="border-bottom:2px solid black;margin-right:-1%;text-align:center;color:black;text-transform:uppercase;">
            </td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;"><span style="margin-left:17%;">Signature Over Printed Name</span></td>
                <td colspan="4" style="border-right:2px solid black;text-align:center;">Signature Over Printed Name</td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;">
                <input type="text" name="by_po" id="by_po" value= "<?php echo $by_pos; echo "/"; echo $by_off;?>"
                style="border-bottom:2px solid black;width:80%;margin-left:-1%;text-align:center;color:black;">
             
            </td>
                <td colspan="4" style="border-right:2px solid black;text-align:right;">
                <input type="text" name="from_po" id="from_po" value="<?php echo $from_pos; echo "/"; echo $from_off;?>"
                style="border-bottom:2px solid black;margin-right:-1%;text-align:center;color:black;">
            
            </td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;"><span style="margin-left:30%;">Position/Office</span></td>
                <td colspan="4" style="border-right:2px solid black;text-align:center;">Position/Office</td>


            </tr>


            <tr>
                <td colspan="3" style="border-left:2px solid black;">
                <input type="text" name="by_date" id="by_date" style="border-bottom:2px solid black;width:80%;margin-left:-1%;text-align:center;color:black;" value="<?php echo $par_date;?>"></td>
                <td colspan="4" style="border-right:2px solid black;text-align:right;"><input type="text" name="from_date" id="from_date" style="border-bottom:2px solid black;margin-right:-1%;text-align:center;color:black;" value="<?php echo $par_date;?>"></td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;border-bottom:2px solid black;"><span style="margin-left:35%;">Date</span></td>
                <td colspan="4" style="border-right:2px solid black;text-align:center;border-bottom:2px solid black;">Date</td>
             



            </tr>

           


           

        </table>
       

        </div>






        

    <div class="card-body" style=" border:1px solid #ededed; border-top:none;
     border-radius:10px;margin-right:10%;margin-left:10%;margin-top:5%;">

     <?php

       include('connection.php');
       $stat = "1";
       $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
       JOIN par ON par.idpar = icspar_details.icsxpar_no JOIN people ON people.idc = icspar_details.custodian WHERE
        xicspar.fc_id = $fc_id AND xicspar.unit_cost > 50000 AND icspar_details.custodian = $idc");
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
                    Date: <?php echo $code_format = date("M d Y");?>
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
                <td colspan="2"  style="border:1px solid black;"><?php echo $row['par_no'];?></td> 
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
