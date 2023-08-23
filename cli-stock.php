<?php
include "cli-session.php";
include "cli-count.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
  <title>Stockroom</title>
  <?php include "cli-linkstyle.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
    #search_cli-stock{
      border-radius:50px;
      margin-top:1%;
      margin-bottom:1%;
      width:70%;
      background:whitesmoke;
      background-image:url('image/search.png');
      background-size:25px;
      background-repeat:no-repeat;
      background-position:95%;
    }
    #search_cli-stock:focus{
      background:white;
      background-image:url('image/search.png');
      background-size:25px;
      background-repeat:no-repeat;
      background-position:95%;

    }
  </style>

<body style="background:whitesmoke;">
<?php require_once "c-sidebar.php";?><!--Side bar-->
  <section class="home-section">
  <div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow" style="background-color:whitesmoke;">

  <?php //Display if added to cart successfully
  if(isset($_SESSION['added']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['added'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['added']);
  }
  ?>
    
      <div class="row"><!-- row container-->
      <div class="col">

      <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;
      border:1px solid #ededed;margin-top:1%;margin-left:10%;margin-right:10%;">
      <div class="row">

      <div class="col" style="margin-left:-1.5%;">    
      <button type="button" id="cart"><i class='bx bx-package' id="icart" style="font-size:30px;"></i><br>RIS</button>
      </div>
      <div class="col" style="margin-right:-1.5%;">
      <button type="button" id="orders"><i class='bx bx-box' id="iorder" style="font-size:30px;"></i><br>ICS</button>
      </div>

      </div>
      </div><!-- end first card body containing nav buttons-->

      <a href="cli-order.php" id="cartfloat" title="my cart" target="_self"><i class='bx bx-cart' style="font-size:30px;"><?php if($carty > 0) {echo'<span style="font-size:15px;color:red;font-weight:bold;margin-top:-5px;">'.$carty.'</span>';}?></i></a>
      
      <div id = "div-ris">
      <div class="card-body" style="border-radius:0px;border:1px solid #ededed;border-bottom:none;margin-left:10%;margin-right:10%;">

      <div class="row">
      <div class="col">
        <h4>RIS</h4>
      </div>
      <div class="col">
        <input type="text" id="search_cli-stock" style="float:right;" placeholder="Search Item..">
      </div>
      </div>
      
      </div>

           
      <div class="card-body" style="border-radius:0px;border:1px solid #ededed;margin-left:10%;margin-right:10%;">
      <div class="row" style="margin-top:2%; background:white;" ><!-- item row-->
        
        <?php include "connection.php";
                $peso = "Php. ";
                $sscon = "0";
                $ris = "2";
                $query=mysqli_query($conn,"select * from `stocks` where int_typeid = '$ris' and sscon = '$sscon'");
                while($row=mysqli_fetch_array($query))
                {
                    
                    $arr= array($row['brand'], $row['stock_name'], $row['description']);
                    $description = $row['description'];
                    $jj = join(" ",$arr);

                    if (strlen($jj) > 20)
                    $jj = substr($jj, 0, 25) . '...';
        ?>
            <div class="col"  id='stockss'> <!-- stock list  for ris-->
            <div class="card-body" style="border:1px solid #ededed;border-bottom:none;
            border-top-left-radius:10px;border-top-right-radius:10px;">
            <img src="<?php echo $row['photo']; ?>" id="store" style="object-fit:cover;" width="200px" height="200px"><br>

                <?php //display item status with color indication
                if($row['status'] == "available")
                {
                  echo '<span style="float:right;color:white;border-radius:5px;background:green;
                  padding:5px 5px;font-size:12px;">'.$row['status'].'</span>';
                }
                else{
                  echo '<span style="float:right;color:white;border-radius:5px;background:red;
                  padding:5px 5px;font-size:12px;">'.$row['status'].'</span>';
                }
                ?>
            </div>
                
            <div class="card-body" style="border:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;
            margin-bottom:10%;border-top:1px solid #d3d3d2;text-align:left;">
            <span style="font-size:20px;margin-top:-7%;color:#e05a00;">Stock Left : <?php echo $row['quantity']; echo " "; echo $row['unit'];?></span><br>
            <span style="margin-bottom:-10%;"><a href="#addtocartmodal" style="color:rgb(40,40,40);" data-toggle="modal" 
            data-target="#addtocartmodal<?php echo $row['id'];?>"> <?php echo $jj;?></a></span>
            <span style="font-size:15px;color:grey;"><?php ?></span><br>

              <?php
              if($row['status'] == "out-of-stock")
              { 
              echo
                '<span >
                  <a href="#addtocartmodal" style="background:whitesmoke;color:grey;" id="add2cart" data-toggle="modal" data-target="#addtocartmodal">Add to Cart</a>
                </span>';
              }
              else
              {
              echo
              '<a href="#addtocartmodal"  id="add2cart" data-toggle="modal" data-target="#addtocartmodal'.$row['s_id'].'">Add to Cart</a>
              ';
              }
              ?>
              </div>
              </div><!-- end Col for stock list for ris -->
              
              <?php
                 include "modal-addtocart.php";
              }
              ?>

          </div>
          </div>
          </div><!-- end div ris -->


          <div id="div-ics"><!-- div ics -->
          <div class="card-body" style="border-radius:0px;border:1px solid #ededed;margin-left:10%;margin-right:10%;">
          <div class="row">
          <div class="col">
          <h4>ICS</h4>
          </div>
          <div class="col">
          <input type="text" id="search_cli-stock" style="float:right;" placeholder="Search Item..">
          </div>
          </div> 
          </div>

          <div class="card-body" style="border-radius:0px;border:1px solid #ededed;margin-left:10%;margin-right:10%;">
          <div class="row" style="margin-top:2%; background:white;" > <!-- item row-->
          <?php include "connection.php";
                $peso = "Php. ";
                $ics = "1";
                $sscon = "0";
                $query=mysqli_query($conn,"select * from `stocks` where int_typeid = '$ics'");
                  while($row=mysqli_fetch_array($query))
                  {
                    
                    $arr= array($row['brand'], $row['stock_name'], $row['description']);
                    $description = $row['description'];
                    $jj = join(" ",$arr);

                    if (strlen($jj) > 20)
                    $jj = substr($jj, 0, 25) . '...';

          ?>
              <div class="col"  id='stockss'> <!-- stock list  for ris-->
              <div class="card-body" style="border:1px solid #ededed;border-bottom:none;border-top-left-radius:10px;border-top-right-radius:10px;">
              <img src="<?php echo $row['photo']; ?>" id="store" style="object-fit:cover;" width="200px" height="200px">
              </div>

              <div class="card-body" style="border:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;
              margin-bottom:10%;border-top:1px solid #d3d3d2;text-align:left;">
              <span style="font-size:20px;margin-top:-7%;color:#e05a00;">Stock Left : 
              <?php echo $row['quantity']; echo " "; echo $row['unit'];?></span><br>
              <span style="margin-bottom:-10%;"><a href="#addtocartmodal" style="color:rgb(40,40,40);" data-toggle="modal" 
              data-target="#addtocartmodal<?php echo $row['s_id'];?>"></a></span>
              <span style="font-size:15px;color:grey;"><?php ?></span><br>     

              <?php
              if($row['status'] == "available")
              {
                  echo '<span style="color:grey;font-size:12px;">'.$row['status'].'</span>';
              }
              else
              {
                  echo '<span style="color:grey;font-size:12px;">'.$row['status'].'</span>';
              }
              ?>

              <?php
              if($row['status'] == "out-of-stock")
              { 
                echo
                '<span >
                  <a href="#addtocartmodal" style="background:whitesmoke;color:grey;" id="add2cart" data-toggle="modal" data-target="#addtocartmodal">Add to Cart</a>
                </span>';
              }
              else
              {
                  echo'
                  <a href="#addtocartmodal"  id="add2cart" data-toggle="modal" data-target="#addtocartmodal'.$row['s_id'].'">Add to Cart</a>
                  ';
              }
              ?>
              </div>
              </div><!-- end Col for stock list for ris -->
              
              <?php
                 include "modal-addtocart.php";
              }
              ?>

              </div>
              </div>

          </div><!-- end div ics-->
          </div><!-- end col container-->
          </div><!-- end row container-->
        
          </div>
          </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
  //when cart btn is clicked
  const cart = document.getElementById("cart");

  //change to grey btn
 
  const orders = document.getElementById("orders");


  //divs to hide

  const ris = document.getElementById("div-ris"); //un read div

  //divs to show
  const ics = document.getElementById("div-ics"); //recent 
  
  const icart = document.getElementById("icart");
  const iorder = document.getElementById("iorder");

  ics.style.display="none";
  cart.onclick = function(){
   //divs
   
    ics.style.display="none";
    ris.style.display = "block";

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

  const ics1 = document.getElementById("div-ics"); //un read div

  //divs to show
  const ris1 = document.getElementById("div-ris"); //recent div

  const icart1 = document.getElementById("icart");
  const iorder1 = document.getElementById("iorder");




  orders1.onclick = function(){
   //divs
   
    ics1.style.display="block";
    ris1.style.display = "none";

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
  const divv = document.getElementById("div-ris");
  const icon = document.getElementById("icart");

  if(divv.style.display = "block"){
    cartt.style.color="#e34836";
    icon.style.fontSize="40px";
    //cartt.style.borderBottom="3px solid #e05a00 ";
  }

</script>



 

 
</body>
</html>
