<?php 
  $ss_condition = "1";
  $num = "SELECT * FROM stocks WHERE sscon = $ss_condition";

  if($row = mysqli_query($conn,$num))
  {
      $archive_outs =mysqli_num_rows($row);
  }
?>

<?php 
  $ss_condi = "0";
  $number = "SELECT * FROM stocks WHERE sscon = $ss_condi";

  if($rw = mysqli_query($conn,$number))
  {
      $active_stocks =mysqli_num_rows($rw);
  }
?>