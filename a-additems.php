    <?php
    include "a-session.php";       
	?>



    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>HI <?php echo $fullname;?> !</title>

    <?php require_once "a-linkstyle.php";
    ?>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
    input[type="number"],input[type="date"]{
        width:100%;
        padding:12px 14px;
        border-radius:5px;
        background-color: whitesmoke;
         color:grey;
         border:none;
         outline:none;
    }

    input[type="number"]:focus,input[type="text"]:focus{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        background:white;
        border:none;

    }
    #add{
    padding:12px 15px;
  border-radius:50%;
  background:white;
  color:grey;
  border:none;
  outline:none;
  float:right;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
    #add:hover{
        background:green;
        color:white;
    }
    </style>
 
    <body style="background:whitesmoke;">
    <?php require_once "a-sidebar.php"; include "a-overview.php";?>

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
     
        <div class="row">

            <div class="col">
                <?php require_once "quicktool.php"; ?>

                <div class="card-body" style="margin-left:10%;margin-right:10%;margin-top:2%;border-radius:10px;border:1px solid #ededed;">

                <div class="row">

                    <div class="col">
                        <h4>Add Multiple Items</h4>
                    </div>
                    <div class="col">
                    <button type="button" id="add"><i class='bx bx-plus' style="font-size:20px;"></i></button>
                    </div>

                </div>
                    <div class="row" style="margin-top:2%;">

                        <div class="col"><!-- image col-->
                        <input type='file' id="imgInp" name="imgInp" style="display:none" />
                                                <!-- preview image here-->
                                                <img id="addpho" style= "object-fit:cover;" src="image/load.png" 
                                                alt="Product Image" height="200px" width="100%" />  
                        </div><!--end image col-->

                        <div class="col"><!-- -->
                        <label>Product Code:</label><br>
                        <input type="text" name="product_code" placeholder="Product Code">
                        <label style="margin-top:5%;">Brand:</label>
                        <input type="text" name="brand" placeholder="Brand"><br>
                        </div>

                        <div class="col">
                        <label>Stockname:</label><br>
                        <input type="text" name="stock_name" placeholder="Stockname"><br>
                        <label style="margin-top:5%;">Description:</label><br>
                        <input type="text" name="description" placeholder="Description">
                        </div>


                        </div><!-- first row inside the form-->

                    <div class="row" style="margin-top:1%;">
                        
                        <div class="col">
                            <label>Quantity:</label><br>
                            <input type="number" name="quantity" placeholder="Quantity" required/>
                        </div>

                        <div class="col">
                            <label>Unit:</label><br>
                            <input type="text" name="unit" placeholder="Unit" required/>
                        </div>

                        <div class="col">

                        <label>Unit Price:</label><br>
                        <input type="number" name="unit_price" placeholder="Unit Cost" required/>
                        
                        </div>

                    </div><!-- second row inside the form-->

                    <div class="row" style="margin-top:1%;">
                        <div class="col">
                            <label>Total Cost:</label>
                            <input type="number" name="total_cost" placeholder="Total Cost">
                        </div>

                        <div class="col">
                            <label>Date Arrived:</label><br>
                            <input type="date" name="date_arrive" placeholder="Date Arrived">

                        </div>
                        <div class="col">
                            <label>Officer:</label><br>
                            <input type="text" name="officer" style="width:80%;" placeholder="<?php echo $fullname;?>" disabled>
                            <button type="button" id="add"><i class='bx bx-plus' style="font-size:23px;"></i></button>

                        </div>
                    </div><!--third row inside the form-->

                        
                </div><!-- first card body-->

                <div class="card-body" style="margin-left:10%;margin-right:10%;margin-top:2%;border-radius:10px;border:1px solid #ededed;">
                
                <div class="row">

                    <div class="col">
                        <h4>Stockroom</h4>
                    </div>
                </div>
                </div>
        
        
            </div><!-- first col-->

            

        </div><!--row container end-->


        



    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

</body>
</html>
