
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
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
   
    <style>
.iar{
    padding:10px;
    margin-left:1%;
    font-size:12px;
    color:white;
}
.iar:hover{
    font-size:13px;
    color:white;
    text-decoration:none;
}
select{
    background:white;
    border:1px solid #ededed;
    border-radius:50px;
}

    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php";

    ?>
    <?php

    $idc = $_GET['idc'];

    $query=mysqli_query($conn,"select * from `people`where idc = $idc");
    while($row=mysqli_fetch_array($query))
    {
    $fullname = $row['fullname'];

    } 

    ?>

<section class="home-section"> 
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">

    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
   
   <div class="col">

   <h1 style="color:grey;"><a href="x-xptr.php" class="stockroom"><i class="bx bx-refresh"></i> Property Transfer </a><span style="font-size:20px;"> / <i class="bx bx-user"></i> <?php echo $fullname;?></span</h1>
   </div>
   
   
   <div class="col" style="text-align:right;margin-top:1%;">
       <span style="color:grey;"><a href="x-full-ics.php"><i class="bx bx-box"></i> ICS Stockroom</a> | <a href="x-full-par.php"><i class="bx bx-package"></i> PAR Stockroom </a></span>
   </div>


</div>
<div class="row">
    <div class="col">
    <?php 
          //if successfully transferred
          if(isset($_SESSION['transferred']))
             {
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['transferred'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['transferred']);
            }
      ?>

    </div>
</div>

    <form method="post" action="transto.php">
         <div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;">
         <div class="col">
             <div class="card-body" style="border:1px solid #ededed;border-top-left-radius:10px;border-top-right-radius:10px;">
             <h4>Transfer A Property</h4> 
             <span>FROM : </span><span style="font-weight:bold;color:royalblue;"><?php echo $fullname;?></span>
             <input type="hidden" name="idc" value="<?php echo $idc;?>">
        </div>
            <div class="card-body" id="transferFROM" style="border:1px solid #ededed;border-top:0;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                <table>
                    <?php
                     $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN people ON people.idc = icspar_details.custodian 
                     JOIN xicspar ON xicspar.idx = icspar_details.x_id LEFT JOIN cond ON cond.idcond = icspar_details.ptr_condition
                     WHERE icspar_details.custodian = $idc");
                     while($row=mysqli_fetch_array($query))
                    {
                        

                        ?>

                        <tr>
                            <td><i class="bx bx-box" style="font-size:20px;padding:10px 10px;color:white;background:royalblue;border-radius:50px;"></i></td>
                            <td><?php echo $row['prop_num'];?></td>
                            <td><?php echo $row['item_details'];?></td>
                          
                            <td>
                            
                            <?php
                            if($row['ptr_condition'] != NULL && $row['ptr_condition'] == 1){
                                echo 'Condition:<br><span style="color:#E6A519;">'.$row['condi'].'</span>';
                            }

                            if($row['ptr_condition'] != NULL && $row['ptr_condition'] == 2){
                                echo 'Condition:<br><span style="color:red;">'.$row['condi'].'</span>';
                            }

                            ?>
                          
                           


                            <?php
                             if($row['ptr_condition'] == NULL)
                             {
                                 echo ' <label>Condition:</label><br>
                                 <select class = "selectme" name="ptr_condition[]" id="condition">
                                 <option>'.$cond.'</option>
                                 </select> <br><br>
                                 

                                 

    
    
                                 ';
                             }
                            
                        ?>
                            </td>

                            <td>

                         
                            <?php
                            if($row['ptr_custodian'] == NULL)
                            {
                                echo ' <label>Transfer To:</label><br>
                                <select class = "selectme" name="ptr_custodian[]" id="custodian">
                                <option>'.$peps.'</option>
                                </select> <br><br>
                                <input type="hidden" name="pn_id[]" id="pn_id" value="'.$row['pn_id'].'">
                                


                                ';
                            }


                            if($row['ptr_custodian'] != NULL)
                            {
                                $qq=mysqli_query($conn,"select * from `people`where idc = $row[ptr_custodian]");
                                while($rr=mysqli_fetch_array($qq))
                               {
                                  echo 'Transferred to :<span style="color:royalblue"><br>'.$rr['fullname'].'</span>';
                               }
                               
                            }

                            ?>
                            
                            
                            </td>



                        </tr>



                        <?php
                       
                    }
                    ?>
                </table>
            </div>
       
            </div>
</div>
            <div class="row" style="margin-right:10%;">
                    <div class="col">
                       
                    </div>
                    <div class="col">

                 <input type="submit" style="float:right;background:#5DBB63;" name="save" id="save" value="Transfer Now">
                
                
                </div>
                </div>
                </form>

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
