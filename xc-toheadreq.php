<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Department Requests</title>

    <?php require_once "cli-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

     
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
  if(isset($_SESSION['approved']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['approved'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['approved']);
  }
  ?>

<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-paper-plane"></i> Requests</h1>



</div>
<div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-paper-plane"></i><span> &nbsp; REQUESTS</span></h5>

          </div>
          <div class="col" style="text-align:right;">
    
          </div>
           
        </div>
        </div>


        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
          <h4 style="color:#A3A3FF;">Requests ( <?php echo $request_count;?> )</h4><span style="color:grey;"><?php echo $office;?></span>
          </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
          <table>
          <?php if($request_count == 0)
            echo '
            <div class="card-body" style="">
            <center>
            <img src = "image/none.jpg" style="object-fit:cover;"><br><br>
            <span style="color:grey;font-size:20px;">No Request to be Approved Today.</span><br><br>
       

            </center>
            </div>'
            ;

            ?>
          <?php
            $req_stat = "head";
             $query = mysqli_query($conn, "select * from `req` join people on people.idc = req.client_id where people.office = '{$office}' and req.req_stat = '{$req_stat}' group by req.client_id"); 
             while($row = mysqli_fetch_array($query))
           
            {
                $client_id = $row['client_id'];

                $req = "SELECT * FROM req WHERE client_id = $client_id AND req_stat = '{$req_stat}'";

                if($r = mysqli_query($conn,$req))
                {
                    $numd =mysqli_num_rows($r);
                }
      
                ?>

                <tr>
                    <td>
                        <img src="<?php echo $row['profile'];?>" style="object-fit:cover;border-radius:50px;border:1px solid #ededed;" width="50px" height="50px">
                    </td>
                    <td>
                        
                    <?php echo $row['fullname'];?> has request <?php echo $numd;?> items.
                
                </td>
                <td></td>
                <td>
                <a class="opptions" title = "View Request" href="xc-perhead.php?client_id=<?php echo $client_id;?>"><i class='bx bxs-chevron-right'></i></a>
                 </td>
            
                    
                </tr>

                <tr>
                    <td></td>

                    <td style="background:#FAFAFA;border-radius:10px;">
                    <?php
                     $que = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where req.req_stat = '{$req_stat}' and client_id = $client_id"); 
                    while($rw = mysqli_fetch_array($que))

                    {
                        ?>


                
                        <?php echo $rw['req_quan']; echo " " ;echo $rw['unit']; echo " "; echo $rw['item_details'];?><br>

                 

                    <?php
                    }

                    ?>
                       <a class="" href="xc-perhead.php?client_id=<?php echo $client_id;?>">See All..</a></td>


                    <td></td>
                    <td></td>


                </tr>


<?php
            }
            ?>
          </table>

        </div>

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
