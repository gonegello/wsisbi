<?php
//get user information
       include "a-session.php";
	?>

<?php 
  $stat = "3";
  $numcartt = "SELECT * FROM cart WHERE stat = $stat";

  if($cc = mysqli_query($conn,$numcartt))
  {
      $notif=mysqli_num_rows($cc);
  }
 
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Purchase Request</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
#link-a{
  text-decoration:none;
}
#h-search{
  border-radius:20px;
  margin-top:1%;
  width:50%;
  float:right;
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

     <?php 
          //if department head approves a purchase request
          if(isset($_SESSION['supp_approve']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Approved</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['supp_approve'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['supp_approve']);
            }
      ?>

     

      <div class="row">
     

      <div class="col">
      <div class="card-body" style="border-radius:10px;border:1px solid #ededed;margin-top:2%;margin-right:10%;
        border-bottom-left-radius:0px; border-bottom-right-radius:0px;margin-left:10%;"> 
        <div class="row">
          <div class="col">
          <h3>Purchase Request</h3>
          <span>All Departments</span>
          </div>
          <div class="col">
        
          <input type="text" id="h-search" placeholder="Find request.."/>
          </div>
        </div>
        
      </div>

      <?php
      if ($notif == 0){
        echo '<div class="card-body" style="border:1px solid #ededed;margin-left:10%;margin-right:10%;border-bottom-right-radius:10px;
        border-bottom-left-radius:10px;border-top:none;">
        <div class="row">
        <div class="col">
        </div>
        <div class="col" style="text-align:center;">
        <img src="image/noreq.jpg" style = "oject-fit:cover;"><br><br>
        <br><span style="color:grey;">No Purchase Request To Be Approved.</span><br><br><br>
        </div>
        <div class="col">
        </div>
        </div>
        
        </div>';
      }

      ?>
      <?php
        $stat = "3";
        $_ris = "2";
        $_ics = "1";
        //$ris = "2";
        
        $query = mysqli_query($conn, "select * from `cart` join stocks on stocks.s_id = cart.item_id
        join clients on clients.id = cart.client_id where cart.stat = $stat  group by cart.pr_no");
        while($row = mysqli_fetch_array($query))
        {
          $he = $row['id'];
          $pr_no = $row['pr_no'];
          $type_id = $row['int_typeid'];
          
          $req = "SELECT * FROM cart WHERE client_id = $he AND pr_no = $pr_no AND stat = $stat";

          if($r = mysqli_query($conn,$req))
          {
              $numd =mysqli_num_rows($r);
          }

         
          $ris_count = "SELECT * FROM cart JOIN stocks on stocks.s_id = cart.item_id WHERE client_id = $he AND int_typeid = $_ris AND stat = $stat AND pr_no = $pr_no";
          if($r_count = mysqli_query($conn,$ris_count))
          {
            $ris_ = mysqli_num_rows($r_count);
          }

          $ics_count = "SELECT * FROM cart JOIN stocks on stocks.s_id = cart.item_id WHERE client_id = $he AND int_typeid = $_ics AND stat = $stat AND pr_no = $pr_no";
          if($i_count = mysqli_query($conn,$ics_count))
          {
            $ics_ = mysqli_num_rows($i_count);
          }


        
      ?>

<?php
      if($ris_ > 0 && $ics_ > 0)
      {
        echo '<a href="ad-accept-pr.php?client_id='.$row['client_id'].'&r_date='.$row['r_date'].'&pr_no='.$row['pr_no'].'&h_id='.$row['h_id'].'&hd_aprvd='.$row['hd_aprvd'].'&dd_aprvd='.$row['dd_aprvd'].'" id="link-a">';
      }
      else if($ris_ > 0 && $ics_ == 0)
      {
        echo '<a href="ad-ris.php?client_id='.$row['client_id'].'&r_date='.$row['r_date'].'&pr_no='.$row['pr_no'].'&h_id='.$row['h_id'].'&hd_aprvd='.$row['hd_aprvd'].'&dd_aprvd='.$row['dd_aprvd'].'" id="link-a">';
        
      }
      else if($ics_ > 0 && $ris_ == 0)
      {
        echo '<a href="ad-ics.php?client_id='.$row['client_id'].'&r_date='.$row['r_date'].'&pr_no='.$row['pr_no'].'&h_id='.$row['h_id'].'&hd_aprvd='.$row['hd_aprvd'].'&dd_aprvd='.$row['dd_aprvd'].'" id="link-a">';
        
      }

      ?>
  
      <div class="card-body" style=" border:1px solid #ededed; border-top:none;
      border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;
      border-bottom-right-radius:0px;margin-right:10%;margin-left:10%;">
        <div class="row">
          <div class="col">

          <img src="<?php echo $row['profile']; ?>"  style="object-fit:cover;border-radius:50px;border:1px solid #ededed;" width="80px" height="80px">
          <span style="font-size:20px;margin-left:8px;"><?php echo $row['fullname'];?></span><span style="color:grey;"><i> ( <?php echo $row['designation'];?> ) </i></span>
          <span style="font-size:20px;color:grey;">has requested <?php echo $numd;?> items.</span>
          </div>
          <div class="col">
            <span style="float:right;color:grey;"><?php echo $row['r_date'];?></span><br>
            <span style="color:grey;float:right;font-size:10px;"><?php echo $row['office'];?></span>
          </div>
        </div>
        
      </div>
        </a>

      <?php
        }
        ?>

      </div><!--end second col -->


    </div><!--end row-->




      </div>
      </div>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
