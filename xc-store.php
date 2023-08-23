<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Stockroom</title>

    <?php require_once "cli-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style> 
.iar:hover{
  text-decoration:none;
}
  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "xc-sidebar.php";
?>


<section class="home-section">  
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

     <?php//require_once "xc-topbar.php"?>

     <?php //Display if added to cart successfully
  if(isset($_SESSION['added']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['added'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['added']);
  }
  ?>

<a href="xc-myreq.php" id="cartfloat" title="my cart" target="_self"><i class='bx bx-cart' style="font-size:30px;color:royalblue;"></i>
<?php

if($myreq > 0)
{
  echo '<span style="font-size:15px;">'.$myreq.'</span>';
}
 
?>
</a>
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-store"></i> Stockroom</h1>


</div>
     <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     
         <div class="col" style="padding:0;">
    
         <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-store"></i><span> &nbsp; STOCKROOM</span></h5>

          </div>
          <div class="col" style="text-align:right;">
         
          <a href="#f1" class="iar">Fund Cluster 01</a> |
            <a href="#f5" class="iar">Fund Cluster 05</a> |
            <a href="#f7" class="iar">Fund Cluster 07</a> 

          </div>
           
        </div>
        </div>







        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">CONSUMABLE ITEMS</h6>
          </div>
          <div class="col">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by item_description and supplier.." style="border-radius:50px;background:white;">
          </div>
        </div>
       
        </div>
       




      

            <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">


            <table id="myTable">
           <tr>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
          </tr> 
            <?php if($count_items == 0)
            echo '
            <div class="card-body" style="">
            <center>
            <img src = "image/none.jpg" style="object-fit:cover;"><br><br>
            <span style="color:grey;font-size:20px;">Stockroom is empty.</span><br><br>
            

            </center>
            </div>'
            ;

            ?>


            <?php
            include "connection.php";
            $stat = 1;
         
            $query = mysqli_query($conn, "select * from `xris` join fc on fc.ar_id = xris.sn_id where xris.stat = $stat and xris.id_iar is not null order by article asc"); 
            while($row = mysqli_fetch_array($query))
            {
                ?>

            <tr>
            <td>
           <img src="<?php echo $row['stock_img'];?>" style="object-fit:cover;" width="50px" height="50px">
            </td>
            <td><span style=""><?php echo $row['article'];?></span><br>
            <?php echo $row['descr'];?></td>
            <td>
             <?php
            if($row['a_quan'] > 0)
            {
                echo '<span style="color:green;font-size:15px;padding:12px 12px;border-left:none;border-right:none;">IN-STOCK</span>';
            }
            else{
              echo '<span style="color:red;font-size:15px;border-top:padding:12px 12px;border-left:none;border-right:none;">OUT-OF-STOCK</span>';

            }

            ?>
            </td>
            <td><?php echo $row['supplier'];?></td>

            <td><a href="xc-per-item.php?idx=<?php echo $row['idx'];?>" title = "<?php echo $row['article']; echo $row['descr'];?>"><i class='bx bx-chevron-right' style="margin-top:2%;font-size:30px;color:royalblue;padding:12px 12px;border-radius:50px;"></i></a></td>
           
            </tr>


            <?php
            }
            ?>


            </table>
            </div>


            <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">FUND CLUSTER 01</h6>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" id="f1">
        <?php
                if($count_f1 == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row" style="margin-top:4%;">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-store" style="font-size:100px;color:gainsboro;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">Fund Cluster 01 is empty.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>

        <table>
          <?php
           $stat = 1;
         $one = 1;
           $query = mysqli_query($conn, "select * from `xris` join fc on fc.ar_id = xris.sn_id where xris.stat = $stat and xris.id_iar is not null and xris.fc_id = $one order by article asc"); 
           while($row = mysqli_fetch_array($query))
           {

          
            ?> <tr>
            <td>
           <img src="<?php echo $row['stock_img'];?>" style="object-fit:cover;" width="50px" height="50px">
            </td>
            <td><span style=""><?php echo $row['article'];?></span><br>
            <?php echo $row['descr'];?></td>
            <td>
             <?php
            if($row['a_quan'] > 0)
            {
                echo '<span style="color:green;font-size:15px;padding:12px 12px;border-left:none;border-right:none;">IN-STOCK</span>';
            }
            else{
              echo '<span style="color:red;font-size:15px;border-top:padding:12px 12px;border-left:none;border-right:none;">OUT-OF-STOCK</span>';

            }

            ?>
            </td>
            <td><?php echo $row['supplier'];?></td>

            <td><a href="xc-per-item.php?idx=<?php echo $row['idx'];?>" title = "<?php echo $row['article']; echo $row['descr'];?>"><i class='bx bx-chevron-right' style="margin-top:2%;font-size:30px;color:royalblue;padding:12px 12px;border-radius:50px;"></i></a></td>
           
            </tr>


            <?php
          }
          ?>


      
          </table>


          </div>

        
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">FUND CLUSTER 05</h6>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" id="f5">
        <?php
                if($count_f2 == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row" style="margin-top:4%;">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-store" style="font-size:100px;color:gainsboro;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">Fund Cluster 05 is empty.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>
        <table>
          <?php
           $stat = 1;
         $five = 2;
           $query = mysqli_query($conn, "select * from `xris` join fc on fc.ar_id = xris.sn_id where xris.stat = $stat and xris.id_iar is not null and xris.fc_id = $five order by article asc"); 
           while($row = mysqli_fetch_array($query))
           {

          
            ?> <tr>
            <td>
           <img src="<?php echo $row['stock_img'];?>" style="object-fit:cover;" width="50px" height="50px">
            </td>
            <td><span style=""><?php echo $row['article'];?></span><br>
            <?php echo $row['descr'];?></td>
            <td>
             <?php
            if($row['a_quan'] > 0)
            {
                echo '<span style="color:green;font-size:15px;padding:12px 12px;border-left:none;border-right:none;">IN-STOCK</span>';
            }
            else{
              echo '<span style="color:red;font-size:15px;border-top:padding:12px 12px;border-left:none;border-right:none;">OUT-OF-STOCK</span>';

            }

            ?>
            </td>
            <td><?php echo $row['supplier'];?></td>

            <td><a href="xc-per-item.php?idx=<?php echo $row['idx'];?>" title = "<?php echo $row['article']; echo $row['descr'];?>"><i class='bx bx-chevron-right' style="margin-top:2%;font-size:30px;color:royalblue;padding:12px 12px;border-radius:50px;"></i></a></td>
           
            </tr>


            <?php
          }
          ?>


      
          </table>
          
        </div>


        
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">FUND CLUSTER 07</h6>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" id="f7" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <?php
                if($count_f3 == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row" style="margin-top:4%;">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-store" style="font-size:100px;color:gainsboro;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">Fund Cluster 01 is empty.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>


        <table>
          <?php
           $stat = 1;
         $seven = 3;
           $query = mysqli_query($conn, "select * from `xris` join fc on fc.ar_id = xris.sn_id where xris.stat = $stat and xris.id_iar is not null and xris.fc_id = $seven order by article asc"); 
           while($row = mysqli_fetch_array($query))
           {

          
            ?> <tr>
            <td>
           <img src="<?php echo $row['stock_img'];?>" style="object-fit:cover;" width="50px" height="50px">
            </td>
            <td><span style=""><?php echo $row['article'];?></span><br>
            <?php echo $row['descr'];?></td>
            <td>
             <?php
            if($row['a_quan'] > 0)
            {
                echo '<span style="color:green;font-size:15px;padding:12px 12px;border-left:none;border-right:none;">IN-STOCK</span>';
            }
            else{
              echo '<span style="color:red;font-size:15px;border-top:padding:12px 12px;border-left:none;border-right:none;">OUT-OF-STOCK</span>';

            }

            ?>
            </td>
            <td><?php echo $row['supplier'];?></td>

            <td><a href="xc-per-item.php?idx=<?php echo $row['idx'];?>" title = "<?php echo $row['article']; echo $row['descr'];?>"><i class='bx bx-chevron-right' style="margin-top:2%;font-size:30px;color:royalblue;padding:12px 12px;border-radius:50px;"></i></a></td>
           
            </tr>


            <?php
          }
          ?>


      
          </table>
          
          
        </div>
       
       
    
          </div>
          </div>
     
         
<?php include "bottom.php";?>

      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script>
const closesuccBtn = document.getElementById('close-success-btn');
const divSuccess = document.getElementById('div-success');

closesuccBtn.onclick = function(){
  divSuccess.style.display = "none";
}


 </script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1 || td[3].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }

}
}
}
</script>
 

 
</body>
</html>
