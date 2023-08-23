<?php
//get user information
       include "a-session.php";
       include "accrole.php";
       include "x-count.php";
       include "accpos.php";
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


#position
{
  width:100%;
  border-radius:10px;
  border:1px solid #ededed;
  background:white;
  outline:none;
  padding:12px 15px;
  color:grey;
}

#accrole
{
  border-radius:10px;
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


<body style="background:whitesmoke;">

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

  
<?php 
      //if cart is updated
        if(isset($_SESSION['delUser']))
            {
      ?>
              <div class="alert alert-danger alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Deleted</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['delUser'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['delUser']);
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
            <a href="#client" class="iar">Client</a> |
            <a href="#pos" class="iar">Add Position</a> 
        

          </div>
           
        </div>
        </div>




        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
              <h4>Add Accounts</h4>
   
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body">
            
        <form method="post" action="a-adduser.php">
                <div class="row" style="">
                  <div class="col">
                  <label for="username" style="color:royalblue;">Username:</label>
                    <input type="text" name = "username" placeholder="Enter username" required="">   
                  </div>
                     
                </div><br>

                <div class="row" style="">
                  <div class="col">
                  <label for="position" style="color:royalblue;">Position:</label><br>
                    <select name="position" id="position" style="background:white;border:1px solid #ededed;">
                    <?php echo $pst;?>
                    </select>  <br><br>
                  </div>
                    
                </div>

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
                    <input type = "hidden" name="dc" value="<?php echo $datte;?>" >
                    <input type = "hidden" name="time_created" value="<?php echo $time;?>" >
                    <input type = "hidden" name="created_by" value="<?php echo $id;?>">
                    <input type = "hidden" name="status" value="not-updated" >

                  </div>
                  </div>
              
              

                <div class="row">
                <div class="col" style="">
                <span style="font-size:12px;color:#77DD77;">*Password is auto generated.</span>  
                 <button type = "submit" name="save" id="save" style="margin-top:4%;float:right;">Save</button>
                </div>

              
                </div>

                  
                </form>

        </div>

       
        <div class="card-body" style="background:whitesmoke;" id="rec">
        <div class="row">
          <div class="col">
              <h4>Recent </h4><span>Note : Only not updated accounts are available for deletion.</span>
   
    </div>
          <div class="col">
    

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
              <td style="color:royalblue;font-weight:bold;">Position</td>
              <td style="color:royalblue;font-weight:bold;">Status</td>
              <td style="color:royalblue;font-weight:bold;"></td>
            </tr>

          <?php
          $status = 1;
           $query = mysqli_query($conn, "select * from `user` order by id desc limit 5 "); 
          while($rw= mysqli_fetch_array($query))
          {
            ?>

            <tr>
              <td><i class='bx bx-user-pin'></i></td>
            <td><?php echo $rw['username'];?></td>

            <td>
              <?php
              if($rw['status'] == 1)
              {
                echo '********';
              }
              else{
                echo $rw['password'];
              }

              ?>
            </td>

            <td><?php echo $rw['userole'];?></td>
            <td><?php echo $rw['position'];?></td>
            <td>
              <?php

              if($rw['status'] == 1)
              {
                echo '
                <span>Updated</span>
                ';
              }
              if($rw['status'] == "not-updated")
              {
                echo '<span>Not Updated</span>';
              }
              ?>

          </td>

         
          <td>
            <?php
            $dd = "Are you sure your want to delete $rw[username]";
            if($rw['status'] == "not-updated")
            {

              echo '
            
               

                <a href="x-delUser.php?id='.$rw['id'].'"  class="" style="font-size:25px;" title="Delete user '.$rw['username'].'?"><i class="bx bx-trash"></i></a>
 
                ';          
            } 

            ?>
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
              <h4>Admins</h4>
   
    </div>
          <div class="col">
          <input type="text" name="" id="admininput" onkeyup="myFunctionn()" placeholder="Find fullname..">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">

        
        <table id="admindata">
          <tr>
            <th></th>
          
            <th style="font-weight:bold;color:royalblue;">Fullname</th>
            <th style="font-weight:bold;color:royalblue;">Position</th>
            <th style="font-weight:bold;color:royalblue;">Office</th>
            <th style="font-weight:bold;color:royalblue;">Updated At</th>
        
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
            
                  <a href="x-per-records.php?userid=<?php echo $rw['user_id'];?>&stat=<?php echo $rw['stat'];?>" title="" style="font-size:25px;"><i class='bx bx-folder'></i></a>
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
              <h4>Clients </h4>
   
    </div>
          <div class="col">
          <input type="text" name="" id="clientinput" onkeyup="myFunction()" placeholder="Find fullname..">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">

        
        <table id="clientdata">
          <tr>
            <th></th>
          
            <th style="font-weight:bold;color:royalblue;">Fullname</th>
            <th style="font-weight:bold;color:royalblue;">Position</th>
            <th style="font-weight:bold;color:royalblue;">Office</th>
            <th style="font-weight:bold;color:royalblue;">Updated At</th>
        
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
                 <a href="x-per-records.php?userid=<?php echo $rw['user_id'];?>&stat=<?php echo $rw['stat'];?>" title="" style="font-size:25px;"><i class='bx bx-folder'></i></a>
                              
                </td>
            </tr>
<?php
          }

          ?>
          </table>  

        </div>







        <div class="card-body" style="background:whitesmoke;" id="pos">
        <div class="row">
          <div class="col">
          <h4 style="color:black;">Positions</h4>
                        
                   

                   

                    
            
          </div>
          <div class="col">
          <h4 style="color:black;">Offices</h4>
          </div>
        </div>
           

        </div>

            

        <div class="card-body">
          
            <div class="row">
              <div class="col">

              <div class="row">
            <div class="col">

            <div class="row">
              <div class="col" style="text-align:left;">
              <?php 
                        //if an item is sent to archive
                        if(isset($_SESSION['posadded']))
                           {  
                    ?>
                           
                          
                          
                  <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
                   box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['posadded'];?><i class='bx bx-check'></i><span>
                      
                           
                    <?php 
                        unset($_SESSION['posadded']);
                          }
                    ?>

<?php 
                        //if an item is sent to archive
                        if(isset($_SESSION['positionExist']))
                           {  
                    ?>
                           
                          
                          
                  <i><span style="background:gold;color:black;padding:8px 8px;border-radius:5px;font-size:13px;
                   box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['positionExist'];?><span>
                      
                           
                    <?php 
                        unset($_SESSION['positionExist']);
                          }
                    ?>
              
              
              
              <?php 
                        //if an item is sent to archive
                        if(isset($_SESSION['deletepos']))
                           {  
                    ?>
                           
                          
                          
                  <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
                   box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['deletepos'];?><i class='bx bx-check'></i><span>
                      
                           
                    <?php 
                        unset($_SESSION['deletepos']);
                          }
                    ?>
              

             
              </div>
            </div>

              <form method="post" action="addpos.php">
              <label for="pos" style="font-size:15px;">Add a Position:</label>
            <input type="text" name="pos" placeholder="Add Position.." required> <br><br>
       

            <button type="submit" name="addpos" style="background:#77DD77;color:white;">Save Position</button><br><br><br>
            </div>

          </div>
        </form>
          <div class="row">
            <div class="col">
            <table style="border:1px solid #ededed;">
              <tr>
                <th style="text-align:center;">Lists of Position</th>
                
              </tr>
              <?php
              $query = mysqli_query($conn, "select * from `position`");
              while($row= mysqli_fetch_array($query))
              {
                ?>
              <tr>
                
                <td style="border:1px solid #ededed;">
                <i class='bx bx-user' style="font-size:20px;color:blue;border:1px solid blue;border-radius:50px;margin-right:1%;"></i><?php echo $row['position'];?></td>
                <td style="border:1px solid #ededed;text-align:right;">
                <a onclick="return confirm('Are you sure you want to delete position <?php echo $row['position'];?> ?')" 
                href="delPos.php?idpos=<?php echo $row['idposition'];?>&pos=<?php echo $row['position'];?>" style="font-size:20px;"><i class='bx bx-trash'></i></a></td>
              </tr>

              <?php
              }
              ?>
            </table><br><br>
            
            </div>
            
          </div>

              </div>
              <div class="col">
              <div class="row">
            <div class="col">
              <div class="row">
                <div class="col" style="text-align:right;">
                <?php 
              // if depart exist
                        //if an item is sent to archive
                        if(isset($_SESSION['departExist']))
                           {  
                    ?>
                           
                          
                          
                  <i><span style="background:gold;black;padding:8px 8px;border-radius:5px;font-size:13px;position:sticky;
                   box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['departExist'];?><span>
                      
                           
                    <?php 
                        unset($_SESSION['departExist']);
                          }
                    ?>

<?php 
                        //if an item is sent to archive
                        if(isset($_SESSION['offadded']))
                           {  
                    ?>
                           
                          
                          
                  <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
                   box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['offadded'];?><i class='bx bx-check'></i><span>
                      
                           
                    <?php 
                        unset($_SESSION['offadded']);
                          }
                    ?>

                    
<?php 
                        //if an item is sent to archive
                        if(isset($_SESSION['deleteoff']))
                           {  
                    ?>
                           
                          
                          
                  <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
                   box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['deleteoff'];?><i class='bx bx-check'></i><span>
                      
                           
                    <?php 
                        unset($_SESSION['deleteoff']);
                          }
                    ?>
                </div>
              </div>

              <form method="post" action="addoff.php">
              <label for="pos" style="font-size:15px;">Add Department:</label>
            <input type="text" name="off" placeholder="Add Department.." required> <br><br>
       

            <button type="submit" name="addoff" style="background:#77DD77;color:white;">Save Department</button><br><br><br>
            </div>

          </div>
        </form>
          <div class="row">
            <div class="col">
            <table style="border:1px solid #ededed;">
              <tr>
                <th style="text-align:center;">Lists of Departments</th>
                
              </tr>
              <?php
              $query = mysqli_query($conn, "select * from `departments`");
              while($row= mysqli_fetch_array($query))
              {
                ?>
              <tr>
                
                <td style="border:1px solid #ededed;">
                <i class='bx bx-user' style="font-size:20px;color:blue;border:1px solid blue;border-radius:50px;margin-right:1%;"></i><?php echo $row['department'];?></td>
                <td style="border:1px solid #ededed;text-align:right;">
                <a onclick="return confirm('Are you sure you want to delete deparment `<?php echo $row['department'];?>` ?')" title="Delete <?php echo $row['department'];?>"
                href="delOff.php?dept_id=<?php echo $row['idept'];?>&off=<?php echo $row['department'];?>" style="font-size:20px;"><i class='bx bx-trash'></i></a></td>
              </tr>

              <?php
              }
              ?>
            </table><br><br>
            
            </div>
            
          </div>
              </div>
            </div>

         




        </div>




        


</div>
</div>

   



     

     




      </div>
      </div>

      <?php include "bottom.php";?>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>

function myFunctionn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("admininput");
  filter = input.value.toUpperCase();
  table = document.getElementById("admindata");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1 )   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }

}
}
}
</script>

<script>

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("clientinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("clientdata");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1 )   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }

}
}
}
</script>
 
</body>
</html>
