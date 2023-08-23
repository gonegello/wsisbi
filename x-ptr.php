<?php
//get user information
       include "a-session.php";
       include "gen_ptrno.php";
     
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Save as <?php echo $ptr_no;?>?</title>

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
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-family: "Cambria", Georgia, serif;

}
td{
    border:0px;
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


  </style>

   
<?php

$ptr_custodian = $_GET['ptr_custodian'];
$custodian = $_GET['custodian'];
$fc_id = $_GET['fc_id'];


$que=mysqli_query($conn,"select * from `people`where idc = $custodian");
while($rw=mysqli_fetch_array($que))
{
   $get_f = $rw['fullname'];
   $get_o = $rw['office'];
   $get_p = $rw['position'];
   
} 

$q=mysqli_query($conn,"select * from `people`where idc = $ptr_custodian");
while($rw=mysqli_fetch_array($q))
{
   $getfull = $rw['fullname'];
   $getoff = $rw['office'];
  
   
} 


$query=mysqli_query($conn,"select * from `fund_c` where fundc_id = $fc_id");
while($row=mysqli_fetch_array($query))
{
  
    $fund_cluster = $row['fund_cluster'];
   

} 


?>
<body style="background:whitesmoke;">
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
   
   <div class="col">

   <h1 style="color:grey;"><a href="x-xptr.php" class="stockroom"><i class="bx bx-refresh"></i> Property Transfer </a><span style="font-size:20px;"> / <i class="bx bx-user"></i> <?php echo $fullname;?></span</h1>
   </div>
   
   
   <div class="col" style="text-align:right;margin-top:1%;">
       <span style="color:grey;"><a href="x-full-ics.php"><i class="bx bx-box"></i> ICS Stockroom</a> | <a href="x-full-par.php"><i class="bx bx-package"></i> PAR Stockroom </a></span>
   </div>


</div>
<div class="row" style="margin-left:10%;margin-right:10%;margin-top:5%;">
    This form is editable.
</div>

<div class="card-body" style="margin-right:10%;margin-left:10%;margin-bottom:3%;">

<div class="row">
    <div class="col">

    </div>
    <div class="col" style="text-align:right;">
        <span style="font-style:italic;font-size:22px;">Appendix 76</span>
    </div>
</div>

<div class="row">
    <div class="col" style="text-align:center;margin-top:2%;">
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
        <?php echo $fund_cluster;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></td>


    </tr>

  <form method = "post" action="save-ptr.php">
    <tr>
    <td colspan="2"style="border-top:2px solid black;border-left:2px solid black;">From Accountable<br>Officer/Agency/Fund Cluster:</td>
    <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:2px solid black;"><?php echo $get_f;?></td>
    <td style="border-top:2px solid black;">PTR No. :</td>
    <td style="border-top:2px solid black;border-right:2px solid black;border-bottom:1px solid black;"><?php echo $ptr_no;?>
    <input type="hidden" name="ptr_no" id="ptr_no" value="<?php echo $ptr_no;?>">
</td>  
</tr>


<tr>
    <td colspan="2"style="border-left:2px solid black;">To Accountable<br>Officer/Agency/Fund<br>Cluster:</td>
    <td style="border-bottom:1px solid black;border-right:3px solid black;border-top:2px solid black;"><?php echo $getfull;?></td>
    <td style="">Date :<input type="hidden" name="ptr_date" id="ptr_date" value="<?php echo $date_a;?>"></td>
    <td style="border-right:2px solid black;border-bottom:1px solid black;padding-top:0;"><?php echo $date_a;?></td>  
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
    <td><input type="checkbox" name="ttype" id="donation" value="donation" class="regular" style="">Donation</td>
    <td><input type="checkbox" name="ttype" id="relocate" value="relocate"  class="regular">Relocate</td>
    <td></td>
    <td style="border-right:2px solid black;"></td>
    

</tr>

<tr>
<td style="border-left:2px solid black;"></td>
    <td><input type="checkbox" name="ttype" id="reassign" value="reassignment"  class="regular">Reassignment</td>
    <td><input type="checkbox" name="ttype" id="others" value="others"  class="regular">Others(Specify)_________________</td>
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
        where icspar_details.ptr_custodian = '$ptr_custodian' and icspar_details.custodian = '$custodian' and xicspar.fc_id = '$fc_id' and icspar_details.ptr_id is null"); 
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
            <input type="hidden" name="pn_id[]" value="<?php echo $row['pn_id'];?>">
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
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;"><input type="text" name="trans_reason" id="trans_reason" style="border-bottom:1px solid black;text-align:center;color:black;" placeholder="Specify Reason For Transfer" required=""/></td>
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
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col">
        <span>Printed Name:</span>
        </div>
        <div class="col">
        <input type="text" name="approve" id="approve" onchange="appDesig(this.value)" style="text-align:center;color:black;text-transform:uppercase;">
        </div>
        <div class="col">
        <input type="text" name="issued" id="issued" onchange="issDesig(this.value)" style="text-align:center;color:black;text-transform:uppercase;">
       

        </div>
        <div class="col">
        <input type="text" name="received" id="received" onchange="recDesig(this.value)" style="text-align:center;color:black;text-transform:uppercase;">

        <!-- hiddens-->
        <input type="hidden" name="app_id" id="app_id" style="">
        <input type="hidden" name="iss_id" id="iss_id" style="">
        <input type="hidden" name="rec_id" id="rec_id" style="">
        <input type="hidden" name="ptr_id" id="ptr_id" style="" value="<?php echo $id_ptr;?>">
        <input type="hidden" name="ptr_custodian" value="<?php echo $ptr_custodian;?>">
        <input type="hidden" name="custodian" value="<?php echo $custodian;?>">
        <input type="hidden" name="fc_id" value="<?php echo $fc_id;?>">
      




       
        </div>
        
    </div>

</td>
  

</tr>


<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col">
        <span>Designation:</span>
        </div>
        <div class="col">
        <input type="text" name="app_desig" id="app_desig" style="text-align:center;color:black;">
        </div>
        <div class="col">
        <input type="text" name="iss_desig" id="iss_desig" style="text-align:center;color:black;"> 
       

        </div>
        <div class="col">
        <input type="text" name="rec_desig" id="rec_desig" style="text-align:center;color:black;">
       
        </div>
    </div>

</td>
  

</tr>



<tr>
    <td colspan="5" style="border-left:2px solid black;border-right:2px solid black;">
    <div class="row">
        <div class="col">
        <span>Date:</span>
        </div>
        <div class="col">
        <input type="text" name="app_date" id="app_date" value="<?php echo $date_a;?>" style="text-align:center;color:black;">
        </div>
        <div class="col">
        <input type="text" name="iss_date" id="iss_date" value="<?php echo $date_a;?>" style="text-align:center;color:black;">
        

        </div>
        <div class="col">
        <input type="text" name="rec_date" id="rec_date"  value="<?php echo $date_a;?>" style="text-align:center;color:black;">
       
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

<div class="row">
            <div class="col">

            </div>
            <div class="col">

            <input type="submit" name="save" id="save" value="Save as PTR No. <?php echo $ptr_no;?>?" style="float:right;">
            </div>
        </div>

</form>

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


<script>
     function appDesig(str){
        if(str.length == 0){
            document.getElementById("app_desig").value = "";
            document.getElementById("app_id").value = "";


         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("app_desig").value = myObj[0];
                    document.getElementById("app_id").value = myObj[1];


                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "appDesig.php?approve=" + str, true);
            xmlhttp.send();

        }
     }
 </script>

<script>
     function issDesig(str){
        if(str.length == 0){
            document.getElementById("iss_desig").value = "";
            document.getElementById("iss_id").value = "";

         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("iss_desig").value = myObj[0];
                    document.getElementById("iss_id").value = myObj[1];


                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "issDesig.php?issued=" + str, true);
            xmlhttp.send();

        }
     }
 </script>


<script>
     function recDesig(str){
        if(str.length == 0){
            document.getElementById("rec_desig").value = "";
            document.getElementById("rec_id").value = "";

         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("rec_desig").value = myObj[0];
                    document.getElementById("rec_id").value = myObj[1];


                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "recDesig.php?received=" + str, true);
            xmlhttp.send();

        }
     }
 </script>

 <script>
     $('#donation').on('change', function() {
    $('#relocate').not(this).prop('checked', false);  
    $('#reassign').not(this).prop('checked', false);  
    $('#others').not(this).prop('checked', false);  

});
 </script>

 
<script>
     $('#relocate').on('change', function() {
    $('#donation').not(this).prop('checked', false);  
    $('#reassign').not(this).prop('checked', false);  
    $('#others').not(this).prop('checked', false);  

});
 </script>

 
<script>
     $('#reassign').on('change', function() {
    $('#relocate').not(this).prop('checked', false);  
    $('#donation').not(this).prop('checked', false);  
    $('#others').not(this).prop('checked', false);  

});

 </script>
 
 <script>
     $('#others').on('change', function() {
    $('#relocate').not(this).prop('checked', false);  
    $('#reassign').not(this).prop('checked', false);  
    $('#donation').not(this).prop('checked', false);  

});
 </script>


 

 
</body>
</html>
