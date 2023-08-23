
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




        <div class="row" style=" border:1px solid #ededed; border-top:none;
           border:none;margin-right:5%;margin-left:5%;margin-top:2%;" >
           <div class="col">
           <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"> Reports</a>
           <a href="x-xcmy.php" ><span style="font-size:20px;"> / <i class="bx bx-folder"></i> 
           Monthly & Yearly Report</span></a> <span style="font-size:20px; "> / Consumable Items (RIS)</span></h1>

           </div>
          </div>

          <div class="row" style="margin-right:5%;margin-left:5%;margin-top:2%;">
          <div class="col" style="">
            <label for="search_viewdate">Search Date, Month , or Year and Click Print Report:</label>
            <input type="text" id="searchviewdate" onkeyup="myFunction()" placeholder="Filter date or year.." style="background:white;box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.19);border-radius:50px;float:right;">
           </div>
           <div class="col" >
           <button type="submit"  onclick="window.print();" id="print-btn" style="border-radius-top-left:50px;background-color:#77DD77;color:white;float:right;"><i class='bx bx-printer'></i> PRINT REPORT</button>  
           </div>
          </div>



     <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border:none;margin-right:5%;margin-left:5%;border-radius:10px;margin-top:2%;">
    <div class="section-to-print">
      <div class="row" style="margin-bottom:2%;">
          <div class="col">
              <h4>Report of Consumables</h4>
              <h6><?php echo $date=date("F m, Y");?></h6>

          </div>
       
      </div>



  <table id="dateview">
 <tr>
     <th>No.</th>
     <th>Date</th>
     <th>IAR No.</th>
     <th>Stock Number</th>
     <th>Fund Cluster</th>
     <th>Quantity</th>
     <th>Unit</th>
     <th>Item</th>
     <th>Unit Cost</th>
     <th>Total Cost</th>
     <th>Supplier</th>
     <th>PO Date</th>
     <th>PO Num</th>

</tr>

<?php
$stat = 1;
$query = mysqli_query($conn, "select * from `xris` join iar on iar.iar_id = xris.id_iar join fc on fc.ar_id = xris.sn_id
left join fund_c on fund_c.fundc_id = xris.fc_id where xris.stat = $stat and xris.id_iar is not null");
while($row = mysqli_fetch_array($query))
{
  ?>
<tr>
   <td></td>
   <td><?php echo $row['date'];?></td>
   <td><?php echo $row['iar_no'];?></td>
   <td><?php echo $row['stock_num'];?></td>
   <td><?php echo $row['fund_cluster'];?></td>
   <td><?php echo $row['in_quan'];?></td>
   <td><?php echo $row['unit'];?></td>
   <td><?php echo $row['article']; echo ", "; echo $row['descr'];?></td>
   <td><?php echo number_format($row['unit_cost'],2);?></td>
   <td><?php echo number_format($row['total_cost'],2);?></td>
   <td><?php echo $row['supplier'];?></td>
   <td><?php echo $row['po_num'];?></td>
   <td><?php echo $row['po_date'];?></td>


   

</tr>
  <?php
}
?>





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

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchviewdate");
  filter = input.value.toUpperCase();
  table = document.getElementById("dateview");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "None";
     
   }

}
}
}
</script>

<!--
<script type="text/javascript">
        $(document).ready(function(){
            $("#search_viewdate").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'filterdate.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#dateview").html(response);
                    }
                });
            });
        });
  </script>
      -->

 
</body>
</html>
