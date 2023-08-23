<?php
	
	include 'connection.php';
    $stat = 1;
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
    
		$stmt=$conn->prepare("SELECT * from `xicspar` join iar on iar.iar_id = xicspar.id_iar
        left join fund_c on fund_c.fundc_id = xicspar.fc_id WHERE xicspar.stat = $stat AND xicspar.id_iar IS NOT NULL AND xicspar.unit_cost > 50000 AND date LIKE CONCAT('%',?,'%') OR month_year LIKE CONCAT('%',?,'%')");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * from `xicspar` ");
		}
		$stmt->execute();
		$result=$stmt->get_result();

		if($result->num_rows>0){
            $output = " 
                       
                        <thead>
                        <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>IAR No.</th>
                        <th>Stock Number</th>
                        <th>Fund Cluster</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Item</th>
                        <th>Unit Cost</th>
                        <th>Total Cost</th>
                        <th>Supplier</th>
                        <th>PO Date</th>
                        <th>PO Num</th>
                            
                            </tr>
                        </thead>
                        <tbody>";
                       
                        
                       
                        while($fetch=$result->fetch_assoc())
                        {
                        
                       
                       
                        	$output .="
							<tr>
                                <td></td>
                                <td>".$fetch['date']."</td>
                                <td>".$fetch['iar_no']."</td>
                                <td></td>
                                <td>".$fetch['fund_cluster']."</td>
                                <td>".$fetch['in_quan']."</td>
                                <td>".$fetch['unit']."</td>
                                <td>".$fetch['item_details']."</td>
                                <td>".number_format($fetch['unit_cost'],2)."</td>
                                <td>".number_format($fetch['total_cost'],2)."</td>
                                <td>".$fetch['supplier']."</td>
                                <td>".$fetch['po_num']."</td>
                                <td>".$fetch['po_date']."</td>


                                

                                </tr>
              
                  
                </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

