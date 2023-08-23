<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `clients` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['id'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            $designation=$row['designation'];
            $office = $row['office'];
            $contact = $row['contact_n'];
            
        }

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
          $username =$roww['username'];
          $password = $roww['password'];
        }

             
	?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
   

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
  .form-group input[type="text"]{
    width:100%;
    padding:12px 14px;
    border-radius:5px;
    border:1px solid #Dee0e0;
  }

  .form-group input[type="text"]:focus{
    outline:none;
    border-left:7px solid grey;
    border-right:1px solid grey;
    border-top:1px solid grey;
    border-bottom:1px solid grey;
  }
  input[type="submit"]{
    background:#0d47a1;
    border:none;
    padding:8px 10px;
    width:20%;
    border-radius:5px;
    color:white;
    float:right;
  }
  

  </style>


<body>



<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

<div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Profile </span> 
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Sign out <?php echo $fullname;?></span> 
      </div>

      <div class="row" style="background:whitesmoke;">

      <div class="col" style="background:whitesmoke;">
      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;">

      <div class="card-header py-3" style="background:white;border-top-left-radius:5px;border-top-right-radius:5px;">
        <h3>Profile Settings</h3>
      </div>
      <div class="card-body">

            <div class="card-body">
            <form method = "post" enctype="multipart/form-data">
                                           
            <input type='file' id="imgInp" name="imgInp" style="display:none" />
               <!-- preview image here-->
                <img id="addpho" style= "object-fit:cover;border:1px solid grey;border-radius:50%;" src="<?php echo $profile;?>" alt="Profile Image" height="200px" width="200px"/><br>
                                                            
                </div>
             
                
      

      
             <div class="form-group">
            <label>Fullname:</label><br>
            <input type='text' name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname;?>" required/>
            </div>
 

     
             <div class="form-group">
            <label>Designation:</label><br>
            <input type='text' name="designation" id="designation" placeholder="Designation" value="<?php echo $designation;?>" required/>
            </div>
   

      
             <div class="form-group">
            <label>Office:</label><br>
            <input type='text' name="office" id="office" value="<?php echo $office;?>" placeholder="Office" required/>
            </div>
      


     
             <div class="form-group">
            <label>Contact Number:</label><br>
            <input type='text' name="contact_n" id="contact_n" value="<?php echo $contact;?>" placeholder="Contact Number" required/>
            </div>

            
            <div class="form-group">
            <br>
            <input type="submit" name="submit" id="submit" value="Update">
            </div>

          </form>



    


      


                                                 
                                                
       

      </div>

      </div>
     </div>

      <div class="col" style="background:whitesmoke;">
      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;">
      <div class="card-header py-3" style="background:white;border-top-left-radius:5px;border-top-right-radius:5px;">
      <h3>User Account</h3>
      </div>
      <div class="card-body" style="border-radius:5px;">
      <div class="form-group">
            <label>Username:</label><br>
            <input type='text' name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $username;?>" required/>
            </div>

            <div class="form-group">
            <label>Password:</label><br>
            <input type='text' name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $password;?>" required/>
            </div>

            <div class="form-group">
            <br>
            <input type="submit" name="submit" id="submit" value="Update">
            </div>
       
     </div></div>
     </div>
      </div>

      <!-- first card body-->
     
      </div> 
      </div>
     
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>


 

 
</body>
</html>
