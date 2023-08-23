<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `clients` where user_id=$userid");
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


<body style="background-color:whitesmoke;">

<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>


<section class="home-section" style="background-color:whitesmoke;">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

<div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">History </span> 
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;"></span> 
      </div>

      <!-- first card body-->
        <div class="row">

        <!-- One -->
            <div class="col">

            <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">
            <h2>One</h2>   
            </div>

            </div>
        <!--One -->

        <!--Two -->
            <div class="col">

            <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">
            <h2>Two</h2>
            </div>

            </div>
        <!--Two -->

        <!--Third -->
        <div class="col">

        <div class="card-body" style="border-radius:5px;border:1px solid #ededed;"> 
        <h3 style="color:grey;">Activity History</h3> 
        <button>Clear</button>
        <br>
        <hr>

        <?php include "connection.php";
                    
                    $your = "your";
                     
                    $query=mysqli_query($conn,"select * from `clients` left join clientlog on clientlog.user_id=clients.user_id where clients.user_id = '$userid'");
                      while($row=mysqli_fetch_array($query))
                      {
                        $details = $row['details'];

                        if (strlen($details) > 10)
                        $details = substr($details, 0, 20) . '...';

                      ?>
        <div class="card-body" style="border-radius:5px;">
            <div class="row">

                <div class="col">
                <img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" id="prof" width="50px" height="50px">
                <span style="font-style:italic;">You</span>
                <span style="color:#0d47a1;font-weight:bold;"><?php echo $row['activity'];?> your </span>
                <span><?php echo $details;?></span>
                </div>

               
                <span><button style="float:right;">delete</button></span>
               
                
            </div>
        </div>
        <hr>
        <?php
                     
                    }
                    ?>
    
        </div>
        </div>

        </div>
        <!--Third -->



        </div>


      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
