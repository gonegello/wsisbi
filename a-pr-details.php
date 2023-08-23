<?php
include "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title></title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
.ar-link:hover{
    text-decoration:none;
}

table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse:collapse;
  width: 100%;
  margin-top:5%;
 
}

table td, table th {
  border:none;
  padding:14px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:transparent;
  color: black;
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
    

  <?php
  $getclientid = $_GET['client_id'];
  $getprno = $_GET['pr_no'];
  $getheadid = $_GET['h_id'];
  $getstat = $_GET['stat'];


  $query=mysqli_query($conn,"select * from `clients`where id = $getclientid");
  while($row=mysqli_fetch_array($query))
 {
     $getname = $row['fullname'];
     $getdesig = $row['designation'];
     $getoffice = $row['office'];
 
 }
 
 $query=mysqli_query($conn,"select * from `clients`where id = $getheadid");
  while($row=mysqli_fetch_array($query))
 {
     $headname = $row['fullname'];
     $head = $row['designation'];
     
 
 } 
 

  ?>

  
            

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-bottom:none;
    ;margin-top:3%;margin-left:10%;margin-right:10%;"> 
      
      <div class="row">

        <div class="col">
        <span style="color:grey;">Purchase Request No. <?php echo $getprno;?></span><br>
        <span><?php echo $getoffice;?></span>
        <h5><?php echo $getname;?></h5>
        
        </div>

        <div class="col" style="text-align:right;">
        <span style="color:grey;">Pr Status:</span>
        <?php
        if($getstat == "4")
        {
          echo '<span style="color:green;font-weight:bold;">For Pick Up!</span><br>
          <button type="button" name="setdate">Set Pick-up Date</button>';
          
        }


        ?>
        </div>
        
      </div>
      <table>
          <tr>
          <th>Item Details</th>
              <th>Request Quantity</th>
              <th>Approved Quantity</th>
              <th>Request Date</th>
              <th>Approved By</th>

</tr>
        <?php
        include "connection.php";

        
        $query = mysqli_query($conn, "select * from `cart` join stocks on stocks.s_id = cart.item_id
        where cart.client_id = $getclientid and pr_no = $getprno");
        while($row = mysqli_fetch_array($query))
        {

        ?>
        <tr>
        <td><?php echo $row['brand'];?><br><?php echo $row['stock_name'];?><br><?php echo $row['description'];?></td>
            <td><?php echo $row['quan'];?></td>
            <td><?php echo $row['app_quan'];?></td>
            <td></td>
            <td><?php echo $headname;?>
            <span style="font-style:italic;">( <?php echo $head;?> )</span> - 
            <?php echo $row['hd_aprvd'];?></td>
            



        </tr>

       

        <?php
        }
        ?>


    </table>


    <table>
        <tr>
            <th>Property Number</th>
            <th>Item Details</th>
    </tr>

    <?php
    $stats = "1";
     $query = mysqli_query($conn, "select * from `stock_pn` join stocks on stocks.s_id = stock_pn.stock_id
     join category on category.idcategory = stocks.category_id
     join clients on clients.id = stock_pn.custodian where stock_pn.custodian = $getclientid and stock_pn.stats is not null");
     while($row=mysqli_fetch_array($query))
     {

    ?>
    <tr>
        <td><?php echo $row['property_number'];?></td>
        <td><?php echo $row['brand'];?><br><?php echo $row['stock_name'];?><br><?php echo $row['description'];?></td>

     </tr>

    <?php

     }
     ?>



    </table>


    <table>
       
    <?php
    $stats = "1";
     $query = mysqli_query($conn, "select * from `stock_details` join stocks on stocks.s_id = stock_details.stock_id
     join category on category.idcategory = stocks.category_id
     join clients on clients.id = stock_details.custodian_id where stock_details.custodian_id = $getclientid and stock_details.stats is not null");
     while($row=mysqli_fetch_array($query))
     {

    ?>
    <tr>
        <td><?php echo $row['stock_number'];?></td>
        <td><?php echo $row['brand'];?><br><?php echo $row['stock_name'];?><br><?php echo $row['description'];?></td>

     </tr>

    <?php

     }
     ?>



    </table>
      </div>


     


     

      </div>
      </div>
            
  </section>
<!-- sidebar script-->
<script src="assets/js/script.js"></script>


 

 
</body>
</html>

