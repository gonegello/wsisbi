<?php
//get user information
include "cli-session.php";
	?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Notification</title>

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
#link-a{
  text-decoration:none;
}

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>




<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

      <!-- first card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-left:10%;margin-right:10%;margin-top:3%;"> 
      <h4><i class='bx bx-bell'></i> Notifications</h4>  
      </div>
      <?php
        include "connection.php";
        $query = mysqli_query($conn, "select * from `notif` join clients on clients.id = notif.client_id
        join cart on cart.client_id = notif.client_id join stocks on stocks.s_id = cart.item_id where notif.client_id = $id group by cart.pr_no");
        while($row = mysqli_fetch_array($query))
        {
          $notif_stat = $row['notif_stat'];
              
                         
 
     ?>
     <a href="track.php?client_id=<?php echo $row['client_id']?>&r_date=<?php echo $row['r_date']?>&stat=<?php echo $row['stat']?>&h_id=<?php echo $row['h_id']?>" id="link-a">
        <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;
      border-bottom-right-radius:0px;margin-right:10%;margin-left:10%;">
        <div class="row">
          <div class="col">

          <span style="color:grey;"><?php echo $row['notif_date'];?> at</span>
          <span style="color:grey;"><?php echo $row['notif_time'];?></span><br>
          <?php
          if($notif_stat == "1")
          {
            echo '<img src="'.$head_img.'"  style="object-fit:cover;border-radius:50px;border:1px solid #ededed;"
             width="60px" height="60px">
             <span style="font-size:20px;color:grey;margin-left:1%;">Department Head</span>';
          }
          if($notif_stat == "2")
          {
            echo '<img src="'.$dir_img.'" style="object-fit:cover;border-radius:50px;border:1px solid #ededed;"
             width="60px" height="60px">
             <span style="font-size:20px;color:grey;margin-left:1%;">'.$director.'</span>
             ';
          }

          ?>
          <span style="font-size:20px;color:grey"><?php echo $row['act'];?>.</i></span>
          <span style="font-size:20px;color:grey;"></span>
          </div>
         
          <div class="col" >
          <img src="<?php echo $row['photo']; ?>"  style="object-fit:cover;border:1px solid #ededed;float:right;" width="80px" height="80px">
          </div>
        </div>
        
      </div>
        </a>
    
     <?php
        }
     ?>






    
     



      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
