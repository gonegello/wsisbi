<?php
require_once('connection.php');
 
function get_gen($conn , $term){ 
 $query = "SELECT * FROM gen WHERE gen LIKE '%".$term."%' ORDER BY gen ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getGen = get_gen($conn, $_GET['term']);
 $genList = array();
 foreach($getGen as $gen){
 $genList[] = $gen['gen'];
 }
 echo json_encode($genList);
}
?>