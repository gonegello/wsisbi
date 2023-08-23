<?php
session_start();
include "connection.php";

if(isset($_POST['addpos']))
    {
        $position = $_POST['pos'];
        $check_q = mysqli_query($conn, "select *from `position` where position='$position'");
        $check = mysqli_num_rows($check_q);


        if($check>0)
        {
            $_SESSION['positionExist'] = "The `$position` already exist in the list!";
            header("Location: x-people.php#pos");
        }
        else
        {
              //SAVED ITEM NAME
            $insert = mysqli_query($conn, "insert into `position` (position) values ('$position')");

            if($insert)
            {
            
            
            $_SESSION['posadded'] = "You have successfully created `$position` position! ";
            header("Location: x-people.php#pos");

            }
            else
            {
                //errorecho '<script type="text/javascript"> alert("Error Uploading Data!"); </script>'; 
            header("Location: x-people.php#pos");
            }
        }
    }

?>