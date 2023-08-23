
<!-- Modal Add User in NAV TAB ICON-->
<div class="modal" id="adduserModal" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header pt-1 pb-1">
        <h6 class="modal-title"><i class='bx bx-user-circle' id="circle"></i><br>Add User</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="a-adduser.php" method="post">
         
        <div class="form-outline">
          <div class="material-textfield">
            <input placeholder=" " type="text" name="username" required>
            <label class="labelClass">Username</label>
          </div>
          <div class="material-textfield">
           
          </div>
          <div class="material-textfield">
            <select class="op" name="userole">
            <?php echo $accrole;?>
            </select>
            <label class="labelClass">User Role</label>
          </div>
        </div>
        <input type="text" name="created_by" value="Admin <?php echo $fullname;?>">
      </div>
      <!-- Modal footer -->
      <div class="modal-footer pt-0 pb-0">
      <input type="submit" class="btn btn-primary" value="Save">
</form>
      </div>
    </div>
  </div>
</div>
<!--End of the Modal Add User in NAV TAB ICON-->