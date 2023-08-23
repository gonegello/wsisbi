<style>
#typeid{
    padding:10px 13px;
    background:whitesmoke;
    outline:none;
    border:none;
    width:100%;
}
#close{
    padding:10px 13px;
    outline:none;
    border:none;
    background:whitesmoke;
    color:grey;
    border-radius:5px;
    float:right;
}
#close:hover{
    background:red;
    color:white;
}
</style>






<!-- Modal Add User in NAV TAB ICON-->
<div class="modal" id="addcatModal" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header pt-1 pb-1"><br>
        <h4 class="modal-title">Add Category</h4><br>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br>
      <!-- Modal body -->
      <div class="modal-body">

      <div class="row">
          <div class="col">
              <label>Category Name :</label><br>
              <input type="text" name="category_name" id ="category_name" placeholder="Category Name"><br><br>
          </div>
      </div>

      <div class="row">
          <div class="col">
              <label>Description :</label><br>
              <input type="text" name="description" id ="description" placeholder = "Description"><br><br>
          </div>
      </div>

      <div class="row">
          <div class="col">
           
          <input type="hidden" name ="encoded_by" id="encoded_by" value="<?php echo $id;?>">
              
          </div>
      </div>
        <div class="row">
            <div class="col">
                <button type="button" id="close" name="close" data-dismiss = "modal">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of the Modal Add User in NAV TAB ICON-->