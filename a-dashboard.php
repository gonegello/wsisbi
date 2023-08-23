<?php include "a-session.php";

include "count-ris.php";
include "count-icspar.php";
include "x-count.php";

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="icon" href="image/bo.ico">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <?php include "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

<style>
#dash{
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index:1;
}



.gege{
  color:grey;
}
.gege:hover{
  text-decoration:none;
  color:#A3A3FF;
}

.gege .card-body:hover {
        transform: scale(1.0);
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        z-index: 3;
        border-color: #A3A3FF !important;
        background:#A3A3FF !important;
        color:white;
    }

    #cartfloat{
      box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
      background:white;
      padding:13px 13px;
    }

</style>
 

  
<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
include "a-overview.php";
include "staticmodal.php";

$ris_year = date("Y");
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

  

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


<div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;padding:0;border-radius:10px;">
     
<div class="col" style="padding:0;">

<div class="row" style="margin-top:2%;">
  <div class="col">
    <span style="color:grey;font-weight:bold;">SHORTCUTS</span>
  </div>
</div>

<div class="row" style="margin-top:3%;">
        
       
        <div class="col">
        <a href="x-input-iar.php?#additemss" class="gege">
        
          <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
          <div class="row">
            <div class="col">
            <i class="bx bx-plus" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
            </div>
            <div class="col" style="margin-left:-50%;margin-top:3%;">
              <span>Add RIS item</span>
            </div>
          </div>
        
          </div>
        </a> 
        </div>
        
        <div class="col">
        <a href="x-input-ics.php?#additemss" class="gege">
          <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
          <div class="row">
            <div class="col">
            <i class="bx bx-plus" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
            </div>
            <div class="col" style="margin-left:-50%;margin-top:3%;">
              <span style="">Add ICS Property
            </span>
            </div>
          </div>
        
          </div>
        </a>
        </div>
        
        
        <div class="col">
        <a href="x-input-ics.php?#additemss" class="gege">
        
          <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
          <div class="row">
            <div class="col">
            <i class="bx bx-plus" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
            </div>
            <div class="col" style="margin-left:-50%;margin-top:3%;">
              <span>Add PAR Property</span>
            </div>
          </div>
        
          </div>
        </a>
        </div>
        
        
        </div>

        

        <div class="row" style="margin-top:2%;">
  <div class="col">
    <span style="color:grey;font-weight:bold;">OVERVIEW</span>
  </div>
</div>



<div class="row" style="margin-top:3%;">


<div class="col">
<a href="x-request.php" class="gege">

<div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
<div class="row">
<div class="col">
<i class="bx bx-envelope" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
</div>
<div class="col" style="margin-left:-50%;margin-top:3%;">
<span>Requests
</span>
</div>
</div>

</div>
</a> 
</div>

<div class="col">
<a href="x-full-ics.php?#tobeiss" class="gege">
<div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
<div class="row">
<div class="col">
<i class="bx bx-user-plus" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
</div>
<div class="col" style="margin-left:-50%;margin-top:3%;">
<span>Set custodian
</span>
</div>
</div>

</div>
</a>
</div>


<div class="col">
<a href="x-input-ics.php?#additemss" class="gege">

<div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
<div class="row">
<div class="col">
<i class="bx bx-refresh" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
</div>
<div class="col" style="margin-left:-50%;margin-top:3%;">
<span>Ready to transfer</span>
</div>
</div>

</div>
</a>
</div>


</div>



<div class="row" style="margin-top:3%;">


<div class="col">
<a href="x-input-iar.php?#additemss" class="gege">

<div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
<div class="row">
<div class="col">
<i class="bx bx-cart" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
</div>
<div class="col" style="margin-left:-50%;margin-top:3%;">
<span>Consumable Items

<?php
                if($consume > 0)
                {
                    echo '<span style="background:red;color:white;padding:6px 11px;border-radius:50%;font-size:12px;">'.$consume.'</span>';
                }

                ?>
</span>
</div>
</div>

</div>
</a> 
</div>

<div class="col">
<a href="x-input-ics.php?#additemss" class="gege">
<div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
<div class="row">
<div class="col">
<i class="bx bx-box" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
</div>
<div class="col" style="margin-left:-50%;margin-top:3%;">
<span>Non-consumable items (ICS)
</span>
</div>
</div>

</div>
</a>
</div>


<div class="col">
<a href="x-input-ics.php?#additemss" class="gege">

<div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
<div class="row">
<div class="col">
<i class="bx bx-package" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
</div>
<div class="col" style="margin-left:-50%;margin-top:3%;">
<span>Non-consumable items (PAR)</span>
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
      

      <?php require "bottom.php";?>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
