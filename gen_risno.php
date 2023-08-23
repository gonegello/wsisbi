<?php
include "connection.php";
//generate property transfer report number

$YEAR = date("Y");
$MONTH = date("m");
$last_no = mysqli_query($conn, "select * from `ris` order by idris desc limit 1");
while($row=mysqli_fetch_array($last_no))
{

    //get the current iar_id
   // $iar_id = $row['iar_id'];
   $idris = $row['idris'];
    //get the current iar_no
    //$iar_code = $row['iar_no'];
   $ris_code = $row['ris_no'];


}
//year-month-increment
$id_ris = $idris + 1;
[$yy, $mm,$increment] = explode('-', $ris_code);

//convert the stock code to increment
$converted_ris = intval($increment);
$converted_ris = $converted_ris + 1;
$num_padded = sprintf("%03s", $converted_ris);
$arr = array($YEAR,$MONTH,$num_padded);
$ris_no = join("-",$arr);




?>
