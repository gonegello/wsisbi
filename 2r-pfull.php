<div class="row" style="margin-top:3%;">
                    <div class="col" style="padding-right:0;margin-left:5%;">
                    <div class="card-body" style="border:1px solid #ededed;border-top-left-radius:10px;">
                    <h5>Set Custodian</h5>


                    </div>

                    <div class="card-body" style="border:1px solid #ededed;border-top:none;">
                    <table>
                    <?php
                include('connection.php');
                $stat = "1";
                $query=mysqli_query($conn,"SELECT * FROM xicspar JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id JOIN
                icspar_details ON icspar_details.x_id = xicspar.idx JOIN
                classification ON classification.classID = xicspar.class_id
                 WHERE xicspar.stat = $stat AND icspar_details.custodian IS NULL AND xicspar.unit_cost > 50000 GROUP BY icspar_details.x_id ORDER BY xicspar.idx DESC");
                while($row=mysqli_fetch_array($query))
                {
                    $stock_id = $row['idx'];
                    $req = "SELECT * FROM icspar_details WHERE x_id = $stock_id AND custodian IS NULL";

                    if($r = mysqli_query($conn,$req))
                    {
                        $numd =mysqli_num_rows($r);
                    }
                    ?>
                    
                    
                    <tr>
                       
                       
                        <td width="5%">
                        <i class='bx bx-user-plus' style="padding:10px 10px; border:1px solid #1aa260;color:#1aa260;border-radius:50px;" ></i>
                        </td>
                        <td >
                        <span style="color:#1aa260;font-weight:bold;"><?php echo $row['item_details'];?></span><br>
                        <span style="color:grey;"><?php echo $row['in_quan']; echo " "; echo $row['unit']; echo " ";?> - <?php echo $numd; echo " "; echo "available";?></span>
                        </td>
                       
                        <td>
                           <span style="color:grey;"> <?php echo $row['po_num']; echo " / ";?><?php echo $row['po_date'];?></span>
                        </td>
                       
                        <td style="text-align:right;"><a style ="color:#1aa260;" href="x-full-prop.php?idx=<?php echo $row['idx'];?>&item=<?php echo $row['item_details'];?>&num=<?php echo $numd;?>
                        &po_num=<?php echo $row['po_num'];?>&po_date=<?php echo $row['po_date'];?>">View</a></td>
                      

                

                    </tr>
                 

                <?php
              
                }
                ?>

        </table>
                    </div>
                    <div class="card-body" style="border:1px solid #ededed;border-top:none;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col" style="text-align:right;">
                            <a href="#setcustodian">All</a>
                        </div>
                    </div>
                    </div>
                    </div>







                    <div class="col" style="padding-left:0;margin-right:5%;">
                        <div class="card-body" style="border:1px solid #ededed;border-top-right-radius:10px;border-left:none;">
                        <div class="row">
                            <div class="col">
                            <h5>Update Custodian</h5>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                      

                        </div>

                        <div class="card-body" style="border:1px solid #ededed;border-left:none;border-top:none;">
                    <table>

                    <?php
                include('connection.php');
                $stat = "1";

                
                $query=mysqli_query($conn,"SELECT * FROM icspar_details JOIN xicspar ON xicspar.idx = icspar_details.x_id
                JOIN people ON people.idc = icspar_details.custodian
                 WHERE xicspar.stat = $stat AND icspar_details.custodian IS NOT NULL AND  xicspar.unit_cost > 50000  ORDER BY idx DESC");
                while($row=mysqli_fetch_array($query))
                {
                    $stock_id = $row['idx'];
                    $req = "SELECT * FROM icspar_details WHERE x_id = $stock_id AND custodian IS NULL";

                    if($r = mysqli_query($conn,$req))
                    {
                        $numd =mysqli_num_rows($r);
                    }
                    ?>
                    
                    
                    <tr>
                       
                       <td width="5%"><i class='bx bx-user' style="color:#4286f4;border:1px solid #4286f4;border-radius:50px;padding:10px 10px;"></i></td>
                        <td>
                            <span style="color:#4286f4;font-weight:bold;"><?php echo $row['item_details'];?></span><br>
                            <span style="color:grey;"><?php echo $row['prop_num'];?> - ( <?php echo $row['lastname'];?> )</span>
                        </td>
                       
                        <td><a href="x-full-prop.php?idx=<?php echo $row['idx'];?>&item=<?php echo $row['item_details'];?>&num=<?php echo $numd;?>
                        &po_num=<?php echo $row['po_num'];?>&po_date=<?php echo $row['po_date'];?>">Edit</a>
                    </td>
                      

                

                    </tr>
                 

                <?php
              
                }
                ?>

        </table>
                    </div>
                    <div class="card-body" style="border:1px solid #ededed;border-top:none;border-bottom-left-radius:10px;border-bottom-right-radius:10px;border-left:none;">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col" style="text-align:right;">
                            <a href="#">All</a>
                        </div>
                    </div>
                    </div>

                    </div>
                </div>