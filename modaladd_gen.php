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
<div class="modal" id="addgenModal" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header pt-1 pb-1"><br>
        <h4 class="modal-title">Add Gen Stock Name</h4><br>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br>
      <!-- Modal body -->
      <div class="modal-body">

      <div class="row">
          <div class="col">
              <label>Stock Name :</label><br>
              <input type="text" name="gen_stock" id ="gen_stock" placeholder="Stock Name"><br><br>
          </div>
      </div>

      <div class="row">
          <div class="col">
              <label>Unit :</label><br>
              <input type="text" name="unit_name" id ="unit_name" placeholder = "Input Unit"><br><br>
          </div>
      </div>

      <div class="row">
          <div class="col">
            <label>Type :</label><br>
          <select name="type" id="type">
        <option value="1">RIS</option>
        <option value="2">ICS</option>
        <option value="3">PAR</option>
  
        </select><br><br>
              
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