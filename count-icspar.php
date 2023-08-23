
<?php 

$stat = "1";

$query="SELECT * FROM xicspar WHERE stat = $stat AND id_iar IS NOT NULL";
 if($row = mysqli_query($conn, $query))
 {
     $recently_icspar = mysqli_num_rows($row);

 }

 
 //ics

 $query="SELECT * FROM xicspar WHERE stat = $stat AND id_iar IS NOT NULL AND unit_cost <= 50000";
 if($row = mysqli_query($conn, $query))
 {
     $active_ics = mysqli_num_rows($row);

 }




 $query="SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.id_iar IS NOT NULL AND unit_cost <= 50000 AND custodian IS NULL";
 if($row = mysqli_query($conn, $query))
 {
     $set_ics = mysqli_num_rows($row);

 }

 $query="SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.id_iar IS NOT NULL AND xicspar.stat = 1 AND unit_cost <= 50000";
 if($row = mysqli_query($conn, $query))
 {
     $tobe_ics = mysqli_num_rows($row);

 }



 //par
 
 $query="SELECT * FROM xicspar WHERE stat = $stat AND id_iar IS NOT NULL AND unit_cost > 50000";
 if($row = mysqli_query($conn, $query))
 {
     $active_par = mysqli_num_rows($row);

 }

 $query="SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE xicspar.id_iar IS NOT NULL AND unit_cost > 50000";
 if($row = mysqli_query($conn, $query))
 {
     $set_par = mysqli_num_rows($row);

 }




?>

