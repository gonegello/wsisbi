

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

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
    <title>Set custodian</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>

::-webkit-input-placeholder {
   font-style: italic;
   font-size:12px;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}

#custodian{
    border:1px solid #ededed;
    background:transparent;
    border-radius:10px;
    padding:12px 15px;

}
#custodian:focus{
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
    border:none;
}
button[type="submit"]{
    background:transparent;
    border-radius:50px;
    border:1px solid #ededed;
    float:right;
    margin-top:7%;
}

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

table{
    width:100%;
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
    include "a-sidebar.php"; 
    include "a-overview.php";
    include 'modaladd_gen.php';
    include 'modaladd_category.php';
    $g_item = $_GET['item'];

    
    // require_once "tool-link.php";

    $get_idx = $_GET['idx'];
    $get_item = $_GET['item'];
   $num = $_GET['num'];
   $po_date = $_GET['po_date'];
   $po_num = $_GET['po_num'];
 


   $req = "SELECT * FROM icspar_details WHERE x_id = $get_idx AND custodian IS NULL";

    if($r = mysqli_query($conn,$req))
    {
        $available =mysqli_num_rows($r);
    }


    $with = "SELECT * FROM icspar_details WHERE x_id = $get_idx AND custodian IS NOT NULL";

    if($row = mysqli_query($conn,$with))
    {
        $withcustodian =mysqli_num_rows($row);
    }

    $allunit = "SELECT * FROM icspar_details WHERE x_id = $get_idx";

    if($row = mysqli_query($conn,$allunit))
    {
        $all =mysqli_num_rows($row);
    }
    ?>
       

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">


    
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
 
 <h1 style="color:grey;"><a href="x-stock.php" class="stockroom"><i class="bx bx-store"></i> Stockroom</a>
  <span style="font-size:20px;"> / <i class="bx bx-box"></i>
  <a href="#">Set Custodian ICS</a> /
  <a href="x-full-ics.php?#tobeiss" class="second">
     To be issued ICS </a><span> | <a href="#">Set Custodian PAR</a> / <a href="x-full-par.php?#tobeiss">To Be Issued PAR</span></a>

</h1>
  
 
 
 </div>
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:royalblue;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;font-size:100px;color:white;">
           <i class='bx bx-box' style="padding:12px 12px;border-radius:50%;"></i><br>
           <h4 style="color:white;"><?php echo $g_item;?></h4>
           </div>
         </div>
        <div class="row" style="margin-top:4%;">
          <div class="col" style="text-align:center;">
           
            <a href="x-xics.php" title="ICS Records" class="guidelink">ICS Records</a>  |
            <a href="x-xics.php" title="ICS Records" class="guidelink">PAR Records</a> 

           
        

        
           


          </div>
           
        </div>
        </div>

        
        <div class="card-body" style="background:whitesmoke;">
        <div class="row">
          <div class="col">
                    
          <h2><?php echo $get_item;?></h2>
          <span><?php echo $po_num; echo "/"; echo $po_date;?></span><br>
                <span>All : (<?php echo $all;?>)  With Custodian: (<?php echo $withcustodian;?>)
                Available: (<?php echo " "; echo $available;?>) </span><br>

   
    </div>


</div>
</div>

<div class="card-body">

<table>
<tr>
                    <td style="color:royalblue;font-weight:bold;"></td>
                    <td style="color:royalblue;font-weight:bold;">Property No.</td>
                    <td style="color:royalblue;font-weight:bold;">Custodian</td>
                    <td style="color:royalblue;font-weight:bold;"></td>

                    <tr>
    <td style="color:white;">white</td>
</tr>

<?php

                

include('connection.php');
$stat = "1";
$query=mysqli_query($conn,"SELECT * FROM icspar_details LEFT JOIN people ON people.idc = icspar_details.custodian 
LEFT JOIN user ON user.id = people.user_id WHERE x_id = $get_idx");
while($row=mysqli_fetch_array($query))
{

?>
<form method="post" action="addcust.php">
<tr>
    <td></td>
    <td> <span><?php echo $row['prop_num'];?></span></td>
    <td> <?php
        if($row['custodian'] == NULL)
        {
            echo ' <label>Select Custodian:</label><br>
            <select class = "selectme" name="custodian[]" id="custodian">
            <option>'.$peps.'</option>
            </select> <br><br>
            <input type="hidden" name="pn_id[]" id="pn_id" value="'.$row['pn_id'].'">

            <input type="hidden" name="idx" id="idx" value="'.$get_idx.'">
            <input type="hidden" name="item" id="item" value="'.$get_item.'">
            <input type="hidden" name="num" id="num" value="'.$num.'">
            <input type="hidden" name="po_date" id="po_date" value="'.$po_date.'">
            <input type="hidden" name="po_num" id="po_num" value="'.$po_num.'">



            
            
           
            ';
        }
        if($row['custodian'] != NULL){
            echo '<span style="font-weight:bold;font-size:20px;">'.$row['fullname'].'</span><br>
             <span style="color:grey;">'.$row['office'].'</span>
             <span style="color:grey;">('.$row['position'].')</span><br>'
             

            
            
            ;
        }

        ?>
</td>
    <td>  <?php
       
       if($row['custodian'] != NULL)
       {
           echo '<i class= "bx bx-check" style="color:green;font-size:30px;font-weight:bold;float:right;" ></i>';
       }

       ?></td>
</tr>

<tr>
    <td style="color:white;">white</td>
</tr>


<?php

}
?>

<tr>
    <td></td>
    <td></td>
    <td></td>
<td>    <?php
    if($num > 0)
    {
        echo ' <input type="submit" style="float:right;" name="save" id="save" value="Update">';
    }

    ?>
   </td>
    </tr>
</table>
</form>


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


     $(function() {
    $( ".custodian" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });

 </script>

<script>
     function GetDetails(str){
        if(str.length == 0){
            
            document.getElementById("p_id").value = "";
            
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);
                    document.getElementById("p_id").value = myObj[0];


                }
            };

            xmlhttp.open("GET", "fill-people.php?custodian=" + str, true);
            xmlhttp.send();

        }
     }
 </script>









</body>
</html>
