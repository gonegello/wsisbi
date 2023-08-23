<!-- Modal for Stockroom Information Icon-->
<div class="modal fade" id="icsparOut<?=$row['idx'];?>" role="dialog" style="text-align:center;">
    <div class="modal-dialog modal=300px">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;background:url('image/archive.jpg');">
        

        </div>
       <div class="modal-body">
        <h4>Archive-out <i><span style="color:royalblue;">`<?php echo $row['item_details'];?>`</span></i>?</h4>          
        <span style="color:grey;">Allow <?php $row['item_details'];?> to be in Active items.</span>

        <form method="post" action="x-o-icspar.php">

        <input type="hidden" name="quantity" value="<?php echo $row['a_quan'];?>">
        <input type="hidden" name="user_id" value="<?php echo $id;?>">
        <input type="hidden" name="place" value="archives">
        <input type="hidden" name="idx" value="<?php echo $row['idx'];?>">
        <input type="hidden" name="stat" value="1">
        <input type="hidden" name="item_details" value="<?php echo $row['item_details'];?>">
        <br><br>
        <input type="submit" id="archivein" name="archivein" class="btn btn-success" value="Archive-Out" style="background:royalblue;">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>                      
                             
        </div>
       
             
       
      </div>
    </div>
  </div>

  