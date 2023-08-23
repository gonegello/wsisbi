<?php
include "cli-session.php";
include "xc-count.php";
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>  table {
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:20px;
  
}
table th{
    text-align:center;
    border:2px solid black;
    font-weight:bold;

    
    

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;


}
td{
    border:none;
}

input[type="number"]{
    border:none;
    border-radius:0px;
   border-bottom:1px solid #ededed;
    background:white;

}
#save{
    border:none;
    background:#77DD77;
    color:white;
    padding:12px 30px;
    border-radius:5px;
    float:right;
    margin-top:5%;
}
.stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }
.second{
    color:grey;
}
.second:hover{
    color:grey;
    text-decoration:none;
}

.cart{
    background:white;
    position:sticky;
    padding:12px;
}
  
  </style>
<?php
$idx = $_GET['idx'];
//get item details
$que=mysqli_query($conn,"select * from `xris` where idx = $idx");
while($rw=mysqli_fetch_array($que))
{
   $ar_id = $rw['sn_id'];
   $stock_im = $rw['stock_img'];
   $a_quan = $rw['a_quan'];
   
} 


$query=mysqli_query($conn, "select * from `fc` where ar_id = $ar_id ");
while($row = mysqli_fetch_array($query))
{
    $article = $row['article'];
    $descr = $row['descr'];

}
?>
<body style="background:whitesmoke;">

<!--Side bar-->


     <!--Card header-->
     <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><a href="xc-store.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a>
 <span style="font-size:20px;"> / <a href="#" class="second">
     <i class="bx bx-cart-add"></i> Add to cart <i><?php echo $article; echo " "; echo $descr;?></i> </a></span></h1>

 </div>
        

 
     <div class="row" style="margin-top:5%;margin-left:15%;margin-right:15%;">
     <div class="col">
    <form method="post" action="xc-addreq.php">
     <div class="card-body" style="border:1px solid #ededed;border-top-left-radius:10px;border-top-right-radius:10px;text-align:right;">
     <a href="xc-myreq.php" id="cart" title="my cart" target="_self">My Cart <i class='bx bx-cart' style="font-size:30px;color:royalblue;border-radius:none;"></i>
<?php

if($myreq > 0)
{
  echo '<span style="font-size:15px;">'.$myreq.'</span>';
}


?>
</a>
     </div>

     <div class="card-body" style="margin-left:border:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;border-top:none;border:1px solid #ededed;border-top:none;">
         <div class="row">
             <div class="col">
             <h2 style="margin-left:2%;"><?php echo $article;?> <span style="color:grey;font-style:italic;"><?php echo $descr;?><span> </h2>
             </div>
         </div>
     
     
     <div class="row">
             <div class="col">
                <img src="<?php echo $stock_im;?>" style="object-fit:cover;" width="300px" height="300px">
             </div>

             <div class="col">
                 <div class="row">

                 
                 <span>Status:<span><br>
                 <span>
                     <?php
                     if($a_quan > 0)
                     {
                         echo '<span style="color:green;font-size:20px;">IN-STOCK</span>';
                     }
                     else{
                        echo '<span style="color:red;font-size:20px;">OUT-OF-STOCK</span>';
                        
                     }

                     ?>
                     
                 <span>


             </div>

             <div class="row" style="margin-top:20%;">
             <label for="req_quan" style="color:black;">Request Item:</label>
                     <input type="number" name="req_quan" id="req_quan" max="<?php echo $a_quan;?>" min="1" style="font-size:20px;border:1px solid #ededed;color:#77DD77;" value="1">
                     <input type="hidden" name="client_id" id="client_id" value="<?php echo $id;?>">
                     <input type="hidden" name="item_id" id="item_id" value="<?php echo $idx;?>">
                     <input type="hidden" name="item_name" id="item_name" value="<?php echo $article;?>">
             </div>


             </div>
             <div class="col">


            <div class="row">
             <span>Stock Remaining:<span><br>
             <span style="color:green;font-size:20px;"><?php echo $a_quan;?></span>
             </div>


             <div class="row" style="margin-top:25%;">
             <?php
             if($a_quan > 0)
             {
                 echo ' <input type="submit" name="save" id="save" value="ADD To CART">';
             }
             if($a_quan == 0)
             {
                echo '<input type="submit" style="background:#F0F0F0" name="save" id="save" value="OUT OF STOCK" disabled>';
             }

             ?>
            
             </div>


             </div>
         </div>

     </div>
     </form>

     
    

     </div>
    </div>

  


 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script>
const closesuccBtn = document.getElementById('close-success-btn');
const divSuccess = document.getElementById('div-success');

closesuccBtn.onclick = function(){
  divSuccess.style.display = "none";
}


 </script>


 

 
</body>
</html>
