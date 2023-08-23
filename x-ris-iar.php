
<?php
include "a-session.php";
include "gen_iarno.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Save as IAR <?php echo $iar_no;?> ?</title>

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
#saveiar{
    background:#77DD77;
    border:none;
    color:white;
    border-radius:5px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
   
    
}

  </style>


<body style="background:whitesmoke;">

 <?php
    
    $idx = $_GET['idx'];
    $po_num = $_GET['po_num'];
    $po_date = $_GET['po_date'];
    $iar_date = $_GET['date'];
    $supplier = $_GET['supplier'];
    $fund_cluster = $_GET['fund_cluster'];
   

    
    $query=mysqli_query($conn,"select * from `xris`where idx = $idx");
    while($row=mysqli_fetch_array($query))
   {
       $getsupp = $row['supplier'];
       $getpo_num = $row['po_num'];
       $getpo_date = $row['po_date'];
       $getfc_id = $row['fc_id'];
       $get_date = $row['date'];
   
   } 




  
    ?>
       <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
           <div class="col">
            <a href="x-input-iar.php?#iar-ready" style="background:white;font-size:30px;padding:5px 11px;color:grey;border-radius:50%;">
            <i class='bx bx-left-arrow-alt'></i></a>
           </div>
           <div class="col" style="margin-left:-90%;">
           <span style="color:grey;"><i class="bx bx-notepad"></i> Ready for IAR </span>
           </div>
        </div>
    
     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border-radius:10px;margin-right:10%;margin-left:10%;margin-top:5%;margin-bottom:10%;">
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

       <form method="post" action="save-ris-iar.php">
       <table class="top">
                    <tr>

                        <td style="font-weight:bold;"> Entity Name: <span style="border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;<?php echo $univ_name;?>&nbsp;&nbsp;&nbsp;</span></td>
                        <td style="font-weight:bold;">Fund Cluster : <span style="border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fund_cluster;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                       
                    </tr>
        </table>

        <table>
            
            <tr>
                <td>Supplier: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;"><span>&nbsp;&nbsp;<?php echo $getsupp;?></span></td>
               
                <td colspan="2" style="font-weight:bold;">IAR No. : </td>
                <td colspan="2" style="border-bottom:1px solid black;font-weight:bold;">
                  <input type="text" style="font-weight:bold;color:black;" name="iar_no" id="iar_no" value="<?php echo $iar_no;?>"></td>
                
                
                
            </tr>

            <tr>
                <td>PO No./Date: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;"><?php echo $getpo_num; echo "/"; echo $getpo_date;?></td>
                
                <td colspan="2">Date: </td>  
                <td colspan="2" style="border-bottom:1px solid black;">
                 <input type="text" style="color:black;" name="date" id="date" value="<?php echo $get_date;?>">
        </td>     
            </tr>

            <tr>
                <td>Requisitioning Office: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;">
                <input type="text" name="req_off" id="req_off" style ="color:black;" required/></td>

                <td colspan="2">Invoice No. :</td> 
                <td colspan = "2" style="border-bottom:1px solid black;"><input type="text" name="in_no" id="in_no" style ="color:black;" ></td>    
            </tr>

            <tr>
                <td >Responsibility Center Code:</td>
                <td style="border-right:1px solid black;border-bottom:1px solid black;"><input type="text" name="res_code" id="res_code" style ="color:black;"></td></td>
                <td colspan = "2">Date :</td>
                <td colspan="2" style="border-bottom:1px solid black;"><input type="text" name="in_date" id="in_date" style ="color:black;" value=""></td>       
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
             $query = mysqli_query($conn, "select * from `xris` join fc on fc.ar_id = xris.sn_id
             where fc_id = $getfc_id and supplier = '$getsupp' and po_num = '$getpo_num' and po_date = '$getpo_date'");
             while($row = mysqli_fetch_array($query))
             {

                    $total_cost+= $row['total_cost'];

                    
?>

            <tr>
                <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:3px solid black;text-align:center;"><?php echo $row['stock_num'];?></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;2px;border-top:3px solid black;">
                <?php echo $row['item_details'];?></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:center;">
                <?php echo $row['unit'];?></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:center;"><?php echo $row['in_quan'];?></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:right;"><?php echo number_format($row['unit_cost'],2);?></td>
                <td style="border-bottom:1px solid black;text-align:right;"><?php echo number_format($row['total_cost'],2);?>
            <input type="hidden" name="idx[]" id="idx" value="<?php echo $row['idx'];?>">
            <input type="hidden" name="sn_id[]" id="sn_id" value="<?php echo $row['sn_id'];?>">

            
            
            </td>


                




               

            </tr>

            <?php
             }
             ?>

             <tr>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;text-align:right;">-</td>

            </tr>

            <tr>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;text-align:right;">-</td>

            </tr>

           



        
         
            <tr>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;">TOTAL</td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;text-align:right;">
                 <?php echo number_format($total_cost,2);?>
                 <input type="hidden" name="tot_cost" id="tot_cost" value="<?php echo $total_cost;?>">
                 <input type="hidden" name="iar_id" id="iar_id" value="<?php echo $iar_id;?>">
                </td>

            </tr>

            <tr>
                <td colspan="2" style="text-align:center;font-style:italic;font-weight:bold;
                border-bottom:3px solid black;border-right:3px solid black;"><span>INSPECTION</span></td>
                <td colspan="4" style="text-align:center;font-style:italic;font-weight:bold;border-bottom:3px solid black;"><span>ACCEPTANCE</span></td>

            </tr>

            <tr>
                <td>Date<br>Inspected :</td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;"><input type="text" name="date_ins" id="date_ins" style ="color:black;"></td>

                <td colspan="2">Date Received :</td>
                <td colspan="2" style="border-bottom:1px solid black;"><input type="text" name="date_received" id="date_received" style ="color:black;"></td>
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
                       <input type="text" name="chairperson" id="chairperson" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="">
                    </div>
                    <div class="col" style="text-align:center;">
                    <input type="text" name="member" id="member" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="">

                    </div>
                </div>
            </td>

            <td colspan="4" style="text-align:center;">
            <input type="text" name="officer" id="officer" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="">

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
        <input type="submit" name="save" id="saveiar" title="Save as IAR No. <?php echo $iar_no;?>?" value="Save as IAR No. <?php echo $iar_no;?>">
    </div> 
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
