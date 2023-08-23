

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
background:#50C878;
  border:1px solid #50C878;
  color:white;
  border-radius:5px;
  margin-right:8px;
  float:right;
}
#addtocarto:hover{
    background:#50C878;
    color:white;
  padding:13px 21px;
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
input[type="number"]{
  background:whitesmoke;
  border:1px solid #ededed;
  border-radius:10px;
}

input[type="number"]:focus{
  background:none;
  border:1px solid #ededed;
  
}
#save{
  
}


  </style>


<div class="modal fade bd-example-modal-lg" id="editcart<?=$rw['idreq']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
        <div class="card-body">
          <button type="button" id="mclose" data-dismiss="modal"> <i class='bx bx-x'></i></button><br>
      

      <h2><?php echo $rw['item_details'];?></h2><br>
      <center>
      <img src="<?php echo $rw['stock_img'];?>" height="200px" width="200px" style="object-fit:cover;">
      </center>
      <br>
      <form method="post" action="xc-updateReq.php">
<div class="row">
  <div class="col">
    <label for="idreq">Update Quantity :</label> <span style="font-size:15px;color:green;">* Available quantity: ( <?php echo $rw['a_quan'];?> ) </span>
  <input type="hidden" name="idreq" value="<?php echo $rw['idreq'];?>">
  <input type="number" name="req_quan" id="requan" value="<?php echo $rw['req_quan'];?>" max="<?php echo $rw['a_quan'];?>">

  </div>
</div>
<div class="row">


  <div class="col" style="">
<input type="submit" name="save" id="addtocarto" value="Update">
  </div>
</form>
</div>
</div>
    
  
              

        </div>
           
         
      ...
    </div>
  </div>
</div>




