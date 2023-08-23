
 <?php
 $stat = 1;
  $iar_ready= "SELECT * FROM xris WHERE stat = $stat AND id_iar IS NOT NULL";

  if($row = mysqli_query($conn,$iar_ready))
  {
      $recently_ris = mysqli_num_rows($row);
  }


  $stat = "supply";
  $number_req= "SELECT * FROM req WHERE req_stat = '{$stat}'";

  if($row = mysqli_query($conn,$number_req))
  {
      $request_num = mysqli_num_rows($row);
  }

  $stat = "1";
  $active_ris= "SELECT * FROM xris WHERE stat = '{$stat}' AND id_iar IS NOT NULL";

  if($row = mysqli_query($conn,$active_ris))
  {
      $act_ris = mysqli_num_rows($row);
  }


  ?>