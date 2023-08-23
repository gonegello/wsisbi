<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM ris JOIN people on people.idc = ris.req_by 
        JOIN req ON req.id_ris = ris.idris JOIN xris ON xris.idx = req.item_id WHERE ris_no LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') GROUP BY ris.ris_no ORDER BY idris DESC ");
		$stmt->bind_param("ss",$search,$search,);
	}
		else{
			$stmt=$conn->prepare("SELECT * FROM ris");
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
                            <span>".$fetch['iss_date']."</span>
                            </td>

                        
                            </tr>

                           
                                <tr>
                                    <td>   <i class='bx bx-file' style='color:white;background:royalblue;padding:12px 12px;border-radius:50px;'></i></td>
                                    <td><span>RIS No : ".$fetch['ris_no']." </span><br>
                                        <span>".$fetch['fullname']."</span></td>
                                    <td> <a href='x-xris.php?fc=".$fetch['fc']."&req_by=".$fetch['req_by']."&idris=".$fetch['idris']."' class='opptions'><i class='bx bxs-chevron-right' ></i></a></td>
                            
                                </tr>
                                <tr><td style='color:transparent;'>white</td></tr> ";
                                        
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

