<?php include "a-session.php";

include "count-ris.php";
include "count-icspar.php";

?>
  

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="icon" href="image/bo.ico">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sample</title>
  <?php include "a-linkstyle.php";?>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="assets/bootstrap/css/ssbar.css">
</head>

   
    

  <style>
    /* CSS */
.line-button {
  background-color: #FFFFFF;
  border: 0;
  margin-right:1%;
  border-radius: .5rem;
  box-sizing: border-box;
  color: #111827;
  font-size: .875rem;
  font-weight: 600;
  line-height: 1.25rem;
  padding: .75rem 1rem;
  text-align: center;
  text-decoration: none #D1D5DB solid;
  text-decoration-thickness: auto;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.line-button:hover {
  background-color: rgb(249,250,251);
}

.line-button:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.line-button:focus-visible {
  box-shadow: none;
}
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  background-color: white;
  padding: 20px;
  font-size: 20px;
  margin-right:90%;
}


    </style>
 

  
<body style="background:whitesmoke;">

<!--Side bar-->
<?php 


$ris_year = date("Y");
?>


    <?php include "x-ssbar.php";?>
 

     <?php 
      //login session message display
    if(isset($_SESSION['status']))
    {
        ?>

<div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" style="margin-top:3%;margin-left:10%;margin-right:10%;">
            <div class="row">
              <div class="col">
                <h3>WELCOME!</h3>
              <strong></strong><?=$_SESSION['status'];?><?php echo $fullname;?>
              </div>
              <div class="col">
            
              </div>
            </div> 
            </div>
        <?php 
        unset($_SESSION['status']);
    }

?>


     <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     

     <a href="xc-myreq.php" id="cartfloat" title="my cart" target="_self"><i class='bx bx-cart' style="font-size:30px;color:royalblue;"></i>
<?php
if($myreq > 0)
{
  echo '<span style="font-size:15px;">'.$myreq.'</span>';
}
 
?>
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">    <h4 style="color:grey;">Dashboard</h4>
         
          
          </div>
          <div class="col" style="text-align:right;">
          <a href="logout.php" id="logout" title="Logout <?php echo $fullname;?>">Logout</a>
          </div>
        </div>
       
        </div>

     
        <div class="card-body" style="border-radius:10px;">

<div class="row" style="margin-top:4%;margin-bottom:4%;">
    <div class="col" style="border-right:1px solid gainsboro;">
<div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;text-align:center;">
<i class='bx bx-cart' style="color:royalblue;font-size:70px;"></i>
<h5>RIS</h5><span>Consumable Items</span>

<div class="row" style="margin-top:3%;">
  <div class="col">
    <a href="x-request.php"><span>RIS request(<?php echo $request_num;?>)</span></a>
  </div>

  <div class="col">
  <a href="x-full-ris.php"><span>Active RIS items (<?php echo $act_ris;?>)</span></a>


  </div>
</div>
</div>


<div class="card-body" style="text-align:center;"><br>
<a href="x-full-ris.php" style="padding:12px 12px;background:#77DD77;margin-top:2%;margin-bottom:2%;border-radius:5px;color:white;" id="">Go to RIS stockroom</a><br>
</div>
    </div>

    <div class="col" style="border-right:1px solid gainsboro;">
<div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;text-align:center;">
<i class='bx bx-box' style="color:royalblue;font-size:70px;"></i>
<h5>ICS</h5><span>Non-Consumable Items <= 15k</span>

<div class="row" style="margin-top:3%;">
  <div class="col">
    <a href="x-request.php"><span>Active ICS items(<?php echo $active_ics;?>)</span></a>
  </div>

  <div class="col">
  <a href="x-full-ris.php"><span>Set Custodian  (<?php echo $set_ics;?>)</span></a>


  </div>

  <div class="col">
  <a href="x-full-ris.php"><span>To be issued  (<?php echo $act_ris;?>)</span></a>


  </div>
</div>
</div>
<div class="card-body" style="text-align:center;"><br>
<a href="x-full-ics.php" style="padding:12px 12px;background:#77DD77;margin-top:2%;margin-bottom:2%;border-radius:5px;color:white;" id="">Go Inside</a><br>
</div>
    </div>


    <div class="col" style="">
<div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;text-align:center;">
<i class='bx bx-package' style="color:royalblue;font-size:70px;"></i>
<h5>PAR</h5><span>Non-Consumable ITems > 15k</span>
</div>
<div class="card-body" style="text-align:center;"><br>
<a href="x-full-par.php" style="padding:12px 12px;background:#77DD77;margin-top:2%;margin-bottom:2%;border-radius:5px;color:white;" id="">Go Inside</a><br>
</div>
    </div>

 
   
</div>



            




<script src="assets/js/app.js"></script>


 

 
</body>
</html>
