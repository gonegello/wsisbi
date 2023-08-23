<?php
session_start();
include('connection.php');
// Check if delete button active, start this-->>>>> WORKING <<<<<<<<<<----------------
/*
if(isset($_POST['delete']))
{
   
$checkbox =$_POST['check'];
for($i=0; $i < count($checkbox); $i++)
{

$del_id = $checkbox[$i];
$sql = "DELETE FROM history WHERE idhis='$del_id'";
$result = mysqli_query($conn,$sql);
}
// if successful redirect to page
if($result){
header("Location:x-history.php");
}
 }
*/

$idhis=$_GET['idhis'];
  
//working delete
 
 mysqli_query($conn,"delete from `history` where idhis='$idhis'");
 header('location:x-history.php');
 $_SESSION['deletein'] = "Activity Successfully Deleted."


?>
