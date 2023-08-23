
<?php
include "a-session.php";
//include "gen_iarno.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


  <head>
    <meta charset="UTF-8">
    <title></title>

    <?php require_once "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>

input[type="submit"]{
    padding:10px 15px;
    outline:none;

}
    
table {
  border-collapse: collapse;
  width: 100%;
  outline:3px solid black;
  border:none;
}


th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #ddd;
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
input.larger{
    width:30px;
    height:30px;
    
}

.top{
    outline:none;
}
.top td{
    border:none;
    
}

#csv{
    background:#77DD77;
    color:white;

}
#print-btn{
    background:#78A2CC;
    color:white;
}


  </style>


<body style="background:whitesmoke;">



        
<div class="row" style="margin-left:2%;margin-right:2%;margin-top:2%;margin-bottom:2%;">
        
        <button type="submit" onclick="window.print();" id="print-btn" ><i class='bx bx-printer'></i> PRINT REPORT</button>
        <button type="submit" id="csv"> <i class='bx bx-download'></i> EXPORT TO CSV</button>


        </div>  
    
     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border:none;margin-right:2%;margin-left:2%;margin-top:5%;" >
    <div class="section-to-print">
      <div class="row" style="margin-bottom:2%;">
          <div class="col">
              <h4>Report of Non-Consumables</h4>
              <h6>Date Here</h6>

          </div>
       
      </div>



  <table>
 <tr>
     <th>No.</th>
     <th>Date</th>
     <th>IAR No.</th>
     <th>Classification</th>
     <th>Fund Cluster</th>
     <th>Quantity</th>
     <th>Unit</th>
     <th>Item</th>
     <th>Unit Cost</th>
     <th>Total Cost</th>
     <th>Supplier</th>
     <th>Estimate Useful Life</th>
     <th>PO Date</th>
     <th>PO Num</th>

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
    <td></td>
    <td></td>
    <td></td>

</tr>



</table>




       

<div class="row">
    <div class="col">

    </div>

    <div class="col" style="text-align:right;">
       
</div>
            </form>   
   


           
    </div>

     





 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

<script>

$(function() {
    $( "#member" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


 $(function() {
    $( "#chairperson" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

 $(function() {
    $( "#officer" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


</script>


 

 
</body>
</html>
