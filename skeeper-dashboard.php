<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `skeeper` where user_id=$userid");
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


<body>

<!--Side bar-->
<?php 
require_once "sk-sidebar.php";
?>


<section class="home-section">
<!--Nav bar tool -->
<?php
require_once "navtool.php";
?>

    <!--end of nav tool bar top-->
 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
  <div class="card-shadow">
     <!--Card header-->

<div class="card-header py-3" style="background-color: rgba(247,247,247,255);">
          <span style="font-size: 20px; color: rgb(40, 40, 40);">DASHBOARD</span>   
      </div>

      <div class="card-body">
         
          <br>

           <!--Total Items Card-->
           <div class="row">
            <div class="col">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px; border: none;">
                    <div class="card-body"> 
                        <i class="bx bx-notepad"></i>
                        <h4 class="card-title">Items</h4>
                       <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                        <p class="card-text">0</p>
                        
                    </div>    
                </div>
            </div>
            <!-- End Total Items Card-->
            
            <!--Stock In Card-->
            <div class="col">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px; border: none;">
                    <div class="card-body">
                     <i class="bx bx-box"></i> 
                        <h4 class="card-title">Stock In</h4>
                        <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                        <p class="card-text">0</p>
                      </div>
                </div>
            </div>
            <!--End Stock In card-->

            <!--Stock Out Card-->
            <div class="col">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px; border: none;">
                    <div class="card-body">
                      <i class="bx bx-layer-minus"></i>
                        <h4 class="card-title">Stock Out</h4>
                        <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                        <p class="card-text">0</p>
                      </div>
                </div>
            </div>
            <!--End Stock Out Card-->

            <!--Available stock card-->
            <div class="col">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px; border: none;">
                    <div class="card-body">
                      <i class="bx bx-calendar-check"></i>
                        <h4 class="card-title">Available</h4>
                        <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                        <p class="card-text">0</p>
                </div>
            </div>
        </div>
        <!--End available stock card-->
        

        <!--Available stock card-->
        <div class="col">
          <div class="card" style="box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px; border: none;">
              <div class="card-body">
                <i class="bx bx-user"></i>
                  <h4 class="card-title">Admin</h4>
                  <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                  <p class="card-text">3</p>
          </div>
      </div>
  </div>
  <!--End available stock card-->

        <!--User account card-->
        <div class="col">
          <div class="card" style="box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px; border: none;">
              <div class="card-body">
                <i class="bx bx-user-pin"></i>
                  <h4 class="card-title">Clients</h4>
                  <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                  <p class="card-text">0</p>
          </div>
      </div>
  </div>
  <!--End user account card-->
        
        
   

   </div>
   </div>
    
  </div>
 
  <!--End container fluid dashboard-->
            
  </section>

<!-- The Modal -->
<div class="modal" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header pt-0 pb-0">
        <h5 class="modal-title"><i class='bx bx-plus'></i>Add Items</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-outline">
          <input type="text" id="addtype" class="form-control" /><button type="button" id="buttonPlus" class="btn btn-primary"><i class='bx bx-plus' ></i></button>
          <input type="text" id="addtype" class="form-control" />
          <input type="text" id="addtype" class="form-control" />
          <input type="text" id="addtype" class="form-control" />
          <input type="text" id="addtype" class="form-control" />
          
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer pt-0 pb-0">
        <button type="button" class="btn btn-primary"><i class='bx bx-save' ></i>Save</button>
        
      </div>

    </div>
  </div>
</div>


 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src="assets/bootstrap/js/stocktab.js"></script>

 

 
</body>
</html>
