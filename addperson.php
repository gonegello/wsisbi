<?php
include "connection.php";
session_start();
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$m_initial = $_POST['middle_name'];
$office = $_POST['office'];
$position = $_POST['position'];
$exten = $_POST['exten'];

$stat = 1;

$join = array($first_name,$m_initial,$last_name);
$fullname = join(" ",$join);


if($_POST['save'])
{

 $check = mysqli_query($conn, "insert into `people` (lastname,firstname,m_initial,office,position,stat,fullname,exten) values ('$last_name','$first_name','$m_initial','$office','$position','$stat','$fullname','$exten')");

 if($check){

    $_SESSION['personAdded'] = "`You Successfully Added <b> `$fullname ` </b> !`";
    header("location:x-people.php");

 }
else
{
    $_SESSION['personFailed'] = "`Error Adding <b> `$fullname ` </b> ! Try Again.`";
    header("location:x-people.php");

}

}






?>