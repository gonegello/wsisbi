<?php
//get user information
       include "a-session.php";
  
     
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Property Transfer Report</title>

    <?php require_once "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
      table {
font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:20px;
  
}
.row .col input[type="text"], #officer{
    font-family: "Cambria", Georgia, serif;
    
  border-bottom:1px solid black;
}
h4{
    font-family: "Cambria", Georgia, serif;
    font-weight:bold;
    font-size:25px;

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
    font-weight:bold;

    
    

}

td, th {

  text-align: left;
  padding: 8px;
  font-family: "Cambria", Georgia, serif;

}
td{

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

input.regular{
  width:20px;
    height:20px;
    margin-right:2%;
    

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






?>
<body style="background:whitesmoke;">

<div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:2%;">

<div class="col">

<h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a>
    <span style="font-size:20px;"> / <a href="x-r-ptr.php" class="second"><i class="bx bx-folder"></i> PTR </a></span> 
    <span style="font-size:20px;"> / <i class="bx bx-file"></i> <?php echo $ptr_no;?></span></h1>

<span><a href="x-full-par.php" class="second"><i class="bx bx-package"></i> PAR Stockroom </a> | 
<a href="x-full-ics.php" class="second"><i class="bx bx-box"></i> ICS Stockroom </a>
 | <a href="x-xptr.php" class="second"><i class="bx bx-refresh"></i> Transfer a Property</a></span>

</div>

<div class="col" style="text-align:right;">
<button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i>PRINT <?php echo $ptr_no;?></button>
        <form action="export-xperptr.php?ptr_custodian=<?php echo $ptr_custodian;?>&custodian=<?php echo $custodian;?>&fc_id=<?php echo $fc_id;?>&ptr_id=<?php echo $ptr_id;?>" method="post">
        <button type="submit" id="csv" name="csv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>
        </form>
</div>
        
       

        </div> 

        <div class="row" style="margin-left:10%;margin-right:10%;margin-top:1%;">
        <?php 
          //if an item is sent to archive
          if(isset($_SESSION['ptr']))
             {
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['ptr'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['ptr']);
            }
      ?>
  </div>

<div class="card-body" style="margin-right:10%;margin-left:10%;margin-bottom:3%;">
<div class="section-to-print">
<div class="row">
    <div class="col">

    </div>
    <div class="col" style="text-align:right;">
        <span style="font-style:italic;font-size:22px;">Appendix 76</span>
    </div>
</div>

<div class="row">
    <div class="col" style="text-align:center;margin-top:2%;margin-bottom:1%;">
        <h4>PROPERTY TRANSFER REPORT</h4>
    </div>
</div>

<table>
    <tr>
        <td>Entity Name: </td>
        <td colspan="2">
            <span style="border-bottom:1px solid black;"><?php echo $univ_name;?></span>
        </td>
        <td style="text-align:right;">Fund Cluster: </td>
        <td style="text-align:right;"><span style="border-bottom:1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $fund_cluster;?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></td>


    </tr>

  <form method = "post" action="save-ptr.php">
    <tr>
    <td colspan="2"style="border-top:2px solid black;border-left:2px solid black;">From Accountable<br>Officer/Agency/Fund Cluster:</td>
    <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:2px solid black;"><?php echo $get_f;?></td>
    <td style="border-top:2px solid black;">PTR No. :</td>
    <td style="border-top:2px solid black;border-right:2px solid black;border-bottom:1px solid black;"><?php echo $ptr_no;?>
 
</td>  
</tr>


<tr>
    <td colspan="2"style="border-left:2px solid black;">To Accountable Officer/Agency/<br>Fund Cluster:</td>
    <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:2px solid black;"><?php echo $getfull;?></td>
    <td style="">Date :</td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;padding-top:0;"><?php echo $ptr_date;?></td>  
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
        echo '<input type="checkbox" value="donation" class="regular" checked>';
    }
    else{
        echo '<input type="checkbox" value="donation" class="regular">';
    }


?>
        
    Donation
</td>
    <td>
    <?php
    if($ttype == "relocate"){
        echo '<input type="checkbox"  class="regular" checked>';
    }
    else{
        echo '<input type="checkbox" class="regular">';
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
        echo '<input type="checkbox"  class="regular" checked>
        ';
    }
    else{
        echo '<input type="checkbox"  class="regular">';
    }


?>
Reassignment</td>
    <td>
    <?php
    if($ttype == "others"){
        echo '<input type="checkbox" value="donation" class="regular" checked>';
    }
    else{
        echo '<input type="checkbox" value="donation" class="regular">';
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

<?php
include "connection.php";
$query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id join fund_c on fund_c.fundc_id = xicspar.fc_id
        where icspar_details.ptr_custodian = '$ptr_custodian' and icspar_details.custodian = '$custodian' and xicspar.fc_id = '$fc_id' and icspar_details.ptr_id is not null"); 
        while($row = mysqli_fetch_array($query))
            {

                $qq=mysqli_query($conn,"select * from `cond` join icspar_details on icspar_details.ptr_condition = cond.idcond where idcond = $row[ptr_condition]");
                                while($rr=mysqli_fetch_array($qq))
                               {
                                  $condition = $rr['condi'];
                               }

    ?>

<tr>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;"><?php echo $row['date'];?>
           
</td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;"><?php echo $row['prop_num'];?></td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;"><?php echo "1"; echo $row['unit']; echo " - " ;echo $row['item_details'];?></td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;"><?php echo number_format($row['unit_cost'],2);?></td>
    <td style="border-left:2px solid black;border-bottom:1px solid #ededed;border-right:2px solid black;"><?php echo $condition;?></td>

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
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;text-align:center;"><?php echo $rrt;?></td>
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
        <div class="col">

        </div>
        <div class="col">
        <span>Approved by:</span>
        </div>
        <div class="col">
        <span>Released/Issued by:</span>

        </div>
        <div class="col">
        <span>Received by:</span>
        </div>
    </div>

</td>
  

</tr>


<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col">
        <span>Signature:</span>
        </div>
        <div class="col">
        <input type="text">
        </div>
        <div class="col">
        <input type="text">
       

        </div>
        <div class="col">
        <input type="text">
       
        </div>
    </div>

</td>
  

</tr>



<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;padding-top:0;padding-bottom:0;">
    <div class="row">
        <div class="col">
        <span>Printed Name:</span>
        </div>
        <div class="col">
            <?php
            if($exten != NULL)
            {
                echo '<input type="text" name="approve" id="approve"  style="text-align:center;color:black;text-transform:uppercase;"
                 value= "'.$app_w_exten.'" disabled>';
            }
            else{
                echo '<input type="text" name="approve" id="approve"  style="text-align:center;color:black;text-transform:uppercase;"
                value= "'.$app_name.'" disabled>';
            }

            ?>
   
        </div>
        <div class="col">
     
        <?php
            if($iss_exten != NULL)
            {
                echo '<input type="text" name="approve" id="approve"  style="text-align:center;color:black;text-transform:uppercase;"
                 value= "'.$iss_w_exten.'" disabled>';
            }
            else{
                echo '<input type="text" name="approve" id="approve"  style="text-align:center;color:black;text-transform:uppercase;"
                value= "'.$iss_name.'" disabled>';
            }

            ?>

        </div>
        <div class="col">

        <?php
            if($rec_exten != NULL)
            {
                echo '<input type="text" name="approve" id="approve"  style="text-align:center;color:black;text-transform:uppercase;"
                 value= "'.$rec_w_exten.'" disabled>';
            }
            else{
                echo '<input type="text" name="approve" id="approve"  style="text-align:center;color:black;text-transform:uppercase;"
                value= "'.$rec_name.'" disabled>';
            }

            ?>
    
      




       
        </div>
        
    </div>

</td>
  

</tr>


<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row"  style="padding-top:0;padding-bottom:0;">
        <div class="col">
        <span>Designation:</span>
        </div>
        <div class="col">
        <input type="text" name="app_desig" id="app_desig" value="<?php echo $app_desig;?>" style="text-align:center;color:black;" disabled>
        </div>
        <div class="col">
        <input type="text" name="iss_desig" id="iss_desig" value="<?php echo $iss_desig;?>" style="text-align:center;color:black;"> 
       

        </div>
        <div class="col" >
        <input type="text" name="rec_desig" id="rec_desig" value="<?php echo $rec_desig;?>" style="text-align:center;color:black;">
       
        </div>
    </div>

</td>
  

</tr>



<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col" style="padding-top:0;padding-bottom:0;">
        <span>Date:</span>
        </div>
        <div class="col">
        <input type="text" name="app_date" id="app_date" value="<?php echo $app_date;?>" style="text-align:center;color:black;">
        </div>
        <div class="col">
        <input type="text" name="iss_date" id="iss_date" value="<?php echo $iss_date;?>" style="text-align:center;color:black;">
        

        </div>
        <div class="col">
        <input type="text" name="rec_date" id="rec_date"  value="<?php echo $rec_date;?>" style="text-align:center;color:black;">
       
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




</table>



</div>

        </div>


 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
     $(function() {
    $( "#approve" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


 $(function() {
    $( "#issued" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

 
 $(function() {
    $( "#received" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

</script>

 
</body>
</html>
