<?php
include "connection.php";
//generate property transfer report number

$YEAR = date("Y");
$MONTH = date("m");
$last_sn = mysqli_query($conn, "select * from `ptr` order by idptr desc limit 1");
while($row=mysqli_fetch_array($last_sn))
{

    //get the current iar_id
   // $iar_id = $row['iar_id'];
   $idptr = $row['idptr'];
    //get the current iar_no
    //$iar_code = $row['iar_no'];
   $ptr_code = $row['ptr_no'];


}
//year-month-increment
$id_ptr = $idptr + 1;
[$yy, $mm,$increment] = explode('-', $ptr_code);

//convert the stock code to increment
$converted_ptr = intval($increment);
$converted_ptr = $converted_ptr + 1;
$num_padded = sprintf("%04s", $converted_ptr);
$arr = array($YEAR,$MONTH,$num_padded);
$ptr_no = join("-",$arr);




?>
