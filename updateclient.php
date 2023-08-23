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
            $position=$row['position'];
        }

        date_default_timezone_set('Asia/Manila');

        $datte = date("F d, Y");
        $time = date("h:i A ");
             
	?>
<?php include "departments.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Update Information
    </title>

    <?php include "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<style>
  input[type="text"]:focus, select:focus{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    background:white;
    border:none;
}
input[type="text"],select{
  border-radius:10px;
  color:#50C878;
  font-style:italic;
  width:100%;
}
#office{
  padding:13px 13px;
  outline:none;
  border:none;
  background:whitesmoke;
  color:grey;
}
input[type="text"]:hover, select:hover{
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

//lastname,firstname,m_initial,position,office,stat,fullname, exten,last_update,last_time,user_id,profile,contact_n - people table
//username,password - users table

if(isset($_POST["submit"]))
{

  

  $last_update = date("F d, Y");
  $last_time = date("h:i A ");

  $join = array($_POST['firstname'],$_POST['m_initial'],$_POST['lastname']);
  $fullname = join(" ",$join);


    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./client_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "client_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	

    if(empty($dst_db))
    {
      echo '<script type="text/javascript"> alert("Profile Image Is Required*!"); </script>';
      header('location: updateclient.php');  // alert message
    }
    else
    {
      $check = mysqli_query($conn,"insert into people(lastname,firstname,m_initial,office,stat,fullname,position,exten,last_update,last_time,user_id,profile,contact_n) 
      values('$_POST[lastname]','$_POST[firstname]','$_POST[m_initial]','$_POST[office]','$_POST[status]','$fullname','$_POST[position]','$_POST[exten]','$last_update','$last_time','$_POST[userid]','$dst_db','$_POST[contact]')");  // executing insert query
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
    
}
?>
    

    <!-- Container fluid Dashboard-->
    <div class="container-fluid" style="background:whitesmoke;">
          <div class="card-shadow" style="background:whitesmoke;"> 
            <div class="row" style="background:whitesmoke;">




              <div class="col">

              
             <!-- card body-->
             <div class="card-header" style="background:white;border-top-left-radius:10px;
             margin-right:10%;border-top-right-radius:10px;margin-left:10%;border:1px solid #ededed;margin-top:5%;">
             <span>Hi,</span><br>
            <span style="color:#50C878;font-weight:bold;font-size:30px;"><?php echo $username;?>,</span>
            <span style="color:grey;font-size:15px;">It's your first time logging in!
            We recommend you to update your account settings for your security.</span><br>
             </div>
            <div class="card-body" style="margin-right:10%;margin-left:10%;
            border-bottom:1px solid #ededed;border-right:1px solid #ededed;border-left:1px solid #ededed;
            border-bottom-left-radius:10px;border-bottom-right-radius:10px;"> 
                
              <div class="row">
              <form id="form1" method = "post" enctype="multipart/form-data">

              
              <!--choose image-->
              <div class="col" style="margin-left:9%;">
              <label>Add Profile Photo :</label><br>
              <input type='file' id="imgInp" name="imgInp" style="display:none" required>
              <!-- preview image here-->
              <img id="blah" style="border-radius:5px; object-fit:cover;cursor:pointer;" src="image/addpic.png"  alt="add profile photo" height="200px" width="200px"  />
              </div>

              <div class="col">

              </div>

              <div class="col">

              </div>
              </div>
              
                  <!--first row -->

              <div class="row">
              <div class="col">
                <label for="lastname">Last Name :</label>
              <input type="text" id="lastname" name="lastname" placeholder="Lastname" required=""/>
              </div>

              <div class="col">
              <label for="firstname">First Name :</label>

              <input type="text" id="firstname" name="firstname" placeholder="Firstname" required=""/>
              </div>
              <div class="col">
              <label for="m_initial">Middle Initial :</label>

              <input type="text" id="m_initial" name="m_initial" placeholder="m_initial" >
              </div>
              </div>


              <div class="row">
                <div class="col">
                <label>Position :</label><br>
              <input type="text"  id="position" name="position" placeholder="Position" value="<?php echo $position;?>" readonly="readonly"/>
                </div>
                <div class="col">
                <label for="office">Office</label>
            
              <select name="office" id="office" style="">
                    
                    <?php echo $depart;?>
                    </select>  
              </div>
                <div class="col">
                  <label for="contact">Contact No. :</label>
                <input type="text"  id="contact" name="contact" placeholder="ContactNo.">
                </div>
              </div>

    
              <div class="row">
                <div class="col">
                  <label for="exten">Degree Extension :</label>
                <input type="text"  id="exten" name="exten" placeholder="Degree Ex.">

                </div>
              <div class="col">
              <label>Username :</label>
              <input type="text" name="username" id="username" value="<?php echo $username;?>" placeholder="Updated Username" required=""/>
              </div>
              <div class="col">
              <label>New Password : </label><span color:><span style="color:#50C878;font-size:12px;float:right;">*recommended</span>
              <input type="text" id="password" name="password" value="<?php echo $password;?>" placeholder="New Password" required=""/>
              </div>
              </div>
                
                          
               
            


              

              <div class="row">
              <div class="col">

              <input type="hidden" name = "userid"value="<?php echo $id;?>" id="userid">
              <input type="hidden" name = "status" value="1" id="status">
            
              <input type="submit" name="submit" id="update" value="Update Info">
              <a href="index.php"><button type="button" name="cancel" id="cancel">Cancel</button></a>
              </div>
              </div>
                

</form>
</div>
</div>
</div>
</div>
</div>
</div>
            
            


 <!-- script for tabs-->
 
 <script src = "assets/bootstrap/js/updateone.js"></script>

 
</body>
</html>
