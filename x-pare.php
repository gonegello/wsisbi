<?php
//get user information
       include "a-session.php";
       include "gen_parno.php";
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Property Acknowlegdement Receipt</title>

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
    border:2px solid black;
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


  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>



<?php
    $fund_id = $_GET['fund_id'];
    $fund_cluster = $_GET['fund_cluster'];//fund cluster
    $idc = $_GET['idc'];//custodian id


    
    $query=mysqli_query($conn,"select * from `people`where idc = $idc");
    while($row=mysqli_fetch_array($query))
   {
       $getfullname = $row['fullname'];
       
   
   } 



?>



<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

     <div class="row" style="margin-right:10%;margin-left:10%;margin-top:5%;">
     <div class="col">
     <h1 style="color:grey;"><a href="x-stock.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a><span style="font-size:20px;"> / 
     <i class="bx bx-box"></i> <a href="x-full-par.php">PAR </a> / <a href="x-full-par.php?#tobeiss">To be issued</a> / <?php echo $getfullname;?></span></h1></div>
   
     <div class="col" style="text-align:right;"><br>
     <a href="x-xpar.php"><h5><i class="bx bx-folder"></i> PAR Records</h5></a>
     </div>
     </div>
       
    
     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
     border-radius:10px;margin-right:10%;margin-left:10%;margin-top:5%;margin-bottom:5%;">

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
                <span>Entity Name:</span>
            </div>

            <div class="col" style="margin-left:-80%;">
            <span style="border-bottom:2px solid black;text-transform:uppercase;">&nbsp;&nbsp;&nbsp;<?php echo $univ_name;?>&nbsp;&nbsp;&nbsp;</span>
            </div>
           
        </div>

        <div class="row">
            <div class="col">
                <span>Fund Cluster :</span>

            </div>

            <div class="col" style="margin-left:-35%;">
            <span style="border-bottom:2px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $fund_cluster;?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>

            <div class="col" style="text-align:right;">
            <span>PAR No :</span><span style="font-weight:bold;border-bottom:2px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $par_number;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            
        </div>

       
        <table>
          

            <tr>
                <th width="3%" rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;" >Quantity</th>
                <th width="8%" rowspan="2" style="border-right:2px solid black;border-bottom:2px solid black;" >Unit</th>
                <th width="35%" style="border-right:2px solid black;border-bottom:2px solid black;" >Description</th>
                <th style="border-right:2px solid black;border-bottom:2px solid black;" >Property No.</th>
                <th style="border-right:px solid black;border-bottom:2px solid black;" >Date<br>Acquired</th>
                <th width="10%" style="border-bottom:2px solid black;">Unit<br>Price</th>
                <th width="10%" style="border-bottom:2px solid black;">Amount</th>


            </tr>

            <tr>
               
               
                

            </tr>
            <form method="post" action="save-par.php">

            <!-- for looping-->
            <?php

            include('connection.php');
            $stat = "1";
            $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.stat = $stat
            AND xicspar.fc_id = $fund_id AND icspar_details.icsxpar_no IS NULL AND xicspar.unit_cost > 50000 AND icspar_details.custodian = $idc");
            while($row=mysqli_fetch_array($query))

            {
            ?>
            <tr>
                <td style="border-right:2px solid black;border-left:2px solid black;border-bottom:1px solid black;text-align:center;">
                <input type="hidden" name="pn_id[]" id="pn_id" value="<?php echo $row['pn_id'];?>">
                <?php echo "1";?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                <?php echo $row['unit'];?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;">
                <?php echo $row['item_details'];?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                <?php echo $row['prop_num'];?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:center;">
                <?php echo $row['date'];?>

                
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:right;">
                <?php echo number_format($row['unit_cost'],2);?>
            </td>
                <td style="border-right:2px solid black;border-bottom:1px solid black;text-align:right;">
                <?php echo number_format($row['unit_cost'],2);?>
            </td>

              

               
            </tr>

            <?php
            }
            ?>

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
                <td colspan="3" style="border-left:2px solid black;">
                <input type="text" name="by" id="by" onchange="GetByPO(this.value)" style="border-bottom:2px solid black;width:80%;margin-left:-1%;text-align:center;color:black;text-transform:uppercase;">
            </td>
                <td colspan="4" style="border-right:2px solid black;text-align:right;">
                <input type="text" name="from" id="from" onchange="GetFromPO(this.value)" style="border-bottom:2px solid black;margin-right:-1%;text-align:center;color:black;text-transform:uppercase;">
            </td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;"><span style="margin-left:17%;">Signature Over Printed Name</span></td>
                <td colspan="4" style="border-right:2px solid black;text-align:center;">Signature Over Printed Name</td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;">
                <input type="text" name="by_po" id="by_po" style="border-bottom:2px solid black;width:80%;margin-left:-1%;text-align:center;color:black;">
                <input type="hidden" name="by_id" id="by_id" placeholder="By Id">
            </td>
                <td colspan="4" style="border-right:2px solid black;text-align:right;">
                <input type="text" name="from_po" id="from_po" style="border-bottom:2px solid black;margin-right:-1%;text-align:center;color:black;">
                <input type="hidden" name="from_id" id="from_id" placeholder = "From Id">
            </td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;"><span style="margin-left:30%;">Position/Office</span></td>
                <td colspan="4" style="border-right:2px solid black;text-align:center;">Position/Office</td>


            </tr>


            <tr>
                <td colspan="3" style="border-left:2px solid black;"><input type="text" name="by_date" id="by_date" style="border-bottom:2px solid black;width:80%;margin-left:-1%;text-align:center;color:black;" value="<?php echo $date_a;?>"></td>
                <td colspan="4" style="border-right:2px solid black;text-align:right;"><input type="text" name="from_date" id="from_date" style="border-bottom:2px solid black;margin-right:-1%;text-align:center;color:black;" value="<?php echo $date_a;?>"></td>


            </tr>

            <tr>
                <td colspan="3" style="border-left:2px solid black;border-bottom:2px solid black;"><span style="margin-left:35%;">Date</span></td>
                <td colspan="4" style="border-right:2px solid black;text-align:center;border-bottom:2px solid black;">Date</td>
                <input type="hidden" name="par_id" id="par_id" value="<?php echo $par_id;?>">
                <input type="hidden" name="par_no" id="par_no" value="<?php echo $par_number;?>">



            </tr>

           


           

        </table>

        <div class="row">
            <div class="col">

            </div>
            <div class="col">

            <input type="submit" name="save" id="save" value="Save as PAR No. <?php echo $par_number;?>?" style="float:right;">
            </div>
        </div>
       
        </form>



    </div>

     




      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
     $(function() {
    $( "#from" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


 $(function() {
    $( "#by" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

</script>

//
<script>
     function GetFromPO(str){
        if(str.length == 0){
            document.getElementById("from_po").value = "";
         document.getElementById("from_id").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("from_po").value = myObj[0];

                   document.getElementById("from_id").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "fromPO.php?from=" + str, true);
            xmlhttp.send();

        }
     }
 </script>

<script>
     function GetByPO(str){
        if(str.length == 0){
            document.getElementById("by_po").value = "";
          document.getElementById("by_id").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("by_po").value = myObj[0];

                   document.getElementById("by_id").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "byPO.php?by=" + str, true);
            xmlhttp.send();

        }
     }
 </script>


 

 
</body>
</html>
