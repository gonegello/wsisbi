<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM iar JOIN xris on xris.id_iar = iar.iar_id WHERE item_details LIKE CONCAT('%',?,'%') OR iar_no LIKE CONCAT('%',?,'%') group by id_iar order by iar_id desc limit 5");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM icspar_details");
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

               
                  <td>
              
                  <i class='bx bx-file' style='color:white;background:#A3A3FF;padding:12px 12px;border-radius:50px;'></i>
                 </td>
              

                <td>
                <span style='font-size:20px;color:grey;font-weight:bold;'>".$fetch['iar_no']."</span><br>
                  <span style='color:rgb(40,40,40);'>PO No: &nbsp;".$fetch['po_num']."</span><br>
                  <span style='color:rgb(40,40,40);'>PO Date: &nbsp;".$fetch['po_date']."</span>
                 </td>
                  
                 <td>
                    
                  
                    
                  <span style='font-style:italic;font-size:15px;'>
                    ".$fetch['item_details'].",
                    </span>
                    

                   

                    <?php
                    }
                    ?>
                       </td>

                  <td><a href='x-ris-per.php?iar_id=".$fetch['iar_id']."' ><i class='bx bxs-chevron-right' style='font-size:20px;' ></i></a></td>
                
                  </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

