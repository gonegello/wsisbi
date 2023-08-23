<?php
include('connection.php');
// category Select option
$query = "SELECT * FROM `fund_c`";
$result1 = mysqli_query($conn, $query);
$fund_c ="";
while($row1 = mysqli_fetch_array($result1))
 {
    $fund_c = $fund_c."<option>$row1[1]</option>";

 }
 ?>

 <?php  

 $qu = "SELECT * FROM `classification`";
 $res = mysqli_query($conn, $qu);
 $class = "";
 while($row2 = mysqli_fetch_array($res))
 {
    $class = $class."<option>$row2[1]</option>";
 }



?>

<?php
// category Select option
$query = "SELECT * FROM `type`";
$result2 = mysqli_query($conn, $query);
$type_cat ="";
while($row = mysqli_fetch_array($result2))
 {
    $type_cat = $type_cat."<option>$row[1]</option>";

 }
 ?>

 
<?php
// category Select option
$query = "SELECT * FROM `people`";
$result2 = mysqli_query($conn, $query);
$peps ="";
$peps_id="";
while($row = mysqli_fetch_array($result2))
 {
    $peps = $peps."<option value= $row[0]>$row[6]</option>";
    


 }
 ?>


 
<?php
// condition
$query = "SELECT * FROM `cond`";
$res = mysqli_query($conn, $query);
$cond ="";
$cond_id="";
while($row = mysqli_fetch_array($res))
 {
    $cond = $cond."<option value= $row[0]>$row[1]</option>";
    


 }
 ?>