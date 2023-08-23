<?php 
include "accrole.php";
include "a-session.php";
?>

<?php 
  $sta = "waiting";
  $numorder = "SELECT * FROM orders WHERE remarks = '$sta'";

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
  #allorders, #acceptedorders{
    padding:12px 13px;
    background:white;
    border:none;
    font-size:15px;
    outline:none;
    color:grey;
    width:100%;
    margin-bottom:-22px;
   }
</style>

<body style="background:whitesmoke;">
 <!--Side bar-->
 <?php
      require_once "a-sidebar.php";
      require_once "modal_adduser.php";
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


          <div class="col" style=""> 
            <?php require_once "quicktool.php";?>
            <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;border:1px solid #ededed;margin-top:2%;margin-left:10%;margin-right:10%;">

          <div class="row">

          <div class="col" style="margin-left:-1.5%;">
          <button type="button" id="allorders"><i class='bx bx-cart' id="icart" style="font-size:30px;"></i><br>All Orders</button>
          </div>
          <div class="col" style="margin-right:-1.5%;">
          <button type="button" id="acceptedorders"><i class='bx bx-cart-alt' id="iorder" style="font-size:30px;"></i><br>Accepted Orders</button>
          </div>

          </div>

          </div>
          <div id="allorders-div">
                 <div class="card-body"  style="background:#f9f9f9;border-radius:0px;border-bottom-left-radius:0px;
                 border-bottom-right-radius:0px;
                 border:1px solid #ededed;border-bottom:none;margin-left:10%;margin-right:10%;">
                 <h4>All Orders</h4>
                </div>
                

                <?php
                if ($allorder == 0){
                  echo '<div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;">
                  <div class="row">
                  <div class="col">
                  </div>
                  <div class="col" style="text-align:center;">
                  <img src="image/ec.jpg" style = "oject-fit:cover;"><br><br>
                  <br><span style="color:grey;">There are no orders.</span><br><br><br>
                  </div>
                  <div class="col">
                  </div>
                  </div>
                  
                  </div>';
                }

                ?>

                <?php include "connection.php";
                  
               $remarks = "waiting";
                $query=mysqli_query($conn,"select * from `orders` join stocks on stocks.s_id=orders.item_id join clients on clients.id=orders.client_id where orders.remarks = '$remarks'");
                  while($row=mysqli_fetch_array($query))
                      {
                                      
                         $orderID = $row['orderid'];
                             
              
                      ?>
                <a href="a-accept.php?orderid=<?php echo $row['orderid']?>">
                <div class="card-body" style="border:1px solid #ededed; border-radius:0px;margin-right:10%;margin-left:10%;
               ">
                
                <div class="row">
                  <div class="col">
                  <span style="color:grey;font-size:12px;"><?php echo $row['date_ordered']; echo " "; echo $row['order_time'];?></span><br><br>
                  <img src="<?php echo $row['profile']; ?>"  style="object-fit:cover;border-radius:50px;" width="50px" height="50px">
                  <span style="color:#4286f4;"><?php echo $row['fullname'];?></span><br>

                  </div>

                  <div class="col">
                  <img src="<?php echo $row['photo']; ?>"  style="object-fit:cover;border-radius:5px;" width="100px" height="100px">
                  </div>

                  <div class="col">
                   <span><?php echo $row['remarks'];?></span>
                  </div>

                </div>
                </div>
                </a>
               
               
                <?php
                                    }
                                    ?>
            
               
            </div>



          <div id="acceptedorders-div">
          <div class="card-body"  style="background:#f9f9f9;border-radius:0px;border-bottom-left-radius:0px;
                 border-bottom-right-radius:0px;
                 border:1px solid #ededed;border-bottom:none;margin-left:10%;margin-right:10%;">
          <h4>Accepted Orders</h4>
          </div>
                
                <?php
                if ($noaccept == 0){
                  echo '<div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;">
                  <div class="row">
                  <div class="col">
                  </div>
                  <div class="col" style="text-align:center;">
                  <img src="image/ec.jpg" style = "oject-fit:cover;"><br><br>
                  <br><span style="color:grey;">No Accept Orders for Now.</span><br><br><br>
                  </div>
                  <div class="col">
                  </div>
                  </div>
                  
                  </div>';
                }

                ?>

