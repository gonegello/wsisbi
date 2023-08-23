<?php 
include "accrole.php";
include "a-session.php";
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Accounts</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/table.css">
    <link rel="stylesheet" href="assets/bootstrap/css/forms.css">
    <link rel="stylesheet" href="assets/bootstrap/css/accounts.css">
    <link rel="stylesheet" href="assets/bootstrap/css/modal_accounts.css">
    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>


<body onload="useraccBttm()">


 <!--Side bar-->
 <?php
      require_once "a-sidebar.php";
      require_once "modal_adduser.php";
    ?>
    <!-- end of side bar-->


    <section class="home-section">
      <!-- nav tool bar top-->
    
      <!-- end nav tool-->

 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
  <div class="card-shadow" style="margin-top: 12px;">
     <!--Card header-->
     <div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Accounts </span> 
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Logged In as</span>
      </div>

      <div class="row">

      
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified" id="tabby" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" href="#user_account" id="ua_link" role="tab" data-toggle="tab" onclick="useraccBttm()"><i class='bx bx-group' id= "ua-i"></i><br><p id="ua-p">User Account</p></a>
            </li>
            
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#admins"  id="ad_link" role="tab" data-toggle="tab" onclick="adminsBttm()"><i class='bx bx-user' id="ad-i"></i><br><p id="ad-p">Admins</p></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#store_keeper" id="sk_link" role="tab" data-toggle="tab" onclick="storekeeper_Bttm()"><i class="bx bx-user-check" id="sk-i"></i><br><p id="sk-p">StoreKeeper</p></a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#clients" id="cli_link" role="tab" data-toggle="tab" onclick="clientsBttm()"><i class='bx bx-id-card' id="cli-i"></i><br><p id="cli-p">Clients</p></a>
              </li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Barcoding Tab pane-->
            

            <!-- User Account Tab pane-->
            <div id="user_account" class="tab-pane active" role="tabpanel">
           
                <!--search bar in manage accounts tab pane-->
                <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
             
             <!-- User accounts Table-->
             <table class="table table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th>Profile</th>
                  <th>Username</th>
                  <th>User Role</th>
                  <th>Created By</th>
                  <th>Date Created</th>
                </tr>
              </thead>
              <tbody>
              <?php
               include "connection.php";
               
                   
                   $query=mysqli_query($conn,"SELECT * FROM user ORDER BY id ASC");
                                      while($row=mysqli_fetch_array($query))
                                        {
                                          $date_created = DateTime::createFromFormat("Y-m-d H:i:s", $row['date_created']);
                                           
                                          ?>
                <tr>
                <td><input type = "checkbox" name="checkbox[]" value="<?php echo $row['id'];?>"></td>
                <td>no profile</td>
                <td><?php echo $row ['username'];?></td>
                <td><?php echo $row ['userole'];?></td>
                <td><?php echo $row ['created_by'];?></td>
                <td><?php echo $date_created->format('F j, Y, g:i a');?>
                    <div class="ico">
                      <button type="button" data-toggle="modal" data-target="#useraccountedit<?php echo $row['id'];?>"><i class='bx bx-edit-alt' title="edit"></i></button>&nbsp;
                      <a href="a-delUser.php?id=<?php echo $row['id'];?>"><i class='bx bx-trash-alt' title="delete"></i></a>&nbsp;
                      <a href="#infoModal" data-toggle="modal" data-target="#infoModal"><i class='bx bx-info-circle' title="information"></i></a>&nbsp;
                      <i class='bx bx-history' title="history"></i>
                    </div>
                  </td>
                </tr>
                <?php
                  include 'modal_updateuser.php'; 
                     }

                  ?>
              </tbody>
            </table>
            </div>



            <!-- Admins Tab pane-->
            <div id="admins" class="tab-pane" role="tabpanel">
              <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Profile</th>
                    <th>Fullname</th>
                    <th>Office</th>
                    <th>Designation</th>
                    <th>Contact Number</th>
                    <th>Updated At</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include('connection.php');
               
                $variable="admin";
               
                $query=mysqli_query($conn,"select * from `user` left join admin on admin.user_id=user.id where user.userole = '$variable'");
                while($row=mysqli_fetch_array($query))
                {
                  $last_updated = DateTime::createFromFormat("Y-m-d H:i:s", $row['updated_at']);
                  $date_created = DateTime::createFromFormat("Y-m-d H:i:s", $row['date_created']);
                    ?>
                  <tr>
                  <td><input type = "checkbox"></td>
                          <td><img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" id="prof" width="50px" height="50px"></td>
                          
                          <td><?php echo $row ['fullname'];?></td>
                          <td><?php echo $row ['designation'];?></td>
                          <td><?php echo $row ['office'];?></td>
                          <td><?php echo $row ['contact_n'];?></td>
                          <td><?php echo $row['updated_at'];?>
                          <div class="ico">
                                             
                                              <a href="#"><i class='bx bx-trash-alt' title="delete"></i></a>
                                             
                                              <button type="button" data-toggle="modal" data-target="#infoModal<?php echo $row['id'];?>"><i class='bx bx-info-circle' title="information"></i></button>
                                              <button type="button"><i class='bx bx-history' title="history"></i></button>
                                              </div>
                        
                        
                        </td>
                  </tr>
                  
                <?php
                      include 'modal_userinfo.php'; 
                }
                ?>
                </tbody>
              </table>
            </div>


            <!-- Storekeeper Tab pane-->
            <div id="store_keeper" class="tab-pane" role="tabpanel">
              <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Profile</th>
                    <th>Fullname</th>
                    <th>Office</th>
                    <th>Designation</th>
                    <th>Contact Number</th>
                    <th>Updated At</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include('connection.php');
               
                $variable="storekeeper";
               
                $query=mysqli_query($conn,"select * from `user` left join skeeper on skeeper.user_id=user.id where user.userole = '$variable'");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>
                  <tr>
                  <td><input type = "checkbox"></td>
                          <td><img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" id="prof" width="50px" height="50px"></td>
                          
                          <td><?php echo $row ['fullname'];?></td>
                          <td><?php echo $row ['designation'];?></td>
                          <td><?php echo $row ['office'];?></td>
                          <td><?php echo $row ['contact_n'];?></td>
                          <td><?php echo $row['updated_at'];?>
                          <div class="ico">
                                             
                                              <a href="#"><i class='bx bx-trash-alt' title="delete"></i></a>
                                             
                                              <button type="button" data-toggle="modal" data-target="#infoModal<?php echo $row['id'];?>"><i class='bx bx-info-circle' title="information"></i></button>
                                              <button type="button"><i class='bx bx-history' title="history"></i></button>
                                              </div>
                        
                        
                        </td>
                  </tr>
                  
                <?php
                      include "modal_userinfo.php";
                }
                ?>
                </tbody>
              </table>
            </div>


            <!-- end storekeeper tab pane-->


             <!-- Clients Tab pane-->
              <div id="clients" class="tab-pane" role="tabpanel">
              <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Profile</th>
                    <th>Fullname</th>
                    <th>Office</th>
                    <th>Designation</th>
                    <th>Contact Number</th>
                    <th>Updated At</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include('connection.php');
               
                $variable="client";
               
                $query=mysqli_query($conn,"select * from `user` left join clients on clients.user_id=user.id where user.userole = '$variable'");
                while($row=mysqli_fetch_array($query))
                {
                  
                    ?>
                  <tr>
                  <td><input type = "checkbox"></td>
                          <td><img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" id="prof" width="50px" height="50px"></td>
                          
                          <td><?php echo $row ['fullname'];?></td>
                          <td><?php echo $row ['designation'];?></td>
                          <td><?php echo $row ['office'];?></td>
                          <td><?php echo $row ['contact_n'];?></td>
                          <td><?php echo $row['updated_at'];?>
                          <div class="ico">
                                             
                                              <a href="#"><i class='bx bx-trash-alt' title="delete"></i></a>
                                             
                                              <button type="button" data-toggle="modal" data-target="#cli-info<?php echo $row['id'];?>"><i class='bx bx-info-circle' title="information"></i></button>
                                              <button type="button"><i class='bx bx-history' title="history"></i></button>
                                              </div>
                        
                        
                        </td>
                  </tr>
                  
                <?php
                      include 'modal_clinfo.php';
                }
                ?>
                </tbody>
              </table>
            </div>


             <!-- end client tab-->




          </div>
        
    <!--End user account card-->

   </div>
   </div>
   </div>
    
  </div>
 
  <!--End container fluid dashboard-->
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script type="text/javascript" src="assets/bootstrap/js/stocktab.js"></script>
 <script type="text/javascript" src = "assets/bootstrap/js/acc_tab.js"></script>

 
</body>
</html>
