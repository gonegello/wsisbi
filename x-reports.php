

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
    <title></title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>



table{
  width:100%;
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
 
    <h1 style="color:grey;"><i class="bx bx-folder"></i> Reports</h1>

    </div>

    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-file"></i><span> &nbsp; REPORTS</span></h5>

          </div>
          <div class="col" style="text-align:right;">
     
          </div>
           
        </div>
        </div>


      <div class="card-body" style="background:whitesmoke;">

      </div>

      <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <div class="row" style="margin-top:3%;">

          <div class="col">
  <a href="x-ia-report.php" class="gege">

            <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
            <div class="row">
              <div class="col">
              <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
              </div>
              <div class="col" style="margin-left:-50%;">
                <span>Inspection and Acceptance Report ( IAR )</span>
              </div>
            </div>

            </div>
</a>
        </div>

        <div class="col">
  <a href="x-xics.php" class="gege">
            <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
            <div class="row">
              <div class="col">
              <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
              </div>
              <div class="col" style="margin-left:-50%;">
                <span>Inventory Custodian Slip <br>( ICS )</span>
              </div>
            </div>

            </div>
</a>
        </div>


        <div class="col">
  <a href="x-xpar.php" class="gege">

            <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
            <div class="row">
              <div class="col">
              <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
              </div>
              <div class="col" style="margin-left:-50%;">
                <span>Property Acknowledgement Receipt ( PAR )</span>
              </div>
            </div>

            </div>
</a>
        </div>


      </div>


      <div class="row" style="margin-top:3%;">

<div class="col">
  <a href="x-r-ptr.php" class="gege">
  <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
  <div class="row">
    <div class="col">
    <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
    </div>
    <div class="col" style="margin-left:-50%;">
      <span>Property Transfer Report <br>( PTR )</span>
    </div>
  </div>

  </div>
</a>
</div>

<div class="col">
  <a href="x-r-ris.php" class="gege">
  <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
  <div class="row">
    <div class="col">
    <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
    </div>
    <div class="col" style="margin-left:-50%;">
      <span>Requisition And Issue Slip <br>(RIS)</span>
    </div>
  </div>

  </div>
</a>
</div>


<div class="col">
  <a href="x-xrsmi.php" class="gege">
  <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
  <div class="row">
    <div class="col">
    <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
    </div>
    <div class="col" style="margin-left:-50%;">
      <span>Report of Supplies And Materials Issued (RSMI)</span>
    </div>
  </div>

  </div>
</a>
</div>


</div>


<div class="row" style="margin-top:3%;">

<div class="col">
  <a href="x-xpci.php" class="gege">
  <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
  <div class="row">
    <div class="col">
    <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
    </div>
    <div class="col" style="margin-left:-50%;">
      <span>Report On The Physical Count of Inventories (RPCI)</span>
    </div>
  </div>

  </div>
</a>
</div>

<div class="col">
  <a href="x-sc.php" class="gege">
  <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
  <div class="row">
    <div class="col">
    <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
    </div>
    <div class="col" style="margin-left:-50%;">
      <span>Stock Card</span>
    </div>
  </div>

  </div>
</a>
</div>


<div class="col">
  <a href="x-xcmy.php" class="gege">
  <div class="card-body" style="border:1px solid gainsboro;border-radius:10px;">
  <div class="row">
    <div class="col">
    <i class="bx bx-folder" style="font-size:30px;background:#A3A3FF;color:white;padding:12px 12px;border-radius:50px;"></i>
    </div>
    <div class="col" style="margin-left:-50%;">
      <span>Monthly & Yearly Report (Consumables & Non-Consumables)</span>
    </div>
  </div>

  </div>
</a>
</div>


</div>








</div>




        
       
     

</div>
</div>



        </div><!--row container end-->


        



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
