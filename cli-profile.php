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
            $position = $row['position'];
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
  input[type="submit"]{
    background:#0d47a1;
    border:none;
    padding:8px 10px;
    width:20%;
    border-radius:5px;
    color:white;
    float:right;
  }
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
  #closeprofileinfo{
  padding:13px 13px;
  border-radius:50%;
  background-color: white;
  color:grey;
  font-size:30px;
  border:none;
  outline:none;
  float:right;
}

#closeprofileinfo:hover{
  font-size:40px;
}


  input[type="text"]:focus{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    background:white;
    border:none;
    outline:none;
}
input[type="text"]{
  border-radius:10px;
  border:1px solid #ededed;
  color:royalblue;
  font-style:italic;
  width:100%;
  outline:none;
  padding:12px 12px;
}
input[type="text"]:hover{
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
#update{
    padding:12px 15px;
  border-radius:5px;
  background:#50C878;
  color:white;
  margin-top:3%;
  border:none;
  outline:none;
  float:right;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
 #update:hover{
        background:black;
        color:white;
    }
  </style>


<body style="background:whitesmoke;">

<!--Insert data information -->
<?php

if(isset($_POST["updateprof"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./admin_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "admin_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    $act = "Updated";
    $details = "Profile Picture";
    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
    
    mysqli_query($conn, "insert into `clientlog` (fullname,activity,details, user_id) values ('$_POST[fullname]','$act','$details','$_POST[user_id]')");
    mysqli_query($conn,"UPDATE `people` SET `profile` ='$dst_db' WHERE `user_id` = '$_POST[user_id]'"); 
 
   
   header('location:cli-profile.php');  // executing insert query
    
    
    
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
require_once "xc-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->


  
      <div class="row" style="background:whitesmoke;">
      

      <div class="col" id="hideinfo" style="background:whitesmoke;margin-right:20%;margin-left:20%;">
      <div class="card-body" style="border-radius:10px;background:whitesmoke;">
     

     
      <div class="card-header py-3" style="background:white;color:grey;border-top-left-radius:10px;border-top-right-radius:10px;border-top:10px solid #A3A3FF;border-left:1px solid #ededed;border-right:1px solid #ededed;">
        <h3>Profile Settings</h3>
      </div>
      <div class="card-body" style="border-bottom:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;border-left:1px solid #ededed;border-left:1px solid #ededed;border-right:1px solid #ededed;">

            <div class="card-body">
            
                                           
          
               <!-- preview image here-->
                <img id="viewpho" style= "object-fit:cover;border:1px solid grey;border-radius:50%;margin-left:30%;" src="<?php echo $profile;?>" alt="Profile Image" height="300px" width="300px"/><br>
                                                
                </div>
                <div class="form-group">
            <br>
            <h2 style="color:#A3A3FF;margin-left:38%;"><?php echo $fullname;?></h2>
            <span style="margin-left:42%;">@<?php echo $username;?></span>
            </div>
             
              
            
            <div class="form-group">
            <br>
            <button id=showdiv style="margin-left:38%;">Edit Profile</button><br>
            </div>

      </div>

      </div>
     </div>

      <div class="col" id="editprofile" style="background:whitesmoke;display:none;margin-right:20%;margin-left:20%;">

      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;">
      <div class="card-header py-3" style="background:white;border-top-left-radius:5px;border-top-right-radius:5px;">
        <div class="row">
          <div class="col">
            <h3>User Account</h3>
          </div>
          <div class="col">
          <button type="button"  id="closeprofileinfo"><i class='bx bx-x' ></i></button>
          </div>
      </div>
      </div>


      <div class="card-body" style="border-radius:5px;margin-left:10%;margin-right:10%;">
      <form class="picform" method = "post" enctype="multipart/form-data">

              <input type='file' id="imgInp" name="imgInp" style="display:none" />
               <!-- preview image here-->
                <img id="addpho" style= "object-fit:cover;border:1px solid grey;border-radius:50%;margin-left:25%;" src="<?php echo $profile;?>" alt="Profile Image" height="300px" width="300px"/><br>
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $userid;?>">  
                <input type="hidden" id="fullname" name="fullname" value="<?php echo $fullname;?>"> <br>
                <button type="submit" name="updateprof" id="updateprof" style="margin-left:34%;">Update Profile</button>
                                                     
              <div>
         </form> 
         <br>
         <form method="post" action = "a-updatecprof.php">
   
         <div class="row">
           <div class="col">
             <label for="lastname">Lastname</label>
           <input type='text' name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname;?>" required/>

           </div>
           <div class="col">
           <label for="firstname">Firstname</label>
           <input type='text' name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname;?>" required/>

           </div>
           <div class="col">
           <label for="m_initial">Middle Initial</label>
           <input type='text' name="m_initial" id="m_initial" placeholder="Middle Initial" value="<?php echo $m_initial;?>" >

           </div>
         </div>

         <div class="row">
           <div class="col">
             <label for="office">Office :</label>
           <input type='text' name="office" id="office" placeholder="Office" value="<?php echo $office;?>" required/>
           </div>
           <div class="col">
           <label for="position">Position :</label>
           <input type='text' name="position" id="position" placeholder="Position" value="<?php echo $position;?>" required/>
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



        
            <button type="submit" name="submit" id="submit">Update</button>


          </form>
          
       
     </div>
    </div>
     </div>
      </div><!-- -->

      <!-- first card body-->
     
      </div> 
      </div>
     
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

<script>
  const targetDiv = document.getElementById("editprofile");
const btn = document.getElementById("showdiv");
var hideinfo = document.getElementById("hideinfo");
btn.onclick = function () {
  
    targetDiv.style.display = "block";
    hideinfo.style.display = "none";


  
};
   </script>

<script>
const closeprofile = document.getElementById("editprofile");
const closebtn = document.getElementById("closeprofileinfo");
const showhidden = document.getElementById("hideinfo");

closebtn.onclick = function(){
    closeprofile.style.display = "none";
    showhidden.style.display = "block";


}

</script>




 

 
</body>
</html>
