<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM ics JOIN icspar_details ON icspar_details.icsxpar_no = ics.idics JOIN xicspar ON xicspar.idx = icspar_details.x_id
        JOIN people ON people.idc= icspar_details.custodian WHERE ics_no LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') GROUP BY ics.ics_no ORDER BY ics.idics DESC");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM ics");
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
                            <td><span>ICS No : ".$fetch['ics_no']."</span><br>
                                <span>".$fetch['fullname']."</span></td>
                            <td> <a href='x-icsreport.php?fc_id=".$fetch['fc_id']."&idics=".$fetch['idics']."&custodian=".$fetch['custodian']."'><i class='bx bxs-chevron-right' ></i></a></td>
                       
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

