

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

$ris_month = date("F");
$ris_year = date("Y");


?>





    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>Archived Items</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

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
td, th{
    font-style:normal;
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
    
    <?php
     //if an item is sent to archive
          if(isset($_SESSION['out']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Sent to active items.</h1>
              </div>
              <div class="col">

              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              
              </div>
              </div><hr><i><?=$_SESSION['out'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['out']);
            }
      ?>

          
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-archive-in"></i> Archives</h1>


   
</div>
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
    
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-archive-in"></i><span> &nbsp; ITEM ARCHIVES</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          <a href="#ics" class="iar" style="text-decoration:none;">ICS Archives</a> | 
          <a href="#par" class="iar" style="text-decoration:none;">PAR Archives</a> | 
          <a href="#ris" class="iar" style="text-decoration:none;">RIS Archives</a>
          
          </div>
           
        </div>
        </div>

        


     

        <div class="card-body" style="">

        <div class="card-body" id="ics" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
            <div class="col">
            <span><i class='bx bx-box'></i> ICS ITEMS</span>
            </div>

            <div class="col" style="text-align:right;">
                <a href="x-full-ics.php" style=""><span><i class='bx bx-box'></i> ICS Stockroom</span></a>
            </div>
        </div>
       
    </div>
                          
<?php
if($count_iarc == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No PAR items recorded.</span><br><br>
    <a href="x-full-ics.php" class="noneadd"><i class="bx bx-store"></i> ICS Stockroom</a><br><br>

    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>
       
            <table>
                
            <?php
                    $stat = 0;
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM xicspar WHERE stat = $stat AND unit_cost <= 50000");
                    while($row = mysqli_fetch_array($query))
                    {
                
                    ?>
                <tr>
              
                    <td><i class='bx bx-file' style="color:white;background:royalblue;padding:12px 12px;border-radius:50px;"></i></td>
                    <td><span>
                    <?php echo $row['in_quan'];?>
                    <?php echo $row['item_details'];?>  </span></td>
                    <td style="text-align:right;"> <a href="#" data-toggle="modal" style="font-size:25px;" title="Archive out<?php echo $row['item_details'];?>" data-target="#icsparOut<?=$row['idx'];?>"><i class='bx bx-archive-in'></i></a>                        </td>
</td>
                        
                </tr>
         

    
            <?php
            include "x-modal-out-icspar.php";
                                }
            ?>
</table>

        </div>



        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <div class="card-body" id="par" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
            <div class="col">
            <span><i class='bx bx-package'></i> PAR ITEMS</span>
            </div>
            <div class="col" style="text-align:right;">
                <a href="x-full-par.php"><span> <i class='bx bx-package'></i> PAR Stockroom</span></a>
            </div>
        </div>
          
        </div>
                                  
<?php
if($count_parc == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No PAR items recorded.</span><br><br>
    <a href="x-full-par.php" class="noneadd"><i class="bx bx-store"></i> PAR Stockroom</a><br><br>

    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>
            <table>
               
            <?php
                    $stat = 0;
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM xicspar WHERE stat = $stat AND unit_cost > 50000");
                    while($row = mysqli_fetch_array($query))
                    {

                        
                    ?>

 

                <tr>
              
                    <td>   <i class='bx bx-file' style="color:white;background:royalblue;padding:12px 12px;border-radius:50px;"></i></td>
                    <td><span>
                    <?php echo $row['in_quan'];?>
                    <?php echo $row['item_details'];?>  </span><br>
                        <span></span></td>
                    <td style="text-align:right;"> <a href="#" data-toggle="modal" title="Archive out<?php echo $row['item_details'];?>" data-target="#icsparOut<?=$row['idx'];?>"><i class='bx bx-archive-in' style="font-size:25px;"></i></a>                        </td>
</td>
               
                </tr>
                

    
<?php
include "x-modal-out-icspar.php";
                    }
    ?>
</table>

        </div>


        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <div class="card-body" id="ris" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
            <div class="col">
            <span><i class='bx bx-cart'></i> CONSUMABLE ITEMS</span>
            </div>
            <div class="col" style="text-align:right;">
            <a href="x-full-ris.php"><span><i class='bx bx-cart'></i> RIS Stockroom</span></a>
                
            </div>
        </div>
           
        </div>

                                         
<?php
if($count_rarc == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No record.</span><br><br>
    <a href="x-full-ris.php" class="noneadd"><i class="bx bx-store"></i> RIS Stockroom</a><br><br>

    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>
     
            <table>
               
            <?php
                    $stat = 0;
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM xris WHERE stat = $stat");
                    while($row = mysqli_fetch_array($query))
                    {

                        
                    ?>

 

                <tr>
              
                    <td>   <i class='bx bx-file' style="color:white;background:royalblue;padding:12px 12px;border-radius:50px;"></i></td>
                    <td><span>
                    <?php echo $row['in_quan'];?>
                    <?php echo $row['item_details'];?>  </span><br>
                        <span></span></td>
                    <td style="text-align:right;">
                    <a href="#" style="font-size:25px;" data-toggle="modal" title="Archive out<?php echo $row['item_details'];?>" data-target="#risOut<?=$row['idx'];?>"><i class='bx bx-archive-in'></i></a></td>
               
                </tr>
              
                

             
    

    
<?php
include "x-modal-out-ris.php";
                    }
    ?>
</table>

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
