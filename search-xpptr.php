<?php
	
	include 'connection.php';
	$output ='';

	if(isset($_POST['query'])){
       
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM icspar_details JOIN people ON people.idc = icspar_details.custodian JOIN xicspar ON xicspar.idx = icspar_details.x_id WHERE fullname LIKE CONCAT('%',?,'%') GROUP BY icspar_details.custodian");
		$stmt->bind_param("s",$search,);
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
                                <tr >
                                    <td width='5%'> <i class='bx bx-user' style='color:white;background:#E6A519;border-radius:50px;padding:10px 10px;font-size:20px;'></i></td>
                                    <td><span style='color:royalblue;font-weight:bold;'>".$fetch['fullname']."</span><br>".$fetch['office']."</td>
                            
                                    <td style='text-align:right;'><a href='x-per-custodian.php?idc=".$fetch['idc']."'  title='".$fetch['fullname']."'>
                                    <i class='bx bx-chevron-right' style='margin-top:2%;font-size:30px;color:royalblue;padding:12px 12px;border-radius:50px;'></i></a></td>

                                </tr>";
                          
                           
                        }
						
                        $output .="</tbody>";
                        echo $output;
					}
                    else{
                        echo "<h3>No Records Found!</h3>";
                    }

?>

