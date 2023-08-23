<?php
require_once('connection.php');
 
function get_descom($conn , $term){ 
 $query = "SELECT * FROM descrip WHERE descrip LIKE '%".$term."%' ORDER BY descrip ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getDes = get_descom($conn, $_GET['term']);
 $desList = array();
 foreach($getDes as $description){
 $desList[] = $description['descrip'];
 }
 echo json_encode($desList);
}
?>