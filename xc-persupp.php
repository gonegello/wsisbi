<?php include "a-session.php";?>
<?php
$client_id = $_GET['client_id'];

$que=mysqli_query($conn,"select * from `people` where idc = $client_id");
while($rw=mysqli_fetch_array($que))
{
   $client_name = $rw['fullname'];
   $firstname = $rw['firstname'];
   $client_profile = $rw['profile'];
   $client_office = $rw['office'];
   $client_position = $rw['position'];
   
} 

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Req / <?php echo $firstname;?></title>

    <?php include "a-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
 
<style>
    table{
        width:100%;
    }

    .stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }

</style>

<body style="background:whitesmoke;">




   
<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 <h1 style="color:grey;"><a href="x-request.php" class="stockroom"><i class="bx bx-envelope"></i> Requests</a>
 <span style="font-size:20px;"> / <i class="bx bx-user"></i> <?php echo $client_name;?></span></h1>
</div>

  <div class="row" style="margin-top:2%;margin-left:15%;margin-right:15%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
   


        <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;">
        <div class="row" style="margin-top:3%;">
          <div class="col" style="text-align:center;">
      <span><img src="<?php echo $client_profile;?>" style="object-fit:cover;border-radius:50px;" width="100px" height="100px"><br><br>
      <h3 style="margin-left:2%;"><?php echo $client_name;?></h3></span>
      </span><?php echo $client_position; echo ", "; echo $client_office;?></span>
    </div><br>
        
        </div>
       
        </div>
        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;border-top:1px solid #ededed;">
        <table>
                  <?php
                  $stat = "supply";
                  $query = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id join fund_c on fund_c.fundc_id = xris.fc_id
                  where req.client_id = $client_id and req.req_stat = '{$stat}' group by xris.fc_id"); 
                              while($rw= mysqli_fetch_array($query))
                  {
                      ?>

                <tr>
                    <td width="5%"><i class='bx bx-file' style="padding:12px 12px;border:1px solid royalblue;color:royalblue;border-radius:50px;font-size:20px;"></i></td>
                    <td>
                      <?php echo "FUND CLUSTER : "; echo $rw['fund_cluster'];?>
                    </td>
                    <td style="text-align:right;font-size:20px;">
                    <a href="x-rislip.php?fc_id=<?php echo $rw['fc_id'];?>&client_id=<?php echo $client_id;?>&idreq=<?php echo $rw['idreq'];?>" title="View" class="opptions"><i class='bx bx-link-external'></i></a>
                  </td>
                  </tr>


<?php
                  }
                  ?>

</table>
          <table>
              
              
          </table>
              
        </div>

</div>
</div>

 

   


 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>


 

 
</body>
</html>
