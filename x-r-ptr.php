

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    include "x-count.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

?>


<?php
//give value to the next stock id for stock_pn
include "connection.php";


    //university abb
    $abb = mysqli_query($conn, "select *from `university` order by iduniv desc limit 1");
    while ($row = mysqli_fetch_array($abb))
    {
        $uni_ab = $row['abb'];
    }


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
    include "a-overview.php";
  
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
     
          
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">  
    <h1 style="color:grey;"><a href="x-reports.php" class="stockroom"><i class="bx bx-folder"></i> Reports</a><span style="font-size:20px;"> / <i class="bx bx-folder"></i> PTR</span></h1>
    </div>

  
    <div class="col" style="text-align:right;margin-top:1%;">
    <a href="x-input-iar.php" title="ICS Acceptance" class="second"><i class="bx bx-mouse"></i> ICS Acceptance</a> |
    <a href="x-input-ics.php" title = "Set Custodian to an ICS Property" class="second"> <i class="bx bx-mouse"></i> PAR Acceptance</a> |
    <a href="x-xptr.php" title = "Transfer a Property" class="second"> <i class="bx bx-refresh"></i> Transfer a Property</a> 
    </div>

 
 </div>    
    
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;">
           <i class='bx bx-folder' style="padding:12px 12px;border-radius:50%;font-size:100px;color:white;"></i><br>
           <h4 style="color:white;">Property Transfer Report</h4><span style="color:white;"></span>
           </div>
         </div>
        <div class="row" style="margin-top:4%;">
          <div class="col" style="text-align:center;">
        
          </div>
           
        </div>
        </div>

        


        <div class="card-body" style="background:whitesmoke;" id="non">
        <div class="row">
          <div class="col">
              <h5 style="">Property Transfer Report</h5>
    
    </div>
          <div class="col">
          <input type="text"id="ptr" onkeyup="myFunction()" placeholder="Search by ptr no.." style="background:white;border-radius:50px;">

          </div>
        </div>
       
        </div>


        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <table id="dataptr">
            <?php
                    $stat = "1";
                    include "connection.php";
                    $query=mysqli_query($conn,"SELECT * FROM ptr JOIN icspar_details ON icspar_details.ptr_id = ptr.idptr JOIN xicspar ON xicspar.idx = icspar_details.x_id
                    JOIN people ON people.idc= icspar_details.custodian WHERE xicspar.stat=$stat GROUP BY ptr.ptr_no ORDER BY ptr.idptr DESC");
                    while($row=mysqli_fetch_array($query))
                    {

                    $ptr_id = $row['ptr_id'];
                    $ptr_custodian = $row['ptr_custodian'];
                    ?>
                <tr>
                    <td>   <i class='bx bx-file' style="color:white;background:royalblue;padding:12px 12px;border-radius:50px;"></i></td>
                    <td><span>PTR No : <?php echo $row['ptr_no'];?></span><br></td>
                    <td><span><?php echo $row['fullname'];?></span></td>

                    <td>---></td>
                    <td>   
                      <?php
                    
                    $q=mysqli_query($conn,"SELECT * FROM people WHERE idc = $ptr_custodian ");
                    while($r = mysqli_fetch_array($q))
                    {
                    ?>
                  <span>
                    <?php echo $r['fullname']; ?>
                  </span>

                  <?php
                  }
                  ?></td>


                    <td>   
                      <?php
                    
                    $que=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE icspar_details.ptr_id = $ptr_id ");
                    while($rw = mysqli_fetch_array($que))
                    {
                    ?>
                  <span>
                    <?php echo $rw['item_details']; echo "," ?>
                  </span>

                  <?php
                  }
                  ?></td>







                    <td> 
                        <a href="x-per-ptr.php?ptr_custodian=<?php echo $row['ptr_custodian'] ;?>&custodian=<?php echo $row['custodian'];?>&fc_id=<?php echo $row['fc_id'];?>&ptr_id=<?php echo $row['idptr'];?>"><i class='bx bxs-chevron-right' ></i></a></td>
                  
                </tr>
               <!-- <tr><td style="color:transparent;">white</td></tr>-->

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
  input = document.getElementById("ptr");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataptr");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1 )   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }

}
}
}
</script>





</body>
</html>
