<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM par JOIN icspar_details ON icspar_details.icsxpar_no = par.idpar JOIN xicspar ON xicspar.idx = icspar_details.x_id
        JOIN people ON people.idc= icspar_details.custodian WHERE par.par_no LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') GROUP BY par.par_no ORDER BY par.idpar DESC");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM par");
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
                            <td><span>PAR No : ".$fetch['par_no']."</span><br>
                                <span>".$fetch['fullname']."</span></td>
                            <td> 
                                <a href='x-pareport.php?idpar=".$fetch['idpar']."&fc_id=".$fetch['fc_id']."&by_id=".$fetch['by_id']."&from_id=".$fetch['from_id']."&idc=".$fetch['idc']."'><i class='bx bxs-chevron-right' ></i></a></td>
                       
                        </tr>
                        <tr><td style='color:white;'>white</td></tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

