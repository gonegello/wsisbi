<!-- Modal for Stockroom Information Icon-->

<style>
    
    </style>
<div class="modal fade" id="checkQuan<?=$row['s_id'];?>" role="dialog" style="text-align:center;">
    <div class="modal-dialog modal=300px">
      <div class="modal-content">
        <div class="modal-header" style="background:#50C878;">
        <h4 style="color:white"><?php echo $row['brand']; echo " "; echo $row['stock_name'];?></h4>
        
        </div>
       <div class="modal-body">
       <span style=""><?php echo $row['description'];?></span><br><br>
                  
       
        <div class="row">
            <div class="col">
            <span style="font-size:14px;">Quantity :</span><br><br><h3><?php echo $row['in_quantity'];?></h3>
            </div>

            <div class="col">
            <span style="font-size:14px;">Available :</span><br><br><h3><?php echo $row['quantity'];?></h3>
            </div>

            <div class="col">
            <span style="font-size:14px;">Request :</span><br><br><h3><?php echo $row['quan'];?></h3>
            </div>

        </div>

        <br>

                      
        </div>
        <button type="button" style="padding:10px 12px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
           
       
      </div>
    </div>
  </div>