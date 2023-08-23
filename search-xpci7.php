<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
        $fc_id = "3";
		$stmt=$conn->prepare("SELECT * FROM fc WHERE cluster_id = $fc_id LIKE CONCAT('%',?,'%') OR article LIKE CONCAT('%',?,'%') OR descr LIKE CONCAT('%',?,'%')");
		$stmt->bind_param("sss",$search,$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM fc");
		}
		$stmt->execute();
		$result=$stmt->get_result();

		if($result->num_rows>0){
            $output = " 
                       
                        <thead>
                        <tr>
                        <th></th>
                        <th>Article</th>
                        <th>Description</th>
                        <th>Stock Number</th>
                        <th>Unit of Measure</th>
                        <th>Unit Value</th>
                        <th>Balance Per Card</th>
                        <th>On Hand Per Count</th>
                        
                            
                            
                            </tr>
                        </thead>
                        <tbody>";
                       
                        
                       
                        while($fetch=$result->fetch_assoc())
                        {
                        
                       
                       
                        	$output .="
							<tr>
                     
                            
                            <td>".$fetch['ar_id']."</td>
                            <td>".$fetch['article']."</td>
                            <td>".$fetch['descr']."</td>
                            <td>".$fetch['stock_num']."</td>
                            <td>".$fetch['unit_meas']."</td>
                            <td>".$fetch['unit_val']."</td>
                            <td>".$fetch['bpc']."</td>
                            <td>".$fetch['ohpc']."</td>
     
    
                            </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

