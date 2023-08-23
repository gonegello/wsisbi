<?php require_once "a-session.php";
 include "gen_rsmi.php";
?>

<?php 

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


	


                
            


include('connection.php');
$output = '';
if(isset($_POST["csvv"])){
$query = mysqli_query($conn, "select * FROM ris JOIN req on req.id_ris = ris.idris JOIN xris on xris.idx = req.item_id
JOIN fc ON fc.ar_id = xris.sn_id 
WHERE  ris_month = '{$ris_month}' AND ris_year = '{$ris_year}' AND ris.id_rmsi = $idrsmi");

$output .='
<table class="table" border ="1">

<div class="section-to-print">
<div class="row">

    <div class="col" style="text-align:right;margin-top:2%;">
       <span>Appendix 63</span>
    </div>
    
</div>

   
    <div class="row" style="text-align:center;">
            <h5>REPORT OF SUPPLIES AND MATERIALS ISSUED</h5><h5 style="text-transform:uppercase;">'.$univ_name.'</h5>
            <h5>'.$univ_ad.'</h5>
    </div>


<tr>
    <span>Date: <u>'.$rsmi_date.'</u>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    No.: <u>'.$rsmi_no.'</u>
    </span>
    
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
          ';
          

          $query=mysqli_query($conn,"SELECT * FROM ris JOIN req on req.id_ris = ris.idris JOIN xris on xris.idx = req.item_id
          JOIN fc ON fc.ar_id = xris.sn_id 
          WHERE  ris_month = '{$ris_month}' AND ris_year = '{$ris_year}' AND ris.id_rmsi = $idrsmi");
          while($row=mysqli_fetch_array($query))

            {
                $amount = $row['app_quan'] * $row['unit_cost'];
           
                $output .='

                
       
           
        
    <tr>
    <td style="text-align:center;border-bottom:none;border-right:1px solid black;">'.$row['ris_no'].'</td>
    <td style="text-align:center;border-bottom:none;border-right:1px solid black;">'.$row['res_code'].'</td>
    <td style="text-align:center;border-bottom:none;border-right:1px solid black;">'.$row['stock_num'].'</td>
    <td style="border-bottom:none;border-right:1px solid black;">'.$row['article'].' '.$row['descr'].'</td>
    <td style="text-align:center;border-right:1px solid black;">
    
    <?php
    if('.$row['unit'].' == "pc" && '.$row['app_quan'].' > 1)
    {
        echo "pcs.";
    }
    else{
        '.$row['unit'].'
    }


    ?>
      
    </td>
    <td style="text-align:center;border-right:1px solid black;">'.$row['app_quan'].'</td>
    <td style="text-align:right;border-right:1px solid black;">'.$row['unit_cost'].'</td>
    <td style="text-align:right;border-right:1px solid black;">'.$amount.'</td>
    
</tr>



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
           
            <span style="text-transform:uppercase;font-weight:bold;">'.$cert_f.'</span>
            <br><span>'.$cert_pos.'</span>
            </div>

        </div>
    
    </td>
    
    <td colspan="3">
        Posted by/date:
        <div class="row" style="margin-top:2%;">
            <div class="col" style="text-align:center;">
            <span style="text-transform:uppercase;font-weight:bold;">'.$accountant.'</span>
            <br>    
           Accountant
            </div>
           
        </div>

    </td>
</tr>

        

        ';
    }
$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $output;


}















?>