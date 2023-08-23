<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM stocks WHERE stock_name LIKE CONCAT('%',?,'%') OR brand LIKE CONCAT('%',?,'%')");
		$stmt->bind_param("ss",$search,$search);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM stocks");
		}
		$stmt->execute();
		$result=$stmt->get_result();

		if($result->num_rows>0){
            $output = " 
                        
                        <tbody>";
                        while($fetch=$result->fetch_assoc()){
                        	$output .="
							<tr>
                            <div class='card-body 'style='border:1px solid #ededed;border-top-left-radius:10px;border-top-right-radius:10px;'>
                            <td><img src='".$fetch['photo']."' id='store' style='object-fit:cover;'' width='200px' height='200px'></td>
                         
                            </div>
                            
                            <td>".$fetch['stock_name']."".$fetch['brand']."".$fetch['description']."</td>
                            <td>".$fetch['quantity']."</td>
                            <td>".$fetch['unit_price']."</td>
                           
                            </tr>";
                          
							
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

