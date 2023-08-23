<?php 
  $stat = "1";
  $num = "SELECT * FROM xris WHERE stat = $stat AND id_iar IS NOT NULL";

  if($row = mysqli_query($conn,$num))
  {
      $consume =mysqli_num_rows($row);
  }
?>

<?php 
  $stat = "1";
  $pep = "SELECT * FROM people WHERE stat = $stat";

  if($rrw = mysqli_query($conn,$pep))
  {
      $people =mysqli_num_rows($rrw);
  }
?>


<?php 
//for tobe issued ics number
  $stat = "1";
  $tobe = "SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE custodian IS NOT NULL AND icsxpar_no IS NULL AND xicspar.unit_cost <= 50000";

  if($row = mysqli_query($conn,$tobe))
  {
      $tobeissued =mysqli_num_rows($row);
  }
?>


<?php 
//for tobe issued par number
  $stat = "1";
  $partobe = "SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE custodian IS NOT NULL AND icsxpar_no IS NULL AND xicspar.unit_cost > 50000";

  if($row = mysqli_query($conn,$partobe))
  {
      $parissue =mysqli_num_rows($row);
  }

 $stat = "0";
  $ics_arc = "SELECT * FROM xicspar WHERE stat = $stat AND unit_cost <= 50000";
  if($row = mysqli_query($conn,$ics_arc))
  {
    $count_iarc = mysqli_num_rows($row);
  }

  $par_arc = "SELECT * FROM xicspar WHERE stat = $stat AND unit_cost > 50000";
  if($row = mysqli_query($conn,$par_arc))
  {
    $count_parc = mysqli_num_rows($row);
  }

  $ris_arc = "SELECT * FROM xris WHERE stat = $stat";
  if($row = mysqli_query($conn,$ris_arc))
  {
    $count_rarc = mysqli_num_rows($row);
  }

  $ptr_ready = "SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
  WHERE icspar_details.ptr_custodian IS NOT NULL
  AND icspar_details.ptr_id IS NULL";
  if($row = mysqli_query($conn, $ptr_ready))
  {
    $count_ptr = mysqli_num_rows($row);
  }

?> 

