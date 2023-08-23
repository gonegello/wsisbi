<?php
include "a-session.php";
include "a-count.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Item Archive</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
      #back{
         
          padding:10px 15px;
          border-radius:50px;
          font-size:25px;
      }
    #back:hover{
        
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
    }
    #search{
        margin-top:1%;
        border-radius:50px;
        width:80%;
        float:right;
    }
    .crud-link{
        font-size:25px;
        padding:10px 10px;
        
       
    }
    .crud-link:hover{
        font-size:30px;
        color:green;
        border-radius:50px;
        padding:12px 18px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;


    }
  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
    

            

      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;
      border-bottom-left-radius:none;border-bottom-right-radius:none;margin-top:3%;margin-left:10%;margin-right:10%;"> 
      <div class="row">
          <div class="col"><a href="a-archives.php" id="back" title="Go Back"><i class='bx bx-arrow-back' ></i></a>
          <h4>File Archives</h4> 
        <span>Archived Items</span>
            
          </div>
          <div class="col">
          <input type="text" id="search" placeholder="Search Item..">
          </div>
      </div>
      </div>

      <?php
      //if an item is sent to archive

          if(isset($_SESSION['archivedOut']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:1%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h3>Archive-Out</h3>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['archivedOut'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['archivedOut']);
            }
      ?>

      
                

      <?php
      if ($archive_outs == 0){
        echo '<div class="card-body" style="border:1px solid #ededed;margin-left:10%;margin-right:10%;border-bottom-right-radius:10px;
        border-bottom-left-radius:10px;border-top:none;">
        <div class="row">
        <div class="col">
        </div>
        <div class="col" style="text-align:center;">
        <img src="image/arc.jpg" style ="oject-fit:cover;width:300px;margin-top:10%;"><br><br>
        <br><span style="color:grey;">No Archive File.</span><br><br><br>
        </div>
        <div class="col">
        </div>
        </div>
        
        </div>';
      }

      ?>
                <?php
                include('connection.php');
                $condition = "1";
                $query=mysqli_query($conn,"SELECT * FROM stocks WHERE sscon = $condition  ORDER BY date_arrived DESC");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>
                
                    
                <div class="card-body" style="margin-left:10%;margin-right:10%;border:1px solid #ededed;border-top:none;">
                
                        <div class="row">
                        <div class = "col">
                        <img src="<?php echo $row['photo']; ?>" style="object-fit:cover;" width="100px" height="100px">
                        </div>



                        <div class="col">
                        <span class="below"><?php echo $row['stock_name'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">stockname</span>
                        
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['brand'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">brand</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['description'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">description</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['quantity'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">quantity</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['unit']?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">unit</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['unit_price']?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">unit_price</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['total_price']?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">total price</span>
                        </div>

                       
                        
                        <div class="col" style="text-align:right;">
                        
                        <a href="#" class="crud-link" title="View Item?" data-toggle="modal" data-target="#stockinfo<?=$row['s_id'];?>"><i class='bx bx-info-circle'></i></a>
                        <a href="#" class="crud-link" title="Archive Out?" data-toggle="modal" data-target="#archiveOut<?=$row['s_id'];?>"><i class='bx bx-archive-out'></i></a>
                       
                        
                       
                        </div>
                    

                        
                     </div>
                
                    

                    </div>
                

                <?php 
                    
                        include 'modal_a_stockroominfo.php';
                        include 'm_archive_out.php';
                      

                }
                ?>


      
      


     

     



      </div>
      </div>
            
  </section>
<!-- sidebar script-->
<script src="assets/js/script.js"></script>


 

 
</body>
</html>

