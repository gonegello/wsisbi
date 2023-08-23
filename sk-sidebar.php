
<!--Side bar-->
<div class="sidebar close">
  <div class="logo-details">
    <i class='bx bx-menu' id="btn"></i>
  </div>
    <ul class="nav-links">
      <li>
        <!--close and view side bar-->
        <a href="dashboard.html">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="dashboard.html">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <!--end close and view side bar icon-->

      <!--Stock room-->
      <li>
        
        <a href="stockroom.html">
          <i class='bx bx-store' ></i>
          <span class="link_name">Stockroom</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="stockroom.html">Stockroom</a></li>
        </ul>
      </li>
      <!--end stock room-->

      <li>
        <a href="Barcoding.html">
          <i class='bx bx-barcode-reader' ></i>
          <span class="link_name">Barcoding</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Barcoding.html">Barcoding</a></li>
        </ul>
      </li>
      

      <li>
        <a href="accounts.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Accounts</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="accounts.php">Accounts</a></li>
        </ul> 
      </li>
      
      <li>
        <a href="report.html">
          <i class='bx bxs-report' ></i>
          <span class="link_name">Reports</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="report.html">Reports</a></li>
        </ul>
      </li>

      <li>
        <a href="history.html">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="history.html">History</a></li>
        </ul>
      </li>
      
      <li>
        <a href="setting.html">
          <i class='bx bx-cog'></i>
          <span class="link_name">Settings</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="setting.html">Settings</a></li>
        </ul>
      </li>
      

      <li>
        
    <div class="profile-details">
      <div class="profile-content">
      <img src="<?php echo $profile;?>" style="object-fit:cover;">
      </div>

      <div class="name-job">
      <div class="profile_name"><?php echo $fullname;?></div>
        <div class="job"><?php echo $userole;?></div>
      </div>
      <i class='bx bx-log-out'></i>
    </div>
  </li>

</ul>
</div>

<!--end of sidebar-->