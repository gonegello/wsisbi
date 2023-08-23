<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Request Cart</title>

    <?php require_once "cli-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>  

#checkout{
  float:right;
}


.opptions{
  background:none;
  padding:12px 12px;
  color:grey;
  border-radius:5px;
  margin-left:3%;
 
}

.opptions:hover{
  background:#f0f0f0;
  padding:10px 15px;
  text-decoration:none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;;
  border-radius:50%;
  color:grey;

  

}
.emptylink{
  color:#A3A3FF;
 
  background:white;
  border:2px solid #A3A3FF;
  border-radius:5px;
  padding:10px 12px;

  
}

.emptylink:hover{

  background:#A3A3FF;
  color:white; text-decoration:none;
 




}

.guidelink{
  padding:10px 12px;
  color:white;

  border-radius:50px;
}

.guidelink:hover{
  text-decoration:none;
  color:black;
  background:#ffc801;
  border:none;
  
}

#allsearch{
  background:white;
  width:70%;
  border-radius:50px;
  border:1px solid #ededed;
  float:right;

}
.iar:hover{
  text-decoration:none;
}

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "xc-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

  
     <?php //Display if added to cart successfully
  if(isset($_SESSION['updateReq']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['updateReq'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['updateReq']);
  }
  ?>



   
     <?php //Display if added to cart successfully
  if(isset($_SESSION['requested']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['requested'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['requested']);
  }
  ?>


<?php 
      //if cart is updated
        if(isset($_SESSION['delReq']))
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
              </div><hr><i><?=$_SESSION['delReq'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['delReq']);
            }
      ?>




<?php 
      //if cart is updated
        if(isset($_SESSION['null']))
            {
      ?>
              <div class="alert alert-warning alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Failed:</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['null'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['null']);
            }
      ?>



<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-cart" style=""></i> Request Cart</h1>



</div>
     <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
      
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-cart"></i><span> &nbsp; REQUEST CART</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          <a href="#recentreq" class="iar">Recent Request</a> |
            <a href="#" class="iar">Approved Request</a> |
            <a href="#" class="iar">RIS</a>
          </div>
           
        </div>
        </div>
    


        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">MY CART</h6>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        <div class="card-body" style="">

        <div class="row" style="">
          <div class="col" style ="">
        

          <form method="post" action="xc-sendmyreq.php">
           <?php if($myreq == 0)
            echo '
            <div class="card-body" style="">
            <center>
            <img src = "image/none.jpg" style="object-fit:cover;"><br><br>
            <span style="color:grey;font-size:30px;">Your Cart is Empty.</span><br><br>
            <a href="xc-store.php" class="emptylink"><i class="bx bx-store" ></i> Go to Stockroom</a>

            </center>
            </div>'
            ;

            ?>
          
            <table>

            <tr>

            <?php if($myreq > 0)
            {
              echo '<label for = "reason" style="color:grey;margin-top:2%;">Purpose of Request:</label>

              <input type="text" name="reason" id="reason" placeholder="Your purpose in requesting.."
              style="border-radius:10px;border:1px solid #ededed;background:white;padding-bottom:20px; required=""/>
              
              
              
              
              <input type="submit" name="checkout" id="checkout" value="Checkout All" style="background:#77dd77;margin-top:2%;border-radius:5px;">';
            }
            ?>
            </tr>
              <?php
              include "connection.php";
              $req_stat = "cart";
              

            
            $query = mysqli_query($conn, "select * from `req` where req_stat = '{$req_stat}' and client_id = $id group by r_date limit 3"); 
            while($row = mysqli_fetch_array($query))
          
              {
                $req_date = $row['r_date'];
                ?>

                <tr>
                  <td>
                    <div class="row">
                 
                      <div class="col">
                      <span style="color:grey;font-size:15px;"><?php echo $row['r_date'];?></span>
                      </div>
                    </div>

                    <div class="row">
<div class="col" style="background:white;margin-top:1%;margin-bottom:2%;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;">
                      <?php
                    $que = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where req.client_id = $row[client_id] and req.req_stat= '{$req_stat}' and req.r_date = '{$req_date}' "); 
                    while($rw = mysqli_fetch_array($que))

                      {
                        ?>
                  <div class="row">
                    <div class="col">
                          <input type="hidden" name="req_id[]" id="req_id" value="<?php echo $rw['idreq'];?>">
                          <img src="<?php echo $rw['stock_img'];?>" style="object-fit:cover;" width="60px" height="60px">
                    </div>
                    <div class="col">
                    <span style="font-size:18px;"><br>
                       <?php echo $rw['req_quan']; echo " ";?>
                       <?php echo $rw['unit'];?>  
                      <?php echo $rw['item_details'];?><br>  
                      </span><br>
                    </div>
                    </form>


                    <div class="col" style="text-align:right;"><br>
                    
                    <a href="#" title="Update <?php echo $rw['item_details'];?>?" data-toggle="modal" style="font-size:20px;" data-target="#editcart<?=$rw['idreq']?>"
                    >&nbsp;<i class='bx bx-edit'></i>&nbsp; </a>

                    <a onclick = "return confirm('Are you sure you want to delete this?')" href="xc-delReq.php?idreq=<?php echo $rw['idreq'];?>"
                    style = "font-size:20px;" title="Delete `<?php echo $rw['item_details'];?>`?"><i class='bx bx-trash' ></i>
                  </a>
                 
                   
                  </div>
                    

                      <?php
          include "modal-editcart.php"; //pop up modal for editing cart item

                      }

                      ?>
                    </div>
                    </div>
                   
                    
                </td>
                </tr>



<?php
              }

              ?>

          </table>
      

          </div>

        </div>


        </div>

        <div class="card-body" style="background:whitesmoke;"  id="recentreq" >
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">RECENT REQUESTS</h6>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body"style="border-top:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <?php
                if($rec == 0)
                {
                    echo '
                    <tr>
                    <td>
                    <div class="row" style="margin-top:4%;">
                    <div class="col" style="text-align:center;">
                    <i class="bx bx-paper-plane" style="font-size:100px;color:#A3A3FF;padding:12px 100px;border-bottom:1px solid #f0f0f0;"></i><br><br>
                    <span style="color:grey;font-size:18px">You have no recent request.</span>
                    </div>
                    </div>
                    </td>
                    <tr>
                    ';
                }

                ?>

             
        <table style="">


  <?php
  include "connection.php";
  $req_stat = "cart";
  


$query = mysqli_query($conn, "select * from `req` where req_stat != '{$req_stat}' and client_id = $id group by r_date,r_time order by idreq desc"); 
while($row = mysqli_fetch_array($query))

  {
    $req_date = $row['r_date'];
    $r_time = $row['r_time'];
    ?>

    <tr>
      <td>
        <div class="row">

          <div class="col" style="text-align:left;">    
          <span style="color:#4286f4;font-size:15px;"><?php echo $row['r_date'];?></span>
          </div>

          
          <div class="col">
          <?php 
          if($row['req_stat'] == "head")
          {

            echo '
            <span style="float:right;font-size:15px;color:royalblue;font-style:italic;
          ;box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;padding:6px 8px;border-radius:5px;">Waiting for Department Head Approval.</span>
            ';
          }

           if($row['req_stat'] == "supply")
          {

            echo '
            <span style="float:right;font-size:15px;color:royalblue;font-style:italic;
          ;box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;padding:6px 8px;border-radius:5px;">Waiting for Supply Officer Approval.</span>
            ';
          }

          
          if($row['req_stat'] == "saved")
          {

            echo '
            <span style="float:right;font-size:15px;color:green;font-style:italic;box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;padding:6px 8px;border-radius:5px;">You request has been approved. <i class="bx bx-check"></i></span>
            ';
          }


          
          ?>
          </div>

        </div>

        <div class="row">
<div class="col" style="background:white;margin-top:1%;margin-bottom:2%;border-radius:10px;">
          <?php
          $i = 0;
        $que = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where req.client_id = $row[client_id] and req.req_stat != '{$req_stat}' and req.r_date = '{$req_date}' and req.r_time = '{$r_time}' "); 
        while($rw = mysqli_fetch_array($que))

          {
            $i = $i + 1;
            ?>
      <div class="row">
        <div class="col" style="">
        <span style="font-size:20px;font-weight:bold;color:royalblue;">
      <?php echo $i;?>.</span>
        </div>
        <div class="col">
        <span style="color:rgb(40,40,40);font-size:20px;">
        
           <?php echo $rw['req_quan']; echo " ";?>
           <?php echo $rw['unit'];?>, 
          <?php echo $rw['item_details'];?>
          </span>
          </div>

        <div class="col" style="text-align:right;">
    
            
          
     


 
   
        
        </div>
       
      </div>
        

          <?php
          }

          ?>
        </div>
        </div>
       
        
    </td>
    </tr>



<?php
  }

  ?>

</table>
            
            </div>


            


        
    
</div>

          </div>
     
         
<?php include "bottom.php";?>


      </div>
      </div>
            
  </section>



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
