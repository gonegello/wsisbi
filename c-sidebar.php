

<?php include "connection.php";
  $stat = "1";
  //$stat2 = "1";
  $num = "SELECT * FROM cart WHERE stat = $stat";

  if($r = mysqli_query($conn,$num))
  {
      $num_req=mysqli_num_rows($r);
  }
 

  ?>

<?php include "connection.php";
  $status = "2";
  //$stat2 = "1";
  $purchase = "SELECT * FROM cart WHERE stat = $status";

  if($p = mysqli_query($conn,$purchase))
  {
      $pur_req=mysqli_num_rows($p);
  }
 

  ?>
<!--Side bar-->
<div class="sidebar close">
  <div class="logo-details">
    <i class='bx bx-menu' id="btn"></i>
  </div>
    <ul class="nav-links">
      <li>
        <!--close and view side bar-->
        <a href="cli-dashboard.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
       
      </li>
      <li>
        <!--end close and view side bar icon-->

        <li>
        <a href="cli-ris.php">
        <i class='bx bx-message-alt-detail'></i>
          <span class="link_name">Request</span>
        </a>
       
      </li>

      <li>
        <a href="#">
        <i class='bx bx-current-location'></i>
          <span class="link_name">My Purchase Request</span>
        </a>
      </li>

      <!--Stock room-->
      <li>
        
        <a href="cli-stock.php">
          <i class='bx bx-store' ></i>
          <span class="link_name">Stockroom</span>
        </a>
        
      </li>
      <!--end stock room-->

      
      <li>
        <a href="cli-order.php">
        <i class='bx bx-cart'></i>
          <span class="link_name">Order</span>
        </a>
        
      </li>

      <li>
        <a href="cli-his.php">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        
      </li>
      
      <li>
        <a href="cli-profile.php">
        <i class='bx bx-user'></i>
          <span class="link_name">Profile</span>
        </a>
       
      </li>

      <?php
      if($designation == "Head" && $num_req > 0){
        echo' <li>
        <a href="cli-head-notif.php">
        <i class="bx bx-envelope"></i>
          <span class="link_name">Purchase Request
          <i class="bx bxs-circle" style="color:red;font-size:10px;"></i>
          
          </span>
        </a>
       
      </li>';

      }

     

?>

<?php
      if($designation == "Campus Director" && $pur_req > 0){
        echo' <li>
        <a href="cli-dean-notif.php">
        <i class="bx bx-envelope"></i>
          <span class="link_name">Purchase Request</span>
          <i class="bx bxs-circle" style="color:red;font-size:10px;"></i>

        </a>
       
      </li>';

      }

?>


      

      <li>
        
    <div class="profile-details">
      <div class="profile-content">
      <img src="<?php echo $profile;?>" style="object-fit:cover;">
      </div>

      <div class="name-job">
      <div class="profile_name"><?php echo $fullname;?><div>
        <div class="job"><?php echo $designation;?></div>
      </div>
      <i class='bx bx-log-out'></i>
    </div>
  </li>

</ul>
</div>

<!--end of sidebar-->