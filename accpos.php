<?php
include('connection.php');
// category Select option
$query = "SELECT * FROM `position`";
$result1 = mysqli_query($conn, $query);
$pst ="";
while($row1 = mysqli_fetch_array($result1))
 {
    $pst = $pst."<option>$row1[1]</option>";

 }
 ?>