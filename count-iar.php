
<?php 


  $stat = 1;
  $iar_ready= "SELECT * FROM xris WHERE stat = $stat AND id_iar IS NULL GROUP BY supplier,po_date,po_num,fc_id";

  if($row = mysqli_query($conn,$iar_ready))
  {
      $ris_ready = mysqli_num_rows($row);
  }


  $stat = 1;
  $icspar = "SELECT * FROM xicspar WHERE stat = $stat AND id_iar IS NULL GROUP BY supplier,po_date,po_num,fc_id";

  if($row = mysqli_query($conn,$icspar))
  {
      $icspar_ready = mysqli_num_rows($row);
  }


  



?>

