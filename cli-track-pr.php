<?php
//get user information
include "cli-session.php";
	?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Notification</title>

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

      <!-- first card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-left:10%;margin-right:10%;margin-top:3%;"> 
      <h4><i class='bx bx-bell'></i> Track My Purchase Request</h4>  
      </div>

      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-left:10%;margin-right:10%;border-top:none;">      

      <div class="row" style="margin-right:10%;margin-left:10%;">
          <div class="col" style="text-align:center;">
        
          <i class='bx bx-paper-plane' style="color:#6ac46a;font-size:50px;"></i><br><br>
          <h6 style="color:#6ac46a;">REQUESTED</h6>
          </div>

          <div class="col" style="text-align:center;">
         <hr style="margin-top:17%;border:1px solid #6ac46a;">
          </div>

          <div class="col" style="text-align:center;">
        <i class='bx bx-user' style="color:#6ac46a;font-size:50px;"></i><br><br>
        <h6 style="color:#6ac46a;">DEPARTMENT HEAD</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

        <div class="col" style="text-align:center;">
        <i class='bx bx-envelope-open'style="color:#ededed;font-size:50px;"></i><br><br>
        <h6 style="color:#ededed;">CAMPUS DIRECTOR</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class='bx bx-box' style="color:#ededed;font-size:50px;"></i><br><br>
        <h6 style="color:#ededed;">SUPPLY OFFICE</h6>
          </div>

      </div>

</div>
     





    
     



      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
