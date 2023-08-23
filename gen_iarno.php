<?php
include "connection.php";

$YEAR = date("Y");
$MONTH = date("m");
$last_sn = mysqli_query($conn, "select * from `iar` order by iar_id desc limit 1");
while($row=mysqli_fetch_array($last_sn))
{

    //get the current iar_id
    $iar_id = $row['iar_id'];
    //get the current iar_no
    $iar_code = $row['iar_no'];

}
//year-month-increment
$iar_id = $iar_id + 1;
[$yy, $mm,$increment] = explode('-', $iar_code);

//convert the stock code to increment
$converted_iar = intval($increment);
$converted_iar = $converted_iar + 1;
$num_padded = sprintf("%03s", $converted_iar);
$arr = array($YEAR,$MONTH,$num_padded);
$iar_no = join("-",$arr);

?>
