<?php
include "a-session.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Stock Out</title>

    <?php require_once "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
#stockout {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse:collapse;
  width: 100%;
 
}

#stockout td, #stockout th {
  border:none;
  padding:12px;
}

#stockout tr:nth-child(even){background-color: #f2f2f2;}

#stockout tr:hover {background-color: #ddd;}

#stockout th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:transparent;
  color: black;
}



/* CSS */
.line-button {
  background-color: #FFFFFF;
  border: 0;
  border-radius: .5rem;
  box-sizing: border-box;
  color: #111827;
  font-size: .875rem;
  font-weight: 600;
  line-height: 1.25rem;
  padding: .75rem 1rem;
  text-align: center;
  text-decoration: none #D1D5DB solid;
  text-decoration-thickness: auto;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.line-button:hover {
  background-color: rgb(249,250,251);
}

.line-button:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.line-button:focus-visible {
  box-shadow: none;
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
    

            

      

      <div class="row" style="margin-top:5%;">


      <div class="col">

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;
      border-radius:10px;margin-left:10%;margin-right:10%;margin-bottom:2%;">
      <h4>Stock In</h4>
      </div>
          

      <div class="card-body" style="background:transparent;border-radius:none;border:1px solid #ededed;
      border-radius:10px;margin-left:10%;margin-right:10%;margin-bottom:2%;">
      <div class="row">
          <div class="col" style="margin-right:-70%;">
          <button class="line-button" role="button"><i class='bx bx-user-check'></i>RIS</button>
          </div>
          <div class="col">
          <button class="line-button" role="button">ICS</button>
          </div>
      </div>
      </div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;
      border-top-left-radius:10px;border-top-right-radius:10px;margin-left:10%;margin-right:10%">
       <h4>Stock Condition</h4>
      </div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;border-bottom:none;margin-left:10%;margin-right:10%">
      
</div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;border-top:none;border-bottom:none;margin-left:10%;margin-right:10%">

      <table id="stockout">
          <tr>
              <th>Stock. No</th>
              <th>Item No.</th>
              <th>Item Details</th>
              <th>Quantity</th>
              <th>Date Arrived</th>
              <th>Status</th>



          </tr>

         
          <?php
                include('connection.php');
                $condition = "0";
                $stats = "1";

                $query = mysqli_query($conn, "select * from `stock_pn` join stocks on stocks.s_id = stock_pn.stock_id
                join admin on admin.id = stocks.officer
                where stocks.sscon = $condition");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>
                     <tr>
                     <td><?php echo $row['s_id'];?></td>
                    <td><?php echo $row['property_number'];?></td>
                    <td><?php echo $row['brand'];?><br>
                        <?php echo $row['stock_name'];?><br>
                        <?php echo $row['description'];?>

                    </td>
                    <td><?php echo $row['in_quantity'];?></td>
                   
                    <td></td>
                    <td>
                        <?php
                        if($row['stats'] == "1")
                        {
                            echo "Taken";
                        }
                        else{
                            echo "Available";
                        }

                        ?>
                    </td>

                    </tr>


            <?php
                }
                ?>


      
          



    </table>
     
      </div>

      <div class="card-body" style="border-radius:none;border:1px solid #ededed;
      border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-left:10%;margin-right:10%">
      </div>
      </div>
        
      </div><!-- end row -->

      <div class="row">

      </div>



     



      </div>
      </div>
            
  </section>
<!-- sidebar script-->
<script src="assets/js/script.js"></script>


 

 
</body>
</html>

