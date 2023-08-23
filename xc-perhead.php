<?php
include "cli-session.php";
include "xc-count.php";
?>

<?php
$client_id = $_GET['client_id'];
//get item details
$que=mysqli_query($conn,"select * from `people` where idc = $client_id");
while($rw=mysqli_fetch_array($que))
{
   $c_prof = $rw['profile'];
   $fulln = $rw['fullname'];
   $c_pos = $rw['position'];
   $c_off = $rw['office'];
   
} 



?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>  table {
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

#save{
  padding:12px 12px;
  border-radius:5px;
  background:#77dd77;
  border:none;
  box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
  color:white;
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



        

<div class="row" style="margin-top:5%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     <form method="post" action="xc-app-req.php">
     <div class="card-body" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:royalblue;">
         <div class="row" style="margin-top:4%;margin-bottom:4%;">
           <div class="col" style="text-align:center;">
           <img src="<?php echo $c_prof;?>" style="object-fit:cover;
            border-radius:50%;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;" width="200px" height="200px">
           <h4 style="color:white;margin-top:3%;"><?php echo $fulln;?></h4><span style="color:white;font-style:italic;"><?php echo $c_pos; echo ", "; echo $c_off;?></span>
           </div>
         </div>
        
        </div>
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h4 style="color:royalblue;">Department Request</h4>
          </div>
          <div class="col">
           

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <table>

<?php
$req_stat = "head";
  $que = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where req.req_stat = '{$req_stat}' and client_id = $client_id"); 
  while($rw = mysqli_fetch_array($que))

{
    ?>

    <tr>
      <td></td>
        <td><?php echo $rw['req_quan']; echo " "; echo $rw['unit']; echo " "; echo $rw['item_details'];?></td>
        <td><input type="hidden" name="req_id[]" id="req_id" value="<?php echo $rw['idreq'];?>"></td>
    
    </tr>
 

<?php
}
?>



<input type="hidden" name="name" id="name" value="<?php echo $fulln;?>">
<input type="hidden" name="a_id" id="a_id" value="<?php echo $id;?>">


 
</table>

<div class="row">
    <div class="col" style="text-align:right;">
    <input type="submit" name="save" id="save" value="Approve Request">
    </div>
</div>
</form>
          
        </div>


</div>
</div>


         
           </div>





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
