<?php include "a-session.php";?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="icon" href="image/bo.ico">
  <head>
    <meta charset="UTF-8">
    <title>Activity Log</title>

    <?php include "a-linkstyle.php";?>
    
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">
     
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
 
<style>
    table{
        width:100%;
    }
input[type="text"]{
    background:white;
    border:1px solid #ededed;
    border-radius:50px;
}
    </style>
  
<body style="background:whitesmoke;">

<!--Side bar-->
<?php 
require_once "a-sidebar.php";
include "a-overview.php";

$ris_year = date("Y");
?>



<section class="home-section">
<div class="container-fluid" style="background-color:whitesmoke;">
  <div class="card-shadow">
     <!--Card header-->
 
     <?php 
      //if cart is updated
        if(isset($_SESSION['deletein']))
            {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Success</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['deletein'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['deletein']);
            }
      ?>

 
     <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><i class="bx bx-history"></i> History</h1>



</div>

     <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
        <h5 style="color:white;"><i class="bx bx-history"></i><span> &nbsp; HISTORY</span></h5>
        </div>

        <form method="post" action="delHis.php">
          <div class="col" style="">  
         
          </div>
           
        </div>
        </div>


        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col" style="align-text:left;">
         
         <!-- <button type="submit" name="delete" 
          style="font-size:20px;"><i class="bx bx-trash" style="color:black;"></i> Delete</button>
         
    -->
    </div>
          <div class="col" style="align-text:right;">
          <label for="search_act">Search Keyword :</label>
          <input type="text" id="searchact" onkeyup="myFunction()" placeholder="Search by article or date..">
              </div>
        </div>
       
        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">

        <table id="dateview">
            <?php
             $query=mysqli_query($conn,"SELECT * FROM history WHERE user_id = $id");
             while($row=mysqli_fetch_array($query))
            {
                $his_date = $row['his_date'];
                ?>
                
                <tr>
                    <td><!--<input type = "checkbox" name="check[]" id="check" value="<?php echo $row['idhis'];?>">-->
                
                    
                </td>
                   <td width="5px;"> 
                  

                   <?php
                   if($row['his_stat'] == "item")
                   {
                       echo 
                       '
                       <i class="bx bx-mouse" style="font-size:50px;padding:10px 10px;border-radius:50px;color:grey;"></i>
                       ';
                   }

                   if($row['his_stat'] == "archivein")
                   {
                       echo 
                       '
                       <i class="bx bx-archive-in" style="font-size:50px;padding:10px 10px;border-radius:50px;color:grey;"></i>
                       ';
                   }

                   if($row['his_stat'] == "archiveout")
                   {
                       echo 
                       '
                       <i class="bx bx-archive-out" style="font-size:50px;padding:10px 10px;border-radius:50px;color:grey;"></i>
                       ';
                   }

                   if($row['his_stat'] == "profilepic")
                   {
                       echo 
                       '
                       <i class="bx bx-image" style="font-size:50px;padding:10px 10px;border-radius:50px;color:grey;"></i>
                       ';
                   }



            


?>
                   </td>


                   <td>
                       <?php
                       if($row['his_stat'] == "item")
                       {
                           echo 
                           '
                           <span style="margin-left:2%;">You added <i><span style="color:royalblue;">'.$row['details_'].'</i></span> on '.$row['his_date'].' at '.$row['his_time'].'</span>
                           
                           '
                           ;
                       }

                       if($row['his_stat'] == "archivein")
                       {
                           echo 
                           '
                           <span style="margin-left:2%;">You archived-in <i><span style="color:royalblue;">'.$row['details_'].'</i></span> on '.$row['his_date'].' at '.$row['his_time'].'</span>
                           
                           '
                           ;
                       }

                       if($row['his_stat'] == "archiveout")
                       {
                           echo 
                           '
                           <span style="margin-left:2%;">You archived-out <i><span style="color:royalblue;">'.$row['details_'].'</i></span> on '.$row['his_date'].' at '.$row['his_time'].'</span>
                           
                           '
                           ;
                       }

                       if($row['his_stat'] == "profilepic")
                       {
                           echo 
                           '
                           <span style="margin-left:2%;">You updated your <i><span style="color:royalblue;">profile photo </i></span> on '.$row['his_date'].' at '.$row['his_time'].'</span>
                           
                           '
                           ;
                       }





                        ?>
                   </td>

                   <td>
                       <a onclick = "return confirm('Are you sure you want to delete?')"
                        href="delHis.php?idhis=<?php echo $row['idhis'];?>" title="delete?"><i class='bx bx-trash' style="font-size:25px;"></i></a>
                   </td>
                </tr>

                    </form>
             
               


                <?php

            }
            ?>

          </table>
        </div>

      </div>
      </div>
      <?php include "bottom.php";?>
            
  </section>



 <!-- script for tabs-->
 <script src="assets/js/script.js"></script>

 <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchact");
  filter = input.value.toUpperCase();
  table = document.getElementById("dateview");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[2].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "None";
     
   }

}
}
}
</script>
 

 
</body>
</html>
