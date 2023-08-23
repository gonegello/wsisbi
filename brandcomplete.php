<?php
require_once('connection.php');
 
function get_brand($conn , $term){ 
 $query = "SELECT * FROM brands WHERE brandname LIKE '%".$term."%' ORDER BY brandname ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getBrand = get_brand($conn, $_GET['term']);
 $brandList = array();
 foreach($getBrand as $brand){
 $brandList[] = $brand['brandname'];
 }
 echo json_encode($brandList);
}
?>