<?php
include "connection.php";
//generate inspection and acceptance report

$year_2d = date("y");
$MONTH = date("m");
$last_sn = mysqli_query($conn, "select * from `par` order by idpar desc limit 1");
while($row=mysqli_fetch_array($last_sn))
{

    //get the current iar_id
   // $iar_id = $row['iar_id'];
    $par_id = $row['idpar'];
    //get the current iar_no
   // $iar_code = $row['iar_no'];
    $par_no = $row['par_no'];

}
//year-month-increment
$par_id = $par_id + 1;
//[$yy, $mm,$increment] = explode('-', $iar_code);
[$y,$inc] = explode('-', $par_no);

//convert the stock code to increment
$converted_par = intval($inc);
$converted_par  = $converted_par + 1;
$num_padded = sprintf("%03s", $converted_par);
$arr = array($year_2d,$num_padded);
$par_number = join("-",$arr);




?>
