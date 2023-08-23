<?php
//get user information
       include "a-session.php";
       include "gen_risno.php";



       
$last_bal_last_year = 0;
$current_year_bal = 0;


//COMPTE Previous YEAR
//1.get the current year
$current_year = date("Y");
//2. convert the current year to int
$con_currenct_year = intval($current_year);

//3. Subtract 1 from Current Year
$last_year = $con_currenct_year - 1;

$str_last_year = strval($last_year);
$str_current_year = strval($current_year);
      
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


input[type="text"],input[type="number"]{
background:white;
outline:none;

border-radius:0px;
}
input[type="text"]:focus,input[type="number"]:focus{
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

   
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 <h1 style="color:grey;"><a href="x-request.php" class="stockroom"><i class="bx bx-envelope"></i> Requests</a>
 <span style="font-size:20px;"> / <a href="xc-persupp.php?client_id=<?php echo $client_id;?>" class="second"><i class="bx bx-user"></i> <?php echo $client_name;?></a> / 
 <i class="bx bx-file"></i> Fund Cluster <?php echo $fund_cluster;?></span><span></h1>
</div>


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
    <span style="font-weight:bold;">Fund Cluster:</span><span style="border-bottom:1px solid black;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fund_cluster;?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>
</div>
<form method="post" action="saveris.php">
<table>
    <tr>
        <td colspan="2">Division:</td>
        <td colspan="3"><input type="text" name="division" id="division" ></td>

        <td colspan="3">Responsibility Center Code: <input type="text" name="res_code" id="res_code"></td>

    </tr>
    <tr>
        <td colspan="5">Office: <span style="border-bottom:1px solid black;"><?php echo $client_off;?></span></td>
        <td colspan="3">RIS No. : <?php echo $ris_no;?></td>

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
        $req_stat = "supply";
        $query = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id join fc on fc.ar_id = xris.sn_id
        join iar on iar.iar_id = xris.id_iar
         where xris.fc_id = $fc_id and req.client_id = $client_id and req.req_stat = '{$req_stat}'");
         while($row= mysqli_fetch_array($query))
        {
            $sn_id = $row['sn_id'];



        ?>
        <tr>
        <td style="text-align:center;"><?php echo $row['stock_num'];?>  
        <input type="hidden" name="idreq[]" id="idreq" value="<?php echo $row['idreq'];?>">
        <input type="hidden" name="iar_id[]" id="iar_id" value="<?php echo $row['id_iar'];?>">
        <input type="hidden" name="sn_id[]" id="sn_id" value="<?php echo $row['sn_id'];?>">



    </td>
        <td><?php echo $row['unit'];?></td>
        <td style=""><?php echo $row['article']; echo " ";echo $row['descr']?></td>
        <td style="text-align:center;" ><?php echo $row['req_quan'];?></td>
        <td style="text-align:center;">
                <?php
                if($row['a_quan'] > 0){
                    echo '<i class="bx bx-check"></i>('.$row['a_quan'].')
                    
                    <input type="hidden" name="yesno[]" id="yes" value="yes">';

                }
                ?>
        </td>
        <td style="text-align:center;">
        <?php
                if($row['a_quan'] == 0){
                    echo '<i class="bx bx-x"></i>
                    <input type="hidden" name="yesno[]" id="no" value="no">';

                }
                ?>
        </td>
        <td>
        <input type="number" name="app_quan[]" id="app_quan" value="<?php echo $row['req_quan'];?>" max="<?php echo $row['req_quan'];?>" min="0">
        <input type="hidden" name="a_quan[]" id="a_quan" value="<?php echo $row['a_quan'];?>">
        <input type="hidden" name="idx[]" id="idx" value="<?php echo $row['idx'];?>">

    </td>
        <td><input type="text" name="remarks[]" id="remarks"></td>
        </tr>

<?php
        $lastbalance = mysqli_query($conn, "select * from `stock_card` where sn_id = $sn_id and s_year = '{$str_last_year}' order by id_st desc limit 1");
        while($row=mysqli_fetch_array($lastbalance))
        {
            
            //get the last bal_qty on the last quan
            $last_bal_last_year = $row['bal_qty'];

            ?>

 
            
        

    <?php
        }
        ?>

       
<?php

        //get the last balance of the article
        $last_qty = 0;
        $lastbal = mysqli_query($conn, "select * from `stock_card` where sn_id = $sn_id order by id_st desc limit 1");
        while($row=mysqli_fetch_array($lastbal))
        {
             //get the last bal_qty on the last quan
             $last_qty = $row['bal_qty'];
            ?>
 
           
       <?php
       
        }

        ?>



        <?php

        if($last_qty > 0)
        {
            echo '<input type="hidden" name="last_qty[]" value="'.$last_qty.'">';
        }







/*
        if($current_year_bal == 0)
        {
            $current_year_bal = 0;
        }


        if($last_bal_last_year == 0)
        {
            $last_bal_last_year = 0;
        }



        if($last_bal_last_year == 0 && $current_year_bal > 0) //current year
        {
            echo '<input type="text" name="balan[]" value="'.$current_year_bal.'">'; 
        }
        else if($current_year_bal == 0 && $last_bal_last_year > 0)//
        {
            echo '<input type="text" name="balan[]" value="'.$last_bal_last_year.'">';
        }
        else if($current_year_bal == 0 && $last_bal_last_year == 0) 
        {
            echo '<input type="text" name="balan[]" value="0">';
        }
        
*/


        



?>

        <?php
        }
        ?>



    <tr>
        <td colspan="8">
        Purpose: <span><?php echo $req_pur;?></span>
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
        <td style="text-transform:uppercase;text-align:center;" ><?php echo $client_name;?></td>
        <td style="text-transform:uppercase;text-align:center;" colspan="2" ><?php echo $h_fullname;?></td>
       
        <td colspan="2" style="text-transform:uppercase;text-align:center;"><?php echo $fullname;?></td>
        <td ><input type="text" style="text-transform:uppercase;color:black;text-align:center;" onchange = "ReceivedBy(this.value)" name="receiveby" id="receiveby" required=""/></td>

    </tr>

    <tr>
        <td colspan="2">Designation:</td>
        <td style="text-align:center;"><?php echo $client_pos;?></td>
        <td colspan="2" style="text-align:center;"><?php echo $h_pos;?></td>
        <td colspan="2" style="text-align:center;"><?php echo $position;?></td>
        <td ><input  type="text" style="text-align:center;color:black;" name="receive_pos" id="receive_pos" >
       
        <input type="hidden" name="req_by" id="req_by" value="<?php echo $client_id;?>" >
        <input type="hidden" name="app_by" id="app_by" value="<?php echo $a_id;?>">
        <input type="hidden" name="iss_by" id="iss_by" value="<?php echo $id;?>">
        <input type="hidden" name="received_by" id="received_by" >
        <input type="hidden" name="id_ris" id="id_ris" value="<?php echo $converted_ris;?>" >

    </td>

    </tr>

    <tr>
        <td colspan="2">Date:</td>
        <td style="text-align:center;">
        <?php echo $c_date;?>
        <input type="hidden" name="app_date" id="app_date" value="<?php echo $a_date;?>">
        <input type="hidden" name="req_date" id="req_date" value="<?php echo $c_date;?>">

        
    </td>
        <td colspan="2" style="text-align:center;">
        <?php echo $a_date;?>
    </td>
        <td colspan="2">
            <input type="text" name="iss_date" id="iss_date" value="<?php echo $date_a;?>"></td>
        <td >
            <input type="text" name="rec_date" id="rec_date" value="<?php echo $date_a;?>"></td>

    </tr>
  
    <tr>
        <td colspan="2">Time:</td>
        <td style="text-align:center;"><?php echo $c_time;?></td>
        <td colspan="2" style="text-align:center;"><?php echo $a_time;?></td>
        <td colspan="2">
        <input type="hidden" name="iss_time" id="iss_time" value="<?php echo $time;?>">
        </td>
        <td >
        <input type="hidden" name="rec_time" id="rec_time" value="<?php echo $time;?>">
        <input type="hidden" name="app_time" id="app_time" value="<?php echo $a_time;?>">
        <input type="hidden" name="req_time" id="req_time" value="<?php echo $c_time;?>">
       
        <input type="hidden" name="ris_no" id="ris_no" value="<?php echo $ris_no;?>">
        <input type="hidden" name="fc" id="fc" value="<?php echo $fc_id;?>">


    </td>

    </tr>

</table>

<div class="row">
            <div class="col">

            </div>
            <div class="col">

            <input type="submit" name="save" id="save" value="Save as RIS No. <?php echo $ris_no;?>?" style="float:right;">
            </div>
        </div>

</form>


</div>

<?php include "bottom.php";?>




 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
     $(function() {
    $( "#receiveby" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


 $(function() {
    $( "#by" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

</script>


<script>
     function ReceivedBy(str){
        if(str.length == 0){
            document.getElementById("receive_pos").value = "";
            document.getElementById("received_by").value = "";


         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("receive_pos").value = myObj[0];
                    document.getElementById("received_by").value = myObj[1];


                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "receivedBy.php?receiveby=" + str, true);
            xmlhttp.send();

        }
     }
 </script>

<script>
     function GetByPO(str){
        if(str.length == 0){
            document.getElementById("by_po").value = "";
            document.getElementById("by_id").value = "";

         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("by_po").value = myObj[0];
                    document.getElementById("by_id").value = myObj[1];


                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "byPO.php?by=" + str, true);
            xmlhttp.send();

        }
     }
 </script>


 

 
</body>
</html>
