<?php
include "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>File Archives</title>

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
    

            

      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;
      border-bottom-left-radius:none;border-bottom-right-radius:none;margin-top:3%;margin-left:10%;margin-right:10%;"> 
      <h4>File Archives</h4>  
      </div>
      <a href="a-item-archives.php" class="ar-link">
      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;margin-left:10%;margin-right:10%;">
      <div class="row">
          <div class="col">
          <i class='bx bx-box' style="font-size:70px;"></i>
          </div>
          <div class="col" style="margin-left:-85%;">
              <h5 style="margin-top: 1.5%;">Archived Items</h5>
              <span style="color:grey;font-style:italic;">Archived Items are found here.</span>
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

