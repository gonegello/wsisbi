<?php
  //give value to the  id for stock_pn
include "connection.php";

$next = mysqli_query($conn, "select * from `cart` where pr_no is not null order by idcart desc limit 1");
while($rw = mysqli_fetch_array($next))
{
    //find the last id
    $last_pr_no = $rw['pr_no'];
}
   
 //convert last num to int
 $convert_pr = intval($last_pr_no);
 //add 1 to give value to next pr no
 $next_pr_no = $convert_pr + 1;
    

?>