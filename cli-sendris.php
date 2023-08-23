

  <?php 
  include "cli-session.php";
  include "pr-no.php";

  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $next_pr_no;?></title>

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:2px solid black;
  
  
}
th[colspan="6"] {
    text-align: center;
}
th[rowspan="2"]{
  text-align:center;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.white{
  color:white;
}


#proceedris{
     padding:10px 13px;
     background:#50C878;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
     float:right;
 }
 #proceedics{
     padding:10px 13px;
     background:#50C878;
     border:none;
     color:white;
     outline:none;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     border-radius:5px;
     float:right;
 }
 #purpose{
   outline:none;
   border:none;
   background:white;
 }
 #purpose:focus{
   outline:none;
   border:none;
   box-shadow:none;
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

  




      <div class="row">
      <div class="col">
        <div id="ris-div">
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;border-bottom:none;
        border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-left:5%;margin-right:5%;margin-top:5%;"> 
        <h2>RIS</h2>
        <div class="row">

          <div class="col">
        <p style="color:grey;">*Note: Click `proceed` button to request. If you wish to make any changes click <a href="cli-order.php">here.</a></p>
        </div>

        <div class="col">
        <p style="float:right;color:grey;">To : <a href="#"><?php echo $dept_head;?></a> <span><i>( Department Head )</i></span><br><span>Requested By:<a href="#"> <?php echo $fullname;?></a></span></p>
        </div>

        </div>
        </div>
        <div class="card-body" style="margin-right:5%;margin-left:5%;border:1px solid #ededed;border-radius:5px;
        border-top-left-radius:0px; border-top-right-radius:0px;">

      <form method="post" action="ris_req.php">
          
        <table>

          <tr>
            <th colspan = "6">
             <b> PURCHASE REQUEST </b>
          </th>
          </tr>

          <tr>
            <th>Entity Name:</th>
            <th colspan = "2" style="text-align:Left;">
            <span style="font-weight:normal;"><?php echo $university;?></span>
            </th>
            <th>Fund Cluster:</th>
            <th colspan = "2"></th>
          </tr>

          <tr style="border-top:2px solid black;">
            <td>Office / Section :</td>
            <td><b><?php echo $office;?></b></td>
            <td>PR No.</td>
            <td></td>
            <td>Date :</td>
            <td style="border-bottom:2px solid black;"><?php echo $datte;?></td>

          </tr>

          <tr>
            <td></td>
            <td></td>
            <td>Responsibility Center Code:</td>
            <td></td>
            <td></td>

          </tr>

        <tr style = "border-top:3px solid black;">
            <th colspan = "2">Stock/Property No.</th>
            <th rowspan = "2">Item Description</th>
            <th rowspan = "2">Quantity</th>
            <th rowspan = "2">Unit Cost</th>
            <th rowspan = "2">Total Cost</th>
        </tr>
        <tr>
          <td>No.</td>
          <td>Unit</td>
         
          
        </tr>

        <?php include "connection.php";
        $ris = "2";
        $total_price = 0;
        $stat = "0";
        $query = mysqli_query($conn, "select * from `cart` join stocks on stocks.s_id = cart.item_id
        where stocks.int_typeid = $ris and cart.stat = '{$stat}' and cart.client_id = $id");
        while($row = mysqli_fetch_array($query))
        {
          $uprice = $row['unit_price'];
          $quantity = $row['quan'];
          $total = $uprice * $quantity;
          $total_price += $row['unit_price'] * $row['quan'];
         
        
      ?>
        
       
        <tr>
            <td> 
              
              <input type="hidden" name="idcart2[]" value="<?php echo $row['idcart'];?>"/>
              <input type="hidden" name="r_date2[]" value="<?php echo $datte;?>"/>
              <input type="hidden" name ="stat2[]" value="1"/>
              <input type="hidden" name="h_id" value="<?php echo $h_id;?>"/>
              
              
            </td>
            <td><?php echo $row['unit'];?></td>
            <td><?php echo $row['brand']; echo " "; echo $row['stock_name'];?> <?php echo $row['description'];?></td>
            <td style = "text-align:right;"><?php echo $row['quan'];?></td>
            <td style = "text-align:right;"><?php echo (number_format($row['unit_price'],2));?></td>
            <td style="text-align:right;"><?php echo (number_format($total,2));?></td>
            
        </tr>
 
   
    <?php
    }

    ?>
      <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><b>ABC:</b></td>
      <td style="text-align:right;"><?php echo (number_format($total_price,2)) ;?></td>    
      </tr>

      <tr>
        <td>Purpose:</td>
        <td colspan="4" style="border-bottom:2px solid black;"><input type="text" name="purpose2" id="purpose" required=""></td>
        <td></td>  
      </tr>

      <tr>
        <td><span class="white">sdf</span></td>
        <td colspan="4" style="border-bottom:2px solid black;"><span class="white">fsdf</span></td>
        <td><span class="white">dfd</span></td>    
      </tr>

      <tr>
        <td> <span class="white">sd</span></td>
        <td colspan="4" style="border-bottom:2px solid black;"><span class="white"></span></td>
        <td><span class="white"></span></td>      
      </tr>

      <tr>
        <td><span class="white">asdf</span></td>
      </tr>

      <tr> 
        
        <td></td>
        <td>Requested by:</td>
        <td></td>
        <td>Approved by:</td>
        <td></td>
        <td></td>


      </tr>

      <tr>
        <td>Signature:</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td >Printed Name:</td>
        <td style="text-align:center;border-bottom:2px solid black;"><span style="text-transform:uppercase;"><?php echo $fullname;?></span></td>
        <td></td>
        <td style="text-align:center;border-bottom:2px solid black;"><span style="text-transform:uppercase;"><?php echo $dir_name;?></span></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>Designation:</td>
        <td style="text-align:center;border-bottom:2px solid black;"><span><?php echo $designation;?></span></td>
        <td></td>
        <td style="text-align:center;border-bottom:2px solid black;"><span><?php echo $director;?></span></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td rowspan="6"><span class="6"></span></td>
      </tr>


     </table>

      </div>
      <div class="card-body"  style="border-radius:5px;border:1px solid #eded;border-top:none;
        border-top-left-radius:0px;border-top-right-radius:0px;margin-left:5%;margin-right:5%;
         "> 
         <div class="row">
          <div class="col">
        <button type="submit" onclick = "return confirm('Ready To Send Purchase Request ? Click `Ok` to Proceed.')" name="request" id="proceedris">Send Request</button>
  </form>
        </div>
        </div>
      </div>
      </div>
  </div>







      </div>
      </div>
            
      </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script>
/*const btn = document.getElementById("proceedics");
const ics = document.getElementById("ics-div");

btn.onclick = function(){
    ics.style.display = "none";
    //showhidden.style.display = "block";
}
*/
</script>

<script>
 /* const risbtn = document.getElementById("proceedris");
  const ris = document.getElementById("ris-div");

  risbtn.onclick = function(){
    ris.style.display = "none";
  }*/
</script>

 

 
</body>
</html>
