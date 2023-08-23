<?php
include "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inventory Files</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
.ar-link:hover{
    text-decoration:none;
}

table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse:collapse;
  width: 100%;
 
}

table td, table th {
  border:none;
  padding:14px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:transparent;
  color: black;
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
    

            

      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;
      border-bottom-left-radius:none;border-bottom-right-radius:none;margin-top:3%;margin-left:10%;margin-right:10%;"> 
      <div class="row">
        <div class="col">
        <h4>Aprroved Purchase Request</h4>
        </div>
        <div class="col">
          <input type="text" id="search" placeholder="Search.." style="margin-top:2%;margin-bottom:2%;background-color:white;border-radius:50px;border:1px solid #ededed;" >

        </div>
      </div>
     
      </div>
      <div class="card-body" style="border:1px solid #ededed;border-top:none;
      border-radius:none;margin-left:10%;margin-right:10%;">
      <table>
        <tr>
          <th>Pr No.</th>
          <th>Requested By</th>
          <th></th>



        </tr>
        
     
      <?php
      
      include "connection.php";
      $query = mysqli_query($conn, "select * from `cart` join clients on clients.id = cart.client_id where cart.sup_aprvd is not null group by pr_no");
        while($row = mysqli_fetch_array($query))
        {
          
        ?>
        
        <tr>
          <td><?php echo $row['pr_no'];?></td>
          <td><a href="#"><?php echo $row['fullname'];?></a></td>

          <td> <a href="a-pr-details.php?pr_no=<?php echo $row['pr_no']?>&client_id=<?php echo $row['client_id']?>&r_date=<?php echo $row['r_date']?>&h_id=<?php echo $row['h_id']?>&hd_aprvd=<?php echo $row['hd_aprvd']?>&dd_aprvd=<?php echo $row['dd_aprvd']?>&sup_aprvd=<?php echo $row['sup_aprvd']?>&stat=<?php echo $row['stat']?>">See Details</a></td>

        </tr>
        
      
      

      <?php
          }

          ?>
          </table>
           </div>


     

      </div>
      </div>
            
  </section>
<!-- sidebar script-->
<script src="assets/js/script.js"></script>


 

 
</body>
</html>

