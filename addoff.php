<?php
session_start();
include "connection.php";

if(isset($_POST['addoff']))
    {
        $department = $_POST['off'];
        $check_q = mysqli_query($conn, "select *from `departments` where department='$department'");
        $check = mysqli_num_rows($check_q);


        if($check>0)
        {
            $_SESSION['departExist'] = "The `$department` department already exist in the list!";
            header("Location: x-people.php#pos");
        }
        else
        {
              //SAVED ITEM NAME
            $insert = mysqli_query($conn, "insert into `departments` (department) values ('$department')");

            if($insert)
            {
            
            
            $_SESSION['offadded'] = "You have successfully created `$department` department! ";
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