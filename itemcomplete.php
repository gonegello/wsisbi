<?php
require_once('connection.php');
 
function get_item($conn , $term){ 
 $query = "SELECT * FROM fc WHERE combine LIKE '%".$term."%' ORDER BY combine ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getItem = get_item($conn, $_GET['term']);
 $itemList = array();
 foreach($getItem as $tem){
 $itemList[] = $tem['combine'];
 }
 echo json_encode($itemList);
}
?>