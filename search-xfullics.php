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
                            <img src=".$fetch['stock_img']." style='object-fit:cover;border-radius:50px;border:1px solid gainsboro;' width='50px' height='50px'>
                        </td>
                        <td>".$fetch['item_details']."</td>
                        <td>".$fetch['supplier']."</td>

                        <td>".$fetch['in_quan']."  ".$fetch['unit']."</td>
                        <td>".$fetch['unit_cost']."</td>
                        <td>".$fetch['total_cost']."</td>
                        <td>".$fetch['date']."<br>".$fetch['time']."</td>
                        <td>".$fetch['po_num']."</td>
                        <td>".$fetch['po_date']."</td>
                        <td>
                        <a href='#' class='opptions'><i class='bx bx-edit' ></i></a>
                            <a href='#' class='opptions' data-toggle='modal' data-target='#icsArchive".$fetch['idx']."'><i class='bx bx-archive-in'></i></a>
                      
                             </td>
                            </tr>
                            <tr>
                        <td style='color:white'>white</td>
                    </tr>
              

                <?php
                include 'x-modal_arc.php';
                }
             
                ?>
                
                </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

