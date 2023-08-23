

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
    border-collapse:collapse;
}




    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
    ?>

    <?php

    $ptr_custodian = $_GET['ptr_custodian'];
    $custodian = $_GET['custodian'];

    


    
    $query=mysqli_query($conn,"select * from `people`where idc = $ptr_custodian");
    while($row=mysqli_fetch_array($query))
   {
       $getfullname = $row['fullname'];
       $getoffice = $row['office'];
       $getposition = $row['position'];
       
   
   } 

   $que=mysqli_query($conn,"select * from `people`where idc = $custodian");
    while($rw=mysqli_fetch_array($que))
   {
       $get_f = $rw['fullname'];
       $get_o = $rw['office'];
       $get_p = $rw['position'];
       
   
   } 


   


?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
               
       
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">

   <h3 style="color:grey;"><a href="x-xptr.php" class="stockroom"><i class="bx bx-refresh"></i> Property Transfer </a><span style="font-size:15px;"> / <i class="bx bx-user"></i> 
   <?php echo $getfullname;?> --> <?php echo $get_f;?></span></h3>
   </div>
   
   
   <div class="col" style="text-align:right;margin-top:1%;">
       <span style="color:grey;"><a href="x-full-ics.php"><i class="bx bx-box"></i> ICS Stockroom</a> | <a href="x-full-par.php"><i class="bx bx-package"></i> PAR Stockroom </a></span>
   </div>


</div>

               



          
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:royalblue;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;">
           <i class='bx bx-refresh' style="padding:12px 12px;border-radius:50%;font-size:100px;color:white;"></i><br>
           <h4 style="color:white;"><?php echo $get_f; echo " ";?> --> <?php echo " "; echo $getfullname;?></h4><span style="color:white;"></h4>
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
              <h5 style="">Property Transfer:</h5>
    
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="">
        <div class="row">
            <div class="col">
                

            </div>
            <div class="col" style="text-align:right;">
            <span>From :</span>
                        <span><?php echo " " ;echo $get_f;?> - </span>
                        <span><?php echo $get_o;?></span>
                        <span style="font-style:italic;">( <?php echo $get_p;?> )</span>
            </div>
        </div>


        </div>
        <div class="card-body" style="border-bottom:1px solid #ededed;">
        <div class="row">
            <div class="col">
            <span>To :</span>
                                <span><?php echo " " ;echo $getfullname;?> - </span>
                                <span><?php echo $getoffice;?></span>
                                <span style="font-style:italic;">( <?php echo $getposition;?> )</span>
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
                    JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id
                    WHERE icspar_details.ptr_custodian = $ptr_custodian AND icspar_details.custodian = $custodian GROUP BY xicspar.fc_id");
                    while($row=mysqli_fetch_array($query))
                    {
                    
                 
                    ?>

                    <tr>
                        <td width=""><i class='bx bx-file' style="font-size:30px;background:royalblue;color:white;padding:12px 12px;border-radius:50px;"></i></td>
                        <td><h4>Fund Cluster : <?php echo $row['fund_cluster'];?></h4></td>

                        <td>   
                      <?php
                    
                    $que=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
                    WHERE icspar_details.ptr_id IS NULL AND icspar_details.ptr_custodian = $ptr_custodian AND icspar_details.custodian = $custodian GROUP BY xicspar.item_details");
                    while($rw = mysqli_fetch_array($que))
                    {
                    ?>
                  <span>
                    <?php echo $rw['item_details']; echo "," ?>
                  </span>

                  <?php
                  }
                  ?></td>
                        <td style="text-align:right;font-size:25px;"><a href="x-ptr.php?ptr_custodian=<?php echo $row['ptr_custodian'];?>&custodian=<?php echo $row['custodian'];?>&fc_id=<?php echo $row['fc_id'];?>">
                        <i class='bx bx-chevron-right'></i></a></td>

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
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 






</body>
</html>
