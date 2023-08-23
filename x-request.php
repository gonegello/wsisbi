<?php include "a-session.php";
include "count-ris.php";


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Requests</title>

    <?php include "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
 
<style>
 td,th{
   font-style:normal;
 }
</style>

<body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-envelope"></i> Requests</h1>



</div>
  <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-envelope"></i><span> &nbsp; REQUESTS</span></h5>

          </div>
          <div class="col" style="text-align:right;">
         
          <a href="#new" class="iar" style="text-decoration:none;">New Request</a> | 
          <a href="#recent" class="iar" style="text-decoration:none;">Recent Approved</a>



          </div>
           
        </div>
        </div>



        <div class="card-body" style="" id="new">

        <div class="card-body" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
          <div class="col">
       <h6 style="color:grey;">ALL REQUESTS 

       <?php
       if($request_num > 0)
       {
         echo '<span style="background:red;padding:4px 13px;color:white;border-radius:50%;">'.$request_num.'</span>';
       }


?>
       </h6>
          </div>
          <div class="col">

          </div>
        </div>
        </div>
        
       
        </div>


        <div class="card-body" id="new">

        
        <?php
if($request_num == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">Nothing recent request.</span><br><br><br>
    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>


        
    <table>
        
            <?php
            $req_stat = "supply";
              $query = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where req.req_stat = '{$req_stat}' group by req.a_date and client_id"); 
              while($row= mysqli_fetch_array($query))

            {
                $a_date = $row['a_date'];
                
                ?>
                <tr>
                    <td style="color:royalblue;"><?php echo $row['a_date'];?></td>
                    <td></td>
                </tr>

               

                <tr>
                 
                  
                    <td style="">
                        <?php
                        $que = mysqli_query($conn, "select * from `req` join people on people.idc = req.client_id where req.req_stat = '{$req_stat}' and req.a_date = '{$a_date}' group by req.client_id"); 
                        while($rw= mysqli_fetch_array($que))
                        {
                          $client_id = $row['client_id'];
                          $client_name = $rw['firstname'];

                          $req = "SELECT * FROM req WHERE client_id = $client_id AND req_stat = '{$req_stat}'";
          
                          if($r = mysqli_query($conn,$req))
                          {
                              $numd =mysqli_num_rows($r);
                          }

                          if($numd > 1)
                          {
                            $noun = "items";
                          }
                          if($numd == 1)
                          {
                            $noun = "item";
                          }
                

                            ?>
                              <br>
                              <img src="<?php echo $rw['profile'];?>" style="object-fit:cover;border:1px solid #ededed;border-radius:50px;" width="60px" height="60px">
                              <span style="margin-left:2%;"><?php echo $rw['fullname']; echo " has requested "; echo $numd; echo " "; echo $noun;?>.</span>
                        <br>
                  

                      <?php
                        }
                        ?>

                    </td>
                    <td></td>

                    <td style="text-align:center;">
                    <a href="xc-persupp.php?client_id=<?php echo $row['client_id'];?>"class="opptions" style="margin-top:2%;" title="View <?php echo $client_name;?>'s request?"><i class='bx bx-link-external' style="font-size:20px;"></i></a></td>
                   
                </tr>
                

              <?php
            }
            ?>


        
    </table>
          



        </div>


        <div class="card-body"  id="recent" >

        <div class="card-body" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
          <div class="col">
       <h6 style="color:grey;">RECENT ACCEPTED</h6>
          </div>
          <div class="col" style="text-align:right;">
            <a href="x-r-ris.php">Requisition Issue Slip</a>
          </div>
        </div>
        </div>
        
       
        </div>
        <div class="card-body" id="recent" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        
    <table>
      <?php
      $req_stat = "saved";
      $query=mysqli_query($conn,"SELECT * FROM ris JOIN people on people.idc = ris.req_by 
      JOIN req ON req.id_ris = ris.idris JOIN xris ON xris.idx = req.item_id WHERE req.req_stat = '{$req_stat}'
      GROUP BY ris.ris_no ORDER BY idris DESC ");
      while($row=mysqli_fetch_array($query))
      {
        ?>
            
                <tr>
                    <td>  <img src="<?php echo $row['profile'];?>" style="object-fit:cover;border:1px solid #ededed;border-radius:50px;" width="50px" height="50px"></td>
                    <td><span>RIS No : <?php echo $row['ris_no'];?> </span><br>
                        <span><?php echo $row['fullname'];?></span></td>
                    <td> <a href="x-xris.php?fc=<?php echo $row['fc'];?>&req_by=<?php echo $row['req_by'];?>&idris=<?php echo $row['idris'];?>" class="opptions"><i class='bx bxs-chevron-right' ></i></a></td>
               
                </tr>
                <tr><td style="color:transparent;">white</td></tr>  

        
        <?php
      }
      ?>
      

          </table>

        </div>



  </div>
  </div>
  







      </div>
      </div>

      <?php include "bottom.php";?>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
