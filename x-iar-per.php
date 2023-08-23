
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
         
        font-family: "Cambria", Georgia, serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:3px solid black;
  font-size:20px;
  
}
.row .col input[type="text"], #officer{
  font-family: "Cambria", Georgia, serif;
  border-bottom:1px solid black;
}
span{
  font-family: "Cambria", Georgia, serif;
}
th[colspan="6"] {
    text-align: center;
    font-family: "Cambria", Georgia, serif;

}
th[rowspan="2"]{
  text-align:center;
  font-family: "Cambria", Georgia, serif;
}
table th{
    text-align:center;
    border:2px solid black;
    font-family: "Cambria", Georgia, serif;
    font-style:italic;

}
table td{
    border:none;
    
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-family: "Cambria", Georgia, serif;
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
#save{
    border-radius:2px;
    border:none;
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
    
    $iar_id = $_GET['iar_id'];

    $query = mysqli_query($conn, "select *from `iar` where iar_id = $iar_id");
    while($row=mysqli_fetch_array($query)){
        $getmember = $row['member'];
        $getchair_p = $row['chairperson'];
        $supp_officer = $row['supp_officer'];
        $getiar_no = $row['iar_no'];
        $getreq_off = $row['req_officer'];
        $invoice_no = $row['invoice_no'];
        $in_date = $row['in_date'];
        $rc_code = $row['rc_code'];
        $date_insp = $row['date_insp'];
        $date_receive = $row['date_receive'];

    }

    $que = mysqli_query($conn, "select *from `xicspar` join fund_c on fund_c.fundc_id = xicspar.fc_id where id_iar = $iar_id");
    while($row=mysqli_fetch_array($que))
    {
        $getfund_c = $row['fund_cluster'];
        $getsupplier = $row['supplier'];
        $getpo_num = $row['po_num'];
        $getpo_date = $row['po_date'];
        $getdate = $row['date'];
        $getfc_id = $row['fc_id'];
       
          
    }
    ?>
    
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">
    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a>
    <span style="font-size:20px;"> / <a href="x-ia-report.php" class="second"><i class="bx bx-folder"></i> IAR </a></span> <span style="font-size:20px;"> / <i class="bx bx-file"></i> <?php echo $getiar_no;?></span></h1>

    </div>

    <div class="col" style="text-align:right;">
    <a href="x-input-ics.php?#additemss" style=";font-size:25px;color:grey;border-radius:50%;">
            <i class='bx bx-mouse'> ICS&PAR Acceptance</i></a>
    </div>
 
 
   
    </div>
        <div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:2%;">
        

        <div class="col">
      
        </div>

        <div class="col" style="">
        <button type="submit" style="float:right;" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
        <form action="export-xiarper.php?iar_id=<?php echo $iar_id; ?>" method="post">
        <button type="submit" style="float:right;" id="csv" name="csv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>
        </div>
       

        




        </div>
    
     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border-radius:10px;margin-right:10%;margin-left:10%;" >
    <div class="section-to-print">
      <div class="row">
          <div class="col">

          </div>
          <div class="col">
              <span style="float:right;font-style:italic;font-size:27px;">Appendix 62</span>

          </div>
      </div>

     <br><br><br>
          <center>
          <span style="font-weight:bold;font-size:25px;"> INSPECTION AND ACCEPTANCE REPORT</span><br><br>
        </center>

       <form method="post" action="#">
        <table class="top">
                    <tr>

                        <td style="font-weight:bold;"> Entity Name: <span style="border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;<?php echo $univ_name;?>&nbsp;&nbsp;&nbsp;</span></td>
                        <td style="font-weight:bold;">Fund Cluster : <span style="border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $getfund_c;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                       
                    </tr>
        </table>

        <table>
            
            <tr>
                <td>Supplier: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;"><span><?php echo $getsupplier;?></span></td>
               
                <td colspan="2" style="font-weight:bold;">IAR No. : </td>
                <td colspan="2" style="border-bottom:1px solid black;font-weight:bold;"><?php echo $getiar_no;?></td>
                
                
                
            </tr>

            <tr>
                <td>PO No./Date: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;"><?php echo $getpo_num; echo "/"; echo $getpo_date;?></td>
                
                <td colspan="2">Date: </td>  
                <td colspan="2" style="border-bottom:1px solid black;"><?php echo $getdate;?><input type="hidden" name="iar_id" id="iar_id"
            value="<?php echo $iar_id;?>"></td>     
            </tr>

            <tr>
                <td>Requisitioning Office: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;">
                <?php echo $getreq_off;?></td>

                <td colspan="2">Invoice No. :</td> 
                <td colspan = "2" style="border-bottom:1px solid black;"><input type="text" name="in_no" value="<?php echo $invoice_no;?>" style ="color:black;" ></td>    
            </tr>

            <tr>
                <td >Responsibility Center Code:</td>
                <td style="border-right:1px solid black;border-bottom:1px solid black;"><input type="text" name="res_code" value="<?php echo $rc_code;?>" style ="color:black;"></td></td>
                <td colspan = "2">Date :</td>
                <td colspan="2" style="border-bottom:1px solid black;"><input type="text" name="in_date" style ="color:black;" value="<?php echo $in_date;?>"></td>       
            </tr>

            <tr>
                <td></td>
                <td style="border-right:1px solid black;"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>

            </tr>

            <tr>
                <th width="2%" style="border-left:none;border-top:3px solid black;border-right:3px solid black;">Stock/<br>Property<br> No.</th>
                <th width="50%" style="border-left:none;border-top:3px solid black;">Description</th>
                <th style="border-left:none;border-top:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">Unit</th>
                <th style="border-left:none;border-top:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">Qty</th>
                <th style="border-left:none;border-top:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">Unit Price</th>
                <th style="border-right:none;border-top:3px solid black;border-bottom:3px solid black;">Total Amount</th>
            </tr>
            
            <!-- for looping data-->
            <?php

            $total_cost = 0;
            $query = mysqli_query($conn, "select * from `xicspar`
            where fc_id = $getfc_id and supplier = '$getsupplier' and po_num = '$getpo_num' and po_date = '$getpo_date'");
            while($row = mysqli_fetch_array($query))
            {

                $total_cost+= $row['total_cost'];

                
            ?>

           

            <tr>
                <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:3px solid black;"></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;2px;border-top:3px solid black;">
                <?php echo $row['item_details'];?>
            </td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:center;">
                <?php echo $row['unit'];?>
            </td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:center;"><?php echo $row['in_quan'];?></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:right;"><?php echo number_format($row['unit_cost'],2);?></td>
                <td style="border-bottom:1px solid black;text-align:right;">
                <?php echo number_format($row['total_cost'],2);?>
            <input type="hidden" name="idx[]" id="idx" value="">
            
            
            </td>
    

            </tr>

            <?php
            }
            ?>

<tr>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:transparent;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;text-align:right;">-</td>

            </tr>

            <tr>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:transparent;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;"></td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;text-align:right;">-</td>

            </tr>

    
            <!--for looping data end-->
         
            <tr>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;">TOTAL</td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;text-align:right;"><?php echo number_format($total_cost,2);?></td></td>

            </tr>

            <tr>
                <td colspan="2" style="text-align:center;font-style:italic;font-weight:bold;
                border-bottom:3px solid black;border-right:3px solid black;"><span>INSPECTION</span></td>
                <td colspan="4" style="text-align:center;font-style:italic;font-weight:bold;border-bottom:3px solid black;"><span>ACCEPTANCE</span></td>

            </tr>

            <tr>
                <td>Date<br>Inspected :</td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;"><input type="text" name="date_ins" style ="color:black;" value="<?php echo $date_insp;?>"></td>

                <td colspan="2">Date Received :</td>
                <td colspan="2" style="border-bottom:1px solid black;"><input type="text" name="date_received" style ="color:black;" value="<?php echo $date_receive;?>"></td>
        </tr>

        <tr>
            <td>
            <input type="checkbox" class="larger" style="float:right;margin-top:0px;"> 
            </td>
            <td style="border-right:3px solid black;">Inspected, verified and found in order as to quantity and <br>specifications.</td>

            <td>
            <input type="checkbox" class="larger" style="float:right;margin-top:0px;"> 

            </td>
            <td colspan="3">Complete</td>

        </tr>

        <tr>
            <td>
           
            </td>
            <td style="border-right:3px solid black;"></td>

            <td>
            <input type="checkbox" class="larger" style="float:right;margin-top:0px;"> 

            </td>
            <td colspan="3">Partial (pls. specify quantity)</td>

        </tr>


        <tr>
            <td colspan="2" style="border-right:3px solid black;"></td>
            <td colspan="4"></td>
        </tr>

        <tr>
            <td colspan="2" style="border-right:3px solid black;"></td>
            <td colspan="4"></td>
        </tr>

        <tr>
            <td colspan="2" style="border-right:3px solid black;"></td>
            <td colspan="4"></td> 
        </tr>

        <tr>
            <td colspan="2" style="border-right:3px solid black;">
                <div class="row">
                    <div class="col" style="text-align:center;
                    ">
                       <input type="text" name="chairperson" id="chairperson" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="<?php echo $getchair_p;?>">
                    </div>
                    <div class="col" style="text-align:center;">
                    <input type="text" name="member" id="member" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="<?php echo $getmember;?>">

                    </div>
                </div>
            </td>

            <td colspan="4" style="text-align:center;">
            <input type="text" name="officer" id="officer" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="<?php echo $supp_officer;?>">

            </td> 
        </tr>


        <tr>
            <td colspan="2">
                <div class="row">
                    <div class="col" style="text-align:center;
                    ">
                       <span> Chairperson</span>
                    </div>
                    <div class="col" style="text-align:center;">
                       <span> Member</span>
                    </div>
                </div>
            </td>

            <td colspan="4" style="text-align:center;border-left:2px solid black;">
                <span style="">Supply Officer 1</span>
            </td> 
        </tr>

        








</table>

<div class="row">
    <div class="col">

    </div>

    <div class="col" style="text-align:right;">
     
    </div>
</div>
        
   


           
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
