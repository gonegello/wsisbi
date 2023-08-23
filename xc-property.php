<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

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



<a href="#" id="cartfloat" title="my cart" target="_self"><i class='bx bxs-chevron-up' style="font-size:30px;color:royalblue;"></i>
<?php

if($myreq > 0)
{
  echo '<span style="font-size:15px;">'.$myreq.'</span>';
}


?>
</a>

<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-purchase-tag"></i> Property</h1>



</div>
     <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-purchase-tag"></i><span> &nbsp; PROPERTY</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          <a href="#all" class="iar">All Property</a> |
            <a href="#ics" class="iar">ICS Prpoerty</a> |
            <a href="#par" class="iar">PAR Property</a> |
            <a href="#transfer" class="iar">Transferred Property</a>
      

          </div>
           
        </div>
        </div>




        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h4 style="color:#A3A3FF;">ACQUIRED PROPERTY</h4><span><?php echo $fullname;?></span>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" id="all" >
            <div class="row">
                <div class="col">
                <h6>All Property (<?php echo $allAcquired;?>)</h6>
                </div>
                <div class="col">

                </div>
            </div>

        <table>
            
        <?php
                if($allAcquired == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-purchase-tag" style="font-size:100px;color:#A3A3FF;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">You have no acquired property yet.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>
            <?php
             $query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id 
             where icspar_details.custodian = $id and icspar_details.ptr_id is null");
             while($rw = mysqli_fetch_array($query))
            {
                ?>

                <tr>
                    <td><i class='bx bx-purchase-tag' style="color:royalblue;"></i></td>
                    <td><?php echo $rw['prop_num'];?></td>
                    <td>
                        <?php echo $rw['item_details'];?>
                    </td>
                    <td>
                   
                    </td>
                </tr>

            <?php
            }

            ?>
        </table>

        </div>

        <div class="card-body" id="ics" style="border-top:1px solid #f0f0f0;">
            <div class="row">
                <div class="col">
                <h6>ICS Acquired Property (<?php echo $icscount;?>)</h6>
                </div>
                <div class="col">

                </div>
            </div>

            <table>

            <?php
                if($icscount == 0)
                { echo '
                    <tr>
                    <td>
                    <div class="row">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-purchase-tag" style="font-size:100px;color:#A3A3FF;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">This section is empty.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>
                <?php
                   
                   $query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id 
                   join ics on ics.idics = icspar_details.icsxpar_no
                   where icspar_details.custodian = $id
                   and icspar_details.ptr_id is null");
                   while($row = mysqli_fetch_array($query))
            
                {
                 
                    
                    ?> 

                 
                <tr>
                <td><i class='bx bx-purchase-tag' style="color:royalblue;"></i></td>
                    <td><?php echo $row['prop_num'];?></td>
                    <td><?php echo $row['item_details'];?></td>
                    <td>
                        <span style="font-size:15px;color:royalblue;">ICS No.</span><br>
                        <?php echo $row['ics_no'];?>
                    </td>
                    <td>
                    <span style="font-size:15px;color:royalblue;">ICS Date: </span><br>
                        <?php echo $row['ics_date'];?>
                    </td>
                    

                </tr>
       


                    <?php
                }
                ?>
         

        </table>
        </div>

        <div class="card-body" id="par" style="border-top:1px solid #f0f0f0;">
            <div class="row">
                <div class="col">
                <h6>PAR Acquired Propert (<?php echo $parcount;?>)</h6>
                </div>
                <div class="col">

                </div>
            </div>

            <table>
                <?php
                if($parcount == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-purchase-tag" style="font-size:100px;color:#A3A3FF;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">You have no PAR acquired property yet.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>
                <?php
                   
                   $query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id 
                   join par on par.idpar = icspar_details.icsxpar_no
                   where icspar_details.custodian = $id
                   and icspar_details.ptr_id is null");
                   while($row = mysqli_fetch_array($query))
            
                {
                 
                    
                    ?> 

                 
                <tr>
                <td><i class='bx bx-purchase-tag' style="color:royalblue;"></i></td>
                    <td><?php echo $row['prop_num'];?></td>
                    <td><?php echo $row['item_details'];?></td>
                    <td>
                        <span style="font-size:15px;color:royalblue;">ICS No.</span><br>
                        <?php echo $row['par_no'];?>
                    </td>
                    <td>
                    <span style="font-size:15px;color:royalblue;">ICS Date: </span><br>
                        <?php echo $row['par_date'];?>
                    </td>
                    

                </tr>
       


                    <?php
                }
                ?>
         

        </table>
        </div>


        <div class="card-body" id="transfer" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h4 style="color:#A3A3FF;">TRANSFERRED PROPERTY ( <?php echo $trans;?> )</h4>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" style="">
            <h6>Transferred To: ( <?php echo $trans;?> )</h6>

        <table>
        <?php
                if($trans == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-purchase-tag" style="font-size:100px;color:#A3A3FF;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">No record of property transferred from you.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>
            <?php
             $query = mysqli_query($conn, "select * from `icspar_details` join xicspar on xicspar.idx = icspar_details.x_id
             join people on people.idc = icspar_details.ptr_custodian join ptr on ptr.idptr = icspar_details.ptr_id
             where icspar_details.custodian = $id and icspar_details.ptr_id is not null");
             while($rw = mysqli_fetch_array($query))
            {
                ?>

                <tr>
                    <td><i class='bx bx-tag-alt' style="color:royalblue;"></i></td>
                    <td><?php echo $rw['prop_num'];?></td>
                    <td>
                        <?php echo $rw['item_details'];?>
                    </td>
                    <td>
                        <span style="font-size:15px;color:royalblue;">Transferred To:</span><br>
                    <?php echo $rw['fullname'];?>
                    </td>
                    <td>
                    <span style="font-size:15px;color:royalblue;">Transferred Date:</span><br>
                    <?php echo $rw['ptr_date'];?>
                    </td>
                </tr>

            <?php
            }

            ?>
        </table>

        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;border-top:1px solid #f0f0f0;">
       <h6>Transferred From:(<?php echo $ac_from;?>)</h6>

        <table>
        <?php
                if($ac_from == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-purchase-tag" style="font-size:100px;color:#A3A3FF;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">There are no transferred property for you.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>
            <?php
             $query = mysqli_query($conn, "select * from `icspar_details` join people on people.idc = icspar_details.custodian join xicspar on xicspar.idx = icspar_details.x_id
             join ptr on ptr.idptr = icspar_details.ptr_id where icspar_details.ptr_id = $id");
             while($rw = mysqli_fetch_array($query))
            {
                ?>

                <tr>
                    <td><i class='bx bx-tag-alt' style="color:royalblue;"></i></td>
                    <td><?php echo $rw['prop_num'];?></td>
                    <td>
                        <?php echo $rw['item_details'];?>
                    </td>
                    <td>
                        <span style="font-size:15px;color:royalblue;">Transferred From:</span><br>
                    <?php echo $rw['fullname'];?>
                    </td>
                    <td>
                    <span style="font-size:15px;color:royalblue;">Transferred Date:</span><br>
                    <?php echo $rw['ptr_date'];?>
                    </td>
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
