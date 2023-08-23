<?php
include "connection.php";

//YYYYXXXXX

$year = date("Y"); //for year ex. 2022


$last_bill = mysqli_query($conn, "select * from `billing` order by idbilling desc limit 1");
while($row = mysqli_fetch_array ($last_bill))
{
    $bill_n = $row['bill_no']; //get the last generated bill_no
}

//get the 5 sequencial number
$cut = substr($bill_n, -5);

//convert string to int
$convert = intval($cut);
$converted_seq = $convert + 1;
$num_padded = sprintf("%05s", $converted_seq);
$arr = array($year,$num_padded);
$bill_number = join("",$arr);

echo $bill_number;



