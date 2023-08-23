<?php
include "connection.php";
//generate stock number for ris (consumables)

$last_sn = mysqli_query($conn, "select * from `stock_details` order by id_sd desc limit 1");
while($row=mysqli_fetch_array($last_sn))
{
    //get the last stock_number in stock details
    $stock_code = $row['stock_number'];

}

[$slsu, $hc, $sn_id, $increment] = explode('-', $stock_code);

//convert the stock code to increment
$converted_sn = intval($increment);

//$converted_sn = $converted_sn + 1;

?>
