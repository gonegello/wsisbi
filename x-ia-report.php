

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

?>


<?php
//give value to the next stock id for stock_pn
include "connection.php";
$next = mysqli_query($conn, "select * from `xris` order by idx desc limit 1");
while($rw = mysqli_fetch_array($next))
{
    //find the last id
    $last_stock_id = $rw['idx'];

}
    //convert last id to int
    $convert_lsi = intval($last_stock_id);
    //add 1 to predict the next id number
    $next_stock_id = $convert_lsi + 1;


    //university abb
    $abb = mysqli_query($conn, "select *from `university` order by iduniv desc limit 1");
    while ($row = mysqli_fetch_array($abb))
    {
        $uni_ab = $row['abb'];
    }


?>

                       
<?php
//include "property_number.php";
//include "stock_number.php";
include "x-ris-no.php";

?>





    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>IA Report</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
  .div-link{
    color:black;
  }

  .div-link:hover{

    text-decoration:none;
    color:#E6A519;
  }


/* CSS */

table{
    width:100%;
}

td{
  padding:8px;
}

 
    #search{
        margin-top:1%;
        border-radius:50px;
        width:80%;
        float:right;
    }

   
.guidelink{
  padding:10px 12px;
  color:white;

  border-radius:50px;
}

.guidelink:hover{
  text-decoration:none;
  color:black;
  background:#ffc801;
  border:none;
  
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
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
    include 'modaladd_gen.php';
    include 'modaladd_category.php';
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    

    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">
    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a><span style="font-size:20px;"> / <i class="bx bx-folder"></i> IAR</span></h1>
    </div>

    <div class="col" style="text-align:right;margin-top: 1%;">
      <span><a href="x-input-iar.php" class="second"> <i class="bx bx-mouse"></i> RIS Acceptance </a> | <a href="x-input-iar.php" class="second">
      <i class="bx bx-mouse"></i> ICS&PAR Acceptance </a></span>
    </div>
 
 </div>
 


    <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body"id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;">
           <i class='bx bx-folder' style="padding:12px 12px;border-radius:50%;font-size:100px;color:white;"></i><br>
           <h4 style="color:white;">Inspection And Acceptance Report</h4>
           </div>
         </div>
        <div class="row" style="margin-top:4%;">
          <div class="col" style="text-align:center;">
            <a href="#non" title="Inspection and Acceptance Report" class="guidelink">Non-Consumable</a> |
            <a href="#con" title = "Inventory Custodian Slip" class="guidelink">Consumable</a> 
          
           
        

        
           


          </div>
           
        </div>
        </div>

        


        <div class="card-body" style="background:whitesmoke;" id="non">
        <div class="row">
          <div class="col">
              <h5 style="">Non-Consumables</h5>
    
    </div>
          <div class="col">
          <input type="text" id="noncuinput" onkeyup="myFunctionn()"  placeholder="Search by iar no. or item_details.." style="background:white;border-radius:50px;">


          </div>
        </div>
       
        </div>


        <div class="card-body">
          <table id="noncutable">
        <?php
                  $stat = "1";
                 $query = mysqli_query($conn, "select * from `iar` join xicspar on xicspar.id_iar = iar.iar_id
                 where iar.statt = $stat group by id_iar order by iar_id desc limit 5");
                 while($row = mysqli_fetch_array($query))
                 {
    
                $id_iar = $row['iar_id'];
                $supplier = $row['supplier'];


?>         
<tr>

               
                  <td>
              
                  <i class='bx bx-file' style="color:white;background:#A3A3FF;padding:12px 12px;border-radius:50px;"></i>
                 </td>
              

                <td>
                  <span style="font-size:20px;color:grey;font-weight:bold;"><?php echo $row['iar_no'];?></span><br>
                  <span style="color:rgb(40,40,40);">PO No: &nbsp;<?php echo $row['po_num'];?></span><br>
                  <span style="color:rgb(40,40,40);">PO Date: &nbsp;<?php echo $row['po_date'];?></span>
                 </td>
                  
                 <td>
                    <?php
                    $qq = mysqli_query($conn,"select * from `xicspar` where id_iar = $id_iar limit 5");
                    while($rw = mysqli_fetch_array($qq))
                    {
                      ?>
                  
                    
                    <span style="font-style:italic;font-size:15px;">
                    <?php echo $rw['item_details'];?>,
                    </span>
                    
                 

                   

                    <?php
                    }
                    ?>
                       </td>

                  <td><a href="x-iar-per.php?iar_id=<?php echo $row['iar_id']?>" ><i class='bx bxs-chevron-right' style="font-size:20px;" ></i></a></td>
                
                  </tr>


                <?php
                 }
                 ?>

                </table>
        </div>
        
        <div class="card-body" style="background:whitesmoke;" id="con">
        <div class="row">
          <div class="col">
              <h5 style="">Consumables</h5>
    
    </div>
          <div class="col">
          <input type="text" id="cuinput" onkeyup="myFunction()" placeholder="Search by iar no. or item_detais.." style="background:white;border-radius:50px;">
          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <table id="cutable">
        <?php
                  $stat = "1";
                 $query = mysqli_query($conn, "select * from `iar` join xris on xris.id_iar = iar.iar_id
                 where iar.statt = $stat group by id_iar order by iar_id desc limit 5");
                 while($row = mysqli_fetch_array($query))
                 {
    
                $id_iar = $row['iar_id'];
                $supplier = $row['supplier'];


?>         
<tr>

               
                  <td>
              
                  <i class='bx bx-file' style="color:white;background:#A3A3FF;padding:12px 12px;border-radius:50px;"></i>
                 </td>
              

                <td>
                <span style="font-size:20px;color:grey;font-weight:bold;"><?php echo $row['iar_no'];?></span><br>
                  <span style="color:rgb(40,40,40);">PO No: &nbsp;<?php echo $row['po_num'];?></span><br>
                  <span style="color:rgb(40,40,40);">PO Date: &nbsp;<?php echo $row['po_date'];?></span>
                 </td>
                  
                 <td>
                    <?php
                    $qq = mysqli_query($conn,"select * from `xris` where id_iar = $id_iar limit 5");
                    while($rw = mysqli_fetch_array($qq))
                    {
                      ?>
                  
                    
                  <span style="font-style:italic;font-size:15px;">
                    <?php echo $rw['item_details'];?>,
                    </span>
                    

                   

                    <?php
                    }
                    ?>
                       </td>

                  <td><a href="x-ris-per.php?iar_id=<?php echo $row['iar_id']?>" ><i class='bx bxs-chevron-right' style="font-size:20px;" ></i></a></td>
                
                  </tr>


                <?php
                 }
                 ?>

                </table>

        </div>

      </div>
      </div>





    </div>
    </div>

    <?php require "bottom.php";?>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 
 <script>
function myFunctionn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("noncuinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("noncutable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1 || td[2].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "None";
     
   }

}
}
}
</script>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cuinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("cutable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1 || td[2].innerHTML.toUpperCase().indexOf(filter) > -1)   {
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
            $("#search_xiareport").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'search-xiareport.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#table-data").html(response);
                    }
                });
            });
        });
  </script>

<script type="text/javascript">
        $(document).ready(function(){
            $("#searchconsu").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'search-consumble.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#data").html(response);
                    }
                });
            });
        });
  </script>
      -->




</body>
</html>
