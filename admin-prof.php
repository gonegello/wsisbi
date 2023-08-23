<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Update Profile</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/table.css">

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>


<body>

<!--Side bar-->

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
        <a href="account.html">
          <i class='bx bx-user' ></i>
          <span class="link_name">Accounts</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="account.html">Accounts</a></li>
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
        <img src="image/avoex.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">avoex</div>
        <div class="job">Web Designer</div>
      </div>
      <i class='bx bx-log-out'></i>
    </div>
  </li>

</ul>
</div>

<!--end of sidebar-->
  <section class="home-section">
    <!-- nav tool bar top-->
    <div class="navbar">
      <a href="#myModal" data-toggle="modal" data-target="#myModal" title="Add Items"><i class='bx bx-list-plus' style="font-size:20px;"></i></a>
      <a href="#additems" title="Category"><i class='bx bx-category-alt'></i></a>
      <a href="#darkmode" title="Darkmode"><i class='bx bx-moon'></i></a>
      <a href="#adduser" title="Unit"><i class='bx bx-columns'></i></a>
      <a href="#adduser" title="Add User"><i class='bx bx-user-plus' style="font-size:20px;"></i></a>   
    </div>

    <!--end of nav tool bar top-->
    <div class="home-content">
      <span class="text"></span>
    </div>

 <h2>Update Profile</h2>
            
  </section>

 <!-- script for tabs-->
 
 <script src="assets/js/script.js"></script>
 <script src="assets/bootstrap/js/stocktab.js"></script>
 <script src = "assets/bootstrap/js/border.js"></script>

 
</body>
</html>
