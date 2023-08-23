<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
    
		$stmt=$conn->prepare("SELECT * FROM xicspar WHERE item_details LIKE CONCAT('%',?,'%') OR supplier LIKE CONCAT('%',?,'%') ");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM xicspar");
		}
		$stmt->execute();
		$result=$stmt->get_result();

		if($result->num_rows>0){
            $output = " 
                       
                        <thead>
                        <tr>
                        <td style='color:royalblue;'></td>
                        <td  style='color:royalblue;font-weight:bold;'>Item Details</td>
                        <td style='color:royalblue;font-weight:bold;'>Supplier</td>
                        <td style='color:royalblue;font-weight:bold;'>Quantity</td>
                        <td style='color:royalblue;font-weight:bold;'>Unit Cost</td>
                        <td style='color:royalblue;font-weight:bold;'>Total Cost</td>
                        <td style='color:royalblue;font-weight:bold;'>Date</td>
                        <td style='color:royalblue;font-weight:bold;'>PO No.</td>
                        <td style='color:royalblue;font-weight:bold;'>PO Date</td>
                            
                            
                            </tr>
                        </thead>
                        <tbody>";
                       
                        
                       
                        while($fetch=$result->fetch_assoc())
                        {
                        
                       
                       
                        	$output .="
							<tr>
                        <td>
                            <img src=".$row['stock_img']." style='object-fit:cover;border-radius:50px;border:1px solid gainsboro;' width='50px' height='50px'>
                        </td>
                        <td>".$row['item_details']."</td>
                        <td>".$row['supplier']."</td>

                        <td>".$row['in_quan']." ".$row['unit']."</td>
                        <td>".$row['unit_cost']."</td>
                        <td>".$row['total_cost']."</td>
                        <td>".$row['date']."<br>".$row['time']."</td>
                        <td>".$row['po_num']."</td>
                        <td>".$row['po_date']".</td>
                        <td>
                        <a href='#' class='opptions'><i class='bx bx-edit' ></i></a>
                            <a href='#' class='opptions'data-toggle='modal' data-target='#parArchive".$row['idx'].">'><i class='bx bx-archive-in'></i></a>
                      
                    </td>
                                                
                    </tr>
                    <tr>
                        <td style='color:white'>white</td>
                    </tr>


                    <?php
                    include 'x-modal-arcpar.php';
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style='color:royalblue;font-weight:bold;'>Total</td>
                    <td style='font-weight:bold;'>".$total."</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

