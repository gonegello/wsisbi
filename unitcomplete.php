<?php
require_once('connection.php');
 
function get_brand($conn , $term){ 
 $query = "SELECT * FROM unit WHERE unit LIKE '%".$term."%' ORDER BY unit ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getUnit = get_brand($conn, $_GET['term']);
 $unitList = array();
 foreach($getUnit as $unit){
 $unitList[] = $unit['unit'];
 }
 echo json_encode($unitList);
}
?>