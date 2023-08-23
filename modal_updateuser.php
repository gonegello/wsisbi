
<!-- MODAL UPDATE USER ACCOUNT-->
<div class="modal" id="useraccountedit<?php echo $row['id'];?>" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">

      
      <!-- Modal Header -->
      <div class="modal-header pt-1 pb-1">
        <h6 class="modal-title"><i class='bx bx-user-circle' id="circle"></i><br><p><?php echo $row['username'];?></p></h6><br>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br>
      <!-- Modal body -->
      <div class="modal-body">

        <form action="a-updateuser.php" method="post">
        <div class="form-outline">
          <div class="material-textfield">
          <input type="text" name="id" value="<?php echo $row['id'];?>" required=""/>
          <!--input new username-->
            <input placeholder="" type="text" name="username" id="username" value="<?php echo $row['username'];?>" required=""/>
            <label class="labelClass">Username</label>
          </div>
         
          <div class="material-textfield">
            <!-- select new role-->
            <select class="op" name="userole">
                <option <?php if($row['userole']=='admin'){echo "selected=\"\"";} ?> value="admin">admin</option>
                <option <?php if($row['userole']=='client'){echo "selected=\"\"";} ?> value="client">client</option>
                <option <?php if($row['userole']=='storekeeper'){echo "selected=\"\"";} ?> value="storekeeper">storekeeper</option>
            </select>
            <label class="labelClass">User Role</label>
          </div>

          <div class="material-textfield">
            <!--new password-->
            <input placeholder=" " type="password" value="<?php echo $row['password'];?>" name="password" style="width:60%;" required=""/>
            <label class="labelClass" >Password</label>
            <input type="submit" value="Update" class="btn btn-primary" name="submit">
      </form>
          </div>
        </div>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer pt-0 pb-0">
     

      </div>
    </div>
  </div>
</div>
<!--End of the Modal Add User in NAV TAB ICON-->