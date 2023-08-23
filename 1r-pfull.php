
                <div class="row" style="margin-top:3%;">
                    <div class="col" style="padding-right:0;margin-left:5%;">
                    <div class="card-body" style="border:1px solid #ededed;border-top-left-radius:10px;">
                    <h5>PAR Items</h5>

                    </div>

                    <div class="card-body" style="border:1px solid #ededed;border-top:none;">
                    <table>
                    <?php
                include('connection.php');
                $stat = "1";
                $query=mysqli_query($conn,"SELECT * FROM xicspar JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id JOIN classification ON classification.classID = xicspar.class_id
                 WHERE stat = $stat AND unit_cost > 50000 ORDER BY idx DESC");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>

                    <tr>
                    <td width="5%"><img src="<?php echo $row['stock_img']; ?>" style="object-fit:cover;border-radius:50px;border:1px solid #836953;" width="50px" height="50px"></td>
                    <td>
                        <span style="color:#836953;font-weight:bold;"><?php echo $row['item_details'];?></span><br>
                        <span style="color:grey;"><?php echo $row['supplier'];?></span><br>
                        <span style="color:grey;"><?php echo $row['in_quan']; echo " "; echo $row['unit']; echo " x "; echo number_format($row['unit_cost'],2);?></span>
                    </td>
                    <td style="text-align:right;">
                    <a href="#" class="right-link">View</a>
                      
                    </td>
                    
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
                            <a href="#allpar">All</a>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="col" style="padding-left:0;margin-right:5%;">
                        <div class="card-body" style="border:1px solid #ededed;border-top-right-radius:10px;border-left:none;">
                        <h5>Acceptance of Items</h5>

                        </div>

                    </div>
                </div>
