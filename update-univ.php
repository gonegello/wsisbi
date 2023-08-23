<?php include "connection.php";


mysqli_query($conn,"UPDATE `university` SET `univ_name` = '$_POST[univ_name]', `univ_add` = '$_POST[univ_add]', `univ_con` = '$_POST[univ_con]', `univ_dir` = '$_POST[univ_dir]', `univ_dean`='$_POST[univ_dean]', `abb` = '$_POST[abb]' WHERE `iduniv`=''")or die(mysqli_error());
header('location:x-profile.php'); 
