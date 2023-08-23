<?php

include "cli-session.php";  //client-session and other related information
include "cli-count.php";     //client all counted variables used  
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $username;?>'s Cart</title>
    <?php include "cli-linkstyle.php"; ?> <!--Client link styles scripts and css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<style>
 #checkout{
   background:#bc3f31;
   color:white;
   border:none;
   border-radius:5px;
   box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
 }
 #checkout:hover{
  backgrond:#dc4b41;
 }

 #sr{
   background:#bc3f31;
   padding:10px 13px;
   color:white;
   border:none;
   border-radius:5px;
   box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
 }
 #sr:hover{
  background:#dc4b41;
  text-decoration:none;

 }
 #on{
   background:#bc3f31;
   padding:10px 13px;
   color:white;
   border:none;
   border-radius:5px;
   box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
 }
 #on:hover{
  background:#dc4b41;
  text-decoration:none;
 }
 </style>


<body style="background:whitesmoke;">
<?php require_once "c-sidebar.php";?> <!--Side bar-->

<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">

      <?php 
          //if client request to department head is successful
          if(isset($_SESSION['requested']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Request Sent</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['requested'];?><?php echo $dept_head; echo " "; echo $head; echo " in "; echo $head_office;?></i>
              </div>
             
      <?php 
          unset($_SESSION['requested']);
            }
      ?>

      <?php 
      //if cart is updated
        if(isset($_SESSION['updated']))
            {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Updated</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['updated'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['updated']);
            }
      ?>

<?php 
      //if cart is updated
        if(isset($_SESSION['delCart']))
            {
      ?>
              <div class="alert alert-danger alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Deleted</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['delCart'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['delCart']);
            }
      ?>


      <div class="row">
      <div class="col">

      <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;border:1px solid #ededed;
      margin-top:2%;margin-left:10%;margin-right:10%;">

      <div class="row">
                <div class="col" style="margin-left:-1.5%;">
                <button type="button" id="cart"><i class='bx bx-cart' id="icart" style="font-size:30px;"></i><br>My Cart ( <?php echo $carty;?> )</button>
                </div>
                <div class="col" style="margin-right:-1.5%;">
                <button type="button" id="orders"><i class='bx bx-cart-alt' id="iorder" style="font-size:30px;"></i><br>My Orders</button>
                </div>
      </div>
      </div>

      <div id="mycart-div"  style="">

      <div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;background:#f9f9f9;
      color:white;border-bottom-left-radius:5px;border-bottom-right-radius:5px;">  
      
      <div class="row">
                <div class="col">  
                <h4 style="color:grey;"><?php echo $username;?>'s Cart</h4>
                </div> 
                <div class="col">
                <input type="text" id="searchcart" placeholder="Find in Cart.."/>
                </div>
                <div class="col">

                <?php //test if ris or ics is present in checkout
                if($ris_ > 0 && $ics_ > 0)
                {

                    echo '<a href="cli-sendrequest.php" id="checkout">Checkout('.$carty.')</a>';
                }
                else if($ris_ > 0 && $ics_ == 0)
                {
                  echo '<a href="cli-sendris.php" id="checkout">Checkout('.$carty.')</a>';
                }
                else if($ics_ > 0 && $ris_ == 0)
                {
                  echo '<a href="cli-sendics.php" id="checkout">Checkout('.$carty.')</a>';
                }
                
                ?>

                </div>
      </div>
      </div>

      <?php //if nothings in my cart display this
      if ($mycart == 0){
        echo '<div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;">
        <div class="row">
        <div class="col">
        </div>
        <div class="col" style="text-align:center;">
        <img src="image/ec.jpg" style = "oject-fit:cover;"><br><br>
        <br><span style="color:grey;">Nothings in your cart.</span><br><br><br>
        <a href="cli-stockroom.php" id="sr">Stockroom</a>
        </div>
        <div class="col">
        </div>
        </div>
        </div>';
      }

      ?>

      <?php //show my cart query
      include "connection.php";        
      $statt = "0";
      $query=mysqli_query($conn,"select * from `cart` left join stocks on stocks.s_id=cart.item_id where cart.client_id = '$id' and cart.stat ='$statt'");
                      while($row=mysqli_fetch_array($query))
                      {
                        $order_price = $row['unit_price'] * $row['quantity'];
                        
      ?>
          <div class="card-body" style="margin-left:10%;margin-right:10%;border:1px solid #ededed;border-top:none;border-radius:0px;">
          <div class="row">

          <div class="col">
          <span style="color:grey;font-size:12px;"><?php echo $row['datte'];?></span>
          <span style="color:grey;font-size:12px;"><?php echo $row['timee'];?></span><br>
          <img src="<?php echo $profile; ?>" style="object-fit:cover;border-radius:50%;" width="50px" height="50px"><br>
          <img src="<?php echo $row['photo']; ?>" id="store"  style="object-fit:cover;float:right;" width="200px" height="200px">
          </div>

          <div class="col">
          <div class="row">
          </div>
          <div class="row"><br>
          </div>
          <div class="row">
          <div class="col">
          </div>
          </div>
          </div>

          <div class="col"><br><br><br><br>
          <span><?php echo $row['brand'];?></span>
          <span><?php echo $row['stock_name'];?></span><br>
          <span> Description : <i><?php echo $row['description'];?></i></span>
            
            <?php //show item status in span color
            if($row['status']=="available"){
              echo '<br>Status : <span style="color:green;text-transform:capitalize;">'.$row['status'].'</span>';
            }
            else{
              echo '<br>Status: <span style="color:red;text-transform:capitalize;">'.$row['status'].'</span>';

            }
            ?>

            <br>
            <span>Order Quantity: <b><?php echo $row['quan'];?></b></span><br>
            <span>Unit Cost: Php. <?php echo (number_format($row['unit_price'],2));?></span><br>
            <span>Order Price: Php.  <b><?php echo (number_format($order_price,2));?></b></span>
          </div>

        
          <div class="col">
           
  
         
  
          <a onclick = "return confirm('Are you sure you want to delete this item?')" href="a-delCart.php?idcart=<?php echo $row['idcart'];?>" id="idelete" title="delete?">&nbsp;<i class='bx bx-trash'></i>&nbsp; </a>
          <a href="#checkoutmodal" title="edit?" data-toggle="modal" data-target="#editcart<?=$row['idcart']?>"
          id="icheckout">&nbsp;<i class='bx bx-edit'></i>&nbsp; </a>
        </div>
          
        </div> 
        </div>  

          <?php
          include "modal-editcart.php"; //pop up modal for editing cart item
          }
          ?>

        </div><!-- end mycart div-->


      <div id="myorder-div">

      <div class="card-body" style="border:1px solid #ededed;;margin-left:10%;
      margin-right:10%;background:#f9f9f9;color:white;">  
      <h4 style="color:grey;"><?php echo $username;?>'s Order</h4>
      </div>

      <?php
      if ($orders == 0){
        echo '<div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;">
        <div class="row">
        <div class="col">
        </div>
        <div class="col" style="text-align:center;">
        <img src="image/ec.jpg" style = "oject-fit:cover;"><br><br>
        <br><span style="color:grey;">You have no orders yet.</span><br><br><br>
        <a href="cli-stockroom.php" id="on">Order Now</a>
        </div>
        <div class="col">
        </div>
        </div>
        
        </div>';
      }

      ?>

      <?php include "connection.php"; //orders
      $query=mysqli_query($conn,"select * from `orders` left join stocks on stocks.s_id=orders.item_id where orders.client_id = '$id'");
      while($row=mysqli_fetch_array($query))
      {
      ?>

          <div class="card-body" style="margin-left:10%;margin-right:10%;border:1px solid #ededed;border-top:none;border-radius:0px;">
          <div class="row">
          
          <div class="col">
          <img src="<?php echo $row['photo']; ?>" id="store"  style="object-fit:cover;border-radius:50px;border:1px solid #ededed;" 
          width="100px" height="100px">
          </div>

          <div class="col">
          <span style="color:grey;font-size:13px;font-style:italic;">Order Code : </span>
          <span style="font-size:20px;">HCO<?php echo $row['orderid'];?></span><br>
          <span style="color:grey;font-size:13px;font-style:italic;">Order Details : </span>
          <span><?php echo $row['order_quan']; echo " "; echo $row['unit'];?></span>
          <span><?php echo $row['brand']; echo $row['stock_name'];?></span><br>
          <span style="color:grey;font-size:13px;font-style:italic;">Order Amount : </span>
          <span><?php echo (number_format($row['unit_price'],2));?></span>
          </div>

          <div class="col">
          <?php
          if($row['remarks'] == "waiting")
          {
          echo '<span>waiting for acceptance</span>';
          }
          ?>
          </div>

          </div>
          </div>

          <?php                   
          }
          ?>

        </div><!-- end my order div-->
        </div><!--end first col-->
        </div><!-- end row-->

        </div>
        </div>
            
        </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script>
 
  const cart = document.getElementById("cart");  //when cart btn is clicked
  const orders = document.getElementById("orders"); //change to grey btn
  const mycart = document.getElementById("mycart-div"); //un read div
  const myorder = document.getElementById("myorder-div"); //recent 
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
  const orders1 = document.getElementById("orders");
  //change to grey btn
  const cart1 = document.getElementById("cart");
  //divs to hide
  const mycart1 = document.getElementById("mycart-div"); //un read div
  //divs to show
  const myorder1 = document.getElementById("myorder-div"); //recent div
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
  const cartt = document.getElementById("cart");
  const divv = document.getElementById("mycart-div");
  const icon = document.getElementById("icart");

  if(divv.style.display = "block"){
    cartt.style.color="#e34836";
    icon.style.fontSize="40px";
    //cartt.style.borderBottom="3px solid #e05a00 ";
  }
</script>
 
</body>
</html>
