<?php 

//cart

$stat = "cart";
$cart = "SELECT * FROM req WHERE req_stat = '{$stat}' AND client_id = $id ";

if($row = mysqli_query($conn,$cart))
{
    $myreq =mysqli_num_rows($row);
}


//recent
$stat = "cart";
$recent = "SELECT * FROM req WHERE req_stat != '{$stat}' AND client_id = $id ";

if($row = mysqli_query($conn,$recent))
{
    $rec =mysqli_num_rows($row);
}


?>


<?php
$fc_1 = "1";
$stat = "0";
$ris_count = "SELECT * FROM req JOIN xris on xris.idx = req.item_id WHERE req.client_id = $id AND xris.fc_id = $fc_1 AND stat = $stat";
if($r_count = mysqli_query($conn,$ris_count))
{
  $ris_ = mysqli_num_rows($r_count);
}

?>

<?php
//xc property


//all par
$acquiredPAR = "SELECT * FROM icspar_details  JOIN par ON par.idpar = icspar_details.icsxpar_no WHERE icspar_details.custodian = $id AND icspar_details.ptr_id is null";
if($p_count = mysqli_query($conn,$acquiredPAR))
{
  $parcount = mysqli_num_rows($p_count);
}

//all ics
$acquiredICS = "SELECT * FROM icspar_details  JOIN ics ON ics.idics = icspar_details.icsxpar_no WHERE icspar_details.custodian = $id AND icspar_details.ptr_id is null";
if($i_count = mysqli_query($conn,$acquiredICS))
{
  $icscount = mysqli_num_rows($i_count);
}


//all
$ALLacquired = "SELECT * FROM icspar_details  WHERE custodian = $id AND icspar_details.ptr_id is null";
if($a_count = mysqli_query($conn,$ALLacquired))
{
  $allAcquired = mysqli_num_rows($a_count);
}

//all
$transferred = "SELECT * FROM icspar_details  WHERE custodian = $id AND icspar_details.ptr_id IS NOT NULL";
if($t_count = mysqli_query($conn,$transferred))
{
  $trans = mysqli_num_rows($t_count);
}


$ac_trans = "SELECT * FROM icspar_details  WHERE ptr_custodian = $id";
if($ac_count = mysqli_query($conn,$ac_trans))
{
  $ac_from = mysqli_num_rows($ac_count);
}


$c_stat = "head";

$count_r = "SELECT * FROM req JOIN people on people.idc = req.client_id  WHERE req_stat = '{$c_stat}' AND people.office= '{$office}'";
if($r_count = mysqli_query($conn,$count_r))
{
  $request_count = mysqli_num_rows($r_count);
}











?>



<?php
//ris count
$riss = "SELECT * FROM ris  WHERE req_by = $id";
if($aa = mysqli_query($conn,$riss))
{
  $count_ris = mysqli_num_rows($aa);
}

//request count
$head = "head";
$req = "SELECT * FROM req  WHERE a_id = $id AND req_stat = '{$head}'";
if($areq = mysqli_query($conn,$req))
{
  $count_req = mysqli_num_rows($areq);
}



//request count
$s_status = 1;
$stockroom = "SELECT * FROM xris WHERE stat = $s_status";
if($ss = mysqli_query($conn,$stockroom))
{
  $count_items = mysqli_num_rows($ss);
}


$s_status = 1;
$one = 1;
$fc_1 = "SELECT * FROM xris WHERE stat = $s_status AND fc_id = $one";
if($f1 = mysqli_query($conn,$fc_1))
{
  $count_f1 = mysqli_num_rows($f1);
}

$tow = 2;
$fc_2 = "SELECT * FROM xris WHERE stat = $s_status AND fc_id = $tow";
if($f2 = mysqli_query($conn,$fc_2))
{
  $count_f2 = mysqli_num_rows($f2);
}

$three = 3;
$fc_3 = "SELECT * FROM xris WHERE stat = $s_status AND fc_id = $three";
if($f3 = mysqli_query($conn,$fc_3))
{
  $count_f3 = mysqli_num_rows($f3);
}

$req_stat = "saved";



$appr = "SELECT * FROM ris JOIN req ON req.id_ris = ris.idris WHERE ris.req_by = $id AND req.req_stat = '{$req_stat}'";
if($appro = mysqli_query($conn,$appr))
{
  $approved = mysqli_num_rows($appro);
}

$re_cart = "cart";
$pends = "SELECT * FROM req WHERE id_ris IS NULL AND req_stat != '{$re_cart}' AND client_id = $id";
if($pend = mysqli_query($conn,$pends))
{
  $pendings = mysqli_num_rows($pend);
}



?>

