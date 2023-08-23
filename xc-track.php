<?php
include "cli-session.php";
include "xc-count.php";
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Track Request</title> 

    <?php require_once "cli-linkstyle.php";?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>  
  table {
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:20px;
  
}
table th{
    text-align:center;
    border:2px solid black;
    font-weight:bold;


}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;

}
td{
    border:none;
}

#checkout{
  float:right;
}


.opptions{
  background:none;
  padding:12px 12px;
  color:grey;
  border-radius:5px;
  margin-left:3%;
 
}

.opptions:hover{
  background:#f0f0f0;
  padding:10px 15px;
  text-decoration:none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;;
  border-radius:50%;
  color:grey;

  

}
.emptylink{

  background:royalblue;
  color:white;
  border-radius:5px;
  padding:10px 12px;

}

.emptylink:hover{
  color:royalblue;
  text-decoration:none;
  background:white;
  border:2px solid royalblue;


}

.guidelink{
  padding:10px 12px;
  color:white;

  border-radius:50px;
}

.guidelink:hover{
  text-decoration:none;
  color:black;
  background:#ffc801;
  border:none;
  
}

#allsearch{
  background:white;
  width:70%;
  border-radius:50px;
  border:1px solid #ededed;
  float:right;

}
.stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }
.second{
    color:grey;
}
.second:hover{
    color:grey;
    text-decoration:none;
}


  </style>


<body style="background:whitesmoke;">

<?php

$c_date = $_GET['c_date'];
$r_stat = $_GET['req_stat'];
$c_time = $_GET['c_time'];

?>

<div class="row"style="margin-left:5%;margin-top:2%;">
 
 <h1 style="color:grey;"><a href="xc-notif.php" class="stockroom"><i class="bx bx-bell"></i> Notification</a>
 <span style="font-size:20px;"> / <a href="#" class="second">
     <i class="bx bx-cart-add"></i> Track Pending Request</a></span></h1>

 </div>
        
<div class="row" style="margin:5%;margin-top:2%;">
    <div class="col"> 
        <div class="card-body" style="border-radius:10px;">
           
        <?php
        if($r_stat == "head")
        {
            echo '
            
            <h1 style="text-align:center;color:grey;"><br>Waiting for Deparment Head Approval.</h1>
            
            ';
        }

        if($r_stat == "supply")
        {
            echo '
            
            <h1 style="text-align:center;color:grey;"><br>Waiting for Supply Office Approval.</h1>
            
            ';
        }



?>

        <table>
        <?php
         include "connection.php";
      

         $query = mysqli_query($conn, "select * from `req` where client_id = $id and c_date = '{$c_date}' and c_time = '{$c_time}' group by client_id order by idreq desc");
       while($row = mysqli_fetch_array($query))
       
         {
             $req_stat = $row['req_stat'];

            ?>

            
          <?php //if status of purchase request is 3 director approved

if($req_stat == "head")
{
  echo '
  <div class="row" style="margin-right:2%;margin-left:2%;margin-bottom:10%;margin-top:10%;">
<div class="col" style="text-align:center;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;padding:10px;border-radius:10px;">
<br>
<i class="bx bx-paper-plane" style="color:royalblue;font-size:30px;border:3px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
<h6 style="color:royalblue;font-size:25px;">REQUESTED</h6>
<span class="subs" style="color:grey;">You sent an item request.</span><br><br>

<span class="subs">'.$row['c_date'].'</span><br

<span class="subs">'.$row['c_time'].'</span>
<br><br>
</div>

<div class="col" style="text-align:center;margin-top:7%;">
<hr style="border-color:#ededed;">
</div>

<div class="col" style="text-align:center;border-radius:10px;">
<br>
<i class="bx bx-user" style="color:#ededed;font-size:30px;border:3px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
<h6 style="color:#ededed;font-size:15px;">DEPARMENT HEAD</h6><br>
<span class="subs"></span><br>
<span class="subs"></span>
<br><br>
</div>

<div class="col" style="text-align:center;margin-top:7%;">
<hr style=";border-color:#ededed;">
</div>


<div class="col" style="text-align:center;border-radius:10px;">
<br>
<i class="bx bx-store" style="color:#ededed;font-size:30px;border:3px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
<h6 style="color:#ededed;font-size:15px;">SUPPLY OFFICE</h6><br>
<span class="subs"></span><br>
<span class="subs"></span>
<br><br>
</div>



</div>
  
  
  ';
}



if($req_stat == "supply")
{
  echo '
  <div class="row" style="margin-right:2%;margin-left:2%;margin-bottom:10%;margin-top:10%;">
  <div class="col" style="text-align:center;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;padding:10px;border-radius:10px;">
  <br>
  <i class="bx bx-paper-plane" style="color:royalblue;font-size:30px;border:3px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
  <h6 style="color:royalblue;font-size:25px;">REQUESTED</h6>
  <span class="subs" style="color:grey;">You sent an item request.</span><br><br>
  
  <span class="subs">'.$row['c_date'].'</span><br
  
  <span class="subs">'.$row['c_time'].'</span>
  <br><br>
  </div>
  

<div class="col" style="text-align:center;margin-top:5%;">
<hr style="border-color:royalblue;">
</div>

<div class="col" style="text-align:center;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;padding:10px;border-radius:10px;">
<br>
<i class="bx bx-user" style="color:royalblue;font-size:30px;border:3px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
<h6 style="color:royalblue;font-size:25px;">DEPARTMENT HEAD</h6>
<span class="subs" style="color:grey;">Your item request has been approved.</span><br><br>

<span class="subs">'.$row['a_date'].'</span><br>
<span class="subs">'.$row['a_time'].'</span>
<br><br>
</div>

<div class="col" style="text-align:center;margin-top:7%;">
<hr style=";border-color:#ededed;">
</div>


<div class="col" style="text-align:center;border-radius:10px;">
<br>
<i class="bx bx-store" style="color:#ededed;font-size:30px;border:3px solid #ededed;padding:10px 10px;border-radius:50px;"></i><br><br>
<h6 style="color:#ededed;font-size:15px;">SUPPLY OFFICE</h6><br>
<span class="subs"></span><br>
<span class="subs"></span>
<br><br>
</div>



</div>
  
  
  ';
}



            ?>
        
        


        <?php
        }
        ?>

        </table>
        <tr><td>Requested Items:</td></tr>
        <div class="row">
            <div class="col">
                <table>
                <?php
                $n = 0;
                   $query = mysqli_query($conn, "select * from `req` join xris on xris.idx = req.item_id where client_id = $id and c_date = '{$c_date}' and c_time = '{$c_time}'");
                   while($row = mysqli_fetch_array($query))
                   
                {
                    $n = $n + 1;
                    ?>
                    <tr>
                        <td>
                            <?php echo $n;?>.
                        <?php echo $row['req_quan'];?>
                        <?php echo $row['unit'];?>, 
                            <?php echo $row['item_details'];?></td>

                </tr>

                    


            <?php
            
                }
                ?>
                </table>
            </div>
        </div>

        </div>
    </div>
</div>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>
 <script>
const closesuccBtn = document.getElementById('close-success-btn');
const divSuccess = document.getElementById('div-success');

closesuccBtn.onclick = function(){
  divSuccess.style.display = "none";
}


 </script>


 

 
</body>
</html>
