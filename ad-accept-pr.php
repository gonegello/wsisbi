

  <?php 
  include "a-session.php";
  ?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Accept Request</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:2px solid black;
  
  
}
th[colspan="6"] {
    text-align: center;
}
th[rowspan="2"]{
  text-align:center;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.white{
  color:white;
}
#editr{
   padding:10px 13px;
}


#proceedris{
     padding:10px 13px;
     background:#50C878;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
     float:right;
 }
 #proceedics{
     padding:10px 13px;
     background:#50C878;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
     float:right;
 }
 #purpose{
   outline:none;
   border:none;
   background:white;
 }
 #purpose:focus{
   outline:none;
   border:none;
   box-shadow:none;
 }

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

      <!-- first card body-->

      <?php 
         $client_id = $_GET['client_id'];
         $r_date = $_GET['r_date'];
         $hd_aprvd = $_GET['hd_aprvd'];
         $dd_aprvd = $_GET['dd_aprvd'];
         $pr_no = $_GET['pr_no'];

         $query=mysqli_query($conn,"select * from `clients` where id = $client_id");
         while($row=mysqli_fetch_array($query))
        {
            $getname = $row['fullname'];
            $getdesig = $row['designation'];
            $getoffice = $row['office'];
   

        }              
        ?>

        <?php
        $h_id = $_GET['h_id'];

        $qry=mysqli_query($conn,"select * from `clients` where id = $h_id");
        while($rr=mysqli_fetch_array($qry))
       {
           $gethead = $rr['fullname'];
           $getpos = $rr['designation'];
       } 

        ?>



      <div class="row">
      <div class="col">
        <div id="ics-div">
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;border-bottom:none;
        border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-left:5%;margin-right:5%;margin-top:5%;"> 
        <h2>ICS</h2>
        <div class="row">

          <div class="col">
        <span style="color:grey;">Request Date: <?php echo $r_date;?></span><br>
        <span style="color:grey;">Requested By:<a href="#"> <?php echo $getname;?></a> <i>( <?php echo $getdesig;?> )</i></span><br>
        <span style="color:grey;">Office: <i><?php echo $getoffice;?></i></span>

        </div>

        <div class="col">
        <span style="float:left;color:grey;">To : <a href="#"><?php echo $office;?></a></span><br>
        <p style="float:left;color:grey;">Approved By: <a href="#"><?php echo $dir_name;?></a> <span><i>( Campus Director )</i>
        <?php echo $dd_aprvd;?></span><br>
        <span style="float:left:">Approved By:<a href="#"> <?php echo $gethead;?></a></span><i> ( <?php echo $getpos;?> )</i>
        <?php echo $hd_aprvd;?> <br>
        
        </div>

        </div>
        </div>
        <div class="card-body" style="margin-right:5%;margin-left:5%;border:1px solid #ededed;border-radius:5px;
        border-top-left-radius:0px; border-top-right-radius:0px;">
        <form method="post" action = "pr-supp-accept.php">
        
        <table>

          <tr>
            <th colspan = "6">
             <b> PURCHASE REQUEST </b>
          </th>
          </tr>

          <tr>
            <th>Entity Name:</th>
            <th colspan = "2" style="text-align:Left;">
            <span style="font-weight:normal;"><?php echo $univ_name;?></span>
            </th>
            <th>Fund Cluster:</th>
            <th colspan = "2"></th>
          </tr>

          <tr style="border-top:2px solid black;">
            <td>Office / Section :</td>
            <td><b><?php echo $getoffice;?></b></td>
            <td>PR No. <?php echo $pr_no;?></td>
            <td></td>
            <td>Date : </td>
            <td style="border-bottom:2px solid black;"><?php echo $r_date;?></td>

          </tr>

          <tr>
            <td></td>
            <td></td>
            <td>Responsibility Center Code:</td>
            <td></td>
            <td></td>

          </tr>

        <tr style = "border-top:3px solid black;">
            <th colspan = "2">Stock/Property No.</th>
            <th rowspan = "2">Item Description</th>
            <th rowspan = "2">Quantity</th>
            <th rowspan = "2">Unit Cost</th>
            <th rowspan = "2">Total Cost</th>
        </tr>
        <tr>
          <td>No.</td>
          <td>Unit</td>
         
          
        </tr>

        <?php include "connection.php";
        $client_id = $_GET['client_id'];
        $ics = "1";
        $stat = "3";
        $total_price = 0;
        $i = 1;
        
        $query = mysqli_query($conn, "select * from `cart` join stocks on stocks.s_id = cart.item_id
        where stocks.int_typeid = $ics and cart.stat = '{$stat}' and cart.client_id = $client_id and cart.pr_no = $pr_no");
        while($row = mysqli_fetch_array($query))
        {
          
          $uprice = $row['unit_price'];
          $quantity = $row['quan'];
          $total = $uprice * $quantity;
          $total_price += $row['unit_price'] * $row['quan'];
          $getid = $row['idcart'];
          $ss_id = $row['item_id'];
        
      ?>
        
       
        <tr>
            <td>
              <input type="hidden" name="idcart[]" value="<?php echo $row['idcart'];?>"/>
              <input type="hidden" name="sup_aprvd[]" value="<?php echo $datte;?>"/>
              <input type="hidden" name ="stat[]" value="4"/>
              <input type="hidden" name="off_id" value="<?php echo $id;?>"/>

              <input type="hidden" name="cli_id[]" value="<?php echo $row['client_id'];?>"/><!--Custodian-->
              <input type="hidden" name="ss_id[]" value="<?php echo $row['item_id'];?>"/>
              <input type="hidden" name="orig_quan[]" value="<?php echo $row['quantity'];?>"/><!--available quantity-->

              <input type="hidden" name="stats[]" value="1"/><!--available quantity-->
              <input type="hidden" name="client_name" value="<?php echo $getname;?>"/><!--available quantity-->


 

            

          
          </td>
            <td><?php echo $row['unit'];?></td>
           
            <td><a href="#" data-toggle="modal" data-target="#checkQuan<?=$row['s_id'];?>"><?php echo $row['brand']; echo " "; echo $row['stock_name'];?> <?php echo $row['description'];?></a></td>
            <td style = "text-align:right;">
            <?php
            //if quantity greater than request quantity
            if($row['quan'] > $row['quantity'])
            {
                echo '<input type="number" min="0" max="'.$row['quantity'].'" name="quan[]" value="'.$row['quantity'].'" required="">';
            }
            else if($row['quan'] <= $row['quantity'])
            {
              echo '<input type="number" min="0" max="'.$row['quan'].'" name="quan[]" value="'.$row['quan'].'" required="">';
            }

            ?>
            
          </td>
            <td style = "text-align:right;"><?php echo (number_format($row['unit_price'],2));?></td>
            <td style="text-align:right;"><?php echo (number_format($total,2));?></td>
            
        </tr>
             
            
 
   
    <?php
include "modal-check-iquan.php";

    }

    ?>
      <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><b>ABC:</b></td>
      <td style="text-align:right;"><?php echo (number_format($total_price,2)) ;?></td>    
      </tr>

      <?php include "connection.php";
        
        
        $query = mysqli_query($conn, "select * from `cart` where idcart = $getid");
        while($row = mysqli_fetch_array($query))
        {
          $getpurpose = $row['purpose'];
        }
         
        
      ?>

      <tr>
        <td>Purpose:</td>
        <td colspan="4" style="border-bottom:2px solid black;"><?php echo $getpurpose;?></td>
        <td></td>  
      </tr>

      <tr>
        <td><span class="white">sdf</span></td>
        <td colspan="4" style="border-bottom:2px solid black;"><span class="white">fsdf</span></td>
        <td><span class="white">dfd</span></td>    
      </tr>

      <tr>
        <td> <span class="white">sd</span></td>
        <td colspan="4" style="border-bottom:2px solid black;"><span class="white"></span></td>
        <td><span class="white"></span></td>      
      </tr>

      <tr>
        <td><span class="white">asdf</span></td>
      </tr>

      <tr> 
        
        <td></td>
        <td>Requested by:</td>
        <td></td>
        <td>Approved by:</td>
        <td></td>
        <td></td>


      </tr>

      <tr>
        <td>Signature:</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td >Printed Name:</td>
        <td style="text-align:center;border-bottom:2px solid black;"><span style="text-transform:uppercase;"><?php echo $getname;?></span></td>
        <td></td>
        <td style="text-align:center;border-bottom:2px solid black;"><span style="text-transform:uppercase;"><?php echo $dir_name;?></span></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>Designation:</td>
        <td style="text-align:center;border-bottom:2px solid black;"><span><?php echo $getdesig;?></span></td>
        <td></td>
        <td style="text-align:center;border-bottom:2px solid black;"><span><?php echo $director;?></span></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td rowspan="6"><span class="6"></span></td>
      </tr>


     </table>
      </div>
      <div class="card-body"  style="border-radius:5px;border:1px solid #eded;border-top:none;
        border-top-left-radius:0px;border-top-right-radius:0px;margin-left:5%;margin-right:5%;
         "> 
         <div class="row">
          <div class="col">
    <!--    <button type="submit" id="proceedics">Send Request</button>
  </form> -->
        </div>
        </div>
      </div>

  </div>

      </div>
  </div>










      <div class="row">
      <div class="col">
        <div id="ris-div">
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;border-bottom:none;
        border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-left:5%;margin-right:5%;margin-top:5%;"> 
        <h2>RIS</h2>
        <div class="row">

        <div class="col">
        <span style="color:grey;">Request Date: <?php echo $r_date;?></span><br>
        <span style="color:grey;">Requested By:<a href="#"> <?php echo $getname;?></a></span><br>
        <span style="color:grey;">Office: <i><?php echo $getoffice;?></i></span>

        </div>

        <div class="col">
        <span style="color:grey;float:left;">To : <a href="#"><?php echo $office;?></a></span><br>
        <p style="float:left;color:grey;">Approved By : <a href="#"><?php echo $dir_name;?></a> <span><i>( Campus Director )</i>
        <?php echo $dd_aprvd;?></span><br>
        <span style="float:left;">Approved By :<a href="#"> <?php echo $gethead;?></a></span><i>( <?php echo $getpos;?> )</i>
        <?php echo $hd_aprvd;?><br>
        
        </div>

        </div>
        </div>
        <div class="card-body" style="margin-right:5%;margin-left:5%;border:1px solid #ededed;border-radius:5px;
        border-top-left-radius:0px; border-top-right-radius:0px;">

      <!--  <form method="post" action="a-pr-ris.php">-->
        <table>

          <tr>
            <th colspan = "6">
             <b> PURCHASE REQUEST</b>
          </th>
          </tr>
          

          <tr>
            <th>Entity Name:</th>
            <th colspan = "2" style="text-align:Left;">
            <span style="font-weight:normal;"><?php echo $univ_name;?></span>
            </th>
            <th>Fund Cluster:</th>
            <th colspan = "2"></th>
          </tr>

          <tr style="border-top:2px solid black;">
            <td>Office / Section :</td>
            <td><b><?php echo $getoffice;?></b></td>
            <td>PR No.<?php echo $pr_no;?></td>
            <td></td>
            <td>Date :</td>
            <td style="border-bottom:2px solid black;"><?php echo $r_date;?></td>

          </tr>

          <tr>
            <td></td>
            <td></td>
            <td>Responsibility Center Code:</td>
            <td></td>
            <td></td>

          </tr>

        <tr style = "border-top:3px solid black;">
            <th colspan = "2">Stock/Property No.</th>
            <th rowspan = "2">Item Description</th>
            <th rowspan = "2">Quantity</th>
            <th rowspan = "2">Unit Cost</th>
            <th rowspan = "2">Total Cost</th>
        </tr>
        <tr>
          <td>No.</td>
          <td>Unit</td>
         
          
        </tr>

        <?php include "connection.php";
        $client_id = $_GET['client_id'];
        $ris = "2";
        $total_price = 0;
        $stat = "3";
        $query = mysqli_query($conn, "select * from `cart` join stocks on stocks.s_id = cart.item_id
        where stocks.int_typeid = $ris and cart.stat = '{$stat}' and cart.client_id = $client_id and cart.pr_no = $pr_no");
        while($row = mysqli_fetch_array($query))
        {
          $uprice = $row['unit_price'];
          $quantity = $row['quan'];
          $total = $uprice * $quantity;
          $total_price += $row['unit_price'] * $row['quan'];
          $getidcart = $row['idcart'];
          $loop_quan = $row['quan'];
         
        
      ?>
        
       
        <tr>
            <td> 
              
            <input type="hidden" name="idcart2[]" value="<?php echo $row['idcart'];?>"/>
              <input type="hidden" name="sup_aprvd2[]" value="<?php echo $datte;?>"/>
              <input type="hidden" name ="stat2[]" value="4"/>
              <input type="hidden" name="ss_id2[]" value="<?php echo $row['item_id'];?>"/>

              <input type="hidden" name="cli_id2[]" value="<?php echo $row['client_id'];?>"/><!--Custodian-->     
              <input type="hidden" name="orig_quan2[]" value="<?php echo $row['quantity'];?>"/><!--available quantity-->
              <input type="hidden" name="stats2[]" value="1"/><!--available quantity-->


             

            
            <td><?php echo $row['unit'];?></td>
            <td><a href="#" data-toggle="modal" data-target="#checkQuan<?=$row['s_id'];?>" >      <?php echo $row['brand']; echo " "; echo $row['stock_name'];?> <?php echo $row['description'];?></a></td>
            <td style = "text-align:right;">
            <?php
            if($row['quantity'] > 0)
            {
                echo '<input type="number" min="0" max="'.$row['quan'].'" name="quan2[]" value="'.$row['quan'].'" required="">';
            }
            else{
              echo '<input type="number" min="0" max="'.$row['quantity'].'" name="quan2[]" value="'.$row['quantity'].'" required="">';
            }

            ?>
           
          </td>
            <td style = "text-align:right;"><?php echo (number_format($row['unit_price'],2));?></td>
            <td style="text-align:right;"><?php echo (number_format($total,2));?></td>
            
        </tr>
 
   
    <?php

include "modal-check-iquan.php";
    }
   



    ?>
      <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><b>ABC:</b></td>
      <td style="text-align:right;"><?php echo (number_format($total_price,2)) ;?></td>    
      </tr>
      <?php include "connection.php";
        
        
        $query = mysqli_query($conn, "select * from `cart` where idcart = $getidcart");
        while($row = mysqli_fetch_array($query))
        {
          $getpurpose2 = $row['purpose'];
        }
         
        
      ?>

      <tr>
        <td>Purpose:</td>
        <td colspan="4" style="border-bottom:2px solid black;"><?php echo $getpurpose2;?></td>
        <td></td>  
      </tr>

      <tr>
        <td><span class="white">sdf</span></td>
        <td colspan="4" style="border-bottom:2px solid black;"><span class="white">fsdf</span></td>
        <td><span class="white">dfd</span></td>    
      </tr>

      <tr>
        <td> <span class="white">sd</span></td>
        <td colspan="4" style="border-bottom:2px solid black;"><span class="white"></span></td>
        <td><span class="white"></span></td>      
      </tr>

      <tr>
        <td><span class="white">asdf</span></td>
      </tr>

      <tr> 
        
        <td></td>
        <td>Requested by:</td>
        <td></td>
        <td>Approved by:</td>
        <td></td>
        <td></td>


      </tr>

      <tr>
        <td>Signature:</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td >Printed Name:</td>
        <td style="text-align:center;border-bottom:2px solid black;"><span style="text-transform:uppercase;"><?php echo $getname;?></span></td>
        <td></td>
        <td style="text-align:center;border-bottom:2px solid black;"><span style="text-transform:uppercase;"><?php echo $dir_name;?></span></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>Designation:</td>
        <td style="text-align:center;border-bottom:2px solid black;"><span><?php echo $getdesig;?></span></td>
        <td></td>
        <td style="text-align:center;border-bottom:2px solid black;"><span><?php echo $director;?></span></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td rowspan="6"><span class="6"></span></td>
      </tr>


     </table>

      </div>
      <div class="card-body"  style="border-radius:5px;border:1px solid #eded;border-top:none;
        border-top-left-radius:0px;border-top-right-radius:0px;margin-left:5%;margin-right:5%;
         "> 
         <div class="row">
          <div class="col">
          <button type="submit" onclick = "return confirm('Are you sure you want to approve this request? Click `Ok` to Proceed.')" name="request" id="proceedris">Approve Request</button>
  </form>
        </div>
        </div>
      </div>
      </div>
  </div>







      </div>
      </div>
            
      </section>

<!-- script for tabs-->
<script src="assets/js/script.js"></script>

 

 

 
</body>
</html>
