<?php
    include "accrole.php";
    include "a-session.php";       
	?>



    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

    <?php require_once "a-linkstyle.php";
    ?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>


    .below{
        float:left;
        color:grey;
       
    }
    .left{
        float:left;
    }
    #view{
        background:white;
        padding:10px 13px;
        outline:none;
        text-decoration:none;
        border:none;
        color:grey;
        float:right;
        font-size:20px;
        

    }
    #view:hover{
        background:whitesmoke;
        border-radius:50px;
        font-size:25px;
    }
    #delu,#delete,#edit{
  padding:12px 15px;
  border-radius:50%;
  background:whitesmoke;
  color:grey;
  border:1px solid #ededed;;
  outline:none;

}

#delu:hover,#delete:hover,#edit:hover{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    background:white;
    color:grey;
    border:none;
}
#delu{
    margin-left:40%;
}
#delete{
float:right;
}
#edit{
    float:left;
}
    </style>
 
    <body style="background:whitesmoke;">
    <?php require_once "a-sidebar.php"; include "a-overview.php";?>

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
     
        <div class="row">

            <div class="col">
                <?php require_once "quicktool.php"; ?>
                <div class="card-body" style="background:#AEC6CF;border-radius:10px;
                margin-left:10%;margin-right:10%;margin-top:2%;margin-bottom:0px;
                border:1px solid #ededed;">
                <i class='bx bx-store' style="font-size:30px;color:white;" ></i><span style="font-size:30px;color:white;margin-left:1%;">Accounts</span>
                </div>

                <div class="card-body" style="margin-left:10%;margin-right:10%;margin-top:2%;border-top-right-radius:10px;
                border-top-left-radius:10px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;
                border:1px solid #ededed;">
                <div class="row">

                <div class="col">
                <button type="button" id="useracc"><i class='bx bx-group' id="iuseracc" style="font-size:30px;"></i><br>User Account</button>
                </div>

                <div class="col" >
                <button type="button" id="admin"><i class='bx bx-user' id="iadmin" style="font-size:30px;"></i><br>Admin</button>
                </div>

                <div class="col" style="">
                <button type="button" id="sk"><i class="bx bx-user-check" id="isk" style="font-size:30px;"></i><br>Storekeeper</button>
                </div>

                <div class="col" style="">
                <button type="button" id="clients"><i class='bx bx-id-card'id="iclients" style="font-size:30px;"></i><br>Clients</button>
                </div>

                 </div>
                
                </div>

                <!-- div contents here-->
                <div id="useracc-div">
                <div class="card-body" style="margin-left:10%;margin-right:10%;border-radius:0px;
                border:1px solid #ededed;border-top:none;border-bottom:none;">
                <div class="row">
                <div class="col">
                <h5>User Account</h5>
                </div>

                <div class="col">
                <button type="button" id="addacc"><i class='bx bx-user-plus' style="font-size:18px;"></i> Add User</button>
                </div>
                </div>
                </div>

              
                
              

               
               
                <?php
                include('connection.php');
                $i = 0;
                $nu = "not-updated";
                $u = "updated";
                $query = mysqli_query($conn, "select * from `user` order by `id` asc");
                while($row = mysqli_fetch_array($query))
                {     

                ?>
                <div class="card-body" style="margin-left:10%;margin-right:10%;border-radius:0px;
                border:1px solid #ededed;border-top:none;border-bottom:none;">

                <div class="row">
                    <div class="col">  
                        <?php echo $row['username'];?>
                        <br><span style="italic">username</span>

                    </div>

                    <div class="col">

                    </div>
                </div>

                 </div>
                
                <?php
                }

                ?>

                </div>

                </div>

                




                
                </div><!--div useracc end-->

                <div id="admin-div">
                <div class="card-body" style="margin-left:10%;margin-right:10%;border-radius:0px;
                border:1px solid #ededed;border-top:none;border-bottom:none;">
                <h5>Admins</h5>
                </div>

                <div class="card-body" style="margin-left:10%;margin-right:10%;border-bottom-left-radius:10px;
                border-bottom-right-radius:10px;border:1px solid #ededed;border-top:none;">
                
               
                <?php
                include('connection.php');
               
                $variable="admin";
                $updated="updated";
               
                $query=mysqli_query($conn,"select * from `user` left join admin on admin.user_id=user.id where user.userole = '$variable'");
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                   
                    <div class="card-body" style="border:none;margin-top:1%;max-width:100%;
                    border-radius:10px;box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
                    ">
                    

                    <?php
                    if ($row['status'] == "$updated"){
                        echo '<div class="row">
                        <div class = "col">
                        <img src="'.$row['profile'].'" style="border-radius:50%; 
                        object-fit:cover;" id="prof" width="50px" height="50px">
                        </div>
                        <div class="col">
                        <span class="below">'.$row['username'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">username</span>

                        </div>
                        <div class="col">
                        <span class="below">'.$row['fullname'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">fullname</span>
                        </div>
                        <div class="col">
                        <span class="below">'.$row['designation'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">designation</span>
                        </div>
                        <div class="col">
                        <span class="below">'.$row['office'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">office</span>
                        </div>
                        <div class="col">
                        <span class="below">'.$row['contact_n'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">contact number</span>
                        </div>
                        <div class="col">
                        <button type="button" id="view" data-toggle="modal" data-target="#a_acctinfo"><i class="bx bx-dots-vertical-rounded"></i></button>
                        </div>
                    

                        
                     </div>';
                    }

                    ?>
                    

                    </div>

                <?php 

                    include 'modal_a_accountsinfo.php';
                }
                ?>
                
            </div>
                
            
                
                </div><!--div admins end-->

                <div id="sk-div">
                <div class="card-body" style="margin-left:10%;margin-right:10%;border-radius:0px;
                border:1px solid #ededed;border-top:none;border-bottom:none;">
                <h5>Storekeeper</h5>
                </div>

                <div class="card-body" style="margin-left:10%;margin-right:10%;border-bottom-left-radius:10px;
                border-bottom-right-radius:10px;border:1px solid #ededed;border-top:none;">
                
               
                <?php
                include('connection.php');
               
                $variable="storekeeper";
                $updated="updated";
               
                $query=mysqli_query($conn,"select * from `user` left join skeeper on skeeper.user_id=user.id where user.userole = '$variable'");
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                   
                    <div class="card-body" style="border:none;margin-top:1%;max-width:100%;
                    border-radius:10px;box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
                    ">
                    

                    <?php
                    if ($row['status'] == "$updated"){
                        echo '<div class="row">
                        <div class = "col">
                        <img src="'.$row['profile'].'" style="border-radius:50%; 
                        object-fit:cover;" id="prof" width="50px" height="50px">
                        </div>
                        <div class="col">
                        <span class="below">'.$row['username'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">username</span>

                        </div>
                        <div class="col">
                        <span class="below">'.$row['fullname'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">fullname</span>
                        </div>
                        <div class="col">
                        <span class="below">'.$row['designation'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">designation</span>
                        </div>
                        <div class="col">
                        <span class="below">'.$row['office'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">office</span>
                        </div>
                        <div class="col">
                        <span class="below">'.$row['contact_n'].'</span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">contact number</span>
                        </div>
                        <div class="col">
                        <button type="button" id="view"><i class="bx bx-dots-vertical-rounded"></i></button>
                        </div>
                    

                        
                     </div>';
                    }
                    

                    ?>
                    

                    </div>

                <?php 
                }
                ?>
                
            </div>


                
                </div><!--div storekeeper end-->

                <div id="clients-div">
                <div class="card-body" style="margin-left:10%;margin-right:10%;border-radius:0px;
                border:1px solid #ededed;border-top:none;border-bottom:none;">
                <h5>Clients</h5>
                </div>

                <div class="card-body" style="margin-left:10%;margin-right:10%;border-bottom-left-radius:10px;
                border-bottom-right-radius:10px;border:1px solid #ededed;border-top:none;">
               
                <?php
                include('connection.php');
               
                $variable="client";
                $updated="updated";
               
                $query=mysqli_query($conn,"select * from `user` left join clients on clients.user_id=user.id where user.userole = '$variable'");
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                   
                    <div class="card-body" style="border:none;margin-top:1%;max-width:100%;
                    border-radius:10px;box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
                    ">
                    

                    <?php
                    if ($row['status'] == "$updated"){
                        echo '<div class="row">
                                <div class = "col">
                                <img src="'.$row['profile'].'" style="border-radius:50%; 
                                object-fit:cover;" id="prof" width="50px" height="50px">
                                </div>
                                <div class="col">
                                <span class="below">'.$row['username'].'</span><br>
                                <span style="font-style:italic;color:grey;font-size:10px;">username</span>

                                </div>
                                <div class="col">
                                <span class="below">'.$row['fullname'].'</span><br>
                                <span style="font-style:italic;color:grey;font-size:10px;">fullname</span>
                                </div>
                                <div class="col">
                                <span class="below">'.$row['designation'].'</span><br>
                                <span style="font-style:italic;color:grey;font-size:10px;">designation</span>
                                </div>
                                <div class="col">
                                <span class="below">'.$row['office'].'</span><br>
                                <span style="font-style:italic;color:grey;font-size:10px;">office</span>
                                </div>
                                <div class="col">
                                <span class="below">'.$row['contact_n'].'</span><br>
                                <span style="font-style:italic;color:grey;font-size:10px;">contact number</span>
                                </div>
                                <div class="col">
                                <button type="button" id="view" data-toggle="modal" data-target="#a_acctclientinfo"><i class="bx bx-dots-vertical-rounded"></i></button>
                                </div>
                            

                                
                             </div>';
                    }

                    ?>
                    

                    </div>

                <?php 

                        include 'modal_a_accountsclientinfo.php';
                }
                ?>
                
            </div>
                </div><!--div clients end-->


                <!--end div contents-->


                

                        
            </div><!--first col-->

            
            <div class="col" id="adduser-div">
                
            <div class="card-body" style="margin-right:10%;margin-top:2%;border-top-right-radius:10px;
                border-top-left-radius:10px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;
                border:1px solid #ededed;">
                <div class="row">
                <div class="col">
                <h5>Add User Account</h5>
                </div>
                <div class="col">
                <button type="button"  id="closeadduserdiv"><i class='bx bx-x' ></i></button>
                </div>
                </div>
            
            </div>

            <div class="card-body" style="margin-right:10%;border-bottom-left-radius:10px;
                border-bottom-right-radius:10px;border:1px solid #ededed;border-top:none;">

                <form method="post" action="a-adduser.php">
                <div class="row" style="margin-right:5%;margin-left:5%;margin-bottom:5%;">
                    <label>Username:</label>
                    <input type="text" name = "username" placeholder="Enter username" required="">    
                </div>

                <div class="row" style="margin-right:5%;margin-left:5%;margin-bottom:5%;">
                    <label>Account Type:</label><br>
                    <select name="userole" id="userole">
                    <?php echo $accrole;?>
                    </select>   
                </div>

                <div class="row" style="margin-right:2%;margin-left:3%;">
                <input type = "hidden" name="dc" value="<?php echo $datte;?>" >
                <input type = "hidden" name="time_created" value="<?php echo $time;?>" >
                <input type = "hidden" name="created_by" value="<?php echo $id;?>">
                <input type = "hidden" name="status" value="not-updated" >


                

                    
                <div class="col">
                <span>*Password is auto generated.</span>
                </div>

                <div class="col">
                <button type = "submit" name="save">Save</button>
                </div>

                </div>
                </form>
                </div>
            </div>


            </div><!--second col-->
       
            



        
        
            </div><!-- over all row container-->

            

        </div><!--row container end-->


        



    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>
 <script src = "assets/js/account-div.js"></script>
 <!--script for accounts div content-->





</body>
</html>
