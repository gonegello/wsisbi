

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
//include "property_number.php";
//include "stock_number.php";
include "x-ris-no.php";

?>





    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title></title>

    
    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
.iar{
    padding:10px;
    margin-left:1%;
    font-size:12px;
    color:white;
}
.iar:hover{
    font-size:13px;
    color:white;
    text-decoration:none;
}

    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
    include 'modaladd_gen.php';
    include 'modaladd_category.php';
    ?>
   

    <section class="home-section">  
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">

    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
   
        <div class="col">

        <h1 style="color:grey;"><i class="bx bx-refresh"></i> Property Transfer</h1>
        </div>
        
        
        <div class="col" style="text-align:right;margin-top:1%;">
            <span style="color:grey;"><a href="x-full-ics.php"><i class="bx bx-box"></i> ICS Stockroom</a> | <a href="x-full-par.php"><i class="bx bx-package"></i> PAR Stockroom </a></span>
        </div>
   
 
</div>

    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
    
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-refresh"></i><span> &nbsp; PROPERTY TRANSFER</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          <a href="#allics" title="All ICS Items" class="iar">Ready for transfer</a> |
            <a href="#setcus" title = "Set Custodian" class="iar">Transfer a property</a> |
            <a href="#tobeiss" title="To Be Issued" class="iar">Property Transfer Report</a> 
          </div>
           
        </div>
        </div>
  

        <div class="card-body" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
            <div class="col">
            <span>READY FOR TRANSFER</span>
            </div>
            <div class="col" style="text-align:right;">
          
            </div>
        </div>
 
        </div>



        <div class="card-body" >


        <?php
if($count_ptr == 0)
{
    echo '<div class="card-body" style="border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;border-top:none;">
    <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align:center;">
    <img src="image/none.jpg" style = "oject-fit:cover;"><br><br>
    <br><span style="color:grey;">No properties to be transferred yet.</span><br><br>
  <br><br>
    </div>
    <div class="col">
    </div>
    </div>
    
    </div>';
  }
?>
        <table>
                <?php
                include "connection.php";
                 $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
                 WHERE icspar_details.ptr_custodian IS NOT NULL
                 AND icspar_details.ptr_id IS NULL GROUP BY xicspar.fc_id,icspar_details.ptr_custodian,icspar_details.custodian");
                 while($row=mysqli_fetch_array($query))
                {
                    $qq=mysqli_query($conn,"select * from `people`where idc = $row[custodian]");
                    while($rr=mysqli_fetch_array($qq))
                   {
                     $cus = $rr['fullname'];
                     $c_lastname = $rr['lastname'];
                     if (strlen($cus) > 10)
                        $o_cus = substr($cus, 0, 1) . '.';
                   }

                   $vv=mysqli_query($conn,"select * from `people`where idc = $row[ptr_custodian]");
                    while($cc=mysqli_fetch_array($vv))
                   {
                     $p_cus = $cc['fullname'];
                     $p_lastname = $cc['lastname'];

                     if (strlen($p_cus) > 10)
                     $full_cus = substr($p_cus, 0, 1) . '.';
                   }
                ?>

                    <tr>
                        <td><i class='bx bx-refresh' style="font-size:25px;color:royalblue;border:2px solid royalblue;padding:10px 10px;border-radius:50px;"></i></td>
                        <td>0
                            <span style="font-size:12px;">From:</span><br>
                            <?php echo $o_cus; echo " "; echo $c_lastname;?>
                        </td>
                        <td style=""><i class='bx bx-right-arrow-alt' ></i></td>
                        <td>
                            <span style="font-size:12px;">To:</span><br>
                            <?php echo $full_cus; echo " "; echo $p_lastname;?>
                     </td>
                     <td>
                         <a href="x-ptr-per.php?ptr_custodian=<?php echo $row['ptr_custodian'];?>&custodian=<?php echo $row['custodian'];?>">view</a>
                     </td>
                </tr>



<?php
                }
                ?>


        </table>


        </div>


         
      

        <div class="card-body" style="background:whitesmoke;border-radius:10px;">
        <div class="row">
            <div class="col" style="text-align:left;">
                <h6 style="color:grey;">TRANSFER A PROPERTY FROM : </h6>
            </div>
            <div class="col">
                <label for="find_cus">Find Custodian :</label>
                <input type="text" id="cusinput" onkeyup="myFunctionn()" placeholder="Search custodian name.." style="background:white;border-radius:50px;font-style:italic;font-size:13px;width:80%;">
            </div>
        </div>
        
        
        </div>

        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-bottom:3%;">

        <table id="custable">

                 <?php
                    include('connection.php');
                    $stat = "1";
                    $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN people ON people.idc = icspar_details.custodian JOIN xicspar ON xicspar.idx = icspar_details.x_id
                    WHERE icspar_details.custodian IS NOT NULL AND icspar_details.icsxpar_no IS NOT NULL GROUP BY icspar_details.custodian");
                    while($row=mysqli_fetch_array($query))
                    {
                     ?>
                     <tr>
                         <td> <i class='bx bx-user' style="color:white;background:#A3A3FF;border-radius:50px;padding:10px 10px;font-size:20px;"></i>
                        </td>

                         <td><span style="color:royalblue;font-weight:bold;"><?php echo $row['fullname'];?></span><br><?php echo $row['office'];?></td>
                  
                         <td style="text-align:right;">
                         <a href="x-per-cus.php?idc=<?php echo $row['idc'];?>"  title="<?php echo $row['fullname'];?>">
                         <i class='bx bx-chevron-right' style="margin-top:2%;font-size:30px;color:royalblue;padding:12px 12px;border-radius:50px;"></i></a>
                        </td>

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
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 


 <script>
function myFunctionn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cusinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("custable");
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
                    url:'search-xpptr.php',
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
