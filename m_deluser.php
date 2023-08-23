<!-- Modal for Stockroom Information Icon-->
<div class="modal fade" id="delUser<?=$rw['id'];?>" role="dialog" style="text-align:center;">
    <div class="modal-dialog modal=300px">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;background:url('image/archive.jpg');">
        

        </div>
       <div class="modal-body">
        <h4>Delete user <i><span style="color:royalblue;">`<?php echo $rw['username'];?>`</span></i>?</h4>          
        <span style="color:grey;">It will be permanently deleted.</span>

        <form method="post" action="#">
       
        <input type="submit" id="archivein" name="archivein" class="btn btn-success" value="Archive-In" style="background:royalblue;">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>                      
                             
        </div>
       
           
       
      </div>
    </div>
  </div>

  