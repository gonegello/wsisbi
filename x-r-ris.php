

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    include "x-count.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

?>


    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title></title>


    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <style>


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
      .second{
    color:grey;
}
.second:hover{
    color:#A3A3FF;
    text-decoration:none;
}
  
    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
include "count-ris.php";

  
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
     
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">
    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"> Reports</a><span style="font-size:20px;"> / <i class="bx bx-folder"></i> RIS</span></h1>

    </div>
    <div class="col" style="text-align:right;margin-top:1%;">
    <a href="x-input-iar.php" title="Add a consumable item" class="second"><i class="bx bx-mouse"></i> RIS Acceptance</a> |
            <a href="x-request.php" title = "RIS request" class="second"><i class="bx bx-envelope"></i> Request


            <?php 
              if($request_num > 0)
              {

                echo '<span style="background:red;color:white;font-weight:bold;padding:6px 12px;border-radius:50px;font-size:12px;">'.$request_num.'</span>';
              }
                         

          ?>
             
            </a> 
    </div>
 
 
 
 </div>    
           
    
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;">
           <i class='bx bx-folder' style="padding:12px 12px;border-radius:50%;font-size:100px;color:white;"></i><br>
           <h4 style="color:white;">Requisition Issue Slip</h4><span style="color:white;"></span>
           </div>
         </div>

        <div class="row" style="margin-top:4%;">
          <div class="col" style="text-align:center;">
            <a href="x-input-iar.php" title="Add a consumable item" class="iar">Accept An Item</a> |
            <a href="x-request.php" title = "RIS request" class="iar">Request


            <?php 
              if($request_num > 0)
              {

                echo '<span style="background:red;color:white;font-weight:bold;padding:6px 12px;border-radius:50px;font-size:12px;">'.$request_num.'</span>';
              }
                         

          ?>
             
            </a> 
        

          
           
        

        
           


          </div>
           
        </div>
        </div>

        


        <div class="card-body" style="background:whitesmoke;" id="non">
        <div class="row">
          <div class="col">
              <h5 style="">Requisition Issue Slip</h5>
    
    </div>
          <div class="col">
          <input type="text" id="rrisinput" onkeyup="myFunction()" placeholder="Search by ris_no or fullname.." style="background:white;border-radius:50px;">

          </div>
        </div>
       
        </div>


        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <table id="rristable">

            <?php
            $que = mysqli_query($conn, "SELECT * FROM ris GROUP BY iss_date ORDER BY iss_date DESC");
            while($rw = mysqli_fetch_array($que))
            {
                $iss_date = $rw['iss_date'];
        
            ?>
            <!--
            <tr>
            <td>
            <span><?php echo $rw['iss_date'];?></span>
            </td>

        
            </tr>
            -->  

            <?php
                    $stat = "1";
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM ris JOIN people on people.idc = ris.req_by 
                    JOIN req ON req.id_ris = ris.idris JOIN xris ON xris.idx = req.item_id WHERE ris.iss_date = '{$iss_date}'
                    GROUP BY ris.ris_no ORDER BY idris DESC ");
                    while($row=mysqli_fetch_array($query))
                    {

                    ?>
                <tr>
                    <td>   <i class='bx bx-file' style="color:white;background:royalblue;padding:12px 12px;border-radius:50px;"></i></td>
                    <td><span>RIS No : <?php echo $row['ris_no'];?> </span><br>
                        <span><?php echo $row['fullname'];?></span></td>
                    <td> <a href="x-xris.php?fc=<?php echo $row['fc'];?>&req_by=<?php echo $row['req_by'];?>&idris=<?php echo $row['idris'];?>" class="opptions"><i class='bx bxs-chevron-right' ></i></a></td>
               
                </tr>
                <tr><td style="color:transparent;">white</td></tr>  

                <?php
                    }
                    ?>

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
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 
 <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("rrisinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("rristable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if ( td[1].innerHTML.toUpperCase().indexOf(filter) > -1)   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "None";
     
   }

}
}
}
</script>


<!--
 <script type="text/javascript">
        $(document).ready(function(){
            $("#myInput").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'search-xrris.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#myTable").html(response);
                    }
                });
            });
        });
  </script>
      -->




</body>
</html>
