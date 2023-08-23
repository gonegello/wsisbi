<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Request Cart</title>

    <?php require_once "cli-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>  
  table {
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:20px;
  
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
    border:none;
}

#checkout{
  float:right;
}


.opptions{
  background:none;
  padding:12px 12px;
  color:grey;
  border-radius:5px;
  margin-left:3%;
 
}

.opptions:hover{
  background:#f0f0f0;
  padding:10px 15px;
  text-decoration:none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;;
  border-radius:50%;
  color:grey;

  

}
.emptylink{

  background:royalblue;
  color:white;
  border-radius:5px;
  padding:10px 12px;

}

.emptylink:hover{
  color:royalblue;
  text-decoration:none;
  background:white;
  border:2px solid royalblue;


}

.iar:hover{
  text-decoration:none;
}
#allsearch{
  background:white;
  width:70%;
  border-radius:50px;
  border:1px solid #ededed;
  float:right;

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


     <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-bell"></i> Notifications</h1>



</div>
     <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-bell"></i><span> &nbsp; NOTIFICATIONS</span></h5>

          </div>
          <div class="col" style="text-align:right;">
         
          <a href="#" class="iar">Approved 
            <?php
              if($approved > 0)
              {
                  echo '<span style="background:red;color:white;font-weight:bold;padding:5px 12px;border-radius:50px;
                  font-size:15px;">'.$approved.'</span>';
              }
     



?>
          </a> |
            <a href="#" class="iar">Pending
            <?php
              if($pendings > 0)
              {
                  echo '<span style="background:red;color:white;font-weight:bold;padding:5px 12px;border-radius:50px;
                  font-size:15px;">'.$pendings.'</span>';
              }
     



?>
      
            </a>
          </div>
           
        </div>
        </div>

        <div class="card-body">
            <h6 style="color:grey;">Approved Request</h6>

        </div>
        <div class="card-body">
        <?php if($approved == 0)
            echo '
            <div class="card-body" style="">
            <center>
            <img src = "image/none.jpg" style="object-fit:cover;"><br><br>
            <span style="color:grey;font-size:20px;">No record of approved Request.</span><br><br>
            

            </center>
            </div>'
            ;

            ?>

   <table>

          <?php
  include "connection.php";
  $req_stat = "saved";

$query = mysqli_query($conn, "select * from `ris` join req on req.id_ris = ris.idris
where ris.req_by = $id and req.req_stat = '{$req_stat}' order by idris desc"); 
while($row = mysqli_fetch_array($query))

  {
    
    ?>
<tr><td width="10%"><span style="font-size:15px;"><?php echo $row['app_date'];?></span></td></tr>
<tr>
  <td><i class='bx bxs-like' style="color:#77DD77;font-size:50px;"></i></td>
  <td>Your request has been approved by the supply office.</td>
  <td style="float:right;"><a href="xc-xris.php?fc=<?php echo $row['fc'];?>&req_by=<?php echo $row['req_by'];?>&idris=<?php echo $row['idris'];?>">View</a></td>
</tr>

<?php

  }
  ?>



</table>

        </div>

        <div class="card-body" style="border-top:1px solid #ededed;" id="pending">
            <h6 style="color:grey;">Pending Request</h6>

        </div>

        <div class="card-body">
        <?php if($pendings == 0)
            echo '
            <div class="card-body" style="">
            <center>
            <img src = "image/none.jpg" style="object-fit:cover;"><br><br>
            <span style="color:grey;font-size:20px;">You have no pending request.</span><br><br>
            

            </center>
            </div>'
            ;

            ?>

          <table>

          <?php
  include "connection.php";
  $req_stat = "cart";
  $cartt = "cart";


$query = mysqli_query($conn, "select * from `req` where client_id = $id and id_ris is null and req_stat != '{$req_stat}' group by r_date,r_time"); 
while($row = mysqli_fetch_array($query))

  {
    
    ?>
<tr><td width="10%"><span style="font-size:15px;"><?php echo $row['c_date'];?></span></td></tr>
<tr>
  <td><i class='bx bx-message-square-error' style="font-size:50px;color:orange;"></i></i></td>
  <td>You have a pending request.</td>
  <td style="float:right;"><a href="xc-track.php?c_date=<?php echo $row['c_date'];?>&c_time=<?php echo $row['c_time'];?>&req_stat=<?php echo $row['req_stat'];?>">Track</a></td>
</tr>

<?php

  }
  ?>



</table>

        </div>


      
     
         


      </div>
      </div>
      
<?php include "bottom.php";?>
            
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
