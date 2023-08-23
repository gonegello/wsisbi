<?php
//get user information
       include "a-session.php";


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
  border: 1px solid black;
  text-align: left;
  padding: 8px;


}
td{
    border:1px solid #ededed';
}



#csv{
    background:#77DD77;
    color:white;

}
#print-btn{
    background:#78A2CC;
    color:white;
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


<div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:2%;">

<div class="col">
<h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a>
 <span style="font-size:20px;"> / <a href="x-r-ris.php" class="second"><i class="bx bx-folder"></i> RIS </a></span> <span style="font-size:20px;"> / <i class="bx bx-file"></i> <?php echo $ris_no;?></span></h1>
 <a href="x-input-iar.php" class="second" style="font-size:20px;"><span><i class='bx bx-envelope'> RIS Acceptance </i></span></a> |
 <a href="x-request.php" class="second" style="font-size:20px;"><span><i class='bx bx-envelope'> Requests </i></span></a>



</div>
<div class="col" style="text-align:right;">
 
<button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
<form action="export-xxris.php?fc=<?php echo $fc;?>&req_by=<?php echo $req_by;?>&idris=<?php echo $idris;?>" method="post">
        <button type="submit" id="csv" name="csvv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>
       

      
</div>
       


        </div> 



<div class="card-body" style="margin-right:10%;margin-left:10%;margin-top:5%;">
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
    <span style="font-weight:bold;">Entity Name:</span>&nbsp;<span style="text-transform:uppercase;font-weight:bold;border-bottom:1px solid black;">SLSU - HINUNANGAN CAMPUS</span>
    </div>
    <div class="col" style="text-align:right;">
    <span style="font-weight:bold;">Fund Cluster:</span><span style="border-bottom:1px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fund_cluster;?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>
</div>
<form method="post" action="saveris.php">
<table>
    <tr>
        <td colspan="2">Division:</td>
        <td colspan="3"><?php echo $division;?></td>

        <td colspan="3">Responsibility Center Code: <?php echo $res_code;?></td>

    </tr>
    <tr>
        <td colspan="5">Office: <span style="border-bottom:1px solid black;"></span></td>
        <td colspan="3">RIS No. : <?php echo $ris_no;?> </td>

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

    <!--for loooping-->
   
        <?php
        $query = mysqli_query($conn, "select * from req join xris on xris.idx = req.item_id
        join fc on fc.ar_id = xris.sn_id
        where req.id_ris = $idris and req.client_id = $req_by");
        while($row=mysqli_fetch_array($query))
       {

        ?>
        <tr>
        <td style="text-align:center;">
        <?php echo $row['stock_num'];?>

    </td>
        <td><?php echo $row['unit'];?></td>
        <td style=""><?php echo $row['article']; echo ", "; echo $row['descr'];?></td>
        <td style="text-align:center;" ><?php echo $row['req_quan'];?></td>
        <td style="text-align:center;">
        <?php
        if($row['yes_no'] == "yes")
        {
            echo '<i class="bx bx-check" style="font-size:25px;"></i>';
        }
        ?>
        
               
        </td>
        <td style="text-align:center;">
        <?php
        if($row['yes_no'] == "no")
        {
            echo '<i class="bx bx-check" style="font-size:25px;"></i>';
        }
        ?>
        </td>
        <td style="text-align:center;">

        <?php echo $row['app_quan'];?>
      

    </td>
        <td style="text-align:center;"><?php echo $row['remarks'];?></td>
        </tr>


        <?php
        }
        ?>



    <tr>
        <td colspan="8">
        Purpose: <span><?php echo $req_purpose;?></span>
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
        <?php echo $requested;?>
    </td>
        <td style="text-transform:uppercase;text-align:center;" colspan="2" >
        <?php echo $approved;?>
    </td>
       
        <td colspan="2" style="text-transform:uppercase;text-align:center;">
        <?php echo $issued;?>
    </td>
        <td style="text-transform:uppercase;text-align:center;">
            <?php echo $received;?>
       </td>

    </tr>

    <tr>
        <td colspan="2">Designation:</td>
        <td style="text-align:center;">
        <?php echo $req_pos;?>
    </td>
        <td colspan="2" style="text-align:center;"><?php echo $app_pos;?></td>
        <td colspan="2" style="text-align:center;">
        <?php echo $iss_pos;?>
    </td>
        <td style="text-align:center;"><?php echo $rec_pos;?>
    </td>

    </tr>

    <tr>
        <td colspan="2">Date:</td>
        <td style="text-align:center;">
        <?php echo $req_date;?>
           
    </td>
        <td colspan="2" style="text-align:center;">
        <?php echo $app_date;?>
        
    </td>
        <td colspan="2" style="text-align:center;">
        <?php echo $iss_date;?>
          
        <td style="text-align:center;">
            <?php echo $rec_date;?>
    </td>
           

    </tr>
  
    <tr>
        <td colspan="2">Time:</td>
        <td style="text-align:center;"><?php echo $req_time;?></td>
        <td colspan="2" style="text-align:center;">
        <?php echo $app_time;?>
    </td>
        <td colspan="2" style="text-align:center;">
            <?php echo $iss_time;?>
  
        </td>
        <td style="text-align:center;">
            <?php echo $rec_time;?>
      

    </td>

    </tr>

</table>



</div>

    </div>
    <?php include "bottom.php";?>
    </div>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>



 

 
</body>
</html>
