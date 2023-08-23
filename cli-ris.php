<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];

        $query=mysqli_query($conn,"select *from `clients` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $clientid=$row['id'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            $designation=$row['designation'];
        }

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
        }

        date_default_timezone_set('Asia/Manila');

        $datte = date("Y-m-d");
        $time = date("h:i:s A ");

             
	?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
      //var counter=1;

      $("#addbtn").on("click",function(){

        //counter+=;
        $("#parForm").append("<div class='row' style='margin-bottom:4%;'><div class='col'><input type='hidden' name='client_id[]' value='<?php echo $clientid;?>'><input type='hidden' name='req_status[]' value='Pending'><input type='hidden' name='date_[]' value='<?php echo $datte;?>'><input type='hidden' name='time_[]' value='<?php echo $time;?>'><label>Item Details:</label><br><input type='text' name='item[]' placeholder='Item Details'></div><div class='col'><label>Quantity:</label><br><input type='number' name='quantity[]' placeholder = 'Quantity'><span><button type='button' id='removeBtn'><i class='bx bx-x'></i></button></span></div></div>")
      });

      $("#parForm").on("click", "#removeBtn", function(){
        $("#parForm").children().last().remove();
      });

    });

  </script>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>RIS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
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

    
      
        <div class="row" "><!--row container-->

            <div class="col" >
                
                <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-top:5%;">  
                <h3 style="color:grey;">Request Item</h3>
                
               
                </div>

                <div class="card-body" style="border:1px solid #ededed;" ><!-- form card body-->
                  
                    <!-- par form-->
                    <form id = "parForm" action="req.php" method="post" >
                    <div class="row" style="margin-bottom:3%;">
                      <div class="col">
                      <button type="button"  id="showdraftdiv"><i class='bx bx-edit-alt'></i> Go to Drafts</button>
                    <button type="submit" id="draft" name="draft" ><i class='bx bx-edit'></i> Save to Drafts</button>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col">
                      
                        <button type="submit"  name="save"><i class='bx bx-send' ></i> Send Request</button>
                        <label for="purpose"></label>
                        <textarea style="resize:none;width:70%;height:100%;" name="req_purpose" placeholder="Your Purpose in requesting.." required></textarea>
                      
                        
                      </div>
                    </div>
                    <hr>
                    
                      <div class="row" style="margin-bottom:4%; margin-top:3%;"><!--form row-->

                        <div class="col">
                          <input type="hidden" name="client_id[]"  value="<?php echo $clientid;?>">
                          <input type="hidden" name="req_status[]" value="Pending">
                          <input type="hidden" name="date_[]" value="<?php echo $datte;?>">
                          <input type="hidden" name="time_[]" value="<?php echo $time;?>">

                            <label>Item Details:</label><br>
                            <input type="text" name="item[]" placeholder="Item Details" required/>

                        </div>

                        <div class="col">
                            <label>Quantity:</label><br>
                            <input type="number" name = "quantity[]" placeholder="Quantity" min="1" required/>
                            <button type="button" name="addbtn" id="addbtn" title="Add more"><i class='bx bx-plus' style="font-size:20px;font-weight:bold;"></i></button>
                            
                        </div>

                   

                        </div><!-- end form row-->
                        <hr>
                       
                     </form><!-- end par form-->
                     </div><!-- end form card body-->


                     <div class="div" id="draftdiv">

                     <div class="card-body"  style="margin-top:5%;border-radius:5px;border:1px solid #ededed;">
                     <div class="row">
                       <div class="col">
                       <h3>Drafts</h3>
                       </div>
                       <div class="col">
                       <button type="button"  id="closedraftdiv"><i class='bx bx-x' ></i></button>
                       </div>
                       </div>
                     </div>

                    <form method="post" action="d-req.php">
                     <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-bottom:2%;">
                     <div class="row">
                      <div class="col">
                        <button type="submit"  name="save"><i class='bx bx-send'></i> Send Request</button>
                        <label for="purpose"></label>
                        <textarea name="req_purpose" style="resize:none;width:70%;height:100%;"  placeholder="Your Purpose in requesting.." required=""></textarea>
                      </div>
                    </div>
                    </div>


                       
                       <?php
                   include('connection.php');
                  
                  
                     $query=mysqli_query($conn,"select * from `draft` where client_id = $clientid order by `date` desc");
                     while($row=mysqli_fetch_array($query))
                          {
                            $draftdate = DateTime::createFromFormat("Y-m-d H:i:s", $row['date']);
                                               
                           ?>

                                     
                                      <div class="card-body" style="border:1px solid #ededed;border-radius:5px;margin-bottom:2%;">
                                      <!-- data for post inserting method-->
                                      <input type="hidden" name="item[]" value="<?php echo $row['item'];?>">
                                      <input type="hidden" name="quantity[]" value="<?php echo $row['quantity'];?>">
                                      <input type="hidden" name= "req_status[]" value="Pending">
                                     
                                      <input type="hidden" name="client_id[]" value="<?php echo $row['client_id'];?>">

                                      <span style="float:right;margin-bottom:2%;"> 
                                      
                                      <button type="button" name="editBtn" id="editBtn" title="Edit draft" style="font-size:20px;"><i class='bx bx-edit'></i></button>
                                      <a href="" id="deletedraft"><i class="bx bx-trash" style="font-size:20px;"></i></i></a>
                                      </span>
                                      <span style="font-size:12px;color:grey;"><?php echo $draftdate->format('F j, Y - g:i a');?></span><br>
                                      <span><?php echo$row['quantity'];?> </span>
                                      <span><?php echo $row['item'];?></span>

                                     
                                      
                                      
                                      </div>
                          
                          <?php
                          }
                          ?>

                        </form>


                       </div><!--start col -->
                       </div>
                       
                    


               




            

            <div class="col" >
                <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;border:1px solid #ededed;margin-top:5%;">
              
                <div class="row">
                  <div class="col">
                <button type="button" id="all"><i class='bx bx-envelope' style="font-size:30px;"></i><br>All</button>
                </div>

                <div class="col">
                <button type="button" id="pending"><i class='bx bx-message-alt-dots' style="font-size:30px;"></i><br>Pending</button>
                </div>
                <div class="col">
                <button type="button"  id="approved"><i class='bx bx-message-alt-check' style="font-size:30px;"></i><br>Approved</button>
                </div>
                

                </div><!-- row end-->

                </div><!--card body end -->

                <div id="all-div">
                <div class="card-body"  style="border-radius:5px;border:1px solid #ededed;background:#3c99dc">
                <h5 style="color:white;">All Request</h5>  
                </div>

                <form>
                <div class="card-body" style="border-radius:5px;border:1px solid #ededed;">
                
                                <div class="row" style="">
                                  
                                <div class="col" style="">
                                 
                                  <?php
                   include('connection.php');
                  
                   $pend = "Pending";
                   $approved = "Approved";
                     $query=mysqli_query($conn,"select * from `request` where client_id = $clientid order by `date_` asc");
                     while($row=mysqli_fetch_array($query))
                          {
                           $req_date = $row['date_'];
                                               
                           ?>

                                      
                                      <?php 

                                      if($row['req_status'] == $pend)
                                      {
                                      echo '<div class="card-header" style="background:#whitesmoke;">'.$row['req_status'].'
                                      <a href="a-delReq.php?req_id='.$row['req_id'].'" style="font-size:30px;float:right;color:grey;"><i class="bx bx-trash" style="font-size:30px;float:right;"></i></a>
                                      </div>';
                                      }
                                      else if($row['req_status']== $approved)
                                      {
                                        echo '<div class="card-header" style="background:whitesmoke;color:#3fd672;font-weight:bold;">'.$row['req_status'].'<i class="bx bx-check" 
                                        style="font-size:30px;color:#3fd672;float:right;"></i></div>';
                                      }
                                      
                                      ?>
                                    <div class="card-body" style="border-radius:5px;border:1px solid #ededed;margin-bottom:2%;">
                                    
                                     
                                   <span style="font-size:12px;color:grey;"> <?php echo $req_date;?>
        
                                   </span>
                                   <br><span>You requested</span>
                                  
                                  <span style="font-style:italic;"> <?php echo $row['quantity'];?>
                                      <?php echo $row['item'];?></span>
                                      
                                      
                                   
                         
                          </div>
                                    <?php
                          }
                          ?>
                                  
                                </div>
                                </div>
                           

                </div>
                </form>
                </div><!-- end all div-->

                <div id="pending-div">
                <div class="card-body"  style="border-radius:5px;border:1px solid #ededed;margin-bottom:1%;background:#e05a00">
                  <h5 style="color:white;">Pending Request</h5>
                </div>

                </div><!-- pending div end-->


                <div id="approved-div">
                <div class="card-body"  style="border-radius:5px;border:1px solid #ededed;margin-bottom:1%;background:#3fd672">
                  <h5 style="color:white;">Approved Request</h5>
                </div>

                </div><!-- approved div end-->


                        
            </div><!-- col end-->


        </div><!-- row end-->


      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
  const targetDiv = document.getElementById("draftdiv");
