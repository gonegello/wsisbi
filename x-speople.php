<?php
//get user information
       include "a-session.php";
       include "accrole.php";
       include "x-count.php";
	?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>People</title>

    <?php require_once "a-linkstyle.php";?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
 
html {
  scroll-behavior: smooth;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;

    
}
.iar{
    padding:10px;
    margin-left:1%;
    font-size:12px;
    color:white;
}
.iar:hover{
    font-size:13px;
    color:white;
    text-decoration:none;
}
#dash{
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  border-radius:none;
  z-index:1;
}



input[type="text"]{
    border-radius:10px;
    border:1px solid #ededed;
    background:white;
    outline:none;
    font-style:italic;
    color:#5DBB63;
}

input[type="select"]{
  background:white;
}

label{
    font-size:12px;
    
}

.options{
    margin-right:1%;
    font-size:25px;
}

#save{
  background:#77DD77;
  padding:12px 25px;
}



.opptions{
  background:none;
  padding:10px 15px;
  color:grey;
  border-radius:5px;
  margin-left:3%;
  font-size:20px;
 
}

.opptions:hover{
  background:#f0f0f0;
  text-decoration:none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;;
  border-radius:50%;
  color:grey;

  

}
  </style>


<body style="background:whitesmoke;" onload="loadUser()">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->

 

     
     <?php //Display if added to cart successfully
  if(isset($_SESSION['useradded']))
  {
  ?>
      <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Success <i class='bx bx-check'></i></h1><hr>
      <i><?=$_SESSION['useradded'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['useradded']);
  }
  ?>

<?php //Display if added to cart successfully
  if(isset($_SESSION['userexists']))
  {
  ?>
      <div class="alert alert-warning alert-dismissible fade show" id="div-success" role="alert" 
      style="margin-top:3%;margin-left:10%;margin-right:10%;">
      <h1>Failed</h1><hr>
      <i><?=$_SESSION['userexists'];?></i>
      </div>
      <?php  //unset session added
      unset($_SESSION['userexists']);
  }
  ?>

  
  
  <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-user" style="font-weight:bold;"></i> Accounts</h1>



</div>
 
     <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-user"></i><span> &nbsp; ACCOUNTS</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          
          <a href="#rec" class="iar">Recently Created</a> |
            <a href="#ad" class="iar">Admin</a> |
            <a href="#client" class="iar">Client</a> 
        

          </div>
           
        </div>
        </div>




        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">ADD AN ACCOUNT :</h6>
   
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>
     

        







        <div class="card-body">
            
        <form id="frmUser" method="post">
            <div class="row" id="result-message">

            </div>
                <div class="row" style="">
                  <div class="col">
                  <label for="username" style="color:royalblue;">Username:</label>
                    <input type="text" name = "username" id="username" placeholder="Enter username">   
                  </div>
                     
                </div><br>

                <div class="row" style="">
                  <div class="col">
                  <label for="userole" style="color:royalblue;">Account Type:</label><br>
                    <select name="userole" id="userole" style="background:white;border:1px solid #ededed;">
                    <?php echo $accrole;?>
                    </select>  
                  </div>
                    
                </div>

                <div class="row" style="">
                  <div class="col">
                    <input type = "hidden" name="dc" id="dc" value="<?php echo $datte;?>" >
                    <input type = "hidden" name="time_created" id="time_created" value="<?php echo $time;?>" >
                    <input type = "hidden" name="created_by" id="created_by" value="<?php echo $id;?>">
                    <input type = "hidden" name="status" id="status" value="not-updated" >

                  </div>
                  </div>
              
              

                <div class="row">
                <div class="col" style="">
                <span style="font-size:12px;color:#77DD77;">*Password is auto generated.</span>  
                 <input type = "button" name="save" id="save" value="Save" onclick="addUser()" style="margin-top:4%;float:right;"/>
                </div>

              
                </div>

                  
                </form>

                <script type="text/javascript">
                    function addUser()
                    {
                        var username = document.getElementById("username").value;
                        var userole = document.getElementById("userole").value;
                        var dc = document.getElementById("dc").value;
                        var time_created = document.getElementById("time_created").value;
                        var created_by = document.getElementById("created_by").value;
                        var status = document.getElementById("status").value;

                        var msg = '';
                        if(username.length == 0)
                        {
                            msg = "Username is required";
                        }

                        if(msg.length > 0)
                        {
                            document.getElementById("result-message").innerHTML = msg;
                            return;
                        }

                        var param = "username=" + username;
                            param += "&userole=" + userole;
                            param += "&dc=" + dc;
                            param += "&time_created=" + time_created;
                            param += "&created_by=" + created_by;
                            param += "&status=" + status;

                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200)
                            {
                                var json = JSON.parse(this.responseText);

                                document.getElementById("result-message").innerHTML = json['message'];

                                if(json['code'] == 0)
                                {
                                    document.getElementById("frmUser").reset();
                                }
                            }
                        };
                        xmlhttp.open("POST", "addData.php", true);
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send(param);
                    
                    }

                    </script>

        </div>

       
        <div class="card-body" style="background:whitesmoke;" id="rec">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">RECENT:</h6>
   
    </div>
          <div class="col" style="text-align:right;">
          <button type="button" onclick="window.location.reload();"> <i class='bx bx-refresh' style="color:grey;font-size:30px;"></i></button>
         

          </div>
        </div>
       
        </div>


        <div class="card-body">
          <table>
            <tr>
              <td></td>
              <td style="color:royalblue;font-weight:bold;">Username</td>
              <td style="color:royalblue;font-weight:bold;">Password</td>

              <td style="color:royalblue;font-weight:bold;">Userole</td>
              <td style="color:royalblue;font-weight:bold;">Status</td>
              <td style="color:royalblue;font-weight:bold;">Options</td>


            </tr>
            <tbody id="viewUser">

                </tbody>

         
          </table>

        </div>
        <script>
	$.ajax({
		url: "viewuser.php",
		type: "POST",
		cache: false,
		success: function(data){
		
			$('#viewUser').html(data); 
		}
	});
   