<?php include "connection.php";
                  
                  $s = "accepted";
                   $query=mysqli_query($conn,"select * from `orders` join stocks on stocks.s_id=orders.item_id join clients on clients.id=orders.client_id where orders.remarks = '$s'");
                     while($row=mysqli_fetch_array($query))
                         {
                                         
                            $orderID = $row['orderid'];
                                
                 
                         ?>
                   <a href="a-accept.php?orderid=<?php echo $row['orderid']?>">
                   <div class="card-body" style="border:1px solid #ededed; border-radius:0px;margin-right:10%;margin-left:10%;
                  ">
                   
                   <div class="row">
                     <div class="col">
                     <span style="color:grey;font-size:12px;"><?php echo $row['date_ordered']; echo " "; echo $row['order_time'];?></span><br><br>
                     <img src="<?php echo $row['profile']; ?>"  style="object-fit:cover;border-radius:50px;" width="50px" height="50px">
                     <span style="color:#4286f4;"><?php echo $row['fullname'];?></span><br>
   
                     </div>
   
                     <div class="col">
                     <img src="<?php echo $row['photo']; ?>"  style="object-fit:cover;border-radius:5px;" width="100px" height="100px">
                     </div>
   
                     <div class="col">
                      <span><?php echo $row['remarks'];?></span>
                     </div>
   
                   </div>
                   </div>
                   </a>
                  
                  
                   <?php
                                       }
                                       ?>
                

          </div>
          </div><!-- end col-->

        
      </div><!-- end row-->

    
   </div>
    
  </div>
 
  <!--End container fluid dashboard-->
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 
 <script>
  //when cart btn is clicked
  const cart = document.getElementById("allorders");

  //change to grey btn
 
  const orders = document.getElementById("acceptedorders");


  //divs to hide

  const mycart = document.getElementById("allorders-div"); //un read div

  //divs to show
  const myorder = document.getElementById("acceptedorders-div"); //recent 
  
  const icart = document.getElementById("icart");
  const iorder = document.getElementById("iorder");

  myorder.style.display="none";
  cart.onclick = function(){
   //divs
   
    myorder.style.display="none";
    mycart.style.display = "block";

    //buttons
    cart.style.color = "#e34836";
    icart.style.fontSize="40px";
    //cart.style.borderBottom="3px solid #e05a00";
   
    orders.style.color="grey";
    iorder.style.fontSize="30px";
    
    //orders.style.borderBottom = "none";
    
  };

  </script>


<script>
  //when orders btn is clicked
  const orders1 = document.getElementById("acceptedorders");

  //change to grey btn
 
  const cart1 = document.getElementById("allorders");


  //divs to hide

  const mycart1 = document.getElementById("allorders-div"); //un read div

  //divs to show
  const myorder1 = document.getElementById("acceptedorders-div"); //recent div

  const icart1 = document.getElementById("icart");
  const iorder1 = document.getElementById("iorder");




  orders1.onclick = function(){
   //divs
   
    myorder1.style.display="block";
    mycart1.style.display = "none";

    //buttons
    orders1.style.color = "#e34836";
    iorder1.style.fontSize = "40px";
    //orders1.style.borderBottom="3px solid #3fd672";
   
    cart1.style.color="grey";
    icart1.style.fontSize = "30px";
    //cart1.style.borderBottom = "none";
    
  };

  </script>

<script>
  const cartt = document.getElementById("allorders");
  const divv = document.getElementById("allorders-div");
  const icon = document.getElementById("icart");

  if(divv.style.display = "block"){
    cartt.style.color="#e34836";
    icon.style.fontSize="40px";
    //cartt.style.borderBottom="3px solid #e05a00 ";
  }

</script>
 
</body>
</html>