const btn = document.getElementById("showdraftdiv");
targetDiv.style.display = "none";

btn.onclick = function () {

    targetDiv.style.display = "block";
  
};
   </script>

<script>
  const Hidediv = document.getElementById("draftdiv");
const cbtn = document.getElementById("closedraftdiv");


cbtn.onclick = function () {
  
    Hidediv.style.display = "none";
  
};
   </script>


<!--Show all request div and hide the rest -->
<script>
  //when all btn is clicked
  const all1 = document.getElementById("all");

  //change to grey btn
  const pending1 = document.getElementById("pending");
  const approved1 = document.getElementById("approved");


  //divs to hide
  const pendingDiv1 = document.getElementById("pending-div");
  const approvedDiv1 = document.getElementById("approved-div"); //un read div

  //divs to show
  const allDiv1 = document.getElementById("all-div"); //recent div

pendingDiv1.style.display="none";
approvedDiv1.style.display="none";
  all1.onclick = function(){
   //divs
    pendingDiv1.style.display = "none";
    approvedDiv1.style.display="none";
    allDiv1.style.display = "block";

    //buttons
    all1.style.color = "#3c99dc";
    
    

    pending1.style.color="grey";
   
    approved1.style.color="grey";
    
    
  };

  </script>

  <!--Show pending div and hide the rest -->
