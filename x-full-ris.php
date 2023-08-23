

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
//include "property_number.php";
//include "stock_number.php";
include "x-ris-no.php";

?>





    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>Consumables</title>

    <?php require_once "a-linkstyle.php";
    ?>
  <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
      td{
        font-style:normal;
        color:rgb(40,40,40);
      }
      th{
        color:grey;
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
      .stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }
      

.opptions{
  font-size:20px;
  padding:0;
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
    
   

   
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
<div class="col">
<h1 style="color:grey;"><a href="x-stock.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a><span style="font-size:20px;"> / <i class="bx bx-box"></i> Consumables</span></h1>
</div>

 <div class="col" style="text-align:right;">
 <a href="x-input-iar.php?#additemss" style="font-size:20px;padding:5px 11px;color:grey;border-radius:50%;">
            <i class='bx bx-mouse'></i><span> RIS Acceptance</span></a>
 </div>
</div>

    
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
   

     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        
     
     <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-box"></i><span> &nbsp; Consumables</span></h5>
          </div>
          <div class="col" style="text-align:right;">
         
          <a href="#new" class="iar" style="text-decoration:none;" title="Active Stocks">Active Stocks</a> | 
          <a href="x-request.php" class="iar" style="text-decoration:none;" title="RIS Request">Requests</a> |
          <a href="x-r-ris.php" class="iar" style="text-decoration:none;" title="RIS Records">RIS Records</a>



          </div>
           
        </div>
        </div>

        
        <div class="card-body" style="background:whitesmoke;">
       

        <div class="row">
       
          <div class="col">
         
              <h5 style="">RIS</h5><span style="">Consumables</span>
   
    </div>
          <div class="col">

          <label for ="search_consu">Search Item:</label><br>
          <input type="text" id="searchconsu" onkeyup="myFunctionn()" placeholder="Search by Items details, supplier.." style="background:white;border-radius:50px;">
          </div>
        </div>

        <div class="row">
          <div class="col">
          <?php 
          //if an item is sent to archive
          if(isset($_SESSION['archivedIn']))
             {  
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['archivedIn'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['archivedIn']);
            }
      ?>
          </div>
        </div>
       
        </div>


        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
          
<?php
              if ($consume == 0){
                echo '<div class="card-body" style="border-bottom-right-radius:10px;
                border-bottom-left-radius:10px;border-top:none;">
                <div class="row">
                <div class="col">
                </div>
                <div class="col" style="text-align:center;">
                <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
                <br><span style="color:grey;">No consumable items yet.</span><br><br>
                <a href="x-input-iar.php?#additemss" class="noneadd"><i class="bx bx-plus"></i> Add an Item</a><br><br>
                </div>
                <div class="col">
                </div>
                </div>
                
                </div>';
                  }
  
                  ?>




        <?php
          if ($consume > 0){
            echo '<table id="consutable">
            <tr>
            <th>Photo</th>
                <th>Item Details</th>
                <th>Quantity</th>
                <th>Available</th>
                <th>Unit Cost</th>
                <th>Total Cost</th>
                <th>Supplier</th>
                <th>Date Time</th>
                <th>PO No.</th>
                <th>PO Date.</th>
            </tr>';

          }
          ?>

        



                


                    <?php
                include('connection.php');
                $stat = "1";
                $tot_unit = 0;
                $query=mysqli_query($conn,"SELECT * FROM xris JOIN fc ON fc.ar_id = xris.sn_id JOIN fund_c on fund_c.fundc_id = xris.fc_id
                WHERE stat AND xris.id_iar IS NOT NULL = $stat GROUP BY xris.sn_id ORDER BY idx DESC");
                while($row=mysqli_fetch_array($query))
                {

                   
                if($row['sn_id'] == $row['sn_id'])
                {
                  $tot_unit += $row['a_quan'];
                }



                      ?>
                      

                    <tr>
                      
                        <td style="text-align:center;"> <img src="<?php echo $row['stock_img']; ?>" style="object-fit:cover;" width="100px" height="100px"></td>
                        <td><?php echo $row['item_details'];?></td>
                        <td><?php echo $tot_unit; echo " "; echo $row['unit'];?></td>
                        <td><?php echo $row['a_quan']; echo " "; echo $row['unit'];?></td>
                        <td><?php echo number_format($row['unit_cost'],2);?></td>
                        <td><?php echo number_format($row['total_cost'],2);?></td>
                        <td><?php echo $row['supplier'];?></td>
                        <td><?php echo $row['date'];?><br><?php echo $row['time'];?></td>
                        <td><?php echo $row['po_num'];?></td>
                        <td><?php echo $row['po_date'];?></td>

                        <td style="">
                     
                        </td>

                        <td>
                        <a href="x-stockcard.php?idx=<?php echo $row['idx'];?>&sn_id=<?php echo $row['sn_id'];?>" title="stock card" class=opptions><i class='bx bx-card'></i></a>
                           <a href="#" class="opptions"data-toggle="modal" title="Archive item?" data-target="#risArchive<?=$row['idx'];?>"><i class='bx bx-archive-in'></i></a>
                           <a href="x-per-item.php?sn_id=<?php echo $row['sn_id'];?>&stock_img=<?php echo $row['stock_img'];?>" class="opptions" title="More details.."><i class='bx bx-link-external'></i></a>
                          
                          </td>
                          

  

                    </tr>

                <?php
                include "x-modal-ris-arc.php";
                }
                ?>

        </table>


        </div>

        <div class="card-body" style="background:whitesmoke;">
          <div class="row">

            <div class="col">
            <h5 style="">Physical Count on Inventories (PCI)</h5>
            <span style=""><a href="#">Add Article</a> | <a href="#">PCI Reports</a></span>
            </div>

            <div class="col">
            <label for ="search_stock">Search Article:</label><br>
            <input type="text" id="searchpci" onkeyup="myFunction()" style="background:white;border-radius:50px;" placeholder="Find by article,description,stock number, unit..">
   

            </div>
          </div>
        </div>

        <div class="card-body">
        <table id="tablepci">
                    <tr>
                        <th></th>
                    <th>Article</th>
                        <th>Description</th>
                        <th>Stock Number</th>
                        <th>Unit of Measure</th>
                        <th>Unit Value</th>
                        <th>Balance Per Card</th>
                        <th>On Hand Per Count</th>
                        
                    </tr>

                    <?php
                include('connection.php');
               // $fc_id = "1";
                $i = 0;
                $query=mysqli_query($conn,"SELECT * FROM fc ORDER BY stock_num LIMIT 30");
                while($row=mysqli_fetch_array($query))
                {
                 $i = $i + 1;
                 $art = $row['article'];
                    ?>

                    <tr>
                        <td><?php echo $row['ar_id'];?>.</td>
                       <td><?php echo $row['article'];?></td>
                       <td><?php echo $row['descr'];?></td>
                       <td><?php echo $row['stock_num'];?></td>
                       <td><?php echo $row['unit_meas'];?></td>
                       <td><?php echo $row['unit_val'];?></td>
                       <td><?php echo $row['bpc'];?></td>
                       <td><?php echo $row['ohpc'];?></td>
                       <td>

                      
                       <a href="x-edit-art.php?ar_id=<?php echo $row['ar_id'];?>"  title="Update <?php echo $row['article']; echo " "; echo $row['descr'];?>?"><i class='bx bx-edit' style="font-size:20px;"></i></a>
                            <a onclick = "return confirm('Are you sure you want to delete <?php echo $art;?> article?')" href="delete-article.php?ar_id=<?php echo $row['ar_id'];?>&article=<?php echo $row['article'];?>" title="Delete <?php echo $row['article']; echo " "; echo $row['descr'];?>?"><i class='bx bx-trash' style="font-size:20px;"></i></a>

                    </td>

                       

                

                    </tr>

                <?php
                }
                ?>

        </table>
        </div>
        <div class="card-body" style="border-top:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
          <div class="row">
            
            <div class="col" style="text-align:center;">

              <a href="x-pci.php?#list" title="PCI List">See All <i class="bx bx-right-arrow-alt"></i></a>
            </div>

          </div>
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
  input = document.getElementById("searchpci");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablepci");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
    if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1  || td[2].innerHTML.toUpperCase().indexOf(filter) > -1 || td[3].innerHTML.toUpperCase().indexOf(filter) > -1 || td[4].innerHTML.toUpperCase().indexOf(filter) > -1 )   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "None";
     
   }

}
}
}
</script>


<script>
function myFunctionn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchconsu");
  filter = input.value.toUpperCase();
  table = document.getElementById("consutable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1 || td[6].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "None";
     
   }

}
}
}
</script>


<!--
 <script type="text/javascript">
        $(document).ready(function(){
            $("#search_stock").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'search-xfullris.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#table-data").html(response);
                    }
                });
            });
        });
  </script>
      -->



</body>
</html>
