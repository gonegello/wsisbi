<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `clients` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['id'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            $designation=$row['designation'];
        }

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
        }

             
	?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Your Cart</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/par.css">
   

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>


  <style>
 #cart, #orders{
  padding:12px 13px;
  background:white;
  border:none;
  font-size:15px;
  outline:none;
  color:grey;
  width:100%;
  margin-bottom:-22px;
 }

 #recentt, #orderr, #requestt{
  padding:12px 13px;
  background:white;
  border:none;
  font-size:15px;
  outline:none;
  color:grey;
  width:100%;
  margin-bottom:-22px;
 }

 #clear-act{
    outline:none;
    padding:12px 20px;
    background:transparent;
    border:1px solid white;
    color: white;
    border-radius:5px;
    float:right;
    font-size:12px;
 }
 #clear-act:hover{
     font-size:13px;
     
 }

  </style>


<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "c-sidebar.php";
?>


<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->



      <!-- first card body-->
      <div class="row">

    <div class="col">

      <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;border:1px solid #ededed;margin-top:2%;margin-left:10%;margin-right:10%;">

      <div class="row">

      <div class="col">
                <button type="button" id="recentt"><i class='bx bx-mouse-alt' id="irecent" style="font-size:30px;"></i><br>Recent</button>
                </div>

                <div class="col" >
                <button type="button" id="requestt"><i class='bx bx-send' id="irequest" style="font-size:30px;"></i><br>Request</button>
                </div>

                <div class="col" style="margin-right:-1.5%;">
                <button type="button" id="orderr"><i class='bx bx-cart-alt' id="iorder" style="font-size:30px;"></i><br>Order</button>
                </div>

      </div>

      </div>

      <div id="recentt-div"  style="">
      <div class="card-body" style="border-radius:1px;border-bottom:1px solid #ededed;;margin-left:10%;margin-right:10%;background:#3c99dc"> 
      <div class="row"> 
          <div class="col">
      <h4 style="color:white;">Recent Activity</h4>
        </div>

        <div>
      <button type="submit" id="clear-act"><i class='bx bx-eraser'></i> Clear Activity</button>
</div>
      </div>
      </div>
      <?php include "connection.php";
                    
                    $your = "your";
                     
                    $query=mysqli_query($conn,"select * from `clients` left join clientlog on clientlog.user_id=clients.user_id where clients.user_id = '$userid'");
                      while($row=mysqli_fetch_array($query))
                      {
                        $details = $row['details'];

                        

                      ?>


      <div class="card-body" style="border-radius:1px;border-bottom:1px solid #ededed;;margin-left:10%;margin-right:10%;">  
      <div class="row">

                <div class="col">
                <img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" id="prof" width="50px" height="50px">
                <span style="font-style:italic;margin-left:5%;">You</span>
                <span style="color:#3c99dc;font-style:italic;font-weight:bold;">`<?php echo $row['activity'];?>`</span> <i>your</i>
                <span style="font-style:italic;;color:grey;font-weight:bold;">`<?php echo $details;?>`</span>
                </div>

               
                <span style="margin-right:2%;color:grey;"><?php echo $row['date'];?></span>
               
                
            </div>
      </div>
      <?php
                     
                    }
                    ?>




    </div><!-- end recentt div-->


    <div id="requestt-div">
      <div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;background:#ccae90">  
      <h4 style="color:white;">Request History</h4>
      </div>
    </div>

    <div id="orderr-div">
      <div class="card-body" style="border:1px solid #ededed;;margin-left:10%;margin-right:10%;background:#5aab61;">  
      <h4 style="color:white;">Order History</h4>
      </div>
    </div>
      

      </div><!--end first col-->

      </div><!-- end row-->








      </div>
      </div>
            
  </section>


<!-- script for tabs-->
<script src="assets/js/script.js"></script>

<script>
  //when recent btn is clicked
  const recentt = document.getElementById("recentt");

  //change to grey btn
 
  const requestt = document.getElementById("requestt");
  const orderr = document.getElementById("orderr");


  //divs to hide

  const reqdiv = document.getElementById("requestt-div"); //un read div
  const orderdiv = document.getElementById("orderr-div");

  //divs to show
  const recentdiv = document.getElementById("recentt-div"); //recent div
  const irecent = document.getElementById("irecent"); //recent div
  const iorder = document.getElementById("iorder");//recent div
  const irequest = document.getElementById("irequest"); 




reqdiv.style.display = "none";
orderdiv.style.display = "none";
  recentt.onclick = function(){
   //divs
   
    recentdiv.style.display="block";
    reqdiv.style.display = "none";
    orderdiv.style.display = "none";

    //buttons
    recentt.style.color = "#3c99dc";
  
   
    requestt.style.color="grey";


    orderr.style.color="grey";
    irecent.style.fontSize="40px";
    irequest.style.fontSize="30px";
    iorder.style.fontSize="30px";
  
    
  };

  </script>


<script>
  //when request btn is clicked
  const recentt1 = document.getElementById("recentt");

  //change to grey btn
 
  const requestt1 = document.getElementById("requestt");
  const orderr1 = document.getElementById("orderr");


  //divs to hide

  const reqdiv1 = document.getElementById("requestt-div"); //un read div
  const orderdiv1 = document.getElementById("orderr-div");

  //divs to show
  const recentdiv1 = document.getElementById("recentt-div"); //recent div
  const irequest1 = document.getElementById("irequest");
  const irecent1 = document.getElementById("irecent");
  const iorder1 = document.getElementById("iorder");


  


  requestt1.onclick = function(){
   //divs
   
    recentdiv1.style.display="none";
    reqdiv1.style.display = "block";
    orderdiv1.style.display = "none";

    //buttons
    requestt1.style.color = "#ccae90";
   
   
    recentt1.style.color="grey";
  

    orderr1.style.color="grey";
    irequest1.style.fontSize = "40px";
    irecent1.style.fontSize = "30px";
    iorder1.style.fontSize="30px";
    
    
  };

  </script>


<script>
  //when order btn is clicked
  const recentt2 = document.getElementById("recentt");

  //change to grey btn
 
  const requestt2 = document.getElementById("requestt");
  const orderr2 = document.getElementById("orderr");


  //divs to hide

  const reqdiv2 = document.getElementById("requestt-div"); //un read div
  const orderdiv2 = document.getElementById("orderr-div");

  //divs to show
  const recentdiv2 = document.getElementById("recentt-div"); //recent div
  const iorder2 = document.getElementById("iorder");
  const irecent2 = document.getElementById("irecent");
  const irequest2 = document.getElementById("irequest");



  orderr2.onclick = function(){
   //divs
   
    recentdiv2.style.display="none";
    reqdiv2.style.display = "none";
    orderdiv2.style.display = "block";

    //buttons
    orderr2.style.color = "#5aab61";
   
   
    requestt2.style.color="grey";
    

    recentt2.style.color="grey";
    iorder2.style.fontSize="40px";
    irecent2.style.fontSize="30px";
    irequest2.style.fontSize="30px";


 
    
  };

  </script>

<script>
  const cartt = document.getElementById("recentt");
  const divv = document.getElementById("recentt-div");
  const icon = document.getElementById("irecent");
  if(divv.style.display = "block"){
    cartt.style.color="#3c99dc";
    icon.style.fontSize="40px";
    
  }

</script>


</body>
</html>
