<!-- Modal Information User in USER ACCOUNT-->
<div class="modal" id="cli-info<?php echo $row['id'];?>" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header ">
        <h6 class="modal-title"><img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" width="200px" height="200px"><br><?php echo $row['fullname'];?><br><?php echo $row['username'];?></h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br>
      <!-- Modal body -->
      <div class="modal-body">
        <h6 class="title-name">Fullname:</h6>
        <p><?php echo $row['fullname'];?></p>
        <h6 class="title-name">Designation:</h6>
        <p><?php echo $row['designation'];?></p>
        <h6 class="title-name">Office:</h6>
        <p><?php echo $row['office'];?></p>
        <h6 class="title-name">Contact Number:</h6>
        <p><?php echo $row['contact_n'];?></p>
        <h6 class="title-name">Created by:</h6>
        <p><?php echo $row['created_by'];?></p>
        <h6 class="title-name">Dated Created:</h6>
        <p><?php echo $date_created->format('F j, Y, g:i a');?></p>
        <h6 class="title-name">Last Update:</h6>
        <p><?php echo $last_updated->format('F j, Y, g:i a');?></p>
        
        
          
         
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer ">
        
      </div>
    </div>
  </div>
</div>
<!--End of the Modal Information User in USER ACCOUNT-->