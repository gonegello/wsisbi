<?php require_once "a-session.php";
 include "gen_icsno.php";
?>

<?php 

$fc = $_GET['fc'];
$idris = $_GET['idris'];
$req_by = $_GET['req_by'];

$query=mysqli_query($conn,"select * from `ris` where idris = $idris");
while($row=mysqli_fetch_array($query))
{
    $ris_no = $row['ris_no'];
    $res_code = $row['res_code'];
    $division = $row['division'];

    $req_date = $row['req_date'];
    $req_time = $row['req_time'];

    $app_date = $row['app_date'];
    $app_time = $row['app_time'];

    $iss_date = $row['iss_date'];
    $iss_time = $row['iss_time'];

    $rec_date = $row['rec_date'];
    $rec_time = $row['rec_time'];



    $req_by = $row['req_by'];
    $app_by = $row['app_by'];
    $iss_by = $row['iss_by'];
    $rec_by = $row['rec_by'];

    
   
}

$que = mysqli_query($conn,"select * from fund_c where fundc_id = $fc");
while($row=mysqli_fetch_array($que))
{
    $fund_cluster = $row['fund_cluster'];
}

$query = mysqli_query($conn, "select * from req where id_ris = $idris");
while($row=mysqli_fetch_array($query))
{
    $req_purpose = $row['req_purpose'];
}


//requested by
$query = mysqli_query($conn, "select * from people where idc = $req_by");
while($row=mysqli_fetch_array($query))
{
    $requested = $row['fullname'];
    $req_pos = $row['position'];
//$req_exten = $row['exten'];
}


//approved by
$query = mysqli_query($conn, "select * from people where idc = $app_by");
while($row=mysqli_fetch_array($query))
{
    $approved = $row['fullname'];
    $app_pos = $row['position'];
//$req_exten = $row['exten'];
}


//issued by
$query = mysqli_query($conn, "select * from people where idc = $iss_by");
while($row=mysqli_fetch_array($query))
{
    $issued = $row['fullname'];
    $iss_pos = $row['position'];
//$req_exten = $row['exten'];
}

//received by
$query = mysqli_query($conn, "select * from people where idc = $rec_by");
while($row=mysqli_fetch_array($query))
{
    $received = $row['fullname'];
    $rec_pos = $row['position'];
//$req_exten = $row['exten'];
}




	


                
            


