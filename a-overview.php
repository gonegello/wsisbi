<?php include('connection.php');

$zero = 0;
 $query = "SELECT * FROM user ORDER BY id DESC";

    if($result = mysqli_query($conn,$query))
    {
        $allusers=mysqli_num_rows($result);
    }

    $numlength = strlen((string)$allusers);
    if($numlength <= 1)
    {
        $users = $zero . '' . $allusers;
    }
    else
    {
        $users = $allusers;
    }

?>