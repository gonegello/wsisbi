

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

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


table {
font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:17px;
  
}
.row .col input[type="text"], #officer{
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-bottom:1px solid black;
}
span{
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
th[colspan="6"] {
    text-align: center;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
th[rowspan="2"]{
  text-align:center;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
table th{
    text-align:center;
    border:2px solid black;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    font-weight:bold;

    
    

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
td{
    border:none;

}


input[type="text"]{
background:white;
outline:none;

border-radius:0px;
}
input[type="text"]:focus{
    background:none;
    box-shadow:none;
    border-radius:0px;
}



    </style>
 
    <body style="background:whitesmoke;">

    <div class="row" style="margin-top:2%;margin-left5%;margin-right:15%">
        <div class="col">

        <div class="card-body" style="margin-right:10%;margin-left:20%;">

        <table>
            <tr>
                <td style="border-right:1px solid black;text-align:center;" rowspan="2" width="20%">
                   <img src="<?php echo $univ_logo;?>" style= "object-fit:cover;" width="100px" height="100px" />
</td>
                <td width="20%" style="border:1px solid black;">Property No. :</td>
                <td style="border:1px solid black;" width="30%;">ICT-05-21-0002</td>
                <td style="border-bottom:1px solid black;"></td>

            </tr>
            <tr>
              
               
                <td style="border:1px solid black;">Name of Article:</td>
                <td colspan="2"  style="border:1px solid black;" width="50%">Label Printer, Epson LW-1000 P</td>
            </tr>

            <tr>
                <td style="border-right:1px solid black;"></td>
                <td style="border:1px solid black;">Code No. :</td>
                <td colspan="2"  style="border:1px solid black;"></td> 
               

            </tr>

            
            <tr>
                <td style="border-right:1px solid black;"></td>
                <td style="border:1px solid black;">Date of Acquisition :</td>
                <td colspan="2"  style="border:1px solid black;"></td>
               

            </tr>

            <tr>
                <td style="border-right:1px solid black;"></td>
                <td style="border:1px solid black;">Unit Cost :</td>
                <td colspan="2"  style="border:1px solid black;"></td>
               

            </tr>

            <tr>
                <td style="border-right:1px solid black;"></td>
                <td style="border:1px solid black;">End User :</td>
                <td colspan="2"  style="border:1px solid black;"></td>
               
            </tr>
        </table>
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
