<?php 
session_start();
include "connection.php";

$save = mysqli_query($conn,"UPDATE `university` SET `univ_name` = '$_POST[univ_name]', `univ_add` = '$_POST[univ_add]',
`univ_con` = '$_POST[univ_con]', `univ_dir` = '$_POST[univ_dir]', `univ_dean` = '$_POST[univ_dean]', `abb` = '$_POST[abb]'
WHERE `iduniv` = '$_POST[iduniv]'");

if($save)
{
    $_SESSION['updateduniv'] = "`You successfully update university settings!`";
    header('location:x-univ.php');
}
else{
    $_SESSION['error'] = "`There was an error found during the update.`";
}




?>