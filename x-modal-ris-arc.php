<!-- Modal for Stockroom Information Icon-->
<div class="modal fade" id="risArchive<?=$row['idx'];?>" role="dialog" style="text-align:center;">
    <div class="modal-dialog modal=300px">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;background:url('image/archive.jpg');">
        

        </div>
       <div class="modal-body">
        <h4>Save <i><span style="color:royalblue;">`<?php echo $row['item_details'];?>`</span></i> To Archive?</h4>          
        <span style="color:grey;">It will be removed in active RIS items.</span>

        <form method="post" action="x-o-ris.php">
        <input type="hidden" name="quantity" value="<?php echo $row['a_quan'];?>">


        <input type="hidden" name="user_id" value="<?php echo $id;?>">
        <input type="hidden" name="place" value="stockroom">
        
        <input type="hidden" name="idx" value="<?php echo $row['idx'];?>">
        <input type="hidden" name="stat" value="0">
        <input type="hidden" name="item_details" value="<?php echo $row['item_details'];?>">
        <br><br>
        <input type="submit" id="archivein" name="archivein" class="btn btn-success" value="Archive-In" style="background:royalblue;">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>                      
                             
        </div>
         
           
       
      </div>
    </div>
  </div>

  