<script>
  //when pending btn is clicked
  const pending2 = document.getElementById("pending");

  //change to grey btn
  const all2 = document.getElementById("all");
  const approved2 = document.getElementById("approved");


  //divs to hide
  const allDiv2 = document.getElementById("all-div");
  const approvedDiv2 = document.getElementById("approved-div"); //un read div

  //divs to show
  const pendingDiv2 = document.getElementById("pending-div"); //recent div

  pending2.onclick = function(){
   //divs
    allDiv2.style.display = "none";
    approvedDiv2.style.display="none";
    pendingDiv2.style.display = "block";

    //buttons
    pending2.style.color = "#e05a00";
    
    all2.style.color="grey";
  
    approved2.style.color="grey";
    
    
  };

  </script>


<!--Show pending div and hide the rest -->
<script>
  //when approved btn is clicked
  const approved3 = document.getElementById("approved");

  //change to grey btn
  const all3 = document.getElementById("all");
  const pending3 = document.getElementById("pending");


  //divs to hide
  const allDiv3 = document.getElementById("all-div");
  const pendingDive3 = document.getElementById("pending-div"); //un read div

  //divs to show
  const approvedDiv3 = document.getElementById("approved-div"); //recent div

  approved3.onclick = function(){
   //divs
    allDiv2.style.display = "none";
    pendingDive3.style.display="none";
    approvedDiv3.style.display = "block";

    //buttons
    approved3.style.color = "#3fd672";
   
    
    all3.style.color="grey";
    
    pending3.style.color="grey";
 
    
  };

  </script>

<script>
  const colr = document.getElementById("all");
  const div = document.getElementById("all-div");

  if(div.style.display = "block"){
    colr.style.color="#3c99dc";
    
    
    
  }

</script>








  

 

 
</body>
</html>
