<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>RIS Records</title>

    <?php require_once "cli-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>  
 

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
  if(isset($_SESSION['requested']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['requested'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['requested']);
  }
  ?>



<a href="#" id="cartfloat" title="my cart" target="_self"><i class='bx bx-cart' style="font-size:30px;color:royalblue;"></i>
<?php

if($myreq > 0)
{
  echo '<span style="font-size:15px;">'.$myreq.'</span>';
}


?>
</a>

<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-file"></i> RIS Records</h1>



</div>
     <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-file"></i><span> &nbsp; RIS</span></h5><span style="color:white;">Requisition Issue Slip</span>

          </div>
          <div class="col" style="text-align:right;">
         
      

          </div>
           
        </div>
        </div>


        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">RIS RECORDS</h6>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
            <table>

            <?php
                if($count_ris == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row">
                    <div class="col" style="text-align:center;">
                    <img src="image/none.jpg" style="object-fit:cover;" ><br><br>
                    <span style="color:grey;font-size:18px">This section is empty.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>

            <?php
              $query = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id join ris on ris.idris = req.id_ris
               where ris.req_by = $id"); 
              while($row = mysqli_fetch_array($query))
          {  

            ?>

            <tr>
                
                <td><i class="bx bx-file" style="color:#A3A3FF;font-size:30px;"></i></td>
                <td><?php echo $row['ris_no'];?></td>
                <td ><a href="xc-xris.php?fc=<?php echo $row['fc_id'];?>&req_by=<?php echo $row['req_by'];?>&idris=<?php echo $row['idris'];?>" class="opptions"><i class='bx bxs-chevron-right'></i></a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>

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


 

 
</body>
</html>
