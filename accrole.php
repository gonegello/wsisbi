<?php
include('connection.php');
// category Select option
$query = "SELECT * FROM `role`";
$result1 = mysqli_query($conn, $query);
$accrole ="";
while($row1 = mysqli_fetch_array($result1))
 {
    $accrole = $accrole."<option>$row1[1]</option>";

 }
 ?>