

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    include "x-count.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

?>


    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title></title>


    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
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

table{
    width:100%;
}
.stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }
    .second, .chevlink{
    color:grey;
}
.second:hover{
    color:#A3A3FF;
    text-decoration:none;
}

a.chevlink:hover{
    color:#A3A3FF;
    text-decoration:none;
    
}
    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
include "count-ris.php";

  
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
     
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">
    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"> Reports</a><span style="font-size:20px;"> / <i class="bx bx-folder"></i> Monthly & Yearly Report</span></h1>

    </div>
    <div class="col" style="text-align:right;margin-top:1%;">
    
    </div> 
 </div>    
           
    
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
       
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;">
           <i class='bx bx-folder' style="padding:12px 12px;border-radius:50%;font-size:100px;color:white;"></i><br>
           <h4 style="color:white;">Monthly & Yearly Report</h4><span style="color:white;"></span>
           </div>
     </div>
    

        </div>

        


        <div class="card-body" style="">
            <div class="row">
                <div class="col">
                    <i class='bx bx-folder' style="font-size:50px;color:grey;"></i> 
                </div>
                <div class="col" style="margin-left:-40%;margin-top:1%;">
                    <span class="second">Consumable Items (RIS)</span>
                    <span></span>
                </div>
                <div class="col" style="text-align:right;margin-top:1%;">
                <a href="x-rismonthly.php" class="chevlink" ><i class='bx bxs-chevron-right' style="font-size:25px;"></i></a>
                </div>
               
            </div>
        </div>

        <div class="card-body" style="">
            <div class="row">
                <div class="col">
                    <i class='bx bx-folder' style="font-size:50px;color:grey;"></i> 
                </div>
                <div class="col" style="margin-left:-40%;margin-top:1%;">
                    <span class="second">Non-Consumable Items (ICS)</span>
                    <span></span>
                </div>
                <div class="col" style="text-align:right;margin-top:1%;">
                <a href="x-icsmonthly.php" class="chevlink"><i class='bx bxs-chevron-right' style="font-size:25px;"></i></a>
                </div>
               
            </div>
        </div>

        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
            <div class="row">
                <div class="col">
                    <i class='bx bx-folder' style="font-size:50px;color:grey;"></i> 
                </div>
                <div class="col" style="margin-left:-40%;margin-top:1%;">
                    <span class="second">Non-Consumable Items (PAR) </span>
                    <span></span>
                </div>
                <div class="col" style="text-align:right;margin-top:1%;">
                <a href="x-xparmonthly.php" class="chevlink"><i class='bx bxs-chevron-right' style="font-size:25px;"></i></a>
                </div>
               
            </div>
        </div>
       

        
    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 

 





</body>
</html>
