<?php require_once "a-session.php";

?>

<?php 

$ptr_custodian = $_GET['ptr_custodian'];
$custodian = $_GET['custodian'];
$fc_id = $_GET['fc_id'];
$ptr_id = $_GET['ptr_id'];

    
//get original custodian
$que=mysqli_query($conn,"select * from `people`where idc = $custodian");
while($rw=mysqli_fetch_array($que))
{
   $get_f = $rw['fullname'];
   $get_o = $rw['office'];
   $get_p = $rw['position'];
   
} 

//get ptr_custodian
$q=mysqli_query($conn,"select * from `people`where idc = $ptr_custodian");
while($rw=mysqli_fetch_array($q))
{
   $getfull = $rw['fullname'];
   $getoff = $rw['office'];
  
   
} 

//get fund cluster
$query=mysqli_query($conn,"select * from `fund_c` where fundc_id = $fc_id");
while($row=mysqli_fetch_array($query))
{
  
    $fund_cluster = $row['fund_cluster'];
   

} 
//get ptr row
$getrow=mysqli_query($conn,"select * from `ptr` where idptr = $ptr_id");
while($r=mysqli_fetch_array($getrow))
{
    $ptr_no = $r['ptr_no'];
    $ttype = $r['t_type'];
    $rrt = $r['rrt'];
    $app_by = $r['app_by'];
    $app_date = $r['app_date'];
    $iss_by = $r['iss_by'];
    $iss_date = $r['iss_date'];
    $rec_by = $r['rec_by'];
    $rec_date = $r['rec_date'];
    $ptr_date = $r['ptr_date'];


   

} 

//get approved by
$getapp = mysqli_query($conn,"select * from `people` where idc = $app_by");
while($app =mysqli_fetch_array($getapp))
{
    $app_name = $app['fullname'];
    $exten = $app['exten'];
    $app_desig = $app['position'];
}

$join = array($app_name,$exten);
$app_w_exten = join(", ",$join);

//get issued by
//
$getiss = mysqli_query($conn,"select * from `people` where idc = $iss_by");
while($iss =mysqli_fetch_array($getiss))
{
    $iss_name = $iss['fullname'];
    $iss_exten = $iss['exten'];
    $iss_desig = $iss['position'];
}

$join_iss = array($iss_name,$iss_exten);
$iss_w_exten = join(", ",$join_iss);

//get received by
//
$getrec = mysqli_query($conn,"select * from `people` where idc = $rec_by");
while($rec =mysqli_fetch_array($getrec))
{
    $rec_name = $rec['fullname'];
    $rec_exten = $rec['exten'];
    $rec_desig = $rec['position'];
}

$join_rec = array($rec_name,$rec_exten);
$rec_w_exten = join(", ",$join_rec);

	


                
            


