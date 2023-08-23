<?php require_once "a-session.php";
 include "gen_icsno.php";
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



//$connect = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";
$output = '';
if(isset($_POST["csvv"])){
 $sql = "SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE
 xicspar.fc_id = $fc_id AND xicspar.unit_cost <= 50000 AND icspar_details.custodian = $custodian";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) 

> 0){
$output .='
<table class="table" bordered ="1">

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
  <span style="border-bottom:2px solid black;text-transform:uppercase;">&nbsp;&nbsp;&nbsp;'.$univ_name.'&nbsp;&nbsp;&nbsp;</span>
  </div>
 
</div>

<div class="row">
  <div class="col">
      <span>Fund Cluster :</span>

  </div>

  <div class="col" style="margin-left:-35%;">
  <span style="border-bottom:2px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  '.$getfund_cluster.'
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>

  <div class="col" style="text-align:right;">
  <span>ICS No :</span><span style="font-weight:bold;border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getics_no.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
          ';
          

      
            $query = mysqli_query($conn, "SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE
            xicspar.fc_id = $fc_id AND xicspar.unit_cost <= 50000 AND icspar_details.custodian = $custodian");
            while($row = mysqli_fetch_array($query))
            {

           
                $output .='

                
       
           
        

                <tr>
                <td style="border-right:3px solid black;border-left:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                <?php echo "1";?>
              
              
                
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                '.$row['unit'].'
               
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:right;">
                '.$row['unit_cost'].'
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:right;">
                '.$row['unit_cost'].'
                
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;">
                '.$row['item_details'].'

            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                '.$row['prop_num'].'
            </td>
                <td style="border-right:3px solid black;border-bottom:1px solid #ededed;text-align:center;">
                '.$row['e_life'].'
            </td>

            </tr>


            ';
        }
            
       
{
    $output .='
    <tr>
                
    <td style="border-right:3px solid black;border-left:3px solid black;border-bottom:1px solid #ededed;color:white;">Sample</td>
    <td style="border-right:3px solid black;border-bottom:1px solid #ededed;">  
    

</td>
    <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
    <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
    <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
    <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>
    <td style="border-right:3px solid black;border-bottom:1px solid #ededed;"></td>

</tr>

<tr>
    <td style="border-right:3px solid black;border-left:3px solid black;border-bottom:3px solid black;color:white;">Sample</td>
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
    value="'.$from.'">
    </td>
    <td colspan="3" style="border-right:3px solid black;text-align:center;">
    <input type="text" name="by" id="by" style="border-bottom:1px solid black;width:50%;font-weight:bold;text-align:center;color:black;"
    value="'.$by.'">
     </td>


</tr>
<tr>
    <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">Signature Over Printed Name</td>
    <td colspan="3" style="border-right:3px solid black;text-align:center;">Signature Over Printed Name</td>


</tr>

<tr>
    <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">
    <input type="text" name="from" id="from" style="border-bottom:1px solid black;width:80%;text-align:center;color:black;"
    value="'.$f_position.' / '.$f_office.'">
   
    </td>
    <td colspan="3" style="border-right:3px solid black;text-align:center;">
  
    <input type="text" name="by" id="by" style="border-bottom:1px solid black;width:80%;text-align:center;color:black;"
    value="'.$b_position.' / '.$b_office.'">

     </td>


</tr>

<tr>
    <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">Position / Office</td>
    <td colspan="3" style="border-right:3px solid black;text-align:center;">Position / Office</td>


</tr>

<tr>
    <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;">
    <input type="text" name="from_date" id="from_date" style="border-bottom:1px solid black;width:80%;text-align:center;color:black;"
    value="'.$getics_date.'">
    </td>
    <td colspan="3" style="border-right:3px solid black;text-align:center;">
    <input type="text" name="by_date" id="by_date" style="border-bottom:1px solid black;width:50%;text-align:center;color:black;"
    value="'.$getics_date.'">
    

     </td>


</tr>


<tr>
    <td colspan="4" style="border-left:3px solid black;border-right:3px solid black;text-align:center;border-bottom:3px solid black;">Date</td>
    <td colspan="3" style="border-right:3px solid black;text-align:center;border-bottom:3px solid black;">Date</td>


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