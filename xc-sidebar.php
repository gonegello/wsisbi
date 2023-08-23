

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
        <a href="xc-store.php">
        <i class='bx bx-store'></i>
          <span class="link_name">Stock Room</span>
        </a>
</li>
<li>
        <a href="xc-notif.php">
        <i class='bx bx-bell'></i>
          <span class="link_name">Notification</span>
        </a>
</li>
        <li>
        <a href="xc-myreq.php">
        <i class='bx bx-cart'></i>
          <span class="link_name">My Request</span>
        </a>
</li>

<?php
      if($position == "head" || $position == "Head")
      {
        echo '  <li>
        <a href="xc-toheadreq.php">
        <i class="bx bx-paper-plane" ></i>
          <span class="link_name">Request</span>
        </a>
</li>';
      }


?>

</li>
    
        <li>
        <a href="xc-ris.php">
        <i class='bx bx-file' ></i>
          <span class="link_name">RIS Record</span>
        </a>
</li>

<li>
        <a href="xc-property.php">
        <i class='bx bx-purchase-tag'></i>
          <span class="link_name">Property</span>
        </a>
</li>
  
  
        <li>
        <a href="xc-profile.php">
        <i class='bx bx-user'></i>
          <span class="link_name">Profile</span>
        </a>
       
      </li>

    


      <li>
        
    <div class="profile-details" style="background:royalblue;">
      <div class="profile-content" style="">
      <img src="<?php echo $profile;?>" style="object-fit:cover;">
      </div>

      <div class="name-job">
        <div class="profile_name" style=""><?php echo $firstname;?></div>
        <div class="job"><?php echo $username;?></div>
      </div>
      <i class='bx bx-log-out'></i>
    </div>
  </li>

</ul>
</div>

<!--end of sidebar-->