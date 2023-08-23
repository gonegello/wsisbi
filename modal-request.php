
<?php 
$cid=$row['client_id'];
$dd = $row['date_']


?>
<div class="modal fade" style="margin-top: 5%;" id="showreqmodal<?php echo $row['client_id'];?>" tabindex="-1" role="dialog" aria-labelledby="showreqmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">

      <div class="modal-header" style="background:white;border-radius:5px;">
      <img src="<?php echo $row['profile']; ?>" style="border-radius:50%; object-fit:cover;" id="prof" width="50px" height="50px">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;margin-left:3%;margin-top:2%;"><?php echo $row['fullname'];?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" style="border-radius:5px;">
      <form method="post" action ="approve.php">
                                                      
      <?php
                    include('connection.php');
                              $no=0;                                      
                     $qry=mysqli_query($conn,"select * from `request` where client_id = '$cid' and date_ = '$dd'");
                      while($roww=mysqli_fetch_array($qry))
                      {
                                                                       
                       ?>
    <div class="row">

    
        <div class="col">
        <span style="color:grey;font-size:12px;"><?php echo $row['date_']; echo " "; echo $row['time_'];?></span>
            <h4 style="font-size:20px;">( <?php echo $roww['quantity'];?> ) <?php echo $roww['item'];?></h4>
            <!--Post -->
            <input type="hidden" name="req_id[]" value="<?php echo $roww['req_id'];?>">
            <input type="hidden" name="approved_by[]" value="<?php echo $id;?>">
            <input type="text" name="date_approved[]" value="<?php echo $datte;?>">
            <input type="text" name="approved_time[]" value="<?php echo $time;?>">

            
        </div>
    </div>

    <?php
            }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" id="closebtn" data-dismiss="modal">Close</button>
        <button type="submit" name="approve">Approve</button>

         
      </div>
      </form>
    </div>
  </div>
</div>