include('connection.php');
$output = '';
if(isset($_POST["csv"])){
$query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id join fund_c on fund_c.fundc_id = xicspar.fc_id
        where icspar_details.ptr_custodian = '$ptr_custodian' and icspar_details.custodian = '$custodian' and xicspar.fc_id = '$fc_id' and icspar_details.ptr_id is not null"); 



$output .='
<table class="table" bordered ="1">


<tr>
    <td colspan="5" style="text-align:right;font-style:italic;font-size:12px;">
        Appendix 76
    </td>
    </tr>
    <tr>
    <td colspan="5" style="text-align:center;">
        <b>PROPERTY TRANSFER REPORT</b>
    </td>
</tr>


<table>
    <tr>
        <td>Entity Name: </td>
        <td colspan="2">
            <span style="border-bottom:1px solid black;">'.$univ_name.'</span>
        </td>
        <td style="text-align:right;">Fund Cluster: </td>
        <td style="text-align:right;"><span style="border-bottom:1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        '.$fund_cluster.'
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></td>


    </tr>

  <form method = "post" action="save-ptr.php">
    <tr>
    <td colspan="2"style="border-top:2px solid black;border-left:2px solid black;">From Accountable<br>Officer/Agency/Fund Cluster:</td>
    <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:2px solid black;">'.$get_f.'</td>
    <td style="border-top:2px solid black;">PTR No. :</td>
    <td style="border-top:2px solid black;border-right:2px solid black;border-bottom:1px solid black;">'.$ptr_no.'
 
</td>  
</tr>


<tr>
    <td colspan="2"style="border-left:2px solid black;">To Accountable Officer/Agency/<br>Fund Cluster:</td>
    <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:2px solid black;">'.$getfull.'</td>
    <td style="">Date :</td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;padding-top:0;">'.$ptr_date.'</td>  
</tr>

<tr>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;"></td>
    <td style="border-bottom:2px solid black;"></td>
    <td style="border-bottom:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-right:2px solid black;"></td>

</tr>

<tr>
    <td style="border-left:2px solid black;" colspan="2">Transfer Type:(check only one)</td>
    <td></td>
    <td></td>
    <td style="border-right:2px solid black;"></td>
</tr>

<tr>
    <td style="border-left:2px solid black;"></td>
    <td>

        

    <?php
    if($ttype == "donation")
    {
        echo "<input type="checkbox" value="donation" class="regular" checked>";
    }
    else{
        echo "<input type="checkbox" value="donation" class="regular">";
    }


?>
        
    Donation
</td>
    <td>
    <?php
    if($ttype == "relocate"){
        echo "<input type="checkbox"  class="regular" checked>";
    }
    else{
        echo "<input type="checkbox" class="regular">";
    }


?>
Relocate</td>
    <td></td>
    <td style="border-right:2px solid black;"></td>
    

</tr>

<tr>
<td style="border-left:2px solid black;"></td>
    <td>
    <?php
    if($ttype == "reassignment"){
        echo "<input type="checkbox"  class="regular" checked>
        ";
    }
    else{
        echo "<input type="checkbox"  class="regular">";
    }


?>
Reassignment</td>
    <td>
    <?php
    if($ttype == "others"){
        echo "<input type="checkbox" value="donation" class="regular" checked>";
    }
    else{
        echo "<input type="checkbox" value="donation" class="regular">";
    }


?>
        Others(Specify)_________________</td>
    <td></td>
    <td style="border-right:2px solid black;"></td>
    
</tr>


<tr>
    <td style="border-top:2px solid black;border-bottom:2px solid black;border-left:2px solid black;" width="15%">Date Acquired</td>
    <td style="border-top:2px solid black;border-bottom:2px solid black;border-left:2px solid black;" width="15%">Property No.</td>
    <td style="border-top:2px solid black;border-bottom:2px solid black;border-left:2px solid black;">Description</td>
    <td style="border-top:2px solid black;border-bottom:2px solid black;border-left:2px solid black;">Amount</td>
    <td style="border-top:2px solid black;border-bottom:2px solid black;border-right:2px solid black;border-left:2px solid black;">Condition of PPE</td>

</tr>

  <!-- for looping-->
          ';
          

          $query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id join fund_c on fund_c.fundc_id = xicspar.fc_id
          where icspar_details.ptr_custodian = '$ptr_custodian' and icspar_details.custodian = '$custodian' and xicspar.fc_id = '$fc_id' and icspar_details.ptr_id is not null"); 
          while($row=mysqli_fetch_array($query))

        
                {
    
                    $qq=mysqli_query($conn,"select * from `cond` join icspar_details on icspar_details.ptr_condition = cond.idcond where idcond = $row[ptr_condition]");
                                    while($rr=mysqli_fetch_array($qq))
                                   {
                                      $condition = $rr['condi'];
                                   }
            
           
                $output .='

                
       
           
        

                <tr>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">'.$row['date'].'
           
</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">'.$row['prop_num'].'</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;"> 1,'.$row['unit'].'   -  , '.$row['item_details'].'</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">'.$row['unit_cost'].'</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;border-right:2px solid black;">'.$condition.'</td>

</tr>

<?php
}
?>



<tr>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">***</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">***</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">***NOTHING FOLLOWS***</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;">***</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;border-right:2px solid black;">***</td>

</tr>

<tr>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-right:2px solid black;border-left:2px solid black;"></td>


</tr>

<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">Reason for Transfer:</td>
</tr>

<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;"></td>
</tr>

<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;text-align:center;">'.$rrt.'</td>
</tr>

    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;"></td>
</tr>

<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;"></td>
</tr>
<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;border-bottom:2px solid black;"></td>
</tr>

<tr>
    <td style="border-left:2px solid black;"></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border-right:2px solid black;"></td>

</tr>


<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <center>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>Approved by:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>Released/Issued by:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>Received by:</span>
       </center>
    </div>

</td>
  

</tr>


<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col">

        <span>Signature:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>___________________</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>___________________</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>___________________</span>
       
        </div>
    </div>

</td>
  

</tr>

<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col">

        <span>Printed Name:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$app_w_exten.'</u></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$iss_name.'</u></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$rec_name.'</u></span>
       
        </div>
    </div>

</td>
  

</tr>




<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row"  style="padding-top:0;padding-bottom:0;">
        <div class="col">
        <span>Designation:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$app_desig.'</u></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$iss_desig.'</u></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$rec_desig.'</u></span>
        </div>
    </div>

</td>
  

</tr>



<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col" style="padding-top:0;padding-bottom:0;">
        <span>Date:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$app_date.'</u></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$iss_date.'</u></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><u>'.$rec_date.'</u></span>
        </div>
    </div>

</td>
  

</tr>


<tr>

<td style="border-left:2px solid black;border-bottom:2px solid black;"></td>
<td style="border-bottom:2px solid black;"></td>
<td style="border-bottom:2px solid black;"></td>
<td style="border-bottom:2px solid black;"></td>
<td style="border-bottom:2px solid black;border-right:2px solid black;"></td>


</tr>
        

        ';
    }
$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $output;


}















?>