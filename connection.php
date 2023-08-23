<?php
$conn = mysqli_connect("localhost","root","Godknowsme@1810039-2","wsis");

//Check Connection

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
}
?>