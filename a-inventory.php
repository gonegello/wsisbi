<?php
include "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inventory</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
.ar-link:hover{
    text-decoration:none;
    
}

/* Dropdown Button */
.dropbtn {
  background-color: transparent;
  border-radius:50px;
  color: grey;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  z-index: 1;
  border-radius:10px;
  float:left;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
 .dropdown.dropbtn:hover {background-color: whitesmoke;}

 
  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
    

            

      

      <div class="row" style="margin-top:5%;margin-right:5%;margin-left:5%;">

        <div class="col">

        <a href="#" class="ar-link">
        <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;
        border-top-left-radius:10px;border-top-right-radius:10px;">
        <div class="row">
          <div class="col">

          </div>
          <div class="col" style="text-align:right;">

          <div class="dropdown" style="text-align:left;">
            <button class="dropbtn" style=""> 
            <i class='bx bx-dots-vertical-rounded' style="float:right;font-size:25px;margin-top:1%;margin-bottom:1%;"></i>
          </button>
            <div id="myDropdown" class="dropdown-content">
              
              <a href="#">ICS</a>
              <a href="#">RIS</a>
            </div>
          </div>

          </div>
        </div>
      </div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;
      border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
      <div class="row" style="margin-top:4%;margin-bottom:4%;">
          <div class="col">
          <i class='bx bx-box' style="font-size:100px;color:grey;"></i>
          </div>
          <div class="col" style="">
              <h5 style="margin-top: 1.5%;">Stock In</h5>
              <span style="color:grey;font-style:italic;">List of out of items are here.</span><br><br>
              <a href="#"><i class='bx bx-log-in-circle' style="font-size:30px;"></i></a>
          </div>
      </div>
      </div>
        </a>



        </div>

        <div class="col">

        <a href="#" class="ar-link">
        <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;
        border-top-left-radius:10px;border-top-right-radius:10px;">
        <div class="row">
          <div class="col">

          </div>
          <div class="col" style="text-align:right;">

          <div class="dropdown" style="text-align:left;">
            <button class="dropbtn" style=""> 
            <i class='bx bx-dots-vertical-rounded' style="float:right;font-size:25px;margin-top:1%;margin-bottom:1%;"></i>
          </button>
            <div id="myDropdown" class="dropdown-content">
             
              <a href="#">ICS</a>
              <a href="#">RIS</a>
            </div>
          </div>

          </div>
        </div>
      </div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;
      border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
      <div class="row" style="margin-top:4%;margin-bottom:4%;">
          <div class="col">
          <i class='bx bx-box' style="font-size:100px;color:grey;"></i>
          </div>
          <div class="col" style="">
              <h5 style="margin-top: 1.5%;">Stock Out</h5>
              <span style="color:grey;font-style:italic;">List of out of items are here.</span><br><br>
              <a href="aa-stockout.php"><i class='bx bx-log-in-circle' style="font-size:30px;"></i></a>
          </div>
      </div>
      </div>
        </a>
</div>




        <div class="col">

        <a href="#" class="ar-link">
        <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;
        border-top-left-radius:10px;border-top-right-radius:10px;">
        <div class="row">
          <div class="col">

          </div>
          <div class="col" style="text-align:right;">

          <div class="dropdown" style="text-align:left;">
            <button class="dropbtn" style=""> 
            <i class='bx bx-dots-vertical-rounded' style="float:right;font-size:25px;margin-top:1%;margin-bottom:1%;"></i>
          </button>
            <div id="myDropdown" class="dropdown-content">
              <a href="#">Physical Inventory</a>
              <a href="#">Acquired</a>
       
            </div>
          </div>

          </div>
        </div>
      </div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;
      border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
      <div class="row" style="margin-top:4%;margin-bottom:4%;">
          <div class="col">
          <i class='bx bx-box' style="font-size:100px;color:grey;"></i>
          </div>
          <div class="col" style="">
              <h5 style="margin-top: 1.5%;">PAR</h5>
              <span style="color:grey;font-style:italic;">List of out of items are here.</span><br><br>
              <a href="#"><i class='bx bx-log-in-circle' style="font-size:30px;"></i></a>
          </div>
      </div>
      </div>
        </a>
       
        </div>







      </div><!-- end row -->



     



      </div>
      </div>
            
  </section>
<!-- sidebar script-->
<script src="assets/js/script.js"></script>


 

 
</body>
</html>

