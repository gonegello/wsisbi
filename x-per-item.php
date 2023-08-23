

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
    <title></title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>

::-webkit-input-placeholder {
   font-style: italic;
   font-size:12px;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}

   

table {
  border-collapse: collapse;
  width: 100%;
}




select:focus,input[type="text"]:focus,input[type="number"]:focus,input[type="date"]:focus{
    border-bottom:1px solid green;

}
    #gen_result{
        
        
    }
    .crud-link{
        font-size:20px;
        padding:8px 11px;
        
       
    }
    .crud-link:hover{
        color:green;
        border-radius:50px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
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
#iarhistory td, th{
  border:1px solid #ededed;
  padding:8px;
}

#iarhistory th{
  background:#ededed;
}





    </style>
 
    <body style="background:whitesmoke;">
    <?php 
   
    include "a-overview.php";
    include 'modaladd_gen.php';
    include 'modaladd_category.php';





    $sn_id = $_GET['sn_id'];
    $stock_img = $_GET['stock_img'];
    

    
    $query=mysqli_query($conn,"select * from `fc`where ar_id = $sn_id");
    while($row=mysqli_fetch_array($query))
   {
       $article = $row['article'];
       $descr = $row['descr'];
       $stock_num = $row['stock_num'];

   } 
    ?>
   

    
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><a href="x-stock.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a><span style="font-size:20px;"> / <i class="bx bx-box"></i> 
 Consumables</span><span style="font-size:20px;"> / <?php echo $stock_num; echo " "; echo $article; echo " "; echo $descr;?></span></h1>

</div>

    
<div class="row" style="margin-top:2%;margin-left:10%;">
  
    <div class="col">
    <div class="row" style="margin-top:2%;margin-left:5%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
    
    
    
    <div class="col" style="padding:0;">


     <div class="card-body" style="border-top-right-radius:10px;border-top-left-radius:10px;background:white;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;color:white;">
           <br>
           <img src="<?php echo $stock_img;?>" style="object-fit:cover;" width="300px" height="300px"><br><br><br>
           <h4 style="color:white;"><?php echo $article; echo ", "; echo $descr;?></h4><span style="color:white;">Stock No. <?php echo $stock_num;?></span>
           </div>
         </div>
        <div class="row" style="margin-top:2%;">
          <div class="col" style="text-align:center;">
            <a href="x-stockcard.php?sn_id=<?php echo $sn_id;?>" title="Stock Card" class="guidelink">Stock Card</a> 


          
          </div>
           
        </div>
        </div>

        
        <div class="card-body" style="border-top:1px solid #ededed;border-bottom:1px solid #ededed;">
        <div class="row">
          <div class="col">
          <h5>Stock No. <?php echo $stock_num;?></h5>
        <h5 style=""><?php echo $article;?> (<?php echo $descr;?>)</h5>
         
   
    </div>
          <div class="col">
  
          </div>
        </div>
       
        </div>


        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <table>
          <?php
          $x_stat = 1;
          $saved = "saved";
          $query = mysqli_query($conn, "select * from `xris` join fc on fc.ar_id = xris.sn_id 
          join iar on iar.iar_id = xris.id_iar
          where sn_id = $sn_id order by date desc");
          while($row=mysqli_fetch_array($query))

          {
            $item_id = $row['idx'];

  
            ?>
              <tr>
                <td><span style="padding:3px 8px;background:#77dd77;color:white;border-radius:5px;">Stock In </span>
                <span style="color:#00A2ED;padding:12px 12px;">( <?php echo $row['in_quan']; echo " "; echo $row['unit'];?> )</span>
                <br><br><span style="color:royalblue;font-weight:bold;"><?php echo $row['article']; echo "," ;echo $row['descr'];?></span>
                  <br>
                  <span>IAR No. <?php echo $row['iar_no'];?></span><br>
                  <span>Date : <?php echo $row['date'];?></span><br>
                  <span>Supplier : <?php echo $row['supplier'];?></span><br>
                  <span>PO No / Date : <?php echo $row['po_num']; echo " / "; echo $row['po_date'];?></span>
               </td>


               <td>
               <span style="padding:3px 8px;background:#ff6961;color:white;border-radius:5px;">Stock Out </span><br>
                    <?php
                    $stat = "saved";
                    $que = mysqli_query($conn,"select * from `req` join people on people.idc = req.client_id
                    join ris on ris.idris = req.id_ris join xris on xris.idx = req.item_id
                    where req_stat = '{$stat}' and item_id = $item_id and app_quan > 0");
                    while($rw=mysqli_fetch_array($que))
                    {
                      ?>
                      <br><span>RIS No. <?php echo $rw['ris_no'];?></span><br>
                      <span>Date : <?php echo $rw['iss_date'];?></span><br>
                      <span style="color:#00A2ED">( <?php echo $rw['app_quan']; echo " "; echo $rw['unit'];?> )</span>
                      <span><?php echo $rw['fullname']; ?></span><br>

                      <?php
                    }
                    ?>

              </td>


              </tr>

              <tr>
                <td style="color:transparent;">white
          </td>
          <td></td>
          <td></td>

              </tr>

          <?php
          }
          ?>
  </table>




        </div>

      </div>
      </div>

        </div>
        <div class="col">
          <div class="row" style="margin-top:2%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
            <div class="col" style="padding:0;">
            <div class="card-body" style="background:#A3A3FF;border-top-left-radius:10px;border-top-right-radius:10px;">
              <span style="color:white">Inspection and Acceptance History</span>
      
            </div>
            
<div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

            <table id="iarhistory">
              <th>IAR No.</th>
              <th>Supplier</th>

            <?php
                    $stat = "1";
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM xris JOIN iar ON iar.iar_id = xris.id_iar WHERE 
                    xris.sn_id = $sn_id AND xris.id_iar IS NOT NULL");
                    while($row=mysqli_fetch_array($query))
                    {

                    ?>
              <tr>
                <td><a href="x-ris-per.php?iar_id=<?php echo $row['id_iar'];?>"><?php echo $row['iar_no'];?></a></td>
                <td><?php echo $row['supplier'];?></td>


              </tr>

              <?php
                    }
                    ?>

              




        </table>
          

            </div>









            </div>
          </div>


          <div class="row" style="margin-top:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
            <div class="col" style="padding:0;">
            <div class="card-body" style="background:#A3A3FF;border-top-left-radius:10px;border-top-right-radius:10px;">
              <span style="color:white">Requisition and Issue Slip History</span>
      
            </div>
            
<div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

            <table id="iarhistory">
              <th>RIS No.</th>
              <th>Date</th>

            <?php
                    $stat = "saved";
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM req JOIN xris ON xris.idx = req.item_id JOIN ris ON ris.idris = req.id_ris WHERE req.req_stat = '{$stat}' AND xris.sn_id = $sn_id");
                    while($row=mysqli_fetch_array($query))
                    {

                    ?>
              <tr>

                <td><a href="x-xris.php?fc=<?php echo $row['fc_id'];?>&req_by=<?php echo $row['req_by'];?>&idris=<?php echo $row['idris'];?>"><?php echo $row['ris_no'];?></a></td>
                <td><?php echo $row['rec_date'];?></td>


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

 


 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 

 








</body>
</html>
