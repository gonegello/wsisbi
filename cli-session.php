<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id']; //for client id
    //    $camp_id = $_SESSION['campid']; // for campus director id
    //    $head_id = $_SESSION['head'];//for heads

        //search client accounts
        $query=mysqli_query($conn,"select *from `people` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['idc'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
           
            $office = $row['office'];
            
        }

        [$first, $middle, $last] = explode(' ', $fullname);
        $firstname = $first;

        //user account
        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
          $username = $roww['username'];
          $password = $roww['password'];
          $position=$roww['position'];
        }

        /*
        //find campus director
        $qy=mysqli_query($conn,"select *from `clients` where id=$camp_id");
        while($rw=mysqli_fetch_array($qy))
        {
            $dir_name =$rw['fullname'];
            $director = $rw['designation'];
            $dir_img = $rw['profile'];
            
        }
        //find department head account
        $depart = mysqli_query($conn,"select *from `clients` where id = $head_id");
        while($line = mysqli_fetch_array($depart))
        {
            $h_id = $line['id'];
            $dept_head = $line['fullname'];
            $head_img = $line['profile'];
            $head = $line['designation'];
            $head_office = $line['office'];
        }

        */

        
        //date and time format to be used

        date_default_timezone_set('Asia/Manila');//correct
        $datte = date("M d, Y");//correct
        $time = date("h:i A ");//correct

        //University details
        $iduniv = "1";
        $school = mysqli_query($conn, "select *from `university` where iduniv = $iduniv");
        while($rrw = mysqli_fetch_array($school))
        {
          $univ_logo = $rrw['univ_logo'];
          $university = $rrw['univ_name'];
          $univ_add = $rrw['univ_add'];
          $univ_con = $rrw['univ_con'];
          $univ_dir = $rrw['univ_dir'];
          $univ_dean = $rrw['univ_dean'];
        }
        

	?>