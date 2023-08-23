<?php
include "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inventory Files</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
.ar-link:hover{
    text-decoration:none;
}
  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
    

            

      <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;border:1px solid #ededed;
      margin-top:3%;margin-left:10%;margin-right:10%;"> 
      <h4>Inventory Files</h4>  
      </div>
      <a href="#" class="ar-link">
      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;margin-left:10%;margin-right:10%;margin-top:1%;margin-bottom:1%;">
      <div class="row">
          <div class="col">
          <i class='bx bx-box' style="font-size:70px;"></i>
          </div>
          <div class="col" style="margin-left:-85%;">
              <h5 style="margin-top: 1.5%;">Stock In</h5>
              <span style="color:grey;font-style:italic;">New items are found here.</span>
          </div>
      </div>
      </div> 
        </a> 
        <a href="#" class="ar-link">
      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;margin-left:10%;margin-right:10%;margin-bottom:1%;">
      <div class="row">
          <div class="col">
          <i class='bx bx-layout' style="font-size:70px;"></i>
          </div>
          <div class="col" style="margin-left:-85%;">
              <h5 style="margin-top: 1.5%;">Stock Out</h5>
              <span style="color:grey;font-style:italic;">Stock out items are found here.</span>
          </div>
      </div>
      </div> 
        </a>
        <a href="aa-pr-in.php" class="ar-link">
      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;margin-left:10%;margin-right:10%;margin-bottom:1%;">
      <div class="row">
          <div class="col">
          <i class='bx bx-envelope-open' style="font-size:70px;"></i>
          </div>
          <div class="col" style="margin-left:-85%;">
              <h5 style="margin-top: 1.5%;">Purchase Request</h5>
              <span style="color:grey;font-style:italic;">Approved purchase request are found here.</span>
          </div>
      </div>
      </div> 
        </a>


     

     



      </div>
      </div>
            
  </section>
<!-- sidebar script-->
<script src="assets/js/script.js"></script>


 

 
</body>
</html>

