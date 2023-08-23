<?php require_once "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin <?php echo $fullname;?></title>

  <?php 
  require_once "rel-links.php";
  ?>
  </head>
  <style>
.overview-span{
  background-color:#f71e30;
  border-bottom-right-radius:15px;
  border-bottom-left-radius:15px;
  border-top-right-radius:15px;
  
  margin-left:-25px;
  padding:4px 10px;
  color:white;
  font-weight:bold;
  opacity:0.9;
}

.overview-title{
  margin-bottom:-3px;
}
  </style>


<body>

    <!--Side bar-->
    <?php
      require_once "a-sidebar.php";
    ?>
    <!-- end of side bar-->


    <section class="home-section">
      <!-- nav tool bar top-->
      <?php
      require_once "a-navtoolbar.php";
      ?>
      <!-- end nav tool-->

    <!--end of nav tool bar top-->


 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
  <div class="card-shadow">
     <!--Card header-->

<div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Dashboard </span> 
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Sign out <?php echo $fullname;?></span> 
      </div>

      <!-- first card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">         
          <br>
           <!--First row-->
           <div class="row" >

              <!-- first column-->
                <div class="col">
                  <!--Notifications card-->
                    <div class="card" style="border:none;">
                      <h6>Notifications</h6>
                        <div class="card-body" style="border-radius:5px;border:1px solid #ededed;" > 
                
                            
                        </div>
                    </div>
                </div>
                <!-- first column end-->

                <!-- second column-->
                <div class="col">
                    <div class="card" style="border:none;">
                      <h6>Overview</h6>
                        

                        <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-bottom:1%; " > 
                        <div class="row">
                        
                          <div class="col">
                          <p class="overview-title" style="">Total Stock</p>
                          <i class='bx bx-box'></i><span class="overview-span">5</span>
                          </div>

                          <div class="col">
                          <p class="overview-title" style="">Available Stock</p>
                          <i class='bx bx-box'></i><span class="overview-span">5</span>
                          </div>

                          <div class="col">
                          <p class="overview-title" style="">Stock Out</p>
                          <i class='bx bx-box'></i><span class="overview-span">5</span>
                          </div>
                         
                        </div>
                        </div>

                        <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-top:1%;margin-bottom:1%; " > 
                        <div class="row">
                        
                          <div class="col">
                          <p class="overview-title" style="">Admin</p>
                          <i class='bx bx-user' ></i><span class="overview-span">5</span>
                          </div>

                          <div class="col">
                          <p class="overview-title" style="">StoreKeeper</p>
                          <i class='bx bx-user' ></i><span class="overview-span">5</span>
                          </div>

                          <div class="col">
                          <p class="overview-title" style="">Clients</p>
                          <i class='bx bx-user' ></i></i><span class="overview-span">5</span>
                          </div>

                         
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end of second column-->
            </div>
            <!-- first row end-->
          </div>
          <!-- first card body end-->


          <!-- second card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed; margin-top:3%;">         
          <br>
           <!--First row-->
           <div class="row" >

              <!-- first column-->
                <div class="col">
                  <!--Notifications card-->
                    <div class="card" style="border:none;">
                      <h6>Your Recent Activity</h6>
                      <?php include "connection.php";
                      $variable = $userid;
                      $query=mysqli_query($conn,"select * from `adminlog` where user_id = '$variable'");
                      while($row=mysqli_fetch_array($query))
                      {

                      ?>
                      
                        <div class="card-body" style="border-radius:5px;margin-top:1%;margin-bottom:1%; border:1px solid #ededed;" > 
                
                           You <?php echo $row ['activity'];?>

                        </div>
                        <?php
                     
                }
                ?>
                    </div>
                </div>
                <!-- first column end-->

                <!-- second column-->
                <div class="col">
                    <div class="card" style="border:none;">
                      <h6>Overview</h6>
                        <div class="card-body" style="border-radius:5px;border:1px solid #ededed;" > 

                        </div>
                    </div>
                </div>
                <!-- end of second column-->
            </div>
            <!-- first row end-->
          </div>
          <!-- first card body end-->


    
  </div>
 
  <!--End container fluid dashboard-->
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src="assets/bootstrap/js/stocktab.js"></script>

 

 
</body>
</html>
