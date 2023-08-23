<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `admin` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['id'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            $designation=$row['designation'];

            $admin=$row['fullname'];
        }

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
        }

        date_default_timezone_set('Asia/Manila');

        $datte = date("m-d-Y");
        $time = date("h:i:s A ");
             
	?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
   
    <link rel="stylesheet" href="assets/bootstrap/css/par.css">
   

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
?>




<section class="home-section">

<div class="container-fluid" style="background:whitesmoke;">
  <div class="card-shadow" style="background:whitesmoke;">
     <!--Card header-->



      <!-- first card body--><br>
      <div class="row">
     
          <div class="col" >
          <?php
            require_once "quicktool.php";
            ?>
                     
                <div class="card-body"  style="border-radius:5px;border:1px solid #ededed;margin-left:10%;margin-right:10%;">
                

                <div class="row">
                  <div class="col">
                <button type="button" id="pending"><i class='bx bx-message-alt-dots' style="font-size:30px;"></i><br>Pending</button>
                </div>
                <div class="col">
                <button type="button"  id="approved"><i class='bx bx-message-alt-check' style="font-size:30px;"></i><br>Approved</button>
                </div>
                

                </div>
                   
                </div>

                  <!--Recent -->
                <div id = "pending-div" style="margin-left:10%;margin-right:10%;">
                <div class="card-body"  style="border-radius:5px;border:1px solid #ededed;">
                <h5>Pending</h5>  
                </div> 
                
                <?php
                $pending = "Pending";
                  include('connection.php');
                  $msg="has made an item request.";

                  
                                                                    
                  $query=mysqli_query($conn,"select * from `request`left join clients on clients.id = request.client_id where request.req_status = '$pending' group by `client_id` order by `time_` desc");
                 
                  while($row=mysqli_fetch_array($query))
                  {
                    
                                         
                 // $details= array($row['quantity'], $row['unit']);
                                                                        
                  ?>

                <button type="button" id="showreqBtn"  data-toggle="modal" data-target="#showreqmodal<?php echo $row['client_id'];?>">
                <div class="card-body" style="">

                <div class="row">
                <div class="col">
                <img src="<?php echo $row['profile'];?>" style="border-radius:50%; object-fit:cover;margin-left:-150px;border:1px solid whitesmoke;" id="prof" width="60px" height="60px">
                </div>
                <div class="col">
                <span style="margin-left:-100px;"><?php echo $row['fullname'];?>
                <span><?php echo $msg;?></span>
                
                </div>
                <div class="col">
                <span style="color:grey;font-size:12px;"> <?php echo $row['date_'];?> <?php echo $row['time_'];?> </span>
                
                </div>
                  </div>
               

                </div>
                  </button>
              <?php
                  include "modal-request.php";
                 }
                ?>
            </div><!-- end recent div-->




            <div id="approved-div" style="margin-left:10%;margin-right:10%;">

                <div class="card-body"  style="border-radius:5px;border:1px solid #ededed;">
                <h5>Approved</h5>  
                </div>
                </div>



          </div><!-- end col-->
         
          


      </div>
         

       





    



      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>


 <!--Show approved div and hide the rest -->
<script>
  //when approved btn is clicked
  const approved3 = document.getElementById("approved");

  //change to grey btn
 
  const pending3 = document.getElementById("pending");


  //divs to hide
 
  const pendingDive3 = document.getElementById("pending-div"); //un read div

  //divs to show
  const approvedDiv3 = document.getElementById("approved-div"); //recent div

  approved3.onclick = function(){
   //divs
   
    pendingDive3.style.display="none";
    approvedDiv3.style.display = "block";

    //buttons
    approved3.style.color = "#3fd672";
    approved3.style.borderBottom="3px solid #3fd672";
    
    pending3.style.color="grey";
    pending3.style.borderBottom = "none";
    
  };

  </script>



<!--Show pending div and hide the rest -->
<script>
  //when pending btn is clicked
  const pending2 = document.getElementById("pending");

  //change to grey btn
 
  const approved2 = document.getElementById("approved");


  //divs to hide

  const approvedDiv2 = document.getElementById("approved-div"); //un read div

  //divs to show
  const pendingDiv2 = document.getElementById("pending-div"); //recent div

  approvedDiv2.style.display="none";
  pending2.onclick = function(){
   //divs
   
    approvedDiv2.style.display="none";
    pendingDiv2.style.display = "block";

    //buttons
    pending2.style.color = "#e05a00";
    pending2.style.borderBottom="3px solid #e05a00";
   
    approved2.style.color="grey";
    approved2.style.borderBottom = "none";
    
  };

  </script>


<script>
  const colr = document.getElementById("pending");
  const div = document.getElementById("pending-div");

  if(div.style.display = "block"){
    colr.style.color="#e05a00";
    colr.style.borderBottom="3px solid #e05a00 ";
  }

</script>

 
</body>
</html>
