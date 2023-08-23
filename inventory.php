<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `admin` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['id'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            $designation=$row['designation'];
        }

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
        }

             
	?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
   

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>

  </style>



<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>




<section class="home-section">
<?php
require_once "a-navtoolbar.php";
?>
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->



      <!-- first card body--><br>
      <div class="row">
         

      <div class="col">
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">   
      </div>

      </div>

      <div class="col">
              <div class="card-header py-3" style="background-color:#ccae90;border-top-right-radius:5px;border-top-left-radius:5px;"><h4 style="color:white;">Physical Inventory</h4></div>
      
    <div class="card-body" style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;border:1px solid #ededed;">  
      
        <div class="row">

            <div class="col" style="margin-left:5%;">
            <span>Arrival Photo:</span>
            <img id="beforephoto" style= "object-fit:cover;border:1px solid grey;border-radius:5px;" src="image/load.PNG" alt="Profile Image" height="300px" width="300px"/>

            </div>


            <div class="col">
                <input type='file' id="imgInp" name="imgInp" style="display:none" />
               <!-- preview image here-->
               <span>Current Photo:</span>
                <img id="addpho" style= "object-fit:cover;border:1px solid grey;border-radius:5px;" src="image/load.PNG" alt="Profile Image" height="300px" width="300px"/> 
        
            </div>


        </div>
        <br>
        <div class="row">
            <div class="col" style="margin-left:5%;">
                <label>Product Code:</label><br>
                <input type="text" placeholder="Product Code">
            </div>

            <div class="col">
                <label>Product Code:</label><br>
                <input type="text" placeholder="Property Number">
            </div>
        </div><br>

        <div class="row">
        
            <div class="col" style="margin-left:5%;">
            <span>Item Status:</span><br>
            <input type="checkbox" name="serviceable" value="serviceable">
            <label for="serviceable">Serviceable</label><br>
            <input type="checkbox" name="serviceable" value="serviceable">
            <label for="non-serviceable">Non-Serviceable</label>
            </div>
        </div>





    </div>

      </div>

      </div>



      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>


 

 
</body>
</html>
