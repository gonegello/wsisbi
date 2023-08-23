<?php
include('connection.php');
// category Select option
$query = "SELECT * FROM `departments`";
$result1 = mysqli_query($conn, $query);
$depart ="";
while($row1 = mysqli_fetch_array($result1))
 {
    $depart = $depart."<option>$row1[1]</option>";

 }
 ?>