<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
        $fc_id = "1";
		$stmt=$conn->prepare("SELECT * FROM fc WHERE unit_meas LIKE CONCAT('%',?,'%') OR stock_num LIKE CONCAT('%',?,'%') OR cluster_id LIKE CONCAT('%',?,'%') OR article LIKE CONCAT('%',?,'%') OR descr LIKE CONCAT('%',?,'%') ORDER BY stock_num ");
		$stmt->bind_param("sssss",$search,$search,$search,$search,$search,);
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
                       
                        
                        $i = 0;
                        $query=mysqli_query($conn,"SELECT * FROM fc ORDER BY stock_num");
                        while($fetch=$result->fetch_assoc())
                        {
                            $i = $i + 1;
                            $art = $fetch['article'];
                       
                       
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
                            <td>
                            <a href='x-edit-art.php?ar_id=".$fetch['ar_id']."' title='Update ".$fetch['article']." echo ' '; ".$fetch['descr']."?'><i class='bx bx-edit' style='font-size:20px;'></i></a>
                                    <a onclick = 'return confirm('Are you sure you want to delete ".$art." article?')' href='delete-article.php?ar_id=".$fetch['ar_id']."&article=".$fetch['article']."' title='Delete ".$fetch['article']." echo ' '; ".$fetch['descr']."?'><i class='bx bx-trash' style='font-size:20px;'></i></a>

                            </td>

                            </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<center><span style='color:grey;'>ARTICLE DOES NOT EXIST.<br></span></center>";
                    }

?>

