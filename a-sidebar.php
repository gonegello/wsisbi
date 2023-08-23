


<style>
  .sidebar .nav-links li:hover{
    border:none;
    background-color:whitesmoke;
    color:white;
    font-size:25px;
    

  }
  
  </style>  

<!--Side bar-->
<div class="sidebar close"> 
  <div class="logo-details">

    <i class='bx bx-menu' id="btn"></i>
  </div>
    <ul class="nav-links">
      <li>
        <!--close and view side bar-->
        <a href="a-dashboard.php" title="Dashboard">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        
      </li>

      <li>
        <!--end close and view side bar icon-->

      

      <!--
        <a href="a-stockroom.php" title="Stockroom">
          <i class='bx bx-store' ></i>
          <span class="link_name">Stockroom</span>
        </a>
       
      </li>
    

      <li>
        <a href="a-orders.php" title="Orders">
        <i class='bx bx-cart'></i>
          <span class="link_name">Orders</span>
        </a>
       
      </li>

      <li>
        <a href="a-admin-notif.php" title="Purchase Request">
        <i class='bx bx-message-alt-detail'></i>
          <span class="link_name">Request</span>
        </a>
        
      </li>

      <li>
        <a href="a-archives.php" title="Archives">
        <i class='bx bx-archive-in'></i>
          <span class="link_name">Archives</span>
        </a>
        
      </li>
      

      <li>
        <a href="a-accounts.php" title="Accounts">
          <i class='bx bx-user' ></i>
          <span class="link_name">Accounts</span>
        </a>
         
      </li>
      
      <li>
        <a href="a-reports.php" title="Reports">
        <i class='bx bx-notepad'></i>
          <span class="link_name">Reports</span>
        </a>
       
      </li>

      <li>
        <a href="a-history.php" title="History">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
       
      </li>

-->
     

 
    <li>
        <a href="x-input-iar.php" title="Acceptance of Items">
        <i class='bx bx-mouse'></i>
          <span class="link_name">Acceptance</span>
      </a>
    </li>

<li>
        <a href="x-pci.php" title="All Inputs">
        <i class='bx bx-dialpad-alt'></i>
          <span class="link_name">Article</span>
      </a>

</li>


<li>
        <a href="x-stock.php" title="StockRoom">
        <i class='bx bx-store-alt'></i>
          <span class="link_name">Stockroom</span>
      </a>

</li>

<li>
        <a href="x-request.php" title="Request">
        <i class='bx bx-envelope'></i>
          <span class="link_name">Requests</span>
      </a>

</li>


<li>
        <a href="x-xptr.php" title="Transfer">
        <i class='bx bx-refresh'></i>
          <span class="link_name">Transfer Property</span>
      </a>

</li>  

<li>
        <a href="x-reports.php" title="Reports">
        <i class='bx bx-folder-open' ></i>
          <span class="link_name">Reports</span>
      </a>

</li>

<li>
        <a href="x-archives.php" title="Archives">
        <i class='bx bx-archive-in' ></i>
          <span class="link_name">Archives</span>
      </a>

</li>

<li>
        <a href="x-history.php" title="History">
        <i class='bx bx-history' ></i>
          <span class="link_name">History</span>
      </a>

</li>




<li>
        <a href="x-people.php" title="People">
        <i class='bx bx-user'></i>
          <span class="link_name">People</span>
      </a>

</li>





      
      <li>
        <a href="x-profile.php" title="Profile">
          <i class='bx bx-cog'></i>
          <span class="link_name">My Account</span>
      </a>
       
      </li>

      <li>
        <a href="x-univ.php" title="University">
          <i class='bx bxs-school'></i>
          <span class="link_name">University</span>
        </a>
       
      </li>
      

      <li>
        
    <div class="profile-details" style="background-color:#A3A3FF;opacity:none;">
      <div class="profile-content" style="">
      <img src="<?php echo $profile;?>" style="object-fit:cover;">
      </div>

      <div class="name-job">
        <div class="profile_name"><?php echo $firstname;?></div>
        <div class="job"><?php echo $username;?></div>
      </div>
      <a onclick="return confirm('Signout Confirmation : <?php echo $fullname;?>')" href="logout.php" title="Logout <?php echo $firstname; ?>?" style=""><i class='bx bx-log-out'></i></a>
    </div>
  </li>

</ul>
</div>



<!--end of sidebar-->