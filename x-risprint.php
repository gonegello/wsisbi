<?php
//get user information
       include "a-session.php";
       include "gen_risno.php";
      
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Requisition Issue Slip</title>

    <?php require_once "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
      table {
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:17px;
  
}
.row .col input[type="text"], #officer{
  
  border-bottom:1px solid black;
}
span{
 
}
th[colspan="6"] {
    text-align: center;
   

}
th[rowspan="2"]{
  text-align:center;
 
}
table th{
    text-align:center;
    border:2px solid black;

    font-weight:bold;

    
    

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;


}
td{
    border:1px solid #ededed';
}





  </style>
<?php
$client_id = $_GET['client_id'];
$fc_id = $_GET['fc_id'];
$idreq = $_GET['idreq'];


$que=mysqli_query($conn,"select * from `people` where idc = $client_id");
while($rw=mysqli_fetch_array($que))
{
   $client_name = $rw['fullname'];
   $client_off = $rw['office'];
   $exten = $rw['exten'];
   $client_pos = $rw['position'];

   
}

$query=mysqli_query($conn,"select * from `fund_c` where fundc_id = $fc_id");
while($row=mysqli_fetch_array($query))
{
   $fund_cluster = $row['fund_cluster'];
  
   
}

$q=mysqli_query($conn,"select * from `req` where idreq = $idreq");
while($r=mysqli_fetch_array($q))
{
   $a_id = $r['a_id'];
   $req_pur = $r['req_purpose'];
   $c_date = $r['c_date'];
   $c_time = $r['c_time'];
   $a_date = $r['a_date'];
   $a_time = $r['a_time'];
  
   
}

$head=mysqli_query($conn,"select * from `people` where idc = $a_id");
while($rr=mysqli_fetch_array($head))
{
   $h_fullname = $rr['fullname'];
   $h_pos = $rr['position'];
  
   
}



if($exten != null)
{
    $join = array($client_name,$exten);
    $client_name = join(", ",$join);
}

    


?>


<body style="background:whitesmoke;">


<div class="card-body" style="margin-right:10%;margin-left:10%;margin-top:5%;">

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
    <span style="font-weight:bold;">Entity Name:</span>&nbsp;<span style="text-transform:uppercase;font-weight:bold;border-bottom:1px solid black;">SLSU - HINUNANGAN CAMPUS</span>
    </div>
    <div class="col" style="text-align:right;">
    <span style="font-weight:bold;">Fund Cluster:</span><span style="border-bottom:1px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>
</div>
<form method="post" action="saveris.php">
<table>
    <tr>
        <td colspan="2">Division:</td>
        <td colspan="3"></td>

        <td colspan="3">Responsibility Center Code: </td>

    </tr>
    <tr>
        <td colspan="5">Office: <span style="border-bottom:1px solid black;"></span></td>
        <td colspan="3">RIS No. : </td>

    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-weight:bold;font-style:italic;">Requistion</td>
        <td colspan="2"  style="text-align:center;font-weight:bold;font-style:italic;">Stock Available?</td>
        <td colspan="2"  style="text-align:center;font-weight:bold;font-style:italic;">Issue</td>

    </tr>

    <tr>
        <td>Stock No.</td>
        <td>Unit</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Yes</td>
        <td>No</td>
        <td>Quantity</td>
        <td>Remarks</td>

    </tr>

    <!--for loooping-->
   
        <?php
       {
           ?>
        <?php
        }
        ?>



    <tr>
        <td colspan="8">
        Purpose: <span></span>
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
        <td style="text-transform:uppercase;text-align:center;" ></td>
        <td style="text-transform:uppercase;text-align:center;" colspan="2" ></td>
       
        <td colspan="2" style="text-transform:uppercase;text-align:center;"></td>
        <td >
          </td>

    </tr>

    <tr>
        <td colspan="2">Designation:</td>
        <td style="text-align:center;"></td>
        <td colspan="2" style="text-align:center;"></td>
        <td colspan="2" style="text-align:center;"></td>
        <td >
          
       
       

    </td>

    </tr>

    <tr>
        <td colspan="2">Date:</td>
        <td style="text-align:center;">
        

        
    </td>
        <td colspan="2" style="text-align:center;">
       
    </td>
        <td colspan="2">
            </td>
        <td >
            </td>

    </tr>
  
    <tr>
        <td colspan="2">Time:</td>
        <td style="text-align:center;"></td>
        <td colspan="2" style="text-align:center;"></td>
        <td colspan="2">
  
        </td>
        <td >
      

    </td>

    </tr>

</table>


</form>


</div>





 
</body>
</html>
