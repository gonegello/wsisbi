<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Settings</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/settings.css">
   

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>


<body>

<!--Side bar-->
<?php require_once "a-sidebar.php";?>

<!--end of sidebar-->


  <section class="home-section">
    <!-- nav tool bar top-->
   
    <?php require_once "a-navtoolbar.php";?>

    <!--end of nav tool bar top-->
    

 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
    <div class="card-shadow"  style="margin-top: 12px;">
     <!--Card header-->
     <div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Settings </span>
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Logged In as</span> 
      </div>

      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">
        


      <div class="row">
        <div class="col">
            <div class="card" >
                <div class="dropdowntitle"> 
                    <div class="usercon">
                      <i class="bx bxs-user" style="font-size: 30px;"></i>
                    </div>
                    <span class="ite">
                      <h4 class="card-title" style="font-size: 14px;">Items</h4>
                      <h6 class="text-muted card-subtitle mb-2" style="font-size: 9px;">Subtitle</h6>
                    </span> 
                    <div class="arro">  
                      <i class='bx bx-chevron-right' style="font-size: 30px;"></i>
                      <i class="bx bx-chevron-down" style="display:none; font-size: 30px;"></i>
                    </div>
              </div>
              <div class="dropdowncontent" style="display:none;">
                A
              </div>
            </div>
        </div>
    </div>



    <div class="row">
      <div class="col">
          <div class="card"> 
            <div class="filter filterdropdown">

              <div class="dropdowntitle">
                <div class="usercon">
                  <i class="bx bxs-user" style="font-size: 30px;"></i>
                </div>
                <span class="ite">
                  <h4 class="card-title" style="font-size: 14px;">Items</h4>
                  <h6 class="text-muted card-subtitle mb-2" style="font-size: 9px;">Subtitle</h6>
                </span>
                <div class="arro">
                <i class="bx bx-chevron-right"></i>
                <i class="bx bx-chevron-down" style="display:none;"></i>
              </div>
              </div>
            
              <div class="dropdowncontent" style="display:none;">
                A
              </div>
            
            </div>
          </div>
      </div>
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
 <script src="assets/bootstrap/js/setting.js"></script>

 

 
</body>
</html>
