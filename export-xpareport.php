<?php require_once "a-session.php";
 include "gen_icsno.php";
?>

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


	


                
            


//$connect = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";
$output = '';
if(isset($_POST["csv"])){
    $stat = "1";
 $sql = "SELECT *FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.stat = $stat
 AND xicspar.fc_id = $fc_id AND icspar_details.icsxpar_no = $idpar AND xicspar.unit_cost > 50000 AND icspar_details.custodian = $idc";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) 

> 0){
$output .='
<table class="table" bordered ="1">

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
                <span>Entity Name:</span><span style="border-bottom:2px solid black;text-transform:uppercase;">&nbsp;&nbsp;&nbsp;'.$univ_name.'&nbsp;&nbsp;&nbsp;</span>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span>Fund Cluster :</span><span style="border-bottom:2px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$fund_cluster.'
            
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>PAR No :</span><span style="font-weight:bold;border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$par_no.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

            </div>

            
        </div>

        <tr>
        <th width="3%" rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;border-top:2px solid black;" >Quantity</th>
        <th width="8%" rowspan="2" style="border-right:2px solid black;border-bottom:2px solid black;border-top:2px solid black;" >Unit</th>
        <th width="35%" rowspan="2" style="border-right:2px solid black;border-bottom:2px solid black;border-top:2px solid black;" >Description</th>
        <th rowspan="2" style="border-right:2px solid black;border-bottom:2px solid black;border-top:2px solid black;" >Property No.</th>
        <th rowspan="2" style="border-right:2px solid black;border-bottom:2px solid black;border-top:2px solid black;" >Date<br>Acquired</th>
        <th rowspan="2" width="10%" style="border-bottom:2px solid black; border-right:2px solid black;border-top:2px solid black;">Unit<br>Price</th>
        <th rowspan="2" width="10%" style="border-bottom:2px solid black;border-right:2px solid black;border-top:2px solid black;">Amount</th>


    </tr>

    <tr>
       
       
        

    </tr>

  <!-- for looping-->
          ';
          

          $stat = "1";
          $query=mysqli_query($conn,"SELECT * FROM `icspar_details` JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.stat = $stat
          AND xicspar.fc_id = $fc_id AND icspar_details.icsxpar_no = $idpar AND xicspar.unit_cost > 50000 AND icspar_details.custodian = $idc");
          while($row=mysqli_fetch_array($query))

            {

           
                $output .='

                
       
           
        

                <tr>
                <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;text-align:center;">
              
                '."1".'
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                '.$row['unit'].'
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;">
                '.$row['item_details'].'
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                '.$row['prop_num'].'
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                '.$row['date'].'

                
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:right;">
                '.$row['unit_cost'].'
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:right;">
                '.$row['unit_cost'].'
            </td>

              

               
            </tr>


            ';
        }
            
       
{
    $output .='
    <tr>
    <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;color:white;">sample</td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;"></td>

  

   
</tr>

<tr>
    <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;color:white;">sample;</td>
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
    <td colspan="3" style="border-left:2px solid black;text-align:center;">
    <u>'.$by_full.' </u>
   
</td>
    <td colspan="4" style="border-right:2px solid black;text-align:center;">
    <u>'.$from_full.' </u>
</td>


</tr>

<tr>
    <td colspan="3" style="border-left:2px solid black;text-align:center;"><span style="margin-left:17%;">Signature Over Printed Name</span></td>
    <td colspan="4" style="border-right:2px solid black;text-align:center;">Signature Over Printed Name</td>


</tr>

<tr>
    <td colspan="3" style="border-left:2px solid black;text-align:center;">
   <u> '.$by_pos.' / '.$by_off.'</u>
    
 
</td>
    <td colspan="4" style="border-right:2px solid black;text-align:right;text-align:center;">
   <u> '.$from_pos.' / '.$from_off.'</u>
    

</td>


</tr>

<tr>
    <td colspan="3" style="border-left:2px solid black;text-align:center;"><span style="margin-left:30%;">Position/Office</span></td>
    <td colspan="4" style="border-right:2px solid black;text-align:center;">Position/Office</td>


</tr>


<tr>
    <td colspan="3" style="border-left:2px solid black;text-align:center;">
   <u> '.$par_date.'</u></td>
    <td colspan="4" style="border-right:2px solid black;text-align:center;"><u>'.$par_date.'</u></td>


</tr>

<tr>
    <td colspan="3" style="border-left:2px solid black;border-bottom:2px solid black;text-align:center;"><span style="margin-left:35%;">Date</span></td>
    <td colspan="4" style="border-right:2px solid black;text-align:center;border-bottom:2px solid black;">Date</td>
 



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