<?php
include "connection.php";
//generate inspection and acceptance report

$year_2d = date("y");
$MONTH = date("m");
$last_sn = mysqli_query($conn, "select * from `ics` order by idics desc limit 1");
while($row=mysqli_fetch_array($last_sn))
{

    //get the current iar_id
   // $iar_id = $row['iar_id'];
    $ics_id = $row['idics'];
    //get the current iar_no
   // $iar_code = $row['iar_no'];
    $ics_no = $row['ics_no'];

}
//year-month-increment
$ics_id = $ics_id + 1;
//[$yy, $mm,$increment] = explode('-', $iar_code);
[$y,$inc] = explode('-', $ics_no);

//convert the stock code to increment
$converted_ics = intval($inc);
$converted_ics = $converted_ics + 1;
$num_padded = sprintf("%03s", $converted_ics);
$arr = array($year_2d,$num_padded);
$ics_number = join("-",$arr);




?>
