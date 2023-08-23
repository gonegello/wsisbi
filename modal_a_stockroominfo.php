<!-- Modal for Stockroom Information Icon-->
<div class="modal fade" id="stockinfo<?=$row['s_id'];?>" role="dialog">
    <div class="modal-dialog modal=300px">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"  id="stockedit_title"><img src="<?php echo $row['photo']; ?>" style="object-fit:cover;" width="200px" height="200px"></h4>
        </div>
       <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Stock ID:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['s_id'];?></span>
                                                </div>
                                            </div>

                                            
                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Stock Name:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['stock_name'];?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Brand:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['brand'];?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Description:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['description'];?></span>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Category:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['category_name'];?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Stock:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['in_quantity']; echo " "; echo $row['unit']?></span>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Remaining Stock:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['quantity']; echo " "; echo $row['unit']?></span>
                                                </div>
                                            </div>

                                            <div class="row" style="">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Unit Price:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo "PHP. "; echo (number_format($row['unit_price'],2));?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Total Price:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo "PHP. "; echo $row['total_price'];?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                <span style="font-style:italic;color:grey;">Date Arrived:</span>
                                                </div>
                                                <div class="col">
                                                <span><?php echo $row['date_arrived'];?></span>
                                                </div>
                                            </div>

                                            
                                       
                                        
                                            
                                     

                                         
                                           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>