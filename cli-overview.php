<?php include "connection.php";

 $query = "SELECT * FROM user ORDER BY id DESC";

 if($result = mysqli_query($conn,$query))
 {
     $allusers=mysqli_num_rows($result);
 }



?>