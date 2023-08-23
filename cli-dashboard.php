<?php
include "cli-session.php";  
include "xc-count.php"; 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?></title>

    <?php require_once "cli-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
.guidelink{
  padding:10px 12px;
  color:white;

  border-radius:50px;
}

.guidelink:hover{
  text-decoration:none;
  color:black;
  background:#ffc801;
  border:none;
  
}

.profile:hover{
  text-decoration:none;
  color:#A3A3FF;
}

.logout{
  padding:10px 13px;
  background:#A3A3FF;
  color:white;
}
.names{
  color:white;
}
.gege:hover{
  text-decoration:none;
}
.gege .card-body:hover {
        transform: scale(1.1);
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        z-index: 3; text-decoration:none;
        color:white;
    }

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "xc-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->
     
      <!-- first card body-->

        
     <?php 
      //login session message display
    if(isset($_SESSION['status']))
    {
        ?>

<div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" style="margin-top:3%;margin-left:10%;margin-right:10%;">
            <div class="row">
              <div class="col">
                <h3>WELCOME!</h3>
              <strong></strong><?=$_SESSION['status'];?><?php echo $fullname;?>
              </div>
              <div class="col">
            
              </div>
            </div> 
            </div>
        <?php 
        unset($_SESSION['status']);
    }

?>
      
      <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-grid-alt"></i> Dashboard</h1>



</div>
  
<div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
 <div class="col" style="padding:0;">
   <div class="card-body" style="border-top-left-radius:10px;">
     <div class="row" style="padding:0;">
       <div class="col">
        <h2 style="color:grey;text-align:center;"><?php echo $firstname;?>,</h2>
       </div>
     </div>
    <div class="row" style="margin-top:5%;padding:0;">
      <div class="col" style="text-align:center;">
        <a href="xc-profile.php"><img src="<?php echo $profile;?>" 
        style="object-fit:cover;border-radius:50%;" width="200px" height="200px"></a><br><br>
        <a href="xc-profile.php" class="profile"><span style="text-transform:uppercase;font-size:20px;"><?php echo $fullname;?></span></a><br>
        <span style="color:grey;"><?php echo $position;?> , <?php echo $office;?></span>
      </div>
    </div>

    <div class="row" style="margin-top:3%;">
      <div class="col" style="text-align:center;">
        <a href="#" class="logout">Logout <?php echo $firstname;?></a>
      </div>
    </div>
   </div>

 </div>

<div class="col" style="padding:0;">
     
     <div class="card-body" style="background:#A3A3FF;text-align:center;border-top-right-radius:10px;">
     
     <h1 style="color:white;"><?php echo $dat = date("F d, Y");?></h1>

     </div>
     
     <div class="card-body" style="background:#A3A3FF;">
     <div class="row">
                      <div class="col">
                  <a href="xc-notif.php?#pending" class="gege">

                    <div class="card-body" style="border:2px solid white;border-radius:10px;background:transparent;">
                    <div class="row">
                      <div class="col">
                      <i class="bx bx-message-square-error" style="font-size:30px;background:#A3A3FF;color:white;border:2px solid white;padding:12px 12px;border-radius:50px;"></i>
                      </div>
                      <div class="col" style="margin-top:3%;">
                        <span class="names">Pending Request
              
                        </span>
                      </div>
                      <div class="col" style="margin-top:3%;">
                      <?php
              if($pendings > 0)
              {
                  echo '<span style="background:red;color:white;font-weight:bold;padding:5px 12px;border-radius:50px;
                  font-size:15px;">'.$pendings.'</span>';
              }
?>
                      </div>
                    </div>

                    </div>
                  </a> 
                  </div>

                  <div class="col">
                  <a href="cli-profile.php" class="gege">

                    <div class="card-body" style="border:2px solid white;border-radius:10px;background:transparent;">
                    <div class="row">
                      <div class="col">
                      <i class="bx bx-bullseye" style="font-size:30px;background:#A3A3FF;color:white;border:2px solid white;padding:12px 12px;border-radius:50px;"></i>
                      </div>
                      <div class="col" style="margin-top:3%;">
                        <span class="names">Settings</span>
                      </div>
                      <div class="col">
                        
                      </div>
                    </div>

                    </div>
                  </a> 
                  </div>
  
     </div>

     <div class="row" style="margin-top:5%;">
                      <div class="col">
                  <a href="xc-myreq.php" class="gege">

                    <div class="card-body" style="border:2px solid white;border-radius:10px;background:transparent;">
                    <div class="row">
                      <div class="col">
                      <i class="bx bx-cart" style="font-size:30px;background:#A3A3FF;color:white;border:2px solid white;padding:12px 12px;border-radius:50px;"></i>
                      </div>
                      <div class="col" style="margin-top:3%;">
                        <span class="names">Requests</span>
                      </div>
                      <div class="col">
                        
                      </div>
                    </div>

                    </div>
                  </a> 
                  </div>

                  <div class="col">
                  <a href="xc-property.php" class="gege">

                    <div class="card-body" style="border:2px solid white;border-radius:10px;background:transparent;">
                    <div class="row">
                      <div class="col">
                      <i class="bx bx-purchase-tag" style="font-size:30px;background:#A3A3FF;color:white;border:2px solid white;padding:12px 12px;border-radius:50px;"></i>
                      </div>
                      <div class="col" style="margin-top:3%;">
                        <span class="names">Properties</span>
                      </div>
                      <div class="col">
                        
                      </div>
                    </div>

                    </div>
                  </a> 
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
 <script>
const closesuccBtn = document.getElementById('close-success-btn');
const divSuccess = document.getElementById('div-success');

closesuccBtn.onclick = function(){
  divSuccess.style.display = "none";
}
 </script>


 

 
</body>
</html>
