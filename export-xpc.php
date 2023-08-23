<?php require_once "a-session.php";
?>

<?php 
$fc=$_GET['fc'];
$fc_id=$_GET['fc_id'];
$date_a = date("F d, Y");

            


//$connect = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");
include "confil.php";
$output = '';
if(isset($_POST["csv"])){
    $query=mysqli_query($conn,"SELECT * FROM fc WHERE cluster_id = $fc_id  ORDER BY ar_id ASC");

$output .='

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
      <span style="font-weight:bold;">As of '.$date_a.'</span>

      </div>
     

      </div>


     
<div class="row" style="margin-bottom:1%;font-weight:bold;">
  <div class="col">
    <span>Fund Cluster :</span> <span style="border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$fc.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
</div>

  <div class="row" style="margin-bottom:2%;">
    <div class="col" style="font-weight:bold;">
      <span>For which </span><span style="border-bottom:2px solid black;"> '.$fullname.' </span>&nbsp;&nbsp;,&nbsp;&nbsp;<span style="border-bottom:2px solid black;">&nbsp;&nbsp;'.$office.'&nbsp;&nbsp;</span>&nbsp;&nbsp;,
      <span style="border-bottom:2px solid black;">'.$univ_abb.'</span>&nbsp;&nbsp;&nbsp;
      <span> is accountable, having assumed such accountability on </span>&nbsp;&nbsp;&nbsp;<span style="border-bottom:2px solid black;"> Date Here 2022 </span>
    </div>
  </div>



  <table class="table" border ="1">
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
            
            <!-- for looping data-->
          ';
          

      
          $query=mysqli_query($conn,"SELECT * FROM `fc`
          WHERE cluster_id = $fc_id  ORDER BY ar_id ASC");
          while($row=mysqli_fetch_array($query))
            {

           
                $output .='

        

                <tr>
                <td style="border:none;border-right:3px solid black;">'.$row['article'].'</td>
                <td style="border:none;border-right:3px solid black;">'.$row['descr'].'</td>
                <td style="border:none;border-right:3px solid black;text-align:center;">'.$row['stock_num'].'</td>
                <td style="border:none;border-right:3px solid black;">'.$row['unit_meas'].'</td>
                <td style="border:none;border-right:3px solid black;text-align:right;">'.$row['unit_val'].'</td>
                <td style="border:none;border-right:3px solid black;text-align:right;">'.$row['bpc'].'</td>
                <td style="border:none;border-right:3px solid black;text-align:right;">'.$row['ohpc'].'</td>
                <td style="border:none;border-right:3px solid black;">'."-".'</td>
                <td style="border:none;border-right:3px solid black;">'."-".'</td>

          </tr>


        ';
    }
$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $output;


}




?>