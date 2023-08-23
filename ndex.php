<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="icon" href="image/bo.ico">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!-- online source-->
    <link rel='stylesheet' href='assets/bootstrap/css/boxicons.min.css'><!-- offline source -->

    <link rel="stylesheet" href="assets/bootstrap/css/login.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/bootstrap/css/login.css">
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

<body>
<div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     
     <div class="col" style="padding:0;background:#A3A3FF;border-top-left-radius:10px;border-bottom-left-radius:10px;">
     <div class="card-body" style="background:#A3A3FF;margin-top:18%">
   
   
    </div>
    </div>


     <div class="col" style="padding:0;background:#A3A3FF;border-top-right-radius:10px;border-bottom-right-radius:10px;">
     <div class="card-body" style="background:white;text-align:center;border-top-left-radius:80px;"><br><br>
   
    <i class="bx bx-store" style="font-size:100px;color:#A3A3FF;text-align:center;"></i><br>

     <h4 style="color:black;">SUPPLY INVENTORY SYSTEM</h4>


     </div>
         <div class="card-body" style="background:white;border-bottom-left-radius:50px;border-bottom-right-radius:10px;">
         <form class="user" action="login.php" method="post" style="margin-right:5%;margin-left:5%;">
                                        <div class="form-group">
                                            <!--Enter username -->
                                            <label for="username">Username :</label>
                                            <input class="form-control form-control-user" type="text" required="" name="username" placeholder="Enter username..">
                                        </div>

                                        <div class="form-group">
                                            <!--Enter Password -->
                                            <label for="password">Password :</label>

                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" name="password" placeholder="Password" name="password" required="">
                                        </div>

                                        <div class="form-group" id="check-box-group">
                                            <div class="text-left custom-control custom-checkbox small" id="div-checkbox">
                                                <div class="form-check text-left form-check-admin">
                                                    <!--Show Password -->
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1" onclick="showPassword()">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Show Password</label></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" style="background:#A3A3FF;border:none;"type="submit">Sign In Account</button>
                                    </form><br><br>
         </div>
    </div>
</div>
      <?php require "bottom.php";?>
            





 

 
</body>
</html>
