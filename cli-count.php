<?php 
  
  $numorder = "SELECT * FROM orders WHERE client_id = $id";

  if($r = mysqli_query($conn,$numorder))
  {
      $orders=mysqli_num_rows($r);
  }
?>

<?php 
  $stat = "0";
  $numcartt = "SELECT * FROM cart WHERE client_id = $id AND stat = $stat";

  if($cc = mysqli_query($conn,$numcartt))
  {
      $mycart=mysqli_num_rows($cc);
  }
?>

<?php 
  $stat = "0";
  $numcart = "SELECT * FROM cart WHERE client_id = $id AND stat = $stat";

  //$numcart = "SELECT * FROM cart JOIN stocks ON stocks.s_id = cart.item_id JOIN stocks on stocks.s_id = cart.item_id WHERE stocks.int_typeid IN (1,2) client_id = $id AND stat = $stat";

  if($r = mysqli_query($conn,$numcart))
  {
      $carty=mysqli_num_rows($r);
  }
?>

<?php
$ris = "2";
$stat = "0";
$ris_count = "SELECT * FROM cart JOIN stocks on stocks.s_id = cart.item_id WHERE client_id = $id AND int_typeid = $ris AND stat = $stat";
if($r_count = mysqli_query($conn,$ris_count))
{
  $ris_ = mysqli_num_rows($r_count);
}

?>

<?php
$ics = "1";
$stat = "0";
$ics_count = "SELECT * FROM cart JOIN stocks on stocks.s_id = cart.item_id WHERE client_id = $id AND int_typeid = $ics AND stat = $stat";
if($i_count = mysqli_query($conn,$ics_count))
{
  $ics_ = mysqli_num_rows($i_count);
}

?>