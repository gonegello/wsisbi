<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];
       

        $query=mysqli_query($conn,"select *from `user` where id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['id'];
            $username=$row['username'];
            $password=$row['password'];
        }

        date_default_timezone_set('Asia/Manila');

        $datte = date("Y-m-d");
        $time = date("h:i:s A ");



             
	?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Update Information</title>
    <?php include "a-linkstyle.php";
    ?>



    
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>

input[type="text"]:focus{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    background:white;
    border:none;
}
input[type="text"]{
  border-radius:50px;
}
input[type="text"]:hover{
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}
.row{
  margin-bottom:3%;
}
.col{
  margin-right:4%;
  margin-left:4%;
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
#cancel{
  padding:12px 15px;
  border-radius:5px;
  color:grey;
  border:none;
  outline:none;
  margin-top:3%;
    }

#cancel:hover{
  background:#CD5C5C;
  color:white;
}
  </style>


<body style="background:whitesmoke;">
<!--Insert data information -->
<?php

if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
    
    $check = mysqli_query($conn,"insert into admin(profile,fullname,designation,office,contact_n,date_updated,time_updated,user_id) values('$dst_db','$_POST[fullname]','$_POST[designation]','$_POST[office]','$_POST[contact]','$_POST[date_updated]','$_POST[time_updated]','$_POST[userid]')");  // executing insert query
    mysqli_query($conn,"UPDATE `user` SET `username` = '$_POST[username]', `password` = '$_POST[password]', `status` = '$_POST[status]' WHERE `id` = '$_POST[userid]'")or die(mysqli_error());
    if($check)
    {
      
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
      header('location: index.php');  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}
?>
    

 <!-- Container fluid Dashboard-->
    <div class="container-fluid" style="background:whitesmoke;">
          <div class="card-shadow" style="background:whitesmoke;"> 
            <div class="row" style="background:whitesmoke;">




              <div class="col">

              
             <!-- card body-->
             <div class="card-header" style="background:white;border-top-left-radius:10px;
             margin-right:10%;border-top-right-radius:10px;margin-left:10%;border:1px solid #ededed;">
             <span>Hi,</span><br>
            <span style="color:#50C878;font-weight:bold;font-size:30px;"><?php echo $username;?>,</span>
            <span style="color:grey;font-size:15px;">It's your first time logging in!
            We recommend you to update your account settings for your security.</span><br>
             </div>
            <div class="card-body" style="margin-right:10%;margin-left:10%;
            border-bottom:1px solid #ededed;border-right:1px solid #ededed;border-left:1px solid #ededed;
            border-bottom-left-radius:10px;border-bottom-right-radius:10px;"> 

                <div class="row">
           
            
              <div class="col">
            
          
                
              <div class="row">
              <form id="form1" method = "post" enctype="multipart/form-data">

              
              <!--choose image-->
              <div class="col" style="margin-left:9%;">
              <label>Profile Photo :</label><br>
              <input type='file' id="imgInp" name="imgInp" style="display:none" required>
              <!-- preview image here-->
              <img id="blah" style="border-radius:5px; object-fit:cover;cursor:pointer;" src="image/addpic.png"  alt="add profile photo" height="200px" width="200px"  />
              </div>
              </div>
              
                  <!--Fullname -->
              <div class="row">
              <div class="col">
              <label>Fullname : </label><br>
              <input type="text" id="fullname" name="fullname" placeholder="Fullname" required=""/>
              </div>
              </div>
                <!--Designation -->
              <div class="row">
              <div class="col">
              <label>Designation :</label><br>
              <input type="text"  id="designation" name="designation" placeholder="Designation">
              </div>
              </div>

               
                <!--Office -->
              <div class="row">
              <div class="col">
              <label>Office</label>
              <input type="text" id="office" name="office" placeholder="Office">
              </div>
              </div>
              
                <!--Contact Number -->
              <div class="row">
              <div class="col">
              <label>ContactNo.</label>
              <input type="text"  id="contact" name="contact" placeholder="ContactNo.">
              </div>
              </div>
               
                <!--Username -->
              <div class="row">
              <div class="col">
              <label>Username</label>
              <input type="text" name="username" id="username" value="<?php echo $username;?>" placeholder="Updated Username" required=""/>
              </div>
              </div>
                
                <!--Password -->
              <div class="row">
              <div class="col">
              <label>New Password : </label><span color:><span style="color:#50C878;font-size:12px;float:right;">*recommended</span>
              <input type="text" id="password" name="password" value="<?php echo $password;?>" placeholder="New Password" required=""/>
              </div>
              </div>               
               
              <input type="hidden" name = "userid"value="<?php echo $id;?>" id="userid">
              <input type="hidden" name = "status" value="updated" id="status">
              <input type="hidden" name = "date_updated" value="<?php echo $datte;?>" id="date_updated">
              <input type="hidden" name = "time_updated" value="<?php echo $time;?>" id="time_updated">

              <div class="row">
              <div class="col">

                 
              <input type="submit" name="submit" id="update" value="Update">
              <a href="index.php"><button type="button" name="cancel" id="cancel">Cancel</button></a>
              </div>
              </div>
                
              </div>
              
              
              
              
              
            </form>
            </div><!-- col end-->

            
            </div><!-- row end-->
          
            </div>

        



</div>
            
</section>

 <!-- script for tabs-->
 
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/updateone.js"></script>

 
</body>
</html>