include('connection.php');
$output = '';
if(isset($_POST["csvv"])){
$query = mysqli_query($conn, "select * from req join xris on xris.idx = req.item_id join fc on fc.ar_id = xris.sn_id where req.id_ris = $idris and req.client_id = $req_by");

$output .='
<table class="table" border ="1">

<div class="section-to-print">
<div class="row">

    <div class="col" style="text-align:right;margin-top:2%;">
       <span style="font-style:italic;">Appendix 63</span>
    </div>
    
</div>

<div class="row">
    <div class="col" style="text-align:center;">
        <h5>REQUISITION AND ISSUE SLIP</h5>
    </div>
</div>


<div class="row" style="margin-top:1%;">
    <div class="col">
    <span style="font-weight:bold;">Entity Name:</span>&nbsp;<span style="text-transform:uppercase;font-weight:bold;border-bottom:1px solid black;"><u>SLSU - HINUNANGAN CAMPUS</u></span>
    
    <span style="font-weight:bold;text-align:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fund Cluster:</span><span style="border-bottom:1px solid black;font-weight:bold;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>'.$fund_cluster.'</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>
</div>
<form method="post" action="saveris.php">

    <tr>
        <td colspan="2">Division:</td>
        <td colspan="3">'.$division.'</td>

        <td colspan="3">Responsibility Center Code: '.$res_code.'</td>

    </tr>
    <tr>
        <td colspan="5">Office: <span style="border-bottom:1px solid black;"></span></td>
        <td colspan="3">RIS No. : '.$ris_no.' </td>

    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-weight:bold;font-style:italic;">Requistion</td>
        <td colspan="2"  style="text-align:center;font-weight:bold;font-style:italic;">Stock Available?</td>
        <td colspan="2"  style="text-align:center;font-weight:bold;font-style:italic;">Issue</td>

    </tr>

    <tr>
        <td style="text-align:center;">Stock No.</td>
        <td style="text-align:center;">Unit</td>
        <td style="text-align:center;">Description</td>
        <td style="text-align:center;">Quantity</td>
        <td style="text-align:center;">Yes</td>
        <td style="text-align:center;">No</td>
        <td style="text-align:center;">Quantity</td>
        <td style="text-align:center;">Remarks</td>

    </tr>

  <!-- for looping-->
          ';
          

          $query = mysqli_query($conn, "select * from req join xris on xris.idx = req.item_id
          join fc on fc.ar_id = xris.sn_id
          where req.id_ris = $idris and req.client_id = $req_by");
          while($row=mysqli_fetch_array($query))

            {

           
                $output .='

                
       
           
        
                <tr>
                <td style="text-align:center;">
                '.$row['stock_num'].'
        
            </td>
                <td>'.$row['unit'].'</td>
                <td style="">'.$row['article'].' ,  '.$row['descr'].'</td>
                <td style="text-align:center;" >'.$row['req_quan'].'</td>
                <td style="text-align:center;">
                <?php
                if('.$row['yes_no'].' == "yes")
                {
                    echo "<i class="bx bx-check" style="font-size:25px;"></i>";
                }
                ?>
                
                       
                </td>
                <td style="text-align:center;">
                <?php
                if('.$row['yes_no'].' == "no")
                {
                    echo "<i class="bx bx-check" style="font-size:25px;"></i>";
                }
                ?>
                </td>
                <td style="text-align:center;">
        
                '.$row['app_quan'].'
              
        
            </td>
                <td style="text-align:center;">'.$row['remarks'].'</td>
                </tr>
        
        
                <?php
                }
                ?>
        
        
        
            <tr>
                <td colspan="8">
                Purpose: <span>'.$req_purpose.'</span>
                </td>
            </tr>
        
        
            <tr>
                <td colspan="2"></td>
                <td ><b>Requested by:</b></td>
                <td colspan="2"><b>Approved by:</b></td>
                <td colspan="2"><b>Issued by:</b></td>
                <td ><b>Received by:</b></td>
        
            </tr>
            <tr>
                <td colspan="2">Signature:</td>
                <td ></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td ></td>
        
            </tr>
        
            <tr>
                <td colspan="2">Printed Name:</td>
                <td style="text-transform:uppercase;text-align:center;" >
                '.$requested.'
            </td>
                <td style="text-transform:uppercase;text-align:center;" colspan="2" >
                '.$approved.'
            </td>
               
                <td colspan="2" style="text-transform:uppercase;text-align:center;">
                '.$issued.'
            </td>
                <td style="text-transform:uppercase;text-align:center;">
                    '.$received.'
               </td>
        
            </tr>
        
            <tr>
                <td colspan="2">Designation:</td>
                <td style="text-align:center;">
                '.$req_pos.'
            </td>
                <td colspan="2" style="text-align:center;">'.$app_pos.'</td>
                <td colspan="2" style="text-align:center;">
                '.$iss_pos.'
            </td>
                <td style="text-align:center;">'.$rec_pos.'
            </td>
        
            </tr>
        
            <tr>
                <td colspan="2">Date:</td>
                <td style="text-align:center;">
                '.$req_date.'
                   
            </td>
                <td colspan="2" style="text-align:center;">
                '.$app_date.'
                
            </td>
                <td colspan="2" style="text-align:center;">
                '.$iss_date.'
                  
                <td style="text-align:center;">
                    '.$rec_date.'
            </td>
                   
        
            </tr>
          
            <tr>
                <td colspan="2">Time:</td>
                <td style="text-align:center;">'.$req_time.'</td>
                <td colspan="2" style="text-align:center;">
                '.$app_time.'
            </td>
                <td colspan="2" style="text-align:center;">
                    '.$iss_time.'
          
                </td>
                <td style="text-align:center;">
                    '.$rec_time.'
              
        
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