<?php
//get user information
       include "a-session.php";
       include "gen_rsmi.php";


       $ris_month = $_GET['ris_month'];
       $ris_year = $_GET['ris_year'];
	?>
   

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>RSMI Report <?php echo $ris_month;echo $ris_year;?></title>

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
  font-size:17px;
  
}
.row .col input[type="text"], #officer{
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-bottom:1px solid black;
}
span{
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
th[colspan="6"] {
    text-align: center;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
th[rowspan="2"]{
  text-align:center;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
table th{
    text-align:center;

    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    font-weight:bold;

    
    

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
td{
    border:1px solid black;
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

<div class="row" style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">  
 <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a><span style="font-size:20px;"> / 
 <i class="bx bx-folder"></i> RSMI</span><span style="font-size:20px;"> / Save as <?php echo $ris_month; echo " "; echo $ris_year;?>?</span></h1>
    </div>
</div>

<div class="card-body" style="margin-right:10%;margin-left:10%;margin-top:5%;">

<div class="row">

    <div class="col" style="text-align:right;margin-top:2%;">
       <span>Appendix 63</span>
    </div>
    
</div>

<div class="row">
    <div class="col" style="text-align:center;">
 
    </div>
</div>


<div class="row" style="margin-top:1%;">
    <div class="col">

    </div>
    <div class="col" style="text-align:right;">
  
    </div>
</div>
<form method="post" action = "save-rsmi.php">
<table style="">
    <tr>
    <td colspan="8">
    <div class="row">
        <div class="col" style="text-align:center;">
            <h5>REPORT OF SUPPLIES AND MATERIALS ISSUED</h5><h5 style="text-transform:uppercase;"><?php echo $univ_name;?></h5>
            <h5><?php echo $univ_ad;?></h5>
        </div>
    </div>
</td>
</tr>

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

</tr>

<tr>
    <td>Date:</td>
    <td style="border-bottom:1px solid black;"><?php echo $date_today=date("F d, Y");?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>No.:</td>
    <td style="border-bottom:1px solid black;"><?php echo $rsmi_no;?></td>

</tr>

<tr>
    <td colspan="8" style="border-bottom:none;"></td>
</tr>


<tr>
    <td colspan="8" style="border-top:2px solid black;border-bottom:2px solid black;"></td>
</tr>

<tr>
    <td>RIS<br>No.</td>
    <td>Responsibility<br>Center Code</td>
    <td>Stock No.</td>
    <td>Item</td>
    <td>Unit</td>
    <td>Qty.<br>Issued</td>
    <td>Unit<br>Cost</td>
    <td>Amount</td>
</tr>

<!-- for looping-->


<?php
   $stat = "1";
   include "connection.php";
   $query=mysqli_query($conn,"SELECT * FROM ris JOIN req on req.id_ris = ris.idris JOIN xris on xris.idx = req.item_id
   JOIN fc ON fc.ar_id = xris.sn_id
   WHERE  ris_month = '{$ris_month}' AND ris_year = '{$ris_year}'");
   while($row=mysqli_fetch_array($query))
{
    $amount = $row['app_quan'] * $row['unit_cost'];
    ?>

<tr>
    <td style="text-align:center;border-bottom:none;"><?php echo $row['ris_no'];?></td>
    <td style="text-align:center;border-bottom:none;"><?php echo $row['res_code'];?></td>
    <td style="text-align:center;border-bottom:none;"><?php echo $row['stock_num'];?></td>
    <td style="border-bottom:none;"><?php echo $row['article']; echo ", "; echo $row['descr'];?></td>
    <td style="text-align:center;">
        <?php 
        if($row['unit'] == "pc" && $row['app_quan'] > 1)
        {
            echo "pcs.";

        }
        else{
            echo $row['unit'];
        }
        
        ?>
    </td>
    <td style="text-align:center;"><?php echo $row['app_quan'];?></td>
    <td style="text-align:right;"><?php echo number_format($row['unit_cost'],2);?></td>
    <td style="text-align:right;"><?php echo number_format($amount,2);?>

    <input type="hidden" name="idris[]" id="idris" value="<?php echo $row['idris'];?>">


</td>
</tr>

<?php

}
?>






<tr>
    <td colspan="3">Recapitulation</td>
    <td rowspan="3" colspan="2"></td>
    <td colspan="3">Recapitulation</td>

</tr>

<tr>
    <td colspan="2">Stock No.</td>
    <td >Qty.</td>
    <td colspan="2"> Unit Cost Total Cost</td>
    <td>Account Code</td>

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
            <input type="text" name="cert" id="cert" onchange = "GetPOS(this.value)" style="text-align:center;color:black;font-weight:bold;text-transform:uppercase;" value="" Placeholder="Certified By..">
            <input type="text" name="pos" id="pos" style="border-bottom:none;text-align:center;" value="" >
            <input type="hidden" name="idc" id="idc" style="border-bottom:none;text-align:center;" value="" >
            <input type="hidden" name="rsmi_date" id="rsmi_date" style="border-bottom:none;text-align:center;" value="<?php echo $date_today;?>" >
            <input type="hidden" name="id_rsmi" id="id_rsmi" value="<?php echo $id_rsmi;?>">
            <input type="hidden" name="rsmi_no" id="rsmi_no" style="border-bottom:none;text-align:center;" value="<?php echo $rsmi_no;?>" >


            </div>

        </div>
    
    </td>
    <td colspan="3">
        Posted by/date:
        <div class="row" style="margin-top:2%;">
            <div class="col" style="text-align:center;">
            <input type="text" name="accountant" id="accountant" style="text-align:center;text-transform:uppercase;color:black;font-weight:bold;" value="" Placeholder="Accountant Name.." >
            Accountant
            </div>
           
        </div>

    </td>
</tr>

</table>


<div class="row">
            <div class="col">

            </div>
            <div class="col">

            <input type="submit" name="save" id="save" value="Save as RSMI No. <?php echo $rsmi_no;?>?" style="float:right;">
            </div>
        </div>

</form>
</div>




 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
     $(function() {
    $( "#cert" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


</script>


<script>
     function GetPOS(str){
        if(str.length == 0){
            document.getElementById("pos").value = "";
            document.getElementById("idc").value = "";


         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("pos").value = myObj[0];
                    document.getElementById("idc").value = myObj[1];
         


                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "pos.php?cert=" + str, true);
            xmlhttp.send();

        }
     }
 </script>



 

 
</body>
</html>
