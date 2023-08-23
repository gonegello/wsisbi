<?php
//get user information
include "cli-session.php";
	?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Notification</title>

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
table {

  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-top:2%;
  margin-bottom:2%;
  margin-right:10%;
  margin-left:10%;
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

.subs{
  float:left;
  font-size:13px;
  color:grey;
}
.desig{
  font-size:12px;
  font-style:italic;
  float:left;
}
  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>

<?php 

      //get purchase request information from office head notification
         $h_id = $_GET['h_id'];
         $client_id = $_GET['client_id'];


         $query=mysqli_query($conn,"select * from `clients`where id = $h_id");
         while($row=mysqli_fetch_array($query))
        {
            $getheadname = $row['fullname'];
            $getdesig = $row['designation'];
            $getoffice = $row['office'];
        
        }    
        
        $qry = mysqli_query($conn, "select * from `clients` where id = $client_id");
        while($row=mysqli_fetch_array($qry))
        {

        }
 ?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

      <!-- first card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-left:10%;margin-right:10%;margin-top:3%;"> 
      <h4> Track My Purchase Request</h4>  
      </div>

     
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-left:10%;margin-right:10%;border-top:none;">
      <span>Request Date:</span><br>
     
      <table>

      <tr>
       
        <th>Request Details</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      
      <?php include "connection.php";
    $client_id = $_GET['client_id'];
    $r_date = $_GET['r_date'];
    $status = $_GET['stat'];
    $total_price = 0;
    
    $query = mysqli_query($conn, "select * from `cart` join stocks on stocks.s_id = cart.item_id
        where cart.r_date = '{$r_date}' and cart.client_id = $client_id");
        while($row = mysqli_fetch_array($query))
        {
          $hd_approve = $row['hd_aprvd'];
          $total = $row['quan'] * $row['unit_price'];
          $total_price += $row['unit_price'] * $row['quan'];
          $dd_approve = $row['dd_aprvd'];


?>
<tr>
  
  <td><?php echo $row['quan']; echo " "; echo $row['unit']; echo " "; echo $row['brand']; echo " "; echo $row['description']; echo " "; echo $row['stock_name'];?> </td>
  <td><?php echo (number_format($row['unit_price'],2));?></td>
  <td><?php echo (number_format($total,2));?></td>
</tr>


       
      <?php

        }
        ?>
        <tr>
          <td></td>
          <td style="font-weight:bold;">Purchase Cost :</td>
          <td style="font-weight:bold;"><?php echo (number_format($total_price,2));?></td>

        </tr>
        </table>

        <div class="row" style="margin-top:8%;margin-bottom:3%;">
          <div class="col" style="text-align:center;">
            <h5 style="color:grey;">Purchase Request Status</h5>
          </div>
        </div>


          <?php //if status of purchase request is 3 director approved

          if($status == "3")
          {
            echo '
            <div class="row" style="margin-right:10%;margin-left:10%;margin-bottom:10%;">
          <div class="col" style="text-align:center;">
        
          <i class="bx bx-paper-plane" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
          <h6 style="color:#3fd672;font-size:15px;">REQUESTED</h6><br>
          <span class="subs">'.$r_date.'</span>
          <span class="subs"><a href="#">'.$fullname.'</a></span>
          <span class="desig">'.$designation.'</span>

          </div>

          <div class="col" style="text-align:center;">
         <hr style="margin-top:17%;border-color:#3fd672;">
          </div>

          <div class="col" style="text-align:center;">
        <i class="bx bx-user" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DEPARTMENT HEAD</h6><br>
            <span class="subs">'.$hd_approve.'</span>
            <span class="subs"><a href="#">'.$getheadname.'</a></span>
            <span class="desig">'.$getdesig.'</span>
           

          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;border-color:#6ac46a;">
          </div>

        <div class="col" style="text-align:center;">
        <i class="bx bx-envelope-open"style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DIRECTOR</h6><br>
        <span class="subs">'.$dd_approve.'</span>
        <span class="subs"><a href="#">'.$dir_name.'</a></span>
        <span class="desig">'.$director.'</span>


        


          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-box" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">SUPPLY OFFICE</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-user-check" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">ACQUIRED</h6>
          </div>

      </div>
            
            
            ';
          }



          //if status is 2 head approved
                 
          if($status == "2")
          {
            echo '
            <div class="row" style="margin-right:10%;margin-left:10%;margin-bottom:10%;">
          <div class="col" style="text-align:center;">
        
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
          <h6 style="color:#3fd672;font-size:15px;">REQUESTED</h6><br>
          <span class="subs">'.$r_date.'</span>
          <span class="subs"><a href="#">'.$fullname.'</a></span>
          <span class="desig">'.$designation.'</span>

          </div>

          <div class="col" style="text-align:center;">
         <hr style="margin-top:17%;border-color:#ededed;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DEPARTMENT HEAD</h6><br>
            <span class="subs">'.$hd_approve.'</span>
            <span class="subs"><a href="#">'.$getheadname.'</a></span>
            <span class="desig">'.$getdesig.'</span>
           

          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;border-color:#ededed;">
          </div>

        <div class="col" style="text-align:center;">
        <i class="bx bx-envelope-open"style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">DIRECTOR</h6><br>
        
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-box" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">SUPPLY OFFICE</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-user-check" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">ACQUIRED</h6>
          </div>

      </div>
            
            
            ';
          }



          //if status is 1 requested

                 
          if($status == "1")
          {
            echo '
            <div class="row" style="margin-right:10%;margin-left:10%;margin-bottom:10%;">
          <div class="col" style="text-align:center;">
        
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
          <h6 style="color:#3fd672;font-size:15px;">REQUESTED</h6><br>
          <span class="subs">'.$r_date.'</span>
          <span class="subs"><a href="#">'.$fullname.'</a></span>
          <span class="desig">'.$designation.'</span>

          </div>

          <div class="col" style="text-align:center;">
         <hr style="margin-top:17%;border-color:#ededed;">
          </div>

          <div class="col" style="text-align:center;">
        <i class="bx bx-user" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">DEPARTMENT HEAD</h6><br>
            
           

          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;border-color:#ededed;">
          </div>

        <div class="col" style="text-align:center;">
        <i class="bx bx-envelope-open"style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">DIRECTOR</h6><br>
        


        


          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-box" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">SUPPLY OFFICE</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-user-check" style="color:#ededed;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#ededed;font-size:15px;">ACQUIRED</h6>
          </div>

      </div>
            
            
            ';
          }


          if($status == "4")
          {
            echo '
            <div class="row" style="margin-right:10%;margin-left:10%;margin-bottom:10%;">
          <div class="col" style="text-align:center;">
        
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
          <h6 style="color:#3fd672;font-size:15px;">REQUESTED</h6><br>
          <span class="subs">'.$r_date.'</span>
          <span class="subs"><a href="#">'.$fullname.'</a></span>
          <span class="desig">'.$designation.'</span>

          </div>

          <div class="col" style="text-align:center;">
         <hr style="margin-top:17%;border-color:#ededed;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DEPARTMENT HEAD</h6><br>
            <span class="subs">'.$hd_approve.'</span>
            <span class="subs"><a href="#">'.$getheadname.'</a></span>
            <span class="desig">'.$getdesig.'</span>
           

          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;border-color:#ededed;">
          </div>

        <div class="col" style="text-align:center;">
        <i class="bx bx-check"style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DIRECTOR</h6><br>
        
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">SUPPLY OFFICE</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bxs-truck" style="color:grey;font-size:50px;padding:10px 10px;"></i><br><br>
        <h6 style="color:grey;font-size:15px;">FOR PICK-UP!</h6>
          </div>

      </div>
            
            ';

          }

          
          if($status == "5")
          {
            echo '
            <div class="row" style="margin-right:10%;margin-left:10%;margin-bottom:10%;">
          <div class="col" style="text-align:center;">
        
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
          <h6 style="color:#3fd672;font-size:15px;">REQUESTED</h6><br>
          <span class="subs">'.$r_date.'</span>
          <span class="subs"><a href="#">'.$fullname.'</a></span>
          <span class="desig">'.$designation.'</span>

          </div>

          <div class="col" style="text-align:center;">
         <hr style="margin-top:17%;border-color:#ededed;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DEPARTMENT HEAD</h6><br>
            <span class="subs">'.$hd_approve.'</span>
            <span class="subs"><a href="#">'.$getheadname.'</a></span>
            <span class="desig">'.$getdesig.'</span>
           

          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;border-color:#ededed;">
          </div>

        <div class="col" style="text-align:center;">
        <i class="bx bx-check"style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">DIRECTOR</h6><br>
        
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-check" style="color:#3fd672;font-size:30px;border:1px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">SUPPLY OFFICE</h6>
          </div>

          <div class="col" style="text-align:center;">
          <hr style="margin-top:17%;">
          </div>

          <div class="col" style="text-align:center;">
          <i class="bx bx-check" style="color:#3fd672;font-size:60px;font-weight:bold;padding:10px 10px;"></i><br><br>
        <h6 style="color:#3fd672;font-size:15px;">RECEIVED</h6>
          </div>

      </div>
            
            ';
          }



          ?>

           </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
