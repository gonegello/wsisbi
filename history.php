<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stockroom</title>

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

<?php require_once "a-sidebar.php";?>

<!--end of sidebar-->
  <section class="home-section">
    <!-- nav tool bar top-->
   <?php require_once "a-navtoolbar.php";?>

    <!--end of nav tool bar top-->
    <div class="home-content">
      <span class="text"></span>
    </div>

 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
 <br><br>
  <div class="card-shadow">
     <!--Card header-->
      <div class="card-header py-3" style="background-color:white;">
          <span style="font-size: 20px; color: rgb(40, 40, 40);"><i class='bx bx-history'></i>  History</span>   
      </div>

      <div class="card-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified" id="tabby" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" href="#stock" id="stck" role="tab" data-toggle="tab" onclick="stockBttm()"><i class='bx bx-box' id="s-i"></i><br><p id="s-p">Items Added</p></a>
            </li>
            
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#category"  id="cat" role="tab" data-toggle="tab" onclick="catBttm()"><i class='bx bx-category' id="c-i"></i><br><p id="c-p">LogIn History</p></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#unit" id="unt" role="tab" data-toggle="tab" onclick="unitBttm()"><i class='bx bx-collection' id="u-i"></i><br><p id="u-p">Accounts</p></a>
            </li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Barcoding Tab pane-->
            

            <!-- Stock Tab pane-->
            <div id="stock" class="tab-pane active" role="tabpanel"><br>
              <h3>Items Added</h3>
             <!-- Stock Table-->
             <table class="table">
              <thead>
                <tr>
                  <th>Stock ID</th>
                  <th>Stock Name</th>
                  <th>Quantity</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Date Arrived</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                </tr>
                <tr>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                </tr>
                <tr>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                  <td>no data</td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- Category Tab pane-->
            <div id="category" class="tab-pane" role="tabpanel"><br>
              <h3>LogIn History</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Sub Categories</th>
                    <th>Description</th>
                    <th>Date Created</th>
                    <th>Last Updated</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                  </tr>
                  <tr>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                  </tr>
                  <tr>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                    <td>no data</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Unit Tab pane-->
            <div id="unit" class="tab-pane" role="tabpanel"><br>
              <h3>Accounts</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Unit ID</th>
                    <th>Unit Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>no data</td>
                    <td>no data</td>
                  </tr>
                  <tr>
                    <td>no data</td>
                    <td>no data</td>
                  </tr>
                  <tr>
                    <td>no data</td>
                    <td>no data</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        
    <!--End user account card-->

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
