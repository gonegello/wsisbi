<?php
//get user information
include "a-session.php";
             
	?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $username;?>'s Profile</title>
    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
  input[type="text"]{
    width:80%;
    padding:12px 14px;
    border-radius:5px;
    border:1px solid #ededed;
    background:whitesmoke;
    color:grey;
  }

  input[type="text"]:focus{
    outline:none;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    background:white;
    border:none;
  }
  label{
    color:grey;



  }


  button[type="submit"]{
    background:white;
    border:none;
    padding:10px 10px;
    width:13%;
    border-radius:50px;
    color:#0d47a1;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  }
  button[type="submit"]:hover{
    background:#6ac46a;
    color:white;
  }
  #updateprof{
    background:white;
    border:none;
    padding:10px 10px;
    width:13%;
    border-radius:50px;
    color:#0d47a1;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;

  }
  #updateprof:hover{
    background:#6ac46a;
    color:white;
    border-radius:50px;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  }
  #updateinfo,#saveinfo{
    margin-top:2%;
    margin-bottom:5%;
    background:#6ac46a;
    border:none;
    padding:10px 10px;
    width:15%;
    border-radius:50px;
    color:white;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;

  }
  #updateinfo:hover,#saveinfo:hover{
    background:#6ac46a;
    color:white;
  }

  button[type="button"]{
    background:white;
    border:none;
    padding:10px 10px;
    width:13%;
    border-radius:50px;
    color:#0d47a1;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px; 
  }
  button[type="button"]:hover{
    background:#0d47a1;
    color:white;
  }

  .picform button{
    background:#0d47a1;
    border:none;
    padding:8px 10px;
    width:20%;
    border-radius:5px;
    color:white;

  }
  #closeinfo, #closeprof{
    float:right;
  }
 
  

  </style>


<body>

<!--Insert data information -->


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
  header('location:a-univ.php');

}


?>   



<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
 


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

      
      <div class="row" style="background:whitesmoke;">



     <!-- university -->
     <div class="col" id="hideuniv-div" style="background:whitesmoke;margin-right:20%;margin-left:20%;">
      <div class="card-body" style="border-radius:10px;;background:whitesmoke;">
     

      <div class="card-header py-3" style="background:white;color:grey;border:1px solid #ededed;
      border-bottom:none;border-top-left-radius:5px;border-top-left-radius:10px;border-top-right-radius:10px;">
        <h3>University Information</h3>
      </div>
      <div class="card-body" style="border:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

            
            <div class="row">
              <div class="col" style="text-align:center;">
              <img id="viewpho" style= "object-fit:cover;border-radius:50%;margin-top:3%;" src="<?php echo $univ_logo;?>" alt="Profile Image" height="300px" width="300px"/>
              </div>
            </div> 
            
            <div class="row">
              <div class="col" style="text-align:center;">
              <h2 style="color:#0d47a1;margin-top:1%;"><?php echo $univ_name;?></h2>
              <span>
                <?php echo $univ_ad;?>
              </span>
              </div>
            </div>

            <div class="row">
              <div class="col" style="text-align:center;">
              <button type="button" style="margin-top:2%;margin-bottom:5%;" id="showuniv" ><i class='bx bx-edit' title="Click to Edit Information"></i> Edit Info</button><br>
              </div>
            </div>  
  
        </div>

      </div>
     </div>
     

     <!-- university-->

      <!-- university update-->
      <div class="col" id="edituniv-div" style="background:whitesmoke;margin-right:20%;margin-left:20%;">
      <div class="card-body" style="border-radius:10px;;background:whitesmoke;">
     

      <div class="card-header py-3" style="background:white;color:grey;border:1px solid #ededed;
      border-bottom:none;border-top-left-radius:5px;border-top-left-radius:10px;border-top-right-radius:10px;">
      <div class="row">
        <div class="col">
        <h3>Update University Info</h3>
        </div>
        <div class="col">
          <button type="button" id="closeinfo">Close</button>

        </div>
      </div>
       
      </div>
      <div class="card-body" style="border:1px solid #ededed;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <form method = "post" enctype="multipart/form-data">
            <div class="row">
              <div class="col" style="text-align:center;">
              <input type='file' id="imgLog" name="imgLog" style="display:none" />  
              <img id="addlogo" name="addlogo" style= "object-fit:cover;border-radius:50%;margin-top:3%;" src="<?php echo $univ_logo;?>" alt="Profile Image" height="300px" width="300px"/>
              </div>
            </div> 

            <div class="row" style="margin-top:2%;">
              <div class="col" style="text-align:center;">
                <input type="hidden" name="iduniv" value="<?php echo $univ_id;?>"/>
                <button type="submit" name="updatelogo" id="updatelogo" title="Save Logo?"><i class='bx bx-save'></i> Save Logo</button>
              </div>
            </div>
</form>

            <form action="" method="">
            <div class="row" style="margin-top:3%;margin-bottom:2%;">
              <div class="col">
                <label for="univ_name" style="margin-left:20%;">University Name:</label><br>
                <input type="text" style="float:right;" name="univ_name" value="<?php echo $univ_name;?>" required=""/>
              </div>

              <div class="col">
                <label for="univ_add">Address:</label><br>
                <input type="text" name="univ_add" value="<?php echo $univ_ad;?>" required=""/>
              </div>
            </div>

            <div class="row" style="margin-top:2%;margin-bottom:2%;">
              <div class="col">
                <label for="univ_name" style="margin-left:20%;">Contact No:</label><br>
                <input type="text" style="float:right;"name="univ_con" value="" required=""/>
              </div>

              <div class="col">
                <label for="univ_add">Zip Code:</label><br>
                <input type="text" name="zip_code" value="" required=""/>
              </div>
            </div>

            <div class="row" style="margin-top:2%;margin-bottom:2%;">
              <div class="col">
                <label for="univ_name" style="margin-left:20%;">Campus Director:</label><br>
                <input type="text" style="float:right;" name="univ_dir" value="" required=""/>
              </div>

              <div class="col">
                <label for="univ_add">Campus Dean:</label><br>
                <input type="text" name="univ_dean" value="" required=""/>
                
              </div>
              </div>
          
            <div class="row">
              
              <div class="col" style="text-align:center;">
              <button type="button" style="margin-top:2%;margin-bottom:5%;" id="saveinfo" title="Update Info?"><i class='bx bx-save'></i> Update Info </button>
              </div>
            </div>
</form>  
  
        </div>

      </div>
     </div>
     

     <!-- university-->


     
      </div>

      <!-- first card body-->

    
     
      </div> 

      

    
     
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 

<script src = "assets/bootstrap/js/logo.js"></script>


    

<script>
   
    const closeinfo = document.getElementById("closeinfo");//btn
    var hideuniv3 = document.getElementById("hideuniv-div");//div
   // const showuniv = document.getElementById("showuniv");//btn
    const edituniv3 = document.getElementById("edituniv-div");//div

    closeinfo.onclick = function(){
     
      edituniv3.style.display = "none";
      hideuniv3.style.display = "block";


    }

  </script>

  <script>
  

  

    var hideuniv1 = document.getElementById("hideuniv-div");//div
    const showuniv1 = document.getElementById("showuniv");//btn
    const edituniv1 = document.getElementById("edituniv-div");//div

    edituniv1.style.display = "none";
    showuniv.onclick = function(){
      hideuniv1.style.display = "none";
      edituniv1.style.display = "block";
    }

    


  </script>






 

 
</body>
</html>
