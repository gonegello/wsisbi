<?php
include('connection.php');
session_start();

// create function for generate random password
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


if(isset($_POST['username']))
    {
        include("connection.php");

        $username=$_POST['username'];
        $userole=$_POST['userole'];
        $position=$_POST['position'];
        $created=$_POST['created_by'];
        $status=$_POST['status'];
        $dc = $_POST['dc'];
        $time_created = $_POST['time_created'];
        $password = randomPassword();

  
    $check_q = mysqli_query($conn, "select *from `user` where username='$username'");
    $check = mysqli_num_rows($check_q);

    if($check>0)
    {   
        //NOT SAVED IF ALREADY EXIST
               
    $_SESSION['userexists'] = "Failed to create an account for `$username`! Username already exists. ";
    header("Location: x-people.php");
    }
    else
    {

        

        //SAVED ITEM NAME
        $insert = mysqli_query($conn, "insert into `user` (username,password,status,userole,position,created_by,dc,time_created) values ('$username','$password','$status','$userole','$position','$created','$dc','$time_created')");

        if($insert)
        {
          
        
        $_SESSION['useradded'] = "You have successfully created an account for `$username` ! ";
        header("Location: x-people.php");

        }
        else
        {
            echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>'; 
            header("Location: x-people.php");
        // when error occur
        }
        
    }

    }


?>