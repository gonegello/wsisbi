

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

?>


<?php
//give value to the next stock id for stock_pn
include "connection.php";
$next = mysqli_query($conn, "select * from `xris` order by idx desc limit 1");
while($rw = mysqli_fetch_array($next))
{
    //find the last id
    $last_stock_id = $rw['idx'];

}
    //convert last id to int
    $convert_lsi = intval($last_stock_id);
    //add 1 to predict the next id number
    $next_stock_id = $convert_lsi + 1;


    //university abb
    $abb = mysqli_query($conn, "select *from `university` order by iduniv desc limit 1");
    while ($row = mysqli_fetch_array($abb))
    {
        $uni_ab = $row['abb'];
    }


?>

                       
<?php
//include "property_number.php";
//include "stock_number.php";
include "x-ris-no.php";

?>





    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>Stockroom</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        .stocklink{
            color:#77dd77;
        }
        .stocklink:hover{
            background:#77dd77;
            color:white;
            text-decoration:none;
        }

    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
  ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
    
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-store"></i> Stockroom</h1>



</div>

    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
       
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-store"></i><span> &nbsp; STOCKROOM</span></h5>
            <span style="color:white;">Where all items are stored.</span>

          </div>
          <div class="col" style="text-align:right;">
         




          </div>
           
        </div>
        </div>


      
        
<div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

<div class="row" style="margin-top:4%;margin-bottom:4%;">
    <div class="col" style="border-right:1px solid gainsboro;">
<div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;text-align:center;">
<i class='bx bx-cart' style="color:#A3A3FF;font-size:70px;"></i>
<h5>RIS</h5><span>Consumable Items</span>
</div>
<div class="card-body" style="text-align:center;"><br>
<a href="x-full-ris.php" class="stocklink" style="padding:12px 12px;margin-top:2%;margin-bottom:2%;border-radius:5px;border:1px solid #77dd77;" id=""><i class="bx bx-link-external"></i> Take a look </a><br>
</div>
    </div>

    <div class="col" style="border-right:1px solid gainsboro;">
<div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;text-align:center;">
<i class='bx bx-box' style="color:#A3A3FF;font-size:70px;"></i>
<h5>ICS</h5><span>Non-Consumable Items <= 50k</span>
</div>
<div class="card-body" style="text-align:center;"><br>
<a href="x-full-ics.php" class="stocklink" style="padding:12px 12px;margin-top:2%;margin-bottom:2%;border-radius:5px;border:1px solid #77dd77;" id=""><i class="bx bx-link-external"></i> Go Inside</a><br>
</div>
    </div>


    <div class="col" style="">
<div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;text-align:center;">
<i class='bx bx-package' style="color:#A3A3FF;font-size:70px;"></i>
<h5>PAR</h5><span>Non-Consumable ITems > 50k</span>
</div>
<div class="card-body" style="text-align:center;"><br>
<a href="x-full-par.php" class="stocklink" style="padding:12px 12px;margin-top:2%;margin-bottom:2%;border-radius:5px;border:1px solid #77dd77;" id=""><i class="bx bx-link-external"></i> Check Properties</a><br>
</div>
    </div>

 
   
</div>

</div>


    </div>
    </div>

    <?php include "bottom.php";?>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 






</body>
</html>
