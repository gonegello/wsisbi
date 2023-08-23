<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM xris JOIN fc ON fc.ar_id = xris.sn_id JOIN fund_c ON fund_c.fundc_id = xris.fc_id  WHERE item_details LIKE CONCAT('%',?,'%') GROUP BY sn_id ORDER BY item_details");
		$stmt->bind_param("s",$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM xris");
		}
		$stmt->execute();
		$result=$stmt->get_result();

		if($result->num_rows>0){
            $output = " 
                       
                        <thead>
                        <tr>
                            
                            
                            </tr>
                        </thead>
                        <tbody>";
                       
                        
                       
                        while($fetch=$result->fetch_assoc())
                        {
                        
                       
                       
                        	$output .="
                            <tr>
                            <td>   <i class='bx bx-file' style='color:white;background:#A3A3FF;padding:12px 12px;border-radius:50px;'></i></td>
                            <td><span>".$fetch['item_details']."  </span><br>
                                <span></span></td>
                            <td> <a href='x-stockcard.php?sn_id=".$fetch['sn_id']."' class='opptions'><i class='bx bxs-chevron-right' ></i></a></td>
                    
                        </tr>
                        <tr><td style='color:white;'>white</td></tr>
";
                                        
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

