<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `people` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $clientid=$row['idc'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            $office=$row['office'];
     
            $contact = $row['contact_n'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $m_initial = $row['m_initial'];
            $exten = $row['exten'];

      
        }

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
          $username =$roww['username'];
          $password = $roww['password'];
          $position = $roww['position'];
        }

             
	?>

<?php include "departments.php";?>



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

<!--Insert data information -->
<?php

if(isset($_POST["updateprof"]))
{
  date_default_timezone_set('Asia/Manila');
  $date_a = date("F d, Y");
  $time = date("h:i A ");

    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./admin_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "admin_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name
    $his_stat = "profilepic";
    $act = "Updated";
    $details = "updated";
    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
    
    mysqli_query($conn, "insert into `clientlog` (fullname,activity,details, user_id) values ('$_POST[fullname]','$act','$details','$_POST[user_id]')");
    mysqli_query($conn,"UPDATE `people` SET `profile` ='$dst_db' WHERE `user_id` = '$_POST[user_id]'"); 
    mysqli_query($conn, "insert into `history` (user_id,his_stat,details_, his_date,his_time) values 
    ('$_POST[people_id]','$his_stat','$details','$date_a','$time')");

   header('location:x-profile.php');  // executing insert query

    
    
      
    /*if($check)
    {  
      
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
      header('location:cli-profile.php');  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
    */
    
}
?>

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
 
   

       


<?php 
          //if client request to department head is successful
          if(isset($_SESSION['uprof']))
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
              </div><hr><i><?=$_SESSION['uprof'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['uprof']);
            }
      ?>


  <div class="row" style="margin-top:3%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     
  <div class="col" style="padding:0;background:#A3A3FF;border-top-left-radius:10px;border-bottom-left-radius:10px;">
    <div class="card-body" style="background:#A3A3FF;border-top-left-radius:10px;">
    </div>
    <div class="card-body" style="background:#A3A3FF; border-bottom:20px solid white;margin-top:18%">
    <i class='bx bx-user' style="margin-left:10%;color:white;font-size:80px;"></i>
    <h1 style="color:white;margin-left:10%;font-size:80px;">Account<br>Settings</h1>
    </div>

    <div class="card-body" style="background:#A3A3FF;border-bottom-left-radius:10px;">
    <span style="margin-left:10%;color:white;font-size:25px;font-weight:bold;"><?php echo $fullname;?></span><br>
    <span style="margin-left:10%;color:white;"><?php echo $position;?></span><br>
    <span style="margin-left:10%;color:white;"><?php echo $office;?></span><br>
    <span style="margin-left:10%;color:white;"><?php echo $contact;?></span>
    </div>  
  </div>
  <div class="col" style="padding:0;background:#A3A3FF;border-top-right-radius:10px;border-bottom-right-radius:10px;">
      
     <div class="card-body" id="dash" style="border-top-right-radius:10px;border-top-left-radius:50px;text-align:center;
     background-size:cover;background-repeat:no-repeat;">
      <div class="card-body" style="text-align:center;">
                <h4>Profile Settings</h4>
            </div>
            <form class="picform" method ="post" enctype="multipart/form-data">
            <input type='file' id="imgInp" name="imgInp" style="display:none" required>
            <img id="addpho" style= "object-fit:cover;border-radius:50%;" src="<?php echo $profile;?>" alt="Profile Image" height="200px" width="200px"/>
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $userid;?>">  
            <input type="hidden" id="people_id" name="people_id" value="<?php echo $clientid;?>">  
            <input type="hidden" id="fullname" name="fullname" value="<?php echo $fullname;?>">
     
     <br><span style="font-size:12px;">*click photo to change profile pic.</span>  
    </div>

        <div class="card-body" style="text-align:center;">
       
        <button type="submit" name="updateprof" id="updateprof">Update Profile</button>
        </div>
        </form>   

        <form method="post" action = "a-updateadprof.php">
        <div class="card-body" style="border-top:1px solid #ededed;border-bottom-left-radius:50px;
        border-bottom-right-radius:10px;">
            <div class="card-body" style="text-align:center;">
                <h4>Account Information</h4>
            </div>
            <div class="row">
                <div class="col">
                <label for="lastname">Lastname :</label>
                <input type='text' name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname;?>" required/>
                </div>

                <div class="col">
                <label for="firstname">Firstname :</label>
                <input type='text' name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname;?>" required/>
                </div>

                <div class="col">
                <label for="m_initial">Middle Initial :</label>
                <input type='text' name="m_initial" id="m_initial" placeholder="Middle Initial" value="<?php echo $m_initial;?>" >
                </div>
            </div>

            <div class="row">
                <div class="col">
                <label for="office">Office : <span style="font-style:italic;color:black;font-weight:bold;"><?php echo $office;?></span></label>
         
           <select name="office" id="office" style="">
                    
                    <?php echo $depart;?>
                    </select>  
                </div>
              
            </div>

            <div class="row">
            <div class="col">
                <label for="position">Position :</label>
                <input type='text' name="position" id="position" placeholder="Position" value="<?php echo $position;?>" readonly="readonly"/>
                </div>
                <div class="col">
                <label for="contact_n">Contact No. :</label>
                <input type='text' name="contact_n" id="contact_n" placeholder="Contact No." value="<?php echo $contact;?>" required/>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <label for="exten">Degree Extension :</label>
                <input type='text' name="exten" id="exten" placeholder="Degree Extension" value="<?php echo $exten;?>">
                </div>
                <div class="col">
                <label for="username">Username :</label>
                <input type='text' name="username" id="username" placeholder="Username" value="<?php echo $username;?>" required/>
                </div>
                <div class="col">
                <label for="password">Password :</label>
                <input type='text' name="password" id="password" placeholder="Password" value="<?php echo $password;?>" required/>
                <input type='hidden' name="userid" id="userid" value="<?php echo $userid;?>">
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
