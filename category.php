<?php
require_once('connection.php');
 
function get_category($conn , $term){ 
 $query = "SELECT * FROM category WHERE category_name LIKE '%".$term."%' ORDER BY category_name ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getCat = get_category($conn, $_GET['term']);
 $catList = array();
 foreach($getCat as $category){
 $catList[] = $category['category_name'];
 }
 echo json_encode($catList);
}
?>