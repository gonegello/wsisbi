<!-- Modal for Stockroom Information Icon-->
<div class="modal fade" id="stockArchive<?=$row['s_id'];?>" role="dialog" style="text-align:center;">
    <div class="modal-dialog modal=300px">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;background:url('image/archive.jpg');">
        

        </div>
       <div class="modal-body">
        <h4>Save <i><span style="color:green;">`<?php echo $row['stock_name'];?>`</span></i> To Archive?</h4>          
        <span style="color:grey;">It will be removed in active stocks.</span>

        <form method="post" action="archive_in.php">
        <input type="hidden" name="s_id" value="<?php echo $row['s_id'];?>">
        <input type="hidden" name="sscon" value="1">
        <input type="hidden" name="stock_name" value="<?php echo $row['stock_name'];?>">
        <br><br>
        <input type="submit" id="archivein" name="archivein" class="btn btn-success" value="Archive-In">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>                      
                             
        </div>
       
           
       
      </div>
    </div>
  </div>

  