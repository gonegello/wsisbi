

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    include "x-count.php";

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
.po{
    color:grey;
    font-size:12px;
}
.per-link:hover{
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
    
     
          
                
       
        <div class="row" style="margin-left:5%;margin-right:5%;margin-top:2%;">
        <div class="col">
                      
        <a href="x-reports.php" class="line-button" role="button" > Inventory Reports </a>
        <a href="x-iics.php" class="line-button" role="button" style = "background:royalblue;color:white;">Inventory Custodian Slip <i class='bx bx-check'></i></a>
        </div>
        <div class="col">

        </div>
      
         </div>


                <div class="row" style="margin-left:5%;margin-right:5%;margin-top:2%;">
                    <div class="col">
                    <div class="card-body" style="border-bottom-left-radius:10px;border-radius:0px;
                    border-top-left-radius:10px;border-top-right-radius:10px;margin-top:2%;border:1px solid #ededed;">
                    <h4>To Be Issued</h4>
                    </div>

<?php
if($tobeissued == 0)
{
    echo '<div class="card-body" style="border:1px solid #ededed;border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">Nothing is to be issued.</span><br><br><br>
    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }



?>
                    <?php
                    include('connection.php');
                    $stat = "1";
                    $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id
                    JOIN people ON people.idc = icspar_details.custodian WHERE xicspar.stat=$stat AND xicspar.unit_cost <= 50000 AND icspar_details.custodian IS NOT NULL
                    AND icspar_details.icsxpar_no IS NULL
                    GROUP BY icspar_details.custodian");
                    while($row=mysqli_fetch_array($query))
                    {

                        $idc = $row['idc'];
                        
                        $qr = "SELECT * FROM icspar_details WHERE custodian = $idc";

                        if($rrw = mysqli_query($conn,$qr))
                        {
                            $count_fc =mysqli_num_rows($rrw);
                        }
                       
                                            
                 
                    ?>
                    <a href="x-icsperson.php?idc=<?php echo $row['idc'];?>&count_fc=<?php echo $count_fc;?>" title="<?php echo $row['fullname'];?>" class="per-link">
                    <div class="card-body" style="border-radius:0px;border-right:1px solid #ededed;border-left:1px solid #ededed;border-bottom:1px solid #ededed;">
                    <div class="row">
                        <div class="col">
                        <i class='bx bx-user' style="background:#77DD77;color:white;padding:12px 12px;border-radius:50px;"></i>
                        </div>
                        <div class="col" style="margin-left:-20%;">
                        <span> <?php echo $row['fullname'];?></span>
                        </div>
                        <div class="col" style="text-align:right;">
                        <span class="po"><?php echo $row['po_num']; echo " / "; echo $row['po_date'];?></span>
                        </div>
                    </div>
                    
                    </div>
                    </a>


                    <?php
                    }
                    ?>

<?php
    if($tobeissued > 0)
    {
        echo '<div class="card-body" style="border-radius:0px;border-right:1px solid #ededed;border-left:1px solid #ededed;border-bottom:1px solid #ededed;
        border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <div class="col">

        </div>

        <div class="col" style="text-align:right;">
            <a href="#viewalltobe" title="View All" >View All</a>
        </div>
        </div>';
    }

    ?>
                    
                    </div>




                    <div class="col">

                    <div class="card-body" style="border-bottom-left-radius:10px;border-radius:0px;
                    border-top-left-radius:10px;border-top-right-radius:10px;margin-top:2%;border:1px solid #ededed;">
                    <h4>Recent Issue</h4>

                    </div>


                    <?php
                    $stat = "1";
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM ics JOIN icspar_details ON icspar_details.icsxpar_no = ics.idics JOIN xicspar ON xicspar.idx = icspar_details.x_id
                    JOIN people ON people.idc= icspar_details.custodian WHERE xicspar.stat=$stat GROUP BY ics.ics_no ORDER BY ics.idics DESC");
                    while($row=mysqli_fetch_array($query))
                    {

                    ?>

                    <a href="x-icsreport.php?fc_id=<?php echo $row['fc_id'];?>&idics=<?php echo $row['idics'];?>&custodian=<?php echo $row['custodian'];?>">
                    <div class="card-body" style="border:1px solid #ededed;border-top:none;">
                    <div class="row">
                        <div class="col">   
                        <i class='bx bx-file' style="color:white;background:royalblue;padding:12px 12px;border-radius:50px;"></i>
                        </div>
                        <div class="col">
                        <span>ICS No : <?php echo $row['ics_no'];?></span><br>
                        <span><?php echo $row['fullname'];?></span>


                        <?php
                       // $que = mysqli_query()
                        ?>
                        <span>

                        </span>
                        <?php
                        ?>

                        </div>
                        <div class="col">

                        </div>
                    </div>
                        
                    </div>
                    </a>

                    

                    <?php
                    }

                    ?>
                </div>
                





        



    </div>
    </div>

    <div class="row" style="margin-top:5%;margin-left:5%;margin-right:5%;">
        <div class="col">
        <div class="card-body" style="border:1px solid #ededed;border-top-left-radius:10px;border-top-right-radius:10px;">
            <h4>Set Custodian</h4>

        </div>
        <?php
                include('connection.php');
                $stat = "1";
                $query=mysqli_query($conn,"SELECT * FROM xicspar JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id JOIN classification ON classification.classID = xicspar.class_id
                 WHERE stat = $stat  ORDER BY idx DESC");
                while($row=mysqli_fetch_array($query))
                {
                    $stock_id = $row['idx'];
                    $req = "SELECT * FROM icspar_details WHERE x_id = $stock_id AND custodian IS NULL";

                    if($r = mysqli_query($conn,$req))
                    {
                        $numd =mysqli_num_rows($r);
                    }
                    ?>

                    <div class="card-body">
                        <div class="col">

                        </div>
                        <div class="col">
                            <span><?php echo $row['item_details'];?></span>
                        </div>
                    </div>




<?php
                }
                ?>



        </div>
        <div class="col">

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