</script>
  
        <div class="card-body" style="background:whitesmoke;" id="ad">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">ADMINS:</h5>
   
    </div>
          <div class="col">
          <input type="text" name="" placeholder="Find..">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">

        
        <table>
          <tr>
            <td></td>
          
            <td style="font-weight:bold;color:royalblue;">Fullname</td>
            <td style="font-weight:bold;color:royalblue;">Position</td>
            <td style="font-weight:bold;color:royalblue;">Office</td>
            <td style="font-weight:bold;color:royalblue;">Updated At</td>
        
          </tr>
          <?php
          $role= "admin";
          $stats = 1;
              $query = mysqli_query($conn, "select * from `user` join people on people.user_id = user.id where user.userole = '{$role}' and status = $stats ");
              while($rw= mysqli_fetch_array($query))
              {
          
            ?>
            <tr>
              <td><img src="<?php echo $rw['profile'];?>" style="object-fit:cover;border-radius:50px;" width="60px" height="60px"></td>
              <td style=""><?php echo $rw['fullname'];?></td>
             
              <td><?php echo $rw['position'];?></td>
              <td><?php echo $rw['office'];?></td>
              <td><?php echo $rw['last_update'];?></td>
              <td>  
                 <td> 
                  <a href="#"  class="opptions" title=""><i class='bx bx-edit'></i></a>
                  <a href="#"  class="opptions" title=""><i class='bx bx-folder'></i></a>
                </td>
            </tr>


<?php
          }

          ?>
          </table>

        </div>

  
        <div class="card-body" style="background:whitesmoke;" id="ad">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">ADMINS:</h5>
   
    </div>
          <div class="col">
          <input type="text" name="" placeholder="Find..">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">

        
        <table>
          <tr>
            <td></td>
          
            <td style="font-weight:bold;color:royalblue;">Fullname</td>
            <td style="font-weight:bold;color:royalblue;">Position</td>
            <td style="font-weight:bold;color:royalblue;">Office</td>
            <td style="font-weight:bold;color:royalblue;">Updated At</td>
        
          </tr>
          <?php
          $role= "admin";
          $stats = 1;
              $query = mysqli_query($conn, "select * from `user` join people on people.user_id = user.id where user.userole = '{$role}' and status = $stats ");
              while($rw= mysqli_fetch_array($query))
              {
          
            ?>
            <tr>
              <td><img src="<?php echo $rw['profile'];?>" style="object-fit:cover;border-radius:50px;" width="60px" height="60px"></td>
              <td style=""><?php echo $rw['fullname'];?></td>
             
              <td><?php echo $rw['position'];?></td>
              <td><?php echo $rw['office'];?></td>
              <td><?php echo $rw['last_update'];?></td>
              <td>  
                 <td> 
                  <a href="#"  class="opptions" title=""><i class='bx bx-edit'></i></a>
                  <a href="#"  class="opptions" title=""><i class='bx bx-folder'></i></a>
                </td>
            </tr>


<?php
          }

          ?>
          </table>


        </div>


        
        <div class="card-body" style="background:whitesmoke;" id="client">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">CLIENTS :</h6>
   
    </div>
          <div class="col">
          <input type="text" name="" placeholder="Find..">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">

        
        <table>
          <tr>
            <td></td>
          
            <td style="font-weight:bold;color:royalblue;">Fullname</td>
            <td style="font-weight:bold;color:royalblue;">Position</td>
            <td style="font-weight:bold;color:royalblue;">Office</td>
            <td style="font-weight:bold;color:royalblue;">Updated At</td>
        
          </tr>
          <?php
          $role= "client";
          $stats = 1;
              $query = mysqli_query($conn, "select * from `user` join people on people.user_id = user.id where user.userole = '{$role}' and status = $stats ");
              while($rw= mysqli_fetch_array($query))
              {
          
            ?>
            <tr>
              <td><img src="<?php echo $rw['profile'];?>" style="object-fit:cover;border-radius:50px;" width="60px" height="60px"></td>
              <td style=""><?php echo $rw['fullname'];?></td>
             
              <td><?php echo $rw['position'];?></td>
              <td><?php echo $rw['office'];?></td>
              <td><?php echo $rw['last_update'];?></td>
              <td>  
                 <td> 
                  <a href="#"  class="opptions" title=""><i class='bx bx-edit'></i></a>
                  <a href="x-per-records.php?idc=<?php echo $rw['idc'];?>"  class="opptions" title=""><i class='bx bx-folder'></i></a>
                </td>
            </tr>


<?php
          }

          ?>
          </table>


        </div>


        


</div>
</div>

   



     

     




      </div>
      </div>

      <?php include "bottom.php";?>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 
</body>
</html>
