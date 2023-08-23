

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
    border-collapse:collapse;
}
td, th {
  
  text-align: left;
  padding: 8px;


}
td{
    border:1px solid #ededed';
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
    
     
          
                
       
        <div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;">
        <div class="col">
                      
        <a href="x-reports.php" class="line-button" role="button" > Inventory Reports </a>
        <a href="x-iics.php" class="line-button" role="button">Transferred Property</a>
        <a href="#" class="line-button" role="button" style = "background:#966fd6;color:white;"><?php echo $getfullname;?> To <?php echo $get_f;?><i class='bx bx-check'></i></a>
        </div>
       
      
         </div>


                <div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;">
                    <div class="col">
                    <div class="card-body" style="margin-right:50%;margin-top:5%;border:1px solid #ededed;border-bottom:none;border-top-left-radius:10px;border-top-right-radius:10px;">
                    <h4>Transferred Property</h4>

                    </div>
                    <div class="card-body" style="border-radius:none;border:1px solid #ededed;
                    border-top-right-radius:10px;">
                    <div class="row">
                        
                        <div class="col" style="margin-top:4%;">
                        <span>To :</span>
                        <span><?php echo " " ;echo $getfullname;?> - </span>
                        <span><?php echo $getoffice;?></span>
                        <span style="font-style:italic;">( <?php echo $getposition;?> )</span>
                        </div>

                        <div class="col" style="text-align:right;">
                        <span>From :</span>
                        <span><?php echo " " ;echo $get_f;?> - </span>
                        <span><?php echo $get_o;?></span>
                        <span style="font-style:italic;">( <?php echo $get_p;?> )</span>
                        </div>
                    </div>
                   

                    </div>

                    <div class="card-body" style="border-radius:none;border:1px solid #ededed;
                    border-top:none;">
                    <table>
                    
                    <?php
                    include('connection.php');
                    $stat = "1";
                    $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
                    JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id
                    WHERE icspar_details.ptr_custodian = $ptr_custodian AND icspar_details.custodian = $custodian AND icspar_details.ptr_id IS NOT NULL GROUP BY xicspar.fc_id");
                    while($row=mysqli_fetch_array($query))
                    {
                    
                 
                    ?>

                    <tr>
                        <td width="5%;"><i class='bx bx-file' style="padding:10px 10px;background:royalblue;color:white;font-size:20px;border-radius:50px;"></i></td>
                        <td style="color:royalblue;"><?php echo "Fund Cluster : "; echo $row['fund_cluster'];?></td>
                        <td style="text-align:right;font-size:25px;"><a href="x-per-ptr.php?ptr_custodian=<?php echo $row['ptr_custodian'];?>&custodian=<?php echo $row['custodian'];?>&fc_id=<?php echo $row['fc_id'];?>&ptr_id=<?php echo $row['ptr_id'];?>">
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
