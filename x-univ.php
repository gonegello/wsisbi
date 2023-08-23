

<?php 
include "departments.php";
include "a-session.php";
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

  .form-group button{
    background:#0d47a1;
    border:none;
    padding:8px 10px;
    width:20%;
    border-radius:5px;
    color:white;
    margin-right:20%;
     
  }
  .picform button{
    background:#0d47a1;
    border:none;
    padding:8px 10px;
    width:20%;
    border-radius:5px;
    color:white;
    
  }
  #showdiv{
    padding:10px 15px;
    background:whitesmoke;
    color:grey;
    
  }
  #showdiv:hover{
    background:#0d47a1;
    color:white;
  }

  input[type="text"]:focus, #office:focus{
  
    background:white;
    border:none;
    outline:none;
}
input[type="text"], #office{
  border-radius:10px;
border:none;
  color:royalblue;
  font-style:italic;
  width:100%;
  outline:none;
  padding:12px 12px;
}
input[type="text"]:hover, office:hover{
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}
.row{
  margin-bottom:3%;
}
.col{

}
label{
  font-size:13px;
}
#updateprof{
    padding:10px 12px;
    background:#A3A3FF;
    color:white;
    outline:none;
    border:none;
    border-radius:5px;
  
    }
 #updateprof{
       
    }

    button[type="submit"]{
        padding:10px 12px;
    background:#77dd77;
    color:white;
    outline:none;
    border:none;
    border-radius:5px;
  }
  </style>


<body style="background:whitesmoke;">
<?php
if(isset($_POST["updatelogo"]))
{
  $var1 = rand(1111,9999);  // generate random number in $var1 variable
  $var2 = rand(1111,9999);  // generate random number in $var2 variable

  $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
  $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

  $fnm = $_FILES["imgLog"]["name"];    // get the image name in $fnm variable
  $dst = "./admin_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
  $dst_db = "admin_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

  move_uploaded_file($_FILES["imgLog"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
  mysqli_query($conn,"UPDATE `university` SET `univ_logo` ='$dst_db' WHERE `iduniv` = '$_POST[iduniv]'"); 
  $_SESSION['logoupdated'] = "`You Successfully Updated the University Logo.`";
  header('location:x-univ.php');

}


?>   


<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
 

  <?php 
          //if client request to department head is successful
          if(isset($_SESSION['logoupdated']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Logo Updated</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['logoupdated'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['logoupdated']);
            }
      ?>

      


<?php 
          //if client request to department head is successful
          if(isset($_SESSION['updateduniv']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Success!</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['updateduniv'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['updateduniv']);
            }
      ?>

      
 
  <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     
  <div class="col" style="padding:0;background:#A3A3FF;border-top-left-radius:10px;border-bottom-left-radius:10px;">
    <div class="card-body" style="background:#A3A3FF;border-top-left-radius:10px;">
    </div>
    <div class="card-body" style="background:#A3A3FF; border-bottom:20px solid white;margin-top:18%">
    <i class='bx bx-school' style="margin-left:10%;color:white;font-size:80px;"></i>
    <h1 style="color:white;margin-left:10%;font-size:80px;">University<br>Settings</h1>
    </div>

    <div class="card-body" style="background:#A3A3FF;border-bottom-left-radius:10px;">
    <span style="margin-left:10%;color:white;font-size:25px;font-weight:bold;"></span><br>
    <span style="margin-left:10%;color:white;"></span><br>
   
    </div>

  </div>
  <div class="col" style="padding:0;background:#A3A3FF;border-top-right-radius:10px;border-bottom-right-radius:10px;">
      
     <div class="card-body" id="dash" style="border-top-right-radius:10px;border-top-left-radius:50px;text-align:center;
     background-size:cover;background-repeat:no-repeat;">
      <div class="card-body" style="text-align:center;">
      <h4>Logo Settings</h4>
      </div>

            <form class="picform" method = "post" enctype="multipart/form-data"> 
            <input type='file' id="imgInp" name="imgInp" style="display:none"/>
            <img id="addpho" style= "object-fit:cover;border-radius:50%;" src="<?php echo $univ_logo;?>" alt="Profile Image" height="200px" width="200px"/>
            <input type="text" id="people_id" name="people_id" style="text-align:center;" value="<?php echo $univ_name;?>" disabled>  
               
     
     <br><span style="font-size:12px;">*click photo to change logo.</span>  
    </div>

        <div class="card-body" style="text-align:center;">
        <input type="hidden" name="iduniv" value="<?php echo $univ_id;?>"/>
        <button type="submit" name="updateprof" id="updateprof">Update Logo</button>
        </div>

        </form> 

        <form method="post" action = "updateuniv.php">
        <div class="card-body" style="border-top:1px solid #ededed;border-bottom-left-radius:50px;
        border-bottom-right-radius:10px;">
            <div class="card-body" style="text-align:center;">
                <h4>University Information</h4>
            </div>
            <div class="row">
                <div class="col">
               
                <label for="univ_name" >University Name:</label>
                <input type="text" name="univ_name" value="<?php echo $univ_name;?>" required=""/>
                </div>

                <div class="col">
               
                <label for="univ_add">Address:</label>
                <input type="text" name="univ_add" value="<?php echo $univ_ad;?>" required=""/>
                </div>

            </div>

            <div class="row">
            <div class="col">
               
                <label for="univ_con">Contact No:</label>
                <input type="text" name="univ_con" value="<?php echo $univ_con;?>" required=""/>
                </div>
                <div class="col">
                <label for="abb">Abbreviation:</label>
                <input type="text" name="abb" value="<?php echo $univ_abb;?>" required=""/>
               
                </div>
            </div>

            <div class="row">
               <div class="col">
               <label for="univ_dir" style="">Campus Director:</label>
                <input type="text" style="float:right;" name="univ_dir" value="<?php echo $univ_dir;?>" required=""/>
               </div>
               <div class="col">
               <label for="univ_dean">Campus Dean:</label><br>
                <input type="text" name="univ_dean" value="<?php echo $univ_dean;?>" required=""/>
                <input type="hidden" name="iduniv" value="<?php echo $univ_id;?>" >
               </div>
               

            </div>

            <div class="row" style="margin-top:5%;">
               
                <div class="col" style="text-align:center;">
                <button type="submit" name="submit" id="submit">Update Info</button>
                </div>
            </div>
        </div>
</form>

</div>
</div>

<?php include "bottom.php";?>
     
      </div> 
      </div>         
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>




 

 
</body>
</html>
