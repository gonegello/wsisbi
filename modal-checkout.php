

<style>
#mclose{
  padding:13px 13px;
  color:grey;
  font-size:20px;
  border:none;
  background:transparent;
  outline:none;
  float:right;
  font-weight:bold;
}
#mclose:hover{
  border-radius:50px;
  font-size:30px;
  color:darkred;

}
#addcar{
  margin-left:17%;
}
#addtocarto{
padding:12px 20px;
  background:white;
  border:1px solid green;
  color:green;
  border-radius:5px;
  margin-right:8px;
  float:right;
}
#addtocarto:hover{
  background:green;
  color:white;
}

#disabled{
  padding:12px 20px;
  background:whitesmoke;
  border:none;
  color:grey;
  border-radius:5px;
  margin-right:8px;
  float:right;
}
#ordernum{
  margin-left:5%;
  padding-left:5px;
  width:70px;
  text-align:center;
}
#ordernum:focus{
  background:whitesmoke;
  border:none;
  outline:none;
}
#pricy{
  background:white;
  border:none;
  outline:none;
  width:100px;
  margin-left:1%;
}




  </style>


<div class="modal fade bd-example-modal-lg" id="checkoutmodal<?=$row['idcart']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
        <div class="card-body">
          <button type="button" id="mclose" data-dismiss="modal"> <i class='bx bx-x'></i> </button><br>
        <img src="<?php echo $row['photo']; ?>" id="addcar" style="object-fit:cover;" width="400px" height="400px"><br>

       <form method="post" action="a-order.php">
  
            <span style="color:grey;">Order Quantity : <input id="ordernum" name="order_quan" type="number" min="1" max="<?php echo $row['quantity'];?>" value="<?php echo $row['quan'];?>" /></span>
            <span style="margin-left:10%;">Php. <input type = "number" id="pricy" step=".001" value="" readonly></span>

        <input type="hidden" id="order_amount" name="order_amount" value="<?php echo $row['unit_price'];?>"/>
        <input type="hidden" name="quantity" value="<?php echo $row['quantity'];?>">
        <input type = "hidden" name="idcart" value="<?php echo $row['idcart'];?>">
        <input type="hidden" name="item_id" value="<?php echo $row['s_id'];?>">
        <input type="hidden" name="client_id" value="<?php echo $id;?>">
        <input type="hidden" name="date_ordered" value="<?php echo $datte;?>">
        <input type="hidden" name="order_time" value="<?php echo $time;?>">

 

        <span style="color:grey;">**********************************************************************************</span>
        <span style="font-size:15px;color:#e05a00;"><?php echo "PHP."; echo (number_format($row['unit_price'],2));?></span><br>
        <span style="font-size:25px;"><?php echo $row['brand'];?></span>
              <span style="font-size:25px;"><?php echo $row['stock_name'];?></span>
              <span><?php echo $row['description'];?></span>
              <?php 
              if($row['status'] == 'available')
              {
                echo '<span style="color:green;float:right;text-transform:capitalize;">.'.$row['status'].'.</span>';
              }
              else{
                echo '<span style="color:red;float:right;text-transform:capitalize;">'.$row['status'].'</span>';
              }

              ?>
              <span style="color:grey;">**********************************************************************************</span><br>
              <span>Stockname : </span><?php echo $row['stock_name'];?><br>
              <span>Brand : </span><?php echo $row['brand'];?><br>
              <span>Description : </span><?php echo $row['description'];?>
              <?php
              if($row['quantity'] > 0)
              {
                echo '<br><span>Available Stock: '.$row['quantity'].'</span><span>'.$row['unit'].'</span>';
              }
              else{
                echo '<br><span>Stock Condition: '.$row['status'].'</span>';
              }

              ?>

              <br>

              <?php
              if($row['status'] == "available")
              {
                echo '<button type = "submit" id="addtocarto" name="checkout">Check Out</button>';
              }
              else{
                echo '<button type = "button" id="disabled" disabled>Check Out</button>';

              }

              ?>



              

        </div>
            </form>
         
      ...
    </div>
  </div>
</div>




