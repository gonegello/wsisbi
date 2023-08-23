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
    <title>Stockroom</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/client.css">

   

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>

  </style>


<body>

<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

<div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Stock Room </span> 
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Sign out <?php echo $fullname;?></span>
      </div>

      <!-- first card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">   

      <div class="row" >

        <div class="col">
         
        <div class="card" style="border:none;">

        <h6>Notifications</h6>
         

          <!-- tab card body-->
          <div class="card-body" style="border-radius:5px;"> 
          <ul class="nav nav-tabs nav-justified" id="cli-s-tablist" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" href="#one" id="stck" role="tab" data-toggle="tab"><i class='bx bx-box' id="s-i"></i><br><p id="s-p">All Stock</p></a>
            </li>
            
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#two"  id="cat" role="tab" data-toggle="tab"><i class='bx bx-category' id="c-i"></i><br><p id="c-p">Category</p></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#three" id="unt" role="tab" data-toggle="tab"><i class='bx bx-collection' id="u-i"></i><br><p id="u-p">Unit</p></a>
            </li>
          </ul>

          <!--Tab content -->
          <div class="tab-content">

          <!--first tab content-->
            <div class="tab-pane active" id="one" role="tabpanel">

          <div class="row">
            <div class="col">
            <div class="card-body" > 
          <input type="text" class="search" id="search_stock"  placeholder="Search..">
   
          </div>
            </div>
          </div>
            

            <div class="row" style="margin-top:2%;">
            
            <?php include "connection.php";
                    $peso = "Php. ";
                     
                      $query=mysqli_query($conn,"select * from `stocks`");
                      while($row=mysqli_fetch_array($query))
                      {
                        
                        $arr= array($row['brand'], $row['stock_name']);
                        $description = $row['description'];

                        if (strlen($description) > 10)
                        $description = substr($description, 0, 7) . '...';

                       

                      ?>
            <div class="col">
                    
                    <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;border-top-left-radius:10px;border-top-right-radius:10px;">
                    <img src="<?php echo $row['photo']; ?>" style="object-fit:cover;" width="200px" height="200px">
                         
                    </div>
                    
                    <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-bottom:10%;border-top:1px solid #d3d3d2;text-align:left;">
                    <span style="margin-bottom:-10%;"><a href="#"><?php echo join(" ",$arr);?></a></span>
                    <span style="font-size:15px;color:grey;"><?php echo $description;?></span><br>
                    
                    <span style="font-size:15px;margin-top:-7%;color:#f71e30;font-weight:bold;"><?php echo $peso; echo (number_format($row['unit_price'],2));?></span><br>
                    <span ><a href="#"><i class='bx bx-cart' style="font-size:20px;color:white;padding:8px 10px;border-radius:5px;background:green;"></i></a></span>

                    </div>
        
            </div>
            <?php
                     
                }
                ?>

           


            </div>

            </div>
            <!--First tab content end -->

             <!--second tab content-->
             <div class="tab-pane " id="two" role="tabpanel">
             <h2>Second Tab</h2>


            </div>
            <!--second tab content end -->

             <!--third tab content-->
             <div class="tab-pane " id="three" role="tabpanel">
             <h2>Third Tab</h2>


            </div>
            <!--third tab content end -->       

            

          </div>
          <!-- tab content-->
        </div>

        <!--Tab Card body end -->

    </div>
      </div>
  </div>
  <!-- first column end-->


      </div>
      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
