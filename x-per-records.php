

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
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>




/* CSS */
.line-button {
  background-color: #FFFFFF;
  border: 0;
  margin-right:1%;
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

.report-link{
    color:grey;
}

.report-link:hover{
text-decoration:none;
color:#E6A519;
font-size:30px;
}
.po{
    color:grey;
    font-size:12px;
}
.per-link:hover{
    text-decoration:none;

}


.stockroom{
        color:#A3A3FF;
      }
      .stockroom:hover{
        color:#A3A3FF;
        text-decoration:none;
      }
  table{
    width:100%;
  }

    </style>
 
    <body style="background:whitesmoke;">
    <?php 
 
    include "a-overview.php";
  
    ?>

    
<?php

$userid = $_GET['userid'];
$stat = $_GET['stat'];

$query=mysqli_query($conn,"select * from `people`where user_id = $userid");
while($row=mysqli_fetch_array($query))
{
$fullname = $row['fullname'];
$photo = $row['profile'];
$idc = $row['idc'];
$office = $row['office'];
$firstname = $row['firstname'];
$contact = $row['contact_n'];

} 

$query=mysqli_query($conn,"select * from `user`where id = $userid");
while($rosw=mysqli_fetch_array($query))
{
  $position = $rosw['position'];
  
}

?>
   
                          
<?php


$ris = "SELECT * FROM ris WHERE req_by = $idc";
if($row = mysqli_query($conn, $ris))
{
  $riss = mysqli_num_rows($row);
}

$ics = "SELECT * FROM ics WHERE by_id = $idc";
if($row = mysqli_query($conn, $ics))
{
  $icss = mysqli_num_rows($row);
}

$par = "SELECT * FROM par WHERE by_id = $idc";
if($row = mysqli_query($conn, $par))
{
  $parr = mysqli_num_rows($row);
}

$ptr = "SELECT * FROM ptr WHERE rec_by = $idc";
if($row = mysqli_query($conn, $ptr))
{
  $ptrr = mysqli_num_rows($row);
}



?>



<div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><a href="x-people.php" class="stockroom"><i class="bx bx-user"></i> Accounts</a><span style="font-size:20px;"> / <i class="bx bx-folder"></i><?php echo $firstname;?>'s Record</span></h1>

</div>

          
      <div class="row">
        <div class="col">
        <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
        <div class="col" style="padding:0;">
        <div class="card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;">

        </div>
        <div class="card-body" style="text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <img src="<?php echo $photo;?>" style="object-fit:cover;border-radius:50%;border:1px solid #ededed;" width="200px" height="200px"><br>
        <br>
        <h4><?php echo $fullname;?></h4>
        <span><?php echo $position; echo ", "; echo $office;?></span><br>
        <span>
          <?php 
          if($contact == NULL)
          {
            echo '<span style="font-style:italic;color:grey;">No contact number added</span>';
          }
          else{
            echo $contact;
          }
        
          ?>
      </span>
      <br><br><br>

      <span>
        <?php
        if($stat == "1")
        {
          echo '<span style="color:#77dd77;padding:10px 12px;border:1px solid #77dd77;">Active User</span>';
        }

        ?>
      </span><br><br><br>
        </div>

        </div>
</div>

        </div>

        <div class="col">
     
       
     <div class="row" style="margin-top:2%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     
    

     <div class="col" style="padding:0;">
     
    <div class="card-body" style="background:#A3A3FF;border-top-left-radius:10px;border-top-right-radius:10px;">
        <i class='bx bx-folder' style="color:white;font-size:40px;"></i><span style="color:white;font-size:40px;"> Records</span>
    </div>


        <div class="card-body" style="background:whitesmoke;" id="icsrec">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">INVENTORY CUSTODIAN SLIP</h6>
   
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body">
        <?php
        if($icss == 0)
        {
          echo '<center><h3 style="color:grey;">No ICS record.</h3></center>';
        }
        ?>
        </div>

        <div class="card-body" style="background:whitesmoke;" id="parrec">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">PROPERTY ACKNOWLEDGEMENT RECEIPT</h6>
   
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body">
            <?php
                if($parr == 0)
                {
                  echo '<center><h3 style="color:grey;">No PAR record.</h3></center>';
                }
                ?>
          
        </div>


         <div class="card-body" style="background:whitesmoke;" id="risrec">
        <div class="row">
          <div class="col">
          <h6 style="color:grey;">REQUISITION ISSUE SLIP</h6>
   
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>

        <div class="card-body" style="">
           
        <?php
        if($riss == 0)
        {
          echo '<center><h3 style="color:grey;">No RIS record.</h3></center>';
        }
        ?>

        <table>
          <?php
            $query=mysqli_query($conn,"SELECT * FROM ris WHERE req_by = $idc");
            while($row=mysqli_fetch_array($query))

          {
            ?>
            <tr>
             
              <td style="color:blue;font-weight:bold;"><?php echo $row['ris_no'];?></td>
              <td></td>
              <td><a href="x-xris.php?fc=<?php echo $row['fc'];?>&req_by=<?php echo $row['req_by'];?>&idris=<?php echo $row['idris'];?>"><i class='bx bx-link-external'></i></a></td>
            </tr>

            <?php
          }
          ?>

      </table>
        </div>


        
        <div class="card-body" style="background:whitesmoke;" id="risrec">
        <div class="row">
          <div class="col">
              <h6 style="color:grey;">PROPERTY TRANSFER REPORT</h6>
   
    </div>
          <div class="col">

          </div>
        </div>
       
        </div>
        
        <div class="card-body" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <?php
        if($ptrr == 0)
        {
          echo '<center><h3 style="color:grey;">No PTR record.</h3></center>';
        }
        ?>
      </div>
     
     
     




     
</div>
</div>
        

           
</div>
      </div>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 






</body>
</html>
