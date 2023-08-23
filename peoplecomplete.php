<?php
require_once('connection.php');
 
function get_fullname($conn , $term){ 
 $query = "SELECT * FROM people WHERE fullname LIKE '%".$term."%' ORDER BY fullname ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getP = get_fullname($conn, $_GET['term']);
 $pList = array();
 foreach($getP as $p){
 $pList[] = $p['fullname'];
 }
 echo json_encode($pList);
}
?>