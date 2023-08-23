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
#checkout{
  float:right;
}


.opptions{
  background:#f0f0f0;
  padding:12px 12px;
  color:grey;
  border-radius:5px;
  margin-left:3%;
 
}

.opptions:hover{
  background:white;
  text-decoration:none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
  color:#4286f4;

}
.emptylink{
  padding:10px 10px;
  background:royalblue;
  color:white;
  border-radius:5px;

}

.emptylink:hover{
  color:royalblue;
  text-decoration:none;
  background:white;
  border:2px solid royalblue;


}
ul li{
  list-style-type:circle;
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


     <div class="row"style="margin-left:5%;margin-top:2%;">
            <div class="col">
            <div class="card-body" style="background:transparent;">
            <div class="row">
              <div class="col">
              <span><i class='bx bx-cart' style="font-size:40px;color:white;background:royalblue;padding:12px 12px;
            border-radius:50px;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;"></i><span style="font-size:20px;margin-left:2%;"><?php echo $fullname;?> 's Cart</span></span>
        
              </div>
              <div class="col" style="margin-left:-90%;">
              <div class="row">
                <div class="col">
                <h4 style="padding-bottom:0;">REQUEST<br></h4>
               
                </div>
             
              </div>
             
              </div>
            </div>
            </div>
            </div>
            
        </div>

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



        


         <div class="row" style="margin-top:2%;margin-left:5%;margin-right:5%;">
           <div class="col">



                     


           



        

            <div class="card-body" style="border:1px solid #ededed;border-top:none;">

            <table>

<tr>

<?php if($myreq > 0)
{
  echo '<label for = "name" style="color:#4286f4;margin-top:2%;">Your Request Purpose:</label><input type="text" name="reason" id="reason" placeholder="Your purpose in requesting.."
  style="border-radius:10px;background:white;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;padding-bottom:30px;" required=""/>
  
  
  
  
  <input type="submit" name="checkout" id="checkout" value="Checkout All" style="background:#77dd77;margin-top:2%;border-radius:5px;">';
}
?>
</tr>
  <?php
  include "connection.php";
  $req_stat = "cart";
  


$query = mysqli_query($conn, "select * from `req` where req_stat != '{$req_stat}' and client_id = $id group by r_date order by idreq desc"); 
while($row = mysqli_fetch_array($query))

  {
    $req_date = $row['r_date'];
    ?>

    <tr>
      <td>
        <div class="row">

          <div class="col" style="text-align:left;">
          <span style="color:#4286f4;font-size:15px;"><?php echo $row['r_date'];?></span>
          </div>

          
          <div class="col">
          </div>

        </div>

        <div class="row">
<div class="col" style="background:white;margin-top:1%;margin-bottom:2%;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;">
          <?php
        $que = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where req.client_id = $row[client_id] and req.req_stat != '{$req_stat}' and req.r_date = '{$req_date}' "); 
        while($rw = mysqli_fetch_array($que))

          {
            ?>
      <div class="row">
        <div class="col">

        </div>
        <div class="col">
        <span style="color:rgb(40,40,40);font-size:20px;">
        
           <?php echo $rw['req_quan']; echo " ";?>
          <?php echo $rw['item_details'];?>
          </span>
          </div>

        <div class="col" style="text-align:right;">
    
            
          
          <?php 
          if($rw['req_stat'] == "head")
          {
            echo '<span>Sent to Head</span>';
          }
          echo $rw['req_stat'];
          
          ?>
        
   
        
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
       




            
            <div class="card-body" style="border-top-right-radius:none;border-top-left-radius:none;border:1px solid #ededed;border-top:none;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
           
          <form method="post" action="xc-sendmyreq.php">
           <?php if($myreq == 0)
            echo '
            <div class="card-body" style="">
            <center>
            <img src = "image/none.jpg" style="object-fit:cover;"><br><br>
            <span style="color:grey;font-size:20px;">Your Cart is Empty.</span><br><br>
            <a href="xc-store.php" class="emptylink"><i class="bx bx-store" ></i> Go to Stockroom</a>

            </center>
            </div>'
            ;

            ?>
          
            <table>

            <tr>

            <?php if($myreq > 0)
            {
              echo '<label for = "name" style="color:#4286f4;margin-top:2%;">Your Request Purpose:</label><input type="text" name="reason" id="reason" placeholder="Your purpose in requesting.."
              style="border-radius:10px;background:white;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;padding-bottom:30px;" required=""/>
              
              
              
              
              <input type="submit" name="checkout" id="checkout" value="Checkout All" style="background:#77dd77;margin-top:2%;border-radius:5px;">';
            }
            ?>
            </tr>
              <?php
              include "connection.php";
              $req_stat = "cart";
              

            
            $query = mysqli_query($conn, "select * from `req` where req_stat = '{$req_stat}' and client_id = $id group by r_date"); 
            while($row = mysqli_fetch_array($query))
          
              {
                $req_date = $row['r_date'];
                ?>

                <tr>
                  <td>
                    <div class="row">
                      <div class="col">
                      <span style="color:#4286f4;font-size:15px;"><?php echo $row['r_date'];?></span>
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
                    <span style=""><br>
                       <?php echo $rw['req_quan']; echo " ";?>
                      <?php echo $rw['item_details'];?><br>
                      </span><br>
                    </div>

                    <div class="col" style="text-align:right;"><br>
               
                    <a href="#" class="opptions" title="Edit `<?php echo $rw['item_details'];?>`?"><i class='bx bxs-edit-alt' ></i>Edit</a>
                    <a href="#" class="opptions" title="Delete `<?php echo $rw['item_details'];?>`?"><i class='bx bxs-trash' ></i>Delete</a>
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
            </form>

            </div>
       
         



   

          









            </div>
            </div>






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
