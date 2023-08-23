<?php require_once "a-session.php";
?>

<?php 
 $iar_id = $_GET['iar_id'];

 $query = mysqli_query($conn, "select *from `iar` where iar_id = $iar_id");
 while($row=mysqli_fetch_array($query)){
     $getmember = $row['member'];
     $getchair_p = $row['chairperson'];
     $supp_officer = $row['chairperson'];
     $getiar_no = $row['iar_no'];
     $getreq_off = $row['req_officer'];
     $invoice_no = $row['invoice_no'];
     $in_date = $row['in_date'];
     $rc_code = $row['rc_code'];
     $date_insp = $row['date_insp'];
     $date_receive = $row['date_receive'];

 }
 $total_cost = 0;
 $que = mysqli_query($conn, "select *from `xris` join fund_c on fund_c.fundc_id = xris.fc_id where id_iar = $iar_id");
 while($row=mysqli_fetch_array($que))
 {
     $getfund_c = $row['fund_cluster'];
     $getsupplier = $row['supplier'];
     $getpo_num = $row['po_num'];
     $getpo_date = $row['po_date'];
     $getdate = $row['date'];
     $getfc_id = $row['fc_id'];
     $total_cost+= $row['total_cost'];
    
     
 }
                
            


//$connect = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";
$output = '';
if(isset($_POST["csv"])){
 $sql = "SELECT * FROM `xris` join fund_c on fund_c.fundc_id = xris.fc_id where id_iar = $iar_id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) 

> 0){
$output .='
<table class="table" bordered ="1">

	<div class="row">
          <div class="col">

          </div>
          <div class="col">
              <span style="text-align:right;font-style:italic;font-size:14px;">Appendix 62</span>

          </div>
      </div>
	  <br><br><br>
	  <center>
	  <span style="font-weight:bold;font-size:25px;"> INSPECTION AND ACCEPTANCE REPORT</span><br><br>
	</center>

	<tr>
                <td style="border-top:1px solid black;">Supplier: </td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;border-right:1px solid black;"><span>'.$getsupplier.'</span></td>
               
                <td colspan="2" style="font-weight:bold;border-top:1px solid black;">IAR No. : </td>
                <td colspan="2" style="border-bottom:1px solid black;font-weight:bold;border-top:1px solid black;border-right:1px solid black;">'.$getiar_no.'</td>
                
                
                
            </tr>

            <tr>
                <td>PO No./Date: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;">'.$getpo_num.' / '.$getpo_date.'</td>
                
                <td colspan="2">Date: </td>  
                <td colspan="2" style="border-bottom:1px solid black;border-right:1px solid black;">'.$getdate.'<input type="hidden" name="iar_id" id="iar_id"
            value="<?php echo $iar_id;?>"></td>     
            </tr>

            <tr>
                <td>Requisitioning Office: </td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;">
                '.$getreq_off.'</td>

                <td colspan="2">Invoice No. :</td> 
                <td colspan = "2" style="border-bottom:1px solid black;border-right:1px solid black;">'.$invoice_no.'</td>    
            </tr>

            <tr>
                <td >Responsibility Center Code:</td>
                <td style="border-right:1px solid black;border-bottom:1px solid black;">'.$rc_code.'</td></td>
                <td colspan = "2">Date :</td>
                <td colspan="2" style="border-bottom:1px solid black;border-right:1px solid black;">'.$in_date.'</td>       
            </tr>

            <tr>
                <td></td>
                <td style="border-right:1px solid black;"></td>
                <td colspan="2"></td>
                <td colspan="2" style="border-right:1px solid black;"></td>

            </tr>

            <tr>
                <th width="2%" style="border-left:none;border-top:3px solid black;border-right:3px solid black;">Stock/<br>Property<br> No.</th>
                <th width="50%" style="border-left:none;border-top:3px solid black;border-right:3px solid black;">Description</th>
                <th style="border-left:none;border-top:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">Unit</th>
                <th style="border-left:none;border-top:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">Qty</th>
                <th style="border-left:none;border-top:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">Unit Price</th>
                <th style="border-right:none;border-top:3px solid black;border-bottom:3px solid black;border-right:1px solid black;">Total Amount</th>
            </tr>
            
            <!-- for looping data-->
          ';
          

      
            $query = mysqli_query($conn, "select *from `xris` where id_iar = $iar_id");
            while($row = mysqli_fetch_array($query))
            {

           
                $output .='

                
       
           
        

            <tr>
                <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:3px solid black;"></td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;2px;border-top:3px solid black;">
                '.$row['item_details'].'
            </td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:center;">
                '.$row['unit'].'
            </td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:center;">'.$row['in_quan'].'</td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;text-align:right;">'.$row['unit_cost'].'</td>
                <td style="border-bottom:1px solid black;text-align:right;border-right:1px solid black;">
                '.$row['total_cost'].'
            <input type="hidden" name="idx[]" id="idx" value="">
            
            
            </td>
    

            </tr>

            ';
        }
            
       
{
    $output .='
<tr>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;text-align:right;border-right:1px solid black;">-</td>

            </tr>

            <tr>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
               <td style="border-top:1px solid black;border-bottom:1px solid black;color:white;border-right:3px solid black;">Missing</td>
                <td style="border-top:1px solid black;border-bottom:1px solid black;text-align:right;border-right:1px solid black;">-</td>

            </tr>

    
            <!--for looping data end-->
         
            <tr>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;">TOTAL</td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;border-right:3px solid black;"></td>
                 <td style="border-bottom:3px solid black;text-align:right;border-right:1px solid black;">'.$total_cost.'</td></td>

            </tr>

            <tr>
                <td colspan="2" style="text-align:center;font-style:italic;font-weight:bold;
                border-bottom:3px solid black;border-right:3px solid black;"><span>INSPECTION</span></td>
                <td colspan="4" style="text-align:center;font-style:italic;font-weight:bold;border-bottom:3px solid black;border-right:1px solid black;"><span>ACCEPTANCE</span></td>

            </tr>

            <tr>
                <td>Date<br>Inspected :</td>
                <td style="border-bottom:1px solid black;border-right:3px solid black;">'.$date_insp.'</td>

                <td colspan="2">Date Received :</td>
                <td colspan="2" style="border-bottom:1px solid black;border-right:1px solid black;">'.$date_receive.'</td>
        </tr>

        <tr>
            <td>
            <input type="checkbox" class="larger" style="float:right;margin-top:0px;"> 
            </td>
            <td style="border-right:3px solid black;">Inspected, verified and found in order as to quantity and <br>specifications.</td>

            <td style="border-left:3px solid black;">
            <input type="checkbox" class="larger" style="float:right;margin-top:0px;border-left:3px solid black;"> 

            </td>
            <td colspan="3" style="border-right:1px solid black;">Complete</td>

        </tr>

        <tr>
            <td>
           
            </td>
            <td style="border-right:3px solid black;"></td>

            <td style="border-left:3px solid black;">
        <input type="checkbox" class="larger" style="float:right;margin-top:0px;border-left:3px solid black;"> 

            </td>
            <td colspan="3" style="border-right:1px solid black;">Partial (pls. specify quantity)</td>

        </tr>


        <tr>
            <td colspan="2" style="border-right:3px solid black;"></td>
            <td colspan="4" style="border-right:1px solid black;"></td>
        </tr>

        <tr>
            <td colspan="2" style="border-right:3px solid black;"></td>
            <td colspan="4" style="border-right:1px solid black;"></td>
        </tr>

        <tr>
            <td colspan="2" style="border-right:3px solid black;"></td>
            <td colspan="4" style="border-right:1px solid black;"></td> 
        </tr>

        <tr>
            <td colspan="2" style="border-right:3px solid black;">
                <div class="row">
                    <div class="col" style="text-align:left;text-transform:uppercase;color:black;font-weight:bold;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>'.$getchair_p.'</u>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <u style="text-align:right;text-transform:uppercase;color:black;font-weight:bold;">'.$getmember.'</u>

                    </div>
                </div>
            </td>

            <td colspan="4" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;border-right:1px solid black;">
            <u>'.$supp_officer.'</u>

            </td> 
        </tr>


        <tr>
            <td colspan="2" style="border-buttom:3px solid black;">
                <div class="row">
                    <div class="col" style="text-align:left;
                    ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <span> Chairperson</span>
                   
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <span style="text-align:right;border-bottom:1px solid black;"> Member</span>
                    </div>
                </div>
            </td>

            <td colspan="4" style="text-align:center;border-left:2px solid black;border-buttom: 3px solid black;border-right:1px solid black;">
                <span style="border-bottom:3px solid black;">Supply Officer 1</span>
            </td> 
        </tr>

        

        ';
    }
$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $output;


}





}









?>