<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Reports</title>

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


<body onload="stockBttm()">

<!--Side bar-->
<?php include "a-sidebar.php";

?>

<!--end of sidebar-->
  <section class="home-section">
    <!-- nav tool bar top-->
   <?php include "a-navtoolbar.php";?>

    <!--end of nav tool bar top-->
   
 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
  <div class="card-shadow">

  <div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Reports </span>
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Logged In as</span> 
      </div>

      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">
        
 
            
</div>
</div>
</div>
 <!--End container fluid dashboard-->
  </section>

 <!-- script for tabs-->
 
 <script src="assets/js/script.js"></script>
 <script src="assets/bootstrap/js/stocktab.js"></script>
 <script src = "assets/bootstrap/js/border.js"></script>

 
</body>
</html>
