<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM rsmi JOIN ris ON ris.id_rmsi = rsmi.idrsmi WHERE rsmi_no LIKE CONCAT('%',?,'%') OR rsmi_date LIKE CONCAT('%',?,'%') GROUP BY rsmi_no ORDER BY idrsmi DESC");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM rsmi");
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
                            <td>   <i class='bx bx-file' style='color:white;background:royalblue;padding:12px 12px;border-radius:50px;'></i></td>
                            <td><span>RSMI No. : ".$fetch['rsmi_no']."</span><br>
                                <span></span></td>
                                <td>".$fetch['rsmi_date']."</td>
                            <td> <a href='x-per-rsmi.php?ris_month=".$fetch['ris_month']."&ris_year=".$fetch['ris_year']."&idrsmi=".$fetch['idrsmi']."' class='opptions'><i class='bx bxs-chevron-right' ></i></a></td>
                            
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

