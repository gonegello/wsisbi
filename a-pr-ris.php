<?php include "connection.php";


    $r_date = $_POST['r_date'];
    $idcart = $_POST['idcart'];
    $stat = $_POST['stat'];

//foreach($stat as $key => $value){
      // $update="UPDATE `cart` SET `stat` = '".$value."' WHERE `idcart` = '.$idcart[$key].'";
		//$query = mysqli_query($conn,$update);
       // $sql="UPDATE `cart` SET `stat` = '".$stat."' WHERE idcart = '.$idcart.'";
       
       
      // $query = mysqli_query($conn,$update);
      foreach($_POST['idcart'] as $count => $id){
        $query2 = "UPDATE cart SET stat = '".$stat[$count]."' WHERE idcart = '".$idcart[$count]."'";
        $result2 = mysqli_query($conn,$query2);
    }
        header("location:cli-sendrequest.php");
 //}

        //$sql = "UPDATE product_list SET product_name='".$product_name."',product_category='".$product_category."',product_price='".$product_price."',product_description='".$product_description."',size_category='".$size_category."'";


?>