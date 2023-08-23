<!DOCTYPE html>
<?php
//get user information
include "a-session.php";
	require 'connection.php';

    $code_format = date("dFY");
?>
<html lang="en">
	<head>
		<style>	
			
            @page {
        size: auto;   /* auto is the initial value */
        margin: 0;  /* this affects the margin in the printer settings */
    }
    body * {
        visibility: hidden;

    }
   
    .section-to-print, .section-to-print * {
        visibility: hidden;
        
        
    }
    .print-sticker, .print-sticker * {
       visibility: visible;
        
        
    } 
    .card-body{
        border: none;
    }
   
    }
    #print-btn
    {
        display: none;
        visibility: none;
    }
    table {
font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
  border-collapse: collapse;
  width: 100%;
  height: 10%;
  margin-top:2%;
  margin-bottom:2%;
  outline:none;
  font-size:17px;
  
}
span{
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
th[colspan="6"] {
    text-align: center;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
th[rowspan="2"]{
  text-align:center;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}
table th{
    text-align:center;
    border:2px solid black;
    font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    font-weight:bold;

    
    

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-family:  "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

}
td{
    border:0px;
    padding-left:5px;
    padding-right:5px;
    padding-top:-5px;
}


input[type="text"]{
background:white;
outline:none;

border-radius:0px;
}
input[type="text"]:focus{
    background:none;
    box-shadow:none;
    border-radius:0px;
}

	</style>
	</head>
<body>
	<?php

    $fc_id = $_GET['fc_id'];
    $custodian = $_GET['custodian'];

    
    $query=mysqli_query($conn,"select * from `fund_c` where fundc_id = $fc_id");
    while($row=mysqli_fetch_array($query))
   {
       $getfund_cluster = $row['fund_cluster'];
       
   } 

    ?>
<div class="print-sticker"> 

    <div class="card-body" style=" border:1px solid #ededed; border-top:none;
     border-radius:10px;margin-right:1%;margin-left:1%;margin-top:1%;">

     <?php

       include('connection.php');
       $stat = "1";
       $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id 
       JOIN ics ON ics.idics = icspar_details.icsxpar_no JOIN people ON people.idc = icspar_details.custodian WHERE
        xicspar.fc_id = $fc_id AND xicspar.unit_cost <= 50000 AND icspar_details.custodian = $custodian");
       while($row=mysqli_fetch_array($query))

{

    $property_number = $row['prop_num'];

    
?>

    <div class="row">
        <div class="col">
        <table>
            <tr>
                <td style="border-right:1px solid black;text-align:center;" rowspan="2" width="20%">
                   <img src="<?php echo $univ_logo;?>" style= "object-fit:cover;" width="100px" height="100px" />
</td>
                <td width="15%" style="border:1px solid black;font-size:20px;font-weight:bold;">Property No. :</td>
                <td style="border:1px solid black;font-size:25px;font-weight:bold;" width="19%;"><?php echo $row['prop_num'];?></td>
                <td style="border-bottom:1px solid black;font-size:10px;color:grey;text-align:left;">
                <div class="row">
                    <div class="col" style="">

                    </div>
                    <div class="col" >
                    Doc Code: SLSU-HC-QF-S001<br>
                    Revision: 00<br>
                    Date: <?php echo $code_format;?>
                    </div>
                </div>
               
            </td>

            </tr>
            <tr>
              
               
                <td style="border:1px solid black;">Name of Article:</td>
                <td colspan="2"  style="border:1px solid black;" width="35%"><?php echo $row['item_details'];?></td>
            </tr>

            <tr>
                <td style="border-right:1px solid black;" rowspan="3" width="25%">
                <div class="row">
                <span style="font-weight:bold;display:inline-block;vertical-align:top;margin-top:-5%;">REPUBLIC OF THE PHILIPPINES</span>
                </div>
                <div class="row" style="margin-top:-5%;">
                <span style="font-size:25px;font-weight:bold;">SLSU-HINUNANGAN</span>
                </div>
                <div class="row" style="margin-top:-3%;">
                <span>Hinunangan, Southern Leyte</span>
                </div>

                <div class="row" style="margin-top:3%;">
                <span style="font-size:30px;">PROPERTY TAG</span>
                </div>
                <div class="row" style="margin-top:-3%;">
                <span>DO NOT REMOVE</span>

                </div>

                <div class="row" style="margin-top:5%;">
                    <!-- insert barcode-->
                   
                  <span><?php echo "<center><img alt='testing' src='barcode.php?codetype=Code128&size=20&text=".$row['prop_num']."&print=true'/></center>";?></span>
                 

                    
                </div>
               
               
                
            </td>
                
            
                <td style="border:1px solid black;">Code No. :</td>
                <td colspan="2"  style="border:1px solid black;"><?php echo $row['ics_no'];?></td> 
                <td></td>
               

</tr>

            
            <tr>
              
                <td style="border:1px solid black;">Date of Acquisition :</td>
                <td colspan="2"  style="border:1px solid black;"><?php echo $row['date'];?></td>
               

            </tr>

            <tr>
                
               
            </td>
                <td style="border:1px solid black;">Unit Cost :</td>
                <td colspan="2"  style="border:1px solid black;"><?php echo number_format($row['unit_cost'],2);?></td>
               

            </tr>

            <tr>
                <td></td>
                <td style="border:1px solid black;">End User :</td>
                <td colspan="2"  style="border:1px solid black;font-weight:bold;"><?php echo $row['fullname'];?></td>
               
            </tr>
        </table>
        </div>
    </div>


<?php

}
?>

    

</div>

</div>
	
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>


