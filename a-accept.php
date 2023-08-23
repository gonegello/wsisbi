<?php 
include "accrole.php";
include "a-session.php";
?>

<?php 
  
  $numorder = "SELECT * FROM orders ORDER BY date_ordered";

  if($oo = mysqli_query($conn,$numorder))
  {
      $allorder=mysqli_num_rows($oo);
  }
 

  ?>
   <?php include('connection.php');
    $rem="accepted";
    $query = "SELECT * FROM orders WHERE remarks = '$rem'";

    if($result=mysqli_query($conn,$query))
    {
      $noaccept=mysqli_num_rows($result);
    }

    ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <?php include "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<style>
 #accept{
     padding:10px 13px;
     background:#50C878;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
 }
 #accept:hover{

 }
 #decline{
     padding:10px 13px;
     background:#dc4b41;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
 }
 #declined{
     padding:10px 13px;
     background:whitesmoke;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
 }
 #issue{
     padding:10px 13px;
     background:#50C878;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
 }
 #accept:hover{

 }
</style>

<body style="background:whitesmoke;">
 <!--Side bar-->
 <?php
      require_once "a-sidebar.php";
    
    ?>
    <!-- end of side bar-->


    <section class="home-section">
      <!-- nav tool bar top-->
    
      <!-- end nav tool-->

 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
  <div class="card-shadow">
     <!--Card header-->
     <div class="row">
         <div class="col">

         <?php 
         $orderid = $_GET['orderid'];

         $query=mysqli_query($conn,"select * from `orders` join stocks on stocks.s_id=orders.item_id join clients 
         on clients.id=orders.client_id where orders.orderid = $orderid");
         while($row=mysqli_fetch_array($query))
        {
            $fu = $row['fullname'];
            $prof = $row['profile'];
            $phot = $row['photo'];
            $dateo = $row['date_ordered'];

            $order_quan = $row['order_quan'];
            $unit = $row['unit'];
            $unit_price = (number_format($row['unit_price'],2));
            $off = $row['office'];
            $desig = $row['designation'];
            $tim = $row['order_time'];
            $stock = $row['stock_name'];
            $brand = $row['brand'];
            $desc = $row['description'];
            $amount = (number_format($row['order_amount'],2));
            

            $stock_quan = $row['quantity'];
            $stock_id = $row['s_id'];

            $remark = $row['remarks'];

            

        }              
        ?>
         <div class="card-body" style="border-top-left-radius:10px;
         border-top-right-radius:10px;border:1px solid #ededed;background:#f9f9f9;margin-top:2%;margin-left:20%;margin-right:20%;">
         <div class="row">
             <div class="col">
             <img src="<?php echo $prof; ?>"  style="object-fit:cover;border-radius:50px;" width="50px" height="50px">
            <span><?php echo $fu;?></span>
            
             </div>
             <div class="col">
                
                <?php
                include "connection.php";
                $qur=mysqli_query($conn,"select * from `orders` where orderid = $orderid");
                while($row=mysqli_fetch_array($qur))
                {
                    $rem = $row['remarks'];
                }

                if($rem == "accepted"){
                    echo '<span style="float:right;padding:10px 13px;border:1px solid green;border-style:dashed;color:green;
                    "> Accepted </span>';
                }
                else if($rem == "declined"){
                    echo '<span style="float:right;padding:10px 13px;border:1px solid #dc4b41;border-style:dashed;color:#dc4b41;
                    "> Declined </span>';
                }


                ?>
               

            

            
             </div>
         </div>
        
         </div>
         <div class="card-body" style="
         border:1px solid #ededed;border-top:none;margin-left:20%;margin-right:20%;">
         <div class="row">
             <div class="col"><br>
             <img src="<?php echo $phot; ?>"  style="object-fit:cover;border-radius:5px;
             box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" width="200px" height="200px">
             </div>
             <div class="col">
                <span>Item Details:</span>
             </div>
             <div class="col">
             <?php
             
            $chec = "accepted";
            $ck=mysqli_query($conn,"select * from `orders` where orderid = $orderid");
            while($row=mysqli_fetch_array($ck))
            {
                $get = $row['remarks'];
            }
            
            if($get == $chec)
            {
                echo '<label>Set Issuance Date : </label><br><input type="date" name="issue_date" required/><br>
                <label>Set Issuance Time : </label><br><input type="time" name="issue_time" required/>';

            }

            ?>
             </div>
         </div>
         <form method="post" action="a-accepted.php">
         <div class="row">
             <div class="col"><br><br>
                <span >Address : </span><br><br><br>
                 <span>Date : </span><br>
                 <span>Time : </span><br>
                 <span>Order Details :  </span><br><br>
                 <span>Amount :  </span><br><br>
                 <input type ="hidden" name="order_id" value="<?php echo $orderid;?>">
                 <input type ="hidden" name="stock_quan" value="<?php echo $stock_quan;?>">
                 <input type ="hidden" name="order_quan" value="<?php echo $order_quan;?>">
                 <input type ="hidden" name="stock_id" value="<?php echo $stock_id;?>">



                
                 
             </div>
             <div class="col"><br><br>
                <span style="text-transform:uppercase;"><?php echo $off; echo " Department";?></span>
                <br><span><?php echo $fu; echo " , "; echo $desig;?></span>
                <br><br>
                 <span> <?php echo $dateo;?></span><br>
                 <span> <?php echo $tim;?></span><br>
                 <span> <?php echo $order_quan; echo " "; echo $unit; echo " * "; echo "PHP. "; echo $unit_price;?>
                     <br><?php echo $brand; echo" "; echo $stock; echo " "; echo $desc;?></span><br>
                <span><?php echo "PHP. "; echo $amount;?></span><br><br>



             </div>
         </div>
         
         </div>
         <div class="card-body" style="
         border:1px solid #ededed;
         border-bottom-left-radius:10px;border-bottom-right-radius:10px;border-top:none;margin-left:20%;margin-right:20%;">
         <div class="row">
            <div class="col">

            </div>
            <div class="col">

            <?php
            $w = "waiting";
           $d = "declined";
            $ac = "accepted";
            $qur=mysqli_query($conn,"select * from `orders` where orderid = $orderid");
            while($row=mysqli_fetch_array($qur))
            {
                $re = $row['remarks'];
            }


            if($re == $w ){
                echo '<button type="submit" style="float:right;" name="accept" id="accept">Accept Order</button>
                <button type="submit" style="float:right;" name="decline" id="decline">Decline</button>';
            }

            if($re == $ac){
                echo '<button type="button" style="float:right;" name="issue" id="issue">  Done  </button>';
            }

            if($rem == $d){
                echo '<button type="button" style="float:right;" name="declined" id="declined">Canceled</button>';
            }

            ?>
            
            </form>
            </div>
         </div>
        
         </div>

         </div>
     </div>

      
    
   </div>
    
  </div>
 
  <!--End container fluid dashboard-->
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 
 
</body>
</html>
