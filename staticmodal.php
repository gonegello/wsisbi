<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body" >
        <form  action="addris.php" class="addstock" method = "post" enctype="multipart/form-data">
                
   

                <div class="row" style="margin-top:2%;"><!-- -->

                    <div class="col">
                    <input type='file' id="imgInp" name="imgInp" style="display:none" />
                    <!-- preview image here-->
                    <img id="addpho" style= "object-fit:cover;border:1px solid #ededed;border-radius:5px;" src="image/add.png" 
                    alt="Product Image" height="200px" width="100%" />  
                    </div>

                    <div class="col">
                    <label>Fund Cluster:</label><br>
                    <select class = "selectme" name="fund_c" id="fund_c" onchange="GetFundID(this.value)">
                    <?php echo $fund_c;?>
                    </select> <br><br>
                
                    <label>Item Description:</label><br>
                        <input type="text" name="item" style="font-style:italic;color:#5DBB63;"
                        placeholder="Item Name" id="item" value=""
                        onchange="GetDetails(this.value)"
                        required/>
                    <br>
                    </div>

                    <div class="col">
                    <label>Supplier:</label><br>
                    <input type="text" name="supplier" id="supplier" placeholder="Supplier"><br><br>


                    <label>Unit:</label><br>
                        <input type="text" style="font-style:italic;color:#5DBB63;" name="unit"
                        id="unit" placeholder="Unit" value="" required/>
                    </div>


                    </div><!-- end of first row inside the form-->


                 

                    <div class="row" style="margin-top:1%;">

                    <div class="col">
                        <label>Quantity:</label><br>
                        <input type="number" name="quantity" 
                        placeholder="Quantity" min="0" id="quantity" value="" required/>
                    </div>

                    <div class="col">
                    <label>Unit Price:</label><br>
                    <input type="number" name="unit_price"
                    id="unit_price" placeholder="Unit Cost"
                    min="0" step=".01" value="" required/>   
                    </div>

                    <div class="col">
                     <!--total cost -->
                     <label>Total Cost:</label>
                        <input type="number" name="total_cost"
                        id="total_cost" step=".01" placeholder="Total Cost" value=""
                        readonly>
                    </div>


                </div><!-- second row inside the form-->



                <div class="row" style="margin-top:1%;">

                    <div class="col">
                        <label>Purchase Order No. :</label><br>
                        <input type="text" name="po_no" value=""
                        id = "po_no" placeholder="Purchase Order No.">
                       
                    </div>

                    <div class="col">
                        <label>PO Date:</label><br>
                        <input type="text" name="po_date" id="po_date"
                         value="" placeholder="Purchase Order Date" >
                    </div>

                    <div class="col">

                    <label>Stock Number:</label><br>
                        <input type="text" name="stock_num" id="stock_num"
                         value="" placeholder="Stock Number" >
                        
                    <!-- for RIS generated -->
                        <input type = "hidden" name="year_2" id="year_2" value="<?php echo $date_2;?>">
                        <input type = "hidden" name="month_2" id="month_2" value="<?php echo $month_2;?>">
                        <!-- Input type hidden to be send post-->
                        <input type="hidden" name="sn_id" id="sn_id" value="">
         
           
                        <input type ="hidden" name="stat" id ="stat" value="1">
                        <input type ="hidden" name="r_code" id ="r_code" value="<?php echo $covertedrcode;?>">
                        <input type = "hidden" name="idx" id="idx" placeholder="idx" value="<?php echo $next_stock_id;?>">
                        <input type = "hidden" name="user_id" id="user_id" placeholder="user_id" value="<?php echo $id;?>">




                        <!--for auto generation stocks -->

                        <input type="text" name="fund_id" id="fund_id" value="1" placeholder="Fund ID"><!--fund cluster ID -->
                        

   

                    </div>
                    
                </div><!--third row inside the form-->

                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                    <input type="submit" name="save"
                    id="save"                                                
                    value="Save Item">
                    </div>
                </div>
                </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>