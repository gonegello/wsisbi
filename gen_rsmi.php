<?php
include "connection.php";
//generate property transfer report number

$YEAR = date("Y");
$MONTH = date("m");
$last_no = mysqli_query($conn, "select * from `rsmi` order by idrsmi desc limit 1");
while($row=mysqli_fetch_array($last_no))
{

    //get the current iar_id
   // $iar_id = $row['iar_id'];
   $idrsmi= $row['idrsmi'];
    //get the current iar_no
    //$iar_code = $row['iar_no'];
   $rsmi_code = $row['rsmi_no'];


}
//year-month-increment
$id_rsmi = $idrsmi + 1;
[$yy, $mm,$increment] = explode('-', $rsmi_code);

//convert the stock code to increment
$converted_rsmi = intval($increment);
$converted_rsmi = $converted_rsmi + 1;
$num_padded = sprintf("%03s", $converted_rsmi);
$arr = array($YEAR,$MONTH,$num_padded);
$rsmi_no = join("-",$arr);




?>
