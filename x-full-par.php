

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    include "x-count.php";
    include "count-icspar.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

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
    <title>Non-consumables > 50k</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
.iar:hover{
    text-decoration:none;
}
.stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }
      .noneadd{
        border:1px solid #A3A3FF;
        color:#A3A3FF;
        padding:10px;
      }
      .noneadd:hover{
        background:#A3A3FF;
        color:white;
        text-decoration:none;
      }

    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
    include 'modaladd_gen.php';
    include 'modaladd_category.php';
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">

    
    <?php
     //if an item is sent to archive
          if(isset($_SESSION['archived']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Saved To Archive</h1>
              </div>
              <div class="col">

              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              
              </div>
              </div><hr><i><?=$_SESSION['archived'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['archived']);
            }
      ?>
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
<div class="col">
<h1 style="color:grey;"><a href="x-stock.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a><span style="font-size:20px;"> / <i class="bx bx-package"></i> PAR</span></h1>
        </div>

        <div class="col" style="text-align:right;">
 <a href="x-input-ics.php?#additemss" style="background:white;font-size:30px;padding:5px 11px;color:grey;border-radius:50%;">
            <i class='bx bx-left-arrow-alt'></i></a><span>ICS & PAR Acceptance</span>
 </div>


</div>
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     


     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-package"></i><span> &nbsp; PAR</span></h5>

          </div>
          <div class="col" style="text-align:right;">
         
          <a href="#allics" title="All ICS Items" class="iar">All PAR Items
            <?php
         if($active_par > 0)
         {
             echo '<span style="background:red;color:white;font-weight:bold;padding:5px 12px;border-radius:50px;font-size:15px;">'.$active_par.'</span>';
         }

        
        
        ?>
            </a> |
            <a href="#setcus" title = "Set Custodian" class="iar">Set Custodian
            <?php
         if($set_par > 0)
         {
             echo '<span style="background:red;color:white;font-weight:bold;padding:5px 12px;border-radius:50px;font-size:15px;">'.$set_par.'</span>';
         }

        
        
        ?>
            </a> |
            <a href="#tobeiss" title="To Be Issued" class="iar">To Be Issued
            <?php
         if($parissue > 0)
         {
             echo '<span style="background:red;color:white;font-weight:bold;padding:5px 12px;border-radius:50px;font-size:15px;">'.$parissue.'</span>';
         }

        
        
        ?>
            </a> |
            <a href="x-xpar.php" title="PAR Records" class="iar">PAR Records</a> 

          </div>
           
        </div>
        </div>
     
  

        
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col" style="margin-top:1%;">
              <h5 style="color:grey;">Non-consumable items > 50k.
                  <?php
                  if($active_par > 0)
                  {
                      echo '( '.$active_par.') ';
                  }
                  ?>
              </h5>
   
    </div>
          <div class="col">
  
          <input type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search by Items details, supplier.." style="background:white;border-radius:50px;">
          </div>
        </div>
       
        </div>

        <div class="card-body" id="allpar">

                    
<?php
if($active_par == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No PAR items recorded.</span><br><br>
    <a href="x-input-ics.php?#additemss" class="noneadd"><i class="bx bx-plus"></i> Add an Item</a><br><br>

    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>
            <table>

            <?php
            if($active_par > 0)
            {
                echo '<table id="myTable">
                
                <tr>
                    <th style="color:royalblue;"></th>
                    <th  style="color:royalblue;font-weight:bold;">Item Details</th>
                    <th style="color:royalblue;font-weight:bold;">Supplier</th>
                    <th style="color:royalblue;font-weight:bold;">Quantity</th>
                    <th style="color:royalblue;font-weight:bold;">Unit Cost</th>
                    <th style="color:royalblue;font-weight:bold;">Total Cost</th>
                    <th style="color:royalblue;font-weight:bold;">Date</th>
                    <th style="color:royalblue;font-weight:bold;">PO No.</th>
                    <th style="color:royalblue;font-weight:bold;">PO Date</th>
                </tr>
                <tr>
                        <th style="color:white">white</th>
                    </tr>
                ';
            }


?>
                <?php
                $total = 0;
                 include('connection.php');
                 $stat = "1";
                 $query=mysqli_query($conn,"SELECT * FROM xicspar JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id JOIN classification ON classification.classID = xicspar.class_id
                  WHERE stat = $stat AND unit_cost > 50000 AND xicspar.id_iar IS NOT NULL ORDER BY idx DESC");
                 while($row=mysqli_fetch_array($query))
                {
                    $total += $row['total_cost'];
                    ?>

                    <tr>
                        <td>
                            <img src="<?php echo $row['stock_img'];?>" style="object-fit:cover;border-radius:50px;border:1px solid gainsboro;" width="50px" height="50px">
                        </td>
                        <td><?php echo $row['item_details'];?></td>
                        <td><?php echo $row['supplier'];?></td>

                        <td><?php echo $row['in_quan']; echo " "; echo $row['unit'];?></td>
                        <td><?php echo number_format($row['unit_cost'],2);?></td>
                        <td><?php echo number_format($row['total_cost'],2);?></td>
                        <td><?php echo $row['date'];?><br><?php echo $row['time'];?></td>
                        <td><?php echo $row['po_num'];?></td>
                        <td><?php echo $row['po_date'];?></td>  
                        <td>
                      
                            <a href="#" class="opptions"data-toggle="modal" data-target="#parArchive<?=$row['idx'];?>"><i class='bx bx-archive-in'></i></a>
                      
                    </td>
                                                
                    </tr>
                    <tr>
                        <td style="color:white">white</td>
                    </tr>


<?php
include "x-modal-arcpar.php";
                }
                ?>

<?php
if($active_par > 0)
{
    echo '

    <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th style="color:royalblue;font-weight:bold;">Total</th>
    <th style="font-weight:bold;">'.number_format($total,2).'</th>
    <th></th>
    <th></th>
    <th></th>
</tr>
    ';
}


?>
       
            </table>
        </div>



          
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">TO BE ISSUED

              <?php
                  if($parissue > 0)
                  {
                      echo '( '.$parissue.') ';
                  }
                  ?>
              </h6>
   
    </div>
          <div class="col">
      

          </div>
        </div>
       
        </div>
        <div class="card-body" id="tobeiss">

        
<?php
if($parissue == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
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

<table>

<?php
if($parissue > 0)
{
    echo '
    <tr>
                        <td style="color:royalblue;font-weight:bold;"></td>
                        <td style="color:royalblue;font-weight:bold;">Custodian</td>
                        <td style="color:royalblue;font-weight:bold;">PO No / PO Date</td>
                        <td style="color:royalblue;font-weight:bold;"></td>
                    </tr> ';
}



?>

        <?php
                    include('connection.php');
                    $stat = "1";
                    $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id
                    JOIN people ON people.idc = icspar_details.custodian WHERE xicspar.stat=$stat AND xicspar.unit_cost > 50000 AND icspar_details.custodian IS NOT NULL
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
                    <tr>
                        <td>   <img src="<?php echo $row['profile'];?>" style="object-fit:cover;border-radius:50px;border:1px solid gainsboro;" width="50px" height="50px"></td>
                        <td><?php echo $row['fullname'];?></td>
                        <td><?php echo $row['po_num']; echo " / "; echo $row['po_date'];?></td>
                        <td>
                        <a href="x-parperson.php?idc=<?php echo $row['idc'];?>&count_fc=<?php echo $count_fc;?>" class="opptions">
                        <i class='bx bxs-chevron-right' ></i></a></td>


                    </tr>

                    <tr>
                        <td style="color:white;">white</td>
                    </tr>
               


                    <?php
                    }
                    ?>

                </table>


        </div>



        

          
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">SET CUSTODIAN


              <?php
                  if($set_par > 0)
                  {
                      echo '( '.$set_par.') ';
                  }
                  ?>
              </h6>
   
    </div>
          <div class="col">
      

          </div>
        </div>
       
        </div>

        <div class="card-body" id="setcus" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                    
<?php
if($set_par == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No PAR items to set.</span><br><br><br>
    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>


        <table>

        <?php
        if($set_par > 0)
        {
            echo ' 
            <tr>
                    <td style="color:royalblue;font-weight:bold;"></td>
                    <td style="color:royalblue;font-weight:bold;">Item Details</td>
                    <td style="color:royalblue;font-weight:bold;">Quantity</td>
                    <td style="color:royalblue;font-weight:bold;">Status</td>
                    <td style="color:royalblue;font-weight:bold;">PO No.</td>
                    <td style="color:royalblue;font-weight:bold;">PO Date</td>
                    </tr>

            ';
        }

        ?>
                    
                    <?php
                include('connection.php');
                $stat = "1";
                $query=mysqli_query($conn,"SELECT * FROM xicspar JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id JOIN classification ON classification.classID = xicspar.class_id
                 WHERE stat = $stat AND xicspar.unit_cost > 50000 AND xicspar.id_iar IS NOT NULL  ORDER BY idx DESC");
                while($row=mysqli_fetch_array($query))
                {
                    $stock_id = $row['idx'];
                    $req = "SELECT * FROM icspar_details WHERE x_id = $stock_id AND custodian IS NULL";

                    if($r = mysqli_query($conn,$req))
                    {
                        $numd =mysqli_num_rows($r);
                    }
                    ?>
                    
                    
                    <tr>
                       
                        <td><img src="<?php echo $row['stock_img'];?>" style="object-fit:cover;border-radius:50px;border:1px solid gainsboro;" width="50px" height="50px"></td>
     
                        <td><?php echo $row['item_details'];?></td>
                        <td><?php echo $row['in_quan']; echo " "; echo $row['unit'];?></td>
                        <td>
                        <?php echo $numd; echo " Available";?>
                        </td>
                       
                        <td><?php echo $row['po_num'];?></td>
                        <td><?php echo $row['po_date'];?></td>
                        <td><a href="x-full-prop.php?idx=<?php echo $row['idx'];?>&item=<?php echo $row['item_details'];?>&num=<?php echo $numd;?>
                        &po_num=<?php echo $row['po_num'];?>&po_date=<?php echo $row['po_date'];?>&stock_img=<?php echo $row['stock_img'];?>" class="opptions"><i class='bx bxs-chevron-right' ></i></a></td>
                      

                

                    </tr>

                    <tr >
                        <td style="color:white;">white</td>
                    </tr>
                 

                <?php
              
                }
                ?>

        </table>
        </div>
        


    </div>
    </div>



<?php include "bottom.php";?>


    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 

 
 <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1 || td[2].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }

}
}
}
</script>








</body>
</html>
