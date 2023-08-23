

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

?>



                       
<?php


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
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>




/* CSS */
.line-button {
  background-color: #FFFFFF;
  border: 0;
  margin-right:1%;
  border-radius: .5rem;
  box-sizing: border-box;
  color: #111827;
  font-size: .875rem;
  font-weight: 600;
  line-height: 1.25rem;
  padding: .75rem 1rem;
  text-align: center;
  text-decoration: none #D1D5DB solid;
  text-decoration-thickness: auto;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.line-button:hover {
  background-color: rgb(249,250,251);
}

.line-button:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.line-button:focus-visible {
  box-shadow: none;
}

.report-link{
    color:grey;
}

.report-link:hover{
text-decoration:none;
color:#E6A519;
font-size:30px;
}

table{
  width:100%;
}

.guidelink{
  padding:10px 12px;
  color:white;
background:transparent;
  border-radius:50px;
  border:1px solid white;
}

.guidelink:hover{
  text-decoration:none;
  color:black;
  background:#ffc801;
  border:none;
  
}



.opptions{
  background:none;
  padding:10px 15px;
  color:grey;
  border-radius:5px;
  margin-left:3%;
  font-size:20px;
 
}

.opptions:hover{
  background:#f0f0f0;
  text-decoration:none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;;
  border-radius:50%;
  color:grey;

  

}
    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
    ?>

    <?php
    $idc = $_GET['idc'];
    $count_fc = $_GET['count_fc'];


    
    $query=mysqli_query($conn,"select * from `people`where idc = $idc");
    while($row=mysqli_fetch_array($query))
   {
       $getfullname = $row['fullname'];
       $getoffice = $row['office'];
       $getposition = $row['position'];
       
   
   } 



?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
    <div class="row" style="margin-left:10%;margin-top:3%;">
      <div class="col">
      <h1 style="color:grey;"><a href="x-stock.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a><span style="font-size:20px;"> / <i class="bx bx-box"></i> <a href="x-full-par.php" > PAR Items </a>
      / <a href="x-full-par.php?#tobeiss">To be issued</a> / <?php echo $getfullname;?> </span> </h1>

      </div>
      <div class="col">

      </div>
    </div>
                
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:royalblue;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;">
           <i class='bx bx-user' style="padding:12px 12px;border-radius:50%;font-size:100px;color:white;"></i><br>
           <h4 style="color:white;"><?php echo $getfullname;?></h4><span style="color:white;"></h4><span style="color:white;"><?php echo $getoffice; echo " / "; echo $getposition;?></span></span>
           </div>
         </div>
        <div class="row" style="margin-top:4%;">
          <div class="col" style="text-align:center;">
           
          </div>
           
        </div>
        </div>

        


        <div class="card-body" style="background:whitesmoke;" id="non">
        <div class="row">
          <div class="col">
              <h5 style="">To be issued:</h5>
    
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
  

        <table>
        <?php
                    include('connection.php');
                    $stat = "1";
                    $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
                    JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id WHERE icspar_details.custodian = $idc AND
                   icspar_details.icsxpar_no IS NULL GROUP BY xicspar.fc_id");
                    while($row=mysqli_fetch_array($query))
                    {
                      $fund_id = $row['fundc_id'];
                    
                 
                    ?>

                    <tr>

                    <td> <i class='bx bx-file' style="font-size:30px;background:royalblue;color:white;padding:12px 12px;border-radius:50px;"></i><br></td>
                    <td><h4>Fund Cluster : <?php echo $row['fund_cluster'];?></h4><br></td>
                    <td>   
                      <?php
                    
                    $que=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.stat = $stat
                    AND xicspar.fc_id = $fund_id AND xicspar.unit_cost > 50000 AND icspar_details.custodian = $idc GROUP BY xicspar.item_details");
                    while($rw = mysqli_fetch_array($que))
                    {
                    ?>
                  <span>
                    <?php echo $rw['item_details']; echo "," ?>
                  </span>

                  <?php
                  }
                  ?>
                  <br></td>

                  <td> <a href="x-pare.php?fund_cluster=<?php echo $row['fund_cluster'];?>&idc=<?php echo $idc?>&fund_id=<?php echo $row['fundc_id'];?>">View</a></td>
                    </tr>

              
                

                    <?php

                    }
                    ?>







  </table>

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
