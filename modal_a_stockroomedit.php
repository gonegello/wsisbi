<style>
.modal-open .modal {
  width: 500px;
  margin-left: 50%;
  margin-top: 1%;
}

#stockedit_title{
  margin-left: 25%;
}
.modal-header{
  background-color: white;
}
  </style>


<!-- Modal for Stockroom edit-->
<div class="modal fade" id="stockedit<?=$row['s_id'];?>" role="dialog">
    <div class="modal-dialog modal=300px modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"  id="stockedit_title"><img src="<?php echo $row['photo']; ?>" style="object-fit:cover;" width="200px" height="200px"></h4>
        </div>
       <div class="modal-body">
                                            <div class="col">
                                              
                                                <label>Stock Name:</label>
                                                <input type='text' name="gen"
                                                  id='gen'
                                                  placeholder='Stock Name'
                                                  onchange="GetDetail(this.value)" value="">
                                                <span id="gen_result"></span>
                                            </div>
                                       
                                        
                                            <div class="col">
                                             
                                                <label>Brand Name:</label>
                                                <input type="text" name="brand"
                                                  id="brand"
                                                  placeholder= 'Brand Name'
                                                  value="">
                                             
                                            </div>
                                     
                                       
                                            <div class="col">
                                             
                                                <label>Description:</label>
                                                <input type="text" name="description"
                                                  id="description" class="form-control"
                                                  placeholder= 'Description'
                                                  value="">
                                           
                                              </div>


                                              <div class="col">
                                        
                                                <label>Quantity:</label>
                                                <input type="number" name="quantity"
                                                  id="quantity" min="0" class="form-control"
                                                  
                                                  value="" onblur="total_cost()">
                                          
                                            </div>
                                       
                                            
                                            <div class="col">
                                        
                                                <label>Unit:</label><br>
                                                <input type="text" name="unit"
                                                  id="unit" class="form-control"
                                                  placeholder='Unit'
                                                  value="">
                                        
                                            </div>
                             
                                             
                                            <div class="col">
                                   
                                                <label>Unit Price:</label>
                                                <input type="number" name="unit_price"
                                                  id="unit_price" class="form-control" min="0" step=".001"
                                                  placeholder='Unit Price'  
                                                  value="">
                                       
                                            </div>
                                        
                                     
                                            <div class="col">
                                      
                                                <label>Total Cost:</label>
                                                <input type="text" name="total_cost"
                                                  id="total_cost" class="form-control" 
                                                  placeholder='Unit Price'
                                                  value="" readonly>
                                          
                                            </div>
                                      

                                    
                                            <div class="col">
                                           
                                                <label>Date Arrive:</label>
                                                <input type="date" name="date_arrive"
                                                  id="date_arrive" class="form-control"
                                                  placeholder='Date Arrive'
                                                  value="">
                                          
                                            </div>
                                     

                                        
                                            
                                         
                                           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >Update</button>
        </div>
      </div>
    </div>
  </div>