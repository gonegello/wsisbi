

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    include "count-iar.php";
    include "count-ris.php";

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
    <title>RIS Acceptance</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
 
 
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
    
    <?php //include "top.php";
    ?>
    
     
        <div class="row">
           
            <div class="col">
          
             

    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
    <span><h1 style="color:grey;"><i class="bx bx-mouse"></i> Acceptance</h1><span style="color:grey;"> RIS Acceptance</span></span>
   

       
    </div>
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">

     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-mouse"></i><span> &nbsp; RIS ACCEPTANCE</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          <a href="#additemss" class="iar" style="text-decoration:none;">Add Items</a> | 
          <a href="#recent" class="iar" style="text-decoration:none;">Recently Added</a> | 
          <a href="#iar-ready" class="iar" style="text-decoration:none;margin-left:5px;" 
          title="Added items must undergo Inspection and Acceptance Report(IAR) in order to become an active stocks.">Ready for IAR  <?php
                if($ris_ready > 0)
                {
                    echo '<span style="background:red;color:white;font-weight:bold;padding:6px 12px;border-radius:50px;font-size:12px;color:white;">'.$ris_ready.'</span>';
                }

                ?></a>






          </div>
           
        </div>
        </div>
     
    







        <div class="card-body" id="additemss" style="background:white;" id="ready-acc">
        <div class="row">
          <div class="col">      <?php 
          //if an item is sent to archive
          if(isset($_SESSION['addedStock']))
             {
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['addedStock'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['addedStock']);
            }
      ?>
  
              
    </div>
          <div class="col" style="text-align:right;">
                        
          <a href="x-input-ics.php" class="redirect"><i class="bx bx-mouse"></i> ICS & PAR ACCEPTANCE</a>

          </div>
        </div>
          
        </div>

        <div class="card-body"  >
        <form  action="addris.php" class="addstock" method = "post" enctype="multipart/form-data">
                
   

                <div class="row" style="margin-top:2%;"><!-- -->

                    <div class="col">
                    <input type='file' id="imgInp" name="imgInp" style="display:none" />
                    <!-- preview image here-->
                    <img id="addpho" style= "object-fit:cover;border:1px solid #ededed;border-radius:5px;" src="image/add.png" 
                    alt="Product Image" height="200px" width="100%" />  
                    </div>

                    <div class="col">
                    <label>Fund Cluster:</label><br>
                    <select class = "selectme" name="fund_c" id="fund_c" onchange="GetFundID(this.value)">
                    <?php echo $fund_c;?>
                    </select> <br><br>
                
                    <label>Item Description:</label><a href="x-pci.php">Add Article</a><br>
                        <input type="text" name="item" style="font-style:italic;color:#5DBB63;"
                        placeholder="Item Name" id="item" value=""
                        onchange="GetDetails(this.value)"
                        required/>
                    <br>
                    </div>

                    <div class="col">
                    <label>Supplier:</label><br>
                    <input type="text" name="supplier" id="supplier" placeholder="Supplier"><br><br>


                    <label>Unit:</label><br>
                        <input type="text" style="font-style:italic;color:#5DBB63;" name="unit"
                        id="unit" placeholder="Unit" value="" required/>
                    </div>


                    </div><!-- end of first row inside the form-->


                 

                    <div class="row" style="margin-top:1%;">

                    <div class="col">
                        <label>Quantity:</label><br>
                        <input type="number" name="quantity" 
                        placeholder="Quantity" min="0" id="quantity" value="" required/>
                    </div>

                    <div class="col">
                    <label>Unit Price:</label><br>
                    <input type="number" name="unit_price"
                    id="unit_price" placeholder="Unit Cost"
                    min="0" step=".01" value="" required/>   
                    </div>

                    <div class="col">
                     <!--total cost -->
                     <label>Total Cost:</label>
                        <input type="number" name="total_cost"
                        id="total_cost" step=".01" placeholder="Total Cost" value=""
                        readonly>
                    </div>


                </div><!-- second row inside the form-->



                <div class="row" style="margin-top:1%;">

                    <div class="col">
                        <label>Purchase Order No. :</label><br>
                        <input type="text" name="po_no" value=""
                        id = "po_no" placeholder="YY-MM-000 FORMAT, ex: 21-07-045">
                       
                    </div>

                    <div class="col">
                        <label>PO Date:</label><br>
                        <input type="text" name="po_date" id="po_date"
                         value="" placeholder="MM-DD-YY Format" >
                    </div>

                    <div class="col">

                    <label>Stock Number:</label><br>
                        <input type="text" name="stock_num" id="stock_num"
                         value="" placeholder="Stock Number" >
                        
                    <!-- for RIS generated -->
                        <input type = "hidden" name="year_2" id="year_2" value="<?php echo $date_2;?>">
                        <input type = "hidden" name="month_2" id="month_2" value="<?php echo $month_2;?>">
                        <!-- Input type hidden to be send post-->
                        <input type="hidden" name="sn_id" id="sn_id" value="">
         
           
                        <input type ="hidden" name="stat" id ="stat" value="1">
                        <input type ="hidden" name="r_code" id ="r_code" value="<?php echo $covertedrcode;?>">
                        <input type = "hidden" name="idx" id="idx" placeholder="idx" value="<?php echo $next_stock_id;?>">
                        <input type = "hidden" name="user_id" id="user_id" placeholder="user_id" value="<?php echo $id;?>">




                        <!--for auto generation stocks -->

                        <input type="hidden" name="fund_id" id="fund_id" value="1" placeholder="Fund ID"><!--fund cluster ID -->
                        

   

                    </div>
                    
                </div><!--third row inside the form-->

                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                    <input type="submit" name="save"
                    id="save"                                                
                    value="Save Item">
                    </div>
                </div>
                </form>
        </div>

  
        <div class="card-body" id="recent" style="">

        <div class="card-body" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">RECENTLY ADDED</h6>
   
    </div>
          <div class="col" style="text-align:right;">
          <a href="x-full-ris.php"><i class='bx bx-cart'></i> RIS Stockroom</a>
          </div>  
        </div>
        </div>
     
       
        </div>

        <div class="card-body">

                    <?php

            if($recently_ris == 0)
            {
                echo '<div class="card-body" style="border-bottom-right-radius:10px;
            border-bottom-left-radius:10px;border-top:none;">
            <div class="row">
            <div class="col">
            </div>
            <div class="col" style="text-align:center;">
            <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
            <br><span style="color:grey;">No Recently Added Items.</span><br><br><br>
            </div>
            <div class="col">
            </div>
            </div>

            </div>';
            }
            ?>

        <table>


                    <?php
                include('connection.php');
                $stat = "1";
                $query=mysqli_query($conn,"SELECT * FROM xris JOIN fund_c ON fund_c.fundc_id = xris.fc_id
                 WHERE stat = $stat AND id_iar IS NOT NULL  ORDER BY idx DESC LIMIT 5");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>

                    <tr>
                        <td>
                            <?php
                            if(empty($row['stock_img']))
                            {
                                echo 'no photo';
                            }
                            else{
                                echo '<img src="'.$row['stock_img'].'" style="object-fit:cover;border-radius:50px;border:2px solid #ededed;" width="50px" height="50px">';
                            }



                            ?>
                 
                        </td>
                        <td>
                            <?php echo $row['item_details'];?><br>
                            <span style="color:grey;font-size:15px;font-style:italic;">
                            <?php echo $row['in_quan']; echo " "; echo $row['unit'];?><?php echo " X "; echo number_format($row['unit_cost'],2);?>
                            <?php echo ","; echo $row['supplier'];?>
                        </span>
                        </td>
                        <td style="text-align:right;font-size:12px;color:grey;"><?php echo $row['date']; echo " "; echo $row['time'];?></td>
                </tr>

                <?php

                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
            </tr>
            </table>

        </div>


        <div class="card-body" >

        <div class="card-body" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">READY FOR IAR
                <?php
                if($ris_ready > 0)
                {
                    echo '<span style="background:red;color:white;padding:6px 12px;border-radius:50px;font-size:12px;">'.$ris_ready.'</span>';
                }

                ?>
              </h6>
   
    </div>
          <div class="col" style="text-align:right;">
          <a href="x-ia-report.php"><i class='bx bx-folder'></i> IAR Reports</a>


          </div>
        </div>
        </div>
      
       
        </div>
        <div class="card-body" id="iar-ready" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <?php

            if($ris_ready == 0)
            {
                echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No Items Ready for Inspection and Acceptance Report.</span><br><br><br>
    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
            }
        ?>
            <table>

            
            <?php
     $stat = "1";
     include "connection.php";
     $query=mysqli_query($conn,"SELECT * FROM xris JOIN fund_c ON fund_c.fundc_id = xris.fc_id WHERE stat = $stat AND id_iar IS NULL GROUP BY supplier,po_date,po_num,fc_id");
     while($row=mysqli_fetch_array($query))
     {
         $idx = $row['idx'];
         $supplier = $row['supplier'];
         $po_date = $row['po_date'];
         $po_num = $row['po_num'];
         $fc_id = $row['fc_id'];
         ?>

       <tr>
        <td width="5%"><i class='bx bx-file' style="padding:10px 10px; border-radius:50px;background:#A3A3FF;color:white;font-size:25px;"></i></td>
        <td>
       <a href="x-ris-iar.php?fc_id=<?php echo $row['fc_id'];?>&idx=<?php echo $row['idx'];?>&fund_cluster=<?php echo $row['fund_cluster'];?>&po_num=<?php echo $row['po_num'];?>&po_date=<?php echo $row['po_date'];?>&date=<?php echo $row['date'];?>&supplier=<?php echo $row['supplier'];?>">
        <span style="color:royalblue;">
            Supplier: <?php echo $row['supplier'];?> 
            PO:<?php echo $row['po_num']; echo " / "; echo $row['po_date'];?>
            Fund Cluster:<?php echo $row['fund_cluster'];?>

    </span>
     </a>
    </td>
       
        <td>
         <?php
         $q = mysqli_query($conn,"SELECT * FROM xris WHERE supplier = '{$supplier}' AND fc_id = $fc_id AND po_num = '{$po_num}' AND po_date = '{$po_date}'");
         while($row=mysqli_fetch_array($q))
         {

         ?>
      <div class="col" style="margin-left:5%;">

   
         <span style="font-style:italic;">
             <?php echo $row['in_quan']; echo " "; echo $row['unit']; echo " "; echo $row['item_details'];?>
         </span>

         </div>
        <?php
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


       








             





        



    </div>
    </div>

    <?php include "bottom.php";?>

            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 

 <script>
     function GetDetails(str){
        if(str.length == 0){
            document.getElementById("unit").value = "";
            document.getElementById("sn_id").value = "";
            document.getElementById("stock_num").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("unit").value = myObj[0];
                    document.getElementById("sn_id").value = myObj[1];
                    document.getElementById("stock_num").value = myObj[2];


                }
            };

            xmlhttp.open("GET", "fill.php?item=" + str, true);
            xmlhttp.send();

        }
     }
 </script>

<script>
     function GetFundID(str){
        if(str.length == 0){
            document.getElementById("fund_id").value = "";
         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("fund_id").value = myObj[0];

                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "fillfundID.php?fund=" + str, true);
            xmlhttp.send();

        }
     }
 </script>
 








</body>
</html>
