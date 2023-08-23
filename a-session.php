<?php
//get user information
        session_start();
        include('connection.php');
        $userid=$_SESSION['id'];
//$camp_id = $_SESSION['campid']; // for campus director id
       // $head_id = $_SESSION['head'];//for heads

        $query=mysqli_query($conn,"select *from `people` where user_id=$userid");
        while($row=mysqli_fetch_array($query))
        {
            $id=$row['idc'];
            $fullname=$row['fullname'];
            $profile=$row['profile'];
            
            $office = $row['office'];
            $contact = $row['contact_n'];   
        }

        [$first, $middle, $last] = explode(' ', $fullname);
        $firstname = $first;

        $qry=mysqli_query($conn,"select *from `user` where id =$userid");
        while($roww = mysqli_fetch_array($qry))
        {
          $userole = $roww['userole'];
          $username = $roww['username'];
          $password = $roww['password'];
          $position=$roww['position'];
        }

        date_default_timezone_set('Asia/Manila');

        $datte = date("M d, Y");
        $date_a = date("F d, Y");
        $time = date("h:i A ");
        $year = date("Y");

        $date_2 = date("y");
        $month_2 = date("m");

        /*
        $qy=mysqli_query($conn,"select *from `people` where id=$camp_id");
        while($rw=mysqli_fetch_array($qy))
        {
            $dir_name =$rw['fullname'];
            $director = $rw['designation'];
            
        }
        */
       

        $univ_id = "1";
        $school = mysqli_query($conn, "select *from `university` where iduniv = $univ_id");
        while($rw = mysqli_fetch_array($school))
        {
          $univ_name = $rw['univ_name'];
          $univ_ad = $rw['univ_add'];
          $univ_logo = $rw['univ_logo'];
          $univ_abb = $rw['abb'];
          $univ_con = $rw['univ_con'];
          $univ_dir = $rw['univ_dir'];
          $univ_dean = $rw['univ_dean'];

        }


        


        
        


             
	?>