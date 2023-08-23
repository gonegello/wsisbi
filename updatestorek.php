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


             
	?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Update Profile</title>

   
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>


<body>
<!--Insert data information -->
<?php

if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./sk_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "sk_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	
    $check = mysqli_query($conn,"insert into skeeper(profile,fullname,designation,office,contact_n,user_id) values('$dst_db','$_POST[fullname]','$_POST[designation]','$_POST[office]','$_POST[contact]','$_POST[userid]')");  // executing insert query
    mysqli_query($conn,"UPDATE `user` SET `username` = '$_POST[username]', `password` = '$_POST[password]' WHERE `id` = '$_POST[userid]'")or die(mysqli_error());
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
    <div class="container-fluid">
        <br><br>
        <!-- row-->
        <div class="row">
        <!-- card container for the left side-->
          <div class="card-shadow" style="width:60%;margin-left:20%; margin-right:20%; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;border-radius:5px;">

            <!--card header-->
            <div class="card-header py-3" style="background:white;"><br>
                <center>
            <span style="font-size: 30px; color:#C6A477;font-weight:bold;">Update Profile</span>
                </center>
             </div>
             <!-- card body-->
            <div class="card-body">    
              <center>
                
                <!-- update admin form-->
              <form id="form1" method = "post" enctype="multipart/form-data">
              <!--choose image-->
                <input type='file' id="imgInp" name="imgInp" style="display:none" />
              <!-- preview image here-->
                <img id="blah" style="border-radius:50%; object-fit:cover;" src="image/photo.jpg"  alt="your image" height="200px" width="200px"  />
           
              <div class="form-col">
                <div class="form-group col-md-6">
                  <!--Fullname -->
                  <label>Fullname</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required=""/>
                </div>
                <!--Designation -->
                <div class="form-group col-md-6">
                  <label class="designation">Designation</label>
                  <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                </div>
                <!--Office -->
                <div class="form-group col-md-6">
                  <label class="office">Office</label>
                  <input type="text" class="form-control" id="office" name="office" placeholder="Office">
                </div>
                <!--Contact Number -->
                <div class="form-group col-md-6">
                  <label class="contactno">ContactNo.</label>
                  <input type="text" class="form-control" id="contact" name="contact" placeholder="ContactNo.">
                </div>
                <!--Username -->
                <div class="form-group col-md-6">
                  <label class="contactno">Update Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>" placeholder="Updated Username" required=""/>
                </div>
                <!--Password -->
                <div class="form-group col-md-6">
                  <label class="contactno">New Password</label>
                  <input type="text" class="form-control" id="password" name="password" value="<?php echo $password;?>" placeholder="New Password" required=""/>
                </div>
               
                  <input type="hidden" class="form-control" name = "userid"value="<?php echo $id;?>" id="userid">
                 
               
              
                
              </div>
              
              
              
              
              <input type="submit" name="submit" value="Upload">
            </form>
          </center>
            </div>

          </div>
<!-- end of card container for the left side-->


</div> <!-- end of row-->
 
  <!--End container fluid dashboard-->
            
  </section>

 <!-- script for tabs-->
 
 <script src = "assets/bootstrap/js/updateone.js"></script>

 
</body>
</html>
