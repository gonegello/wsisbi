<?php require_once "a-session.php";
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stockroom</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/nav.css">
    <link rel="stylesheet" href="assets/bootstrap/css/tab.css">
    <link rel="stylesheet" href="assets/bootstrap/css/stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/table.css">
    <link rel="stylesheet" href="assets/bootstrap/css/forms.css">
    <link rel="stylesheet" href="assets/bootstrap/css/modal_accounts.css">
    <link rel="stylesheet" href="assets/bootstrap/css/loader.css">

    <!-- UI-->
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
    

    
     <!-- Boxiocns CDN Link -->
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet/less" type="text/css" href="styles.less" />
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <style>
    .addstock input[type="text"], input[type="number"],input[type="date"]{
      width:100%;
      border-radius:5px;
      padding:20px 30px;
      
    }
    .addstock input[type="text"]:focus,input[type="number"]:focus,input[type="date"]:focus{
    box-shadow:none;
      border-left:7px solid #E5e5e6;
      border-top:1px solid #E5e5e6;
      border-right: 1px solid #E5e5e6;
      border-bottom: 1px solid #E5e5e6;
   

    }
    #addpho{
      border-radius:5px;
      border:1px solid #ededed;
    }
    
  </style>

  

<body onload="stockBttm();AddStockBttm()">

<?php

if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["imgInp"]["name"];    // get the image name in $fnm variable
    $dst = "./stock_photo/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "stock_photo/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["imgInp"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	
    $check = mysqli_query($conn,"insert into stocks(photo,stock_name,brand,description,quantity,unit,unit_price, total_price,date_arrived,int_typeid) values('$dst_db','$_POST[gen]','$_POST[brand]','$_POST[description]','$_POST[quantity]','$_POST[unit]','$_POST[unit_price]','$_POST[total_cost]','$_POST[date_arrive]','$_POST[typeid]')");  // executing insert query
    
   
    if($check)
    {
      
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
      header('location: stockroom.php');  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

    

}
?>









<!--Side bar-->
<?php require_once "a-sidebar.php";?>
<!--end of sidebar-->
  <section class="home-section">
    <!-- nav tool bar top-->
   

    <!--end of nav tool bar top-->




   


 <!-- Container fluid Dashboard-->
 <div class="container-fluid">
   <!-- card shadow-->
  <div class="card-shadow" style="margin-top: 12px;">


     <!--Stock room Card header-->
     <div class="card-header py-3" style="background-color:#ccae90;margin-bottom:3%; margin-top:3%; border-radius:5px;">
          <span style="font-size: 20px; color:white;">Stockroom </span> 
        <br><span style="font-size:11px;color:white;margin-bottom:-3px;">Logged In as <?php echo $fullname;?></span> 
      </div>

    <!-- Stock room Card body-->
      <div class="card-body" style="border-radius:5px;border:1px solid #ededed;" >
          <!-- Stockroom tabs -->
          <ul class="nav nav-tabs nav-justified" id="tabby" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" href="#stock" id="stck" role="tab" data-toggle="tab" onclick="stockBttm()"><i class='bx bx-box' id="s-i"></i><br><p id="s-p">Stock</p></a>
            </li>
            
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#category"  id="cat" role="tab" data-toggle="tab" onclick="catBttm()"><i class='bx bx-category' id="c-i"></i><br><p id="c-p">Category</p></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#unit" id="unt" role="tab" data-toggle="tab" onclick="unitBttm()"><i class='bx bx-collection' id="u-i"></i><br><p id="u-p">Unit</p></a>
            </li>
          </ul>
        
          <!-- stock room tabs end-->


          <!--Tab content for stocks -->
          <div class="tab-content">
            
            
              <br><br>
  <!-- ---------------------------------Stock Tab pane-------------------------------- -->
            <!-- Stock Tab pane-->
            <div id="stock" class="tab-pane active" role="tabpanel">
                   <!-- Nav tabs -->

                        <ul class="nav nav-tabs nav-justified" id="inside" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a class="nav-link active" href="#add_stock" id="addstock" role="tab" data-toggle="tab" onclick="AddStockBttm()"><i class='bx bx-box' id="a-i"></i><br><p id="a-p">Add Stock</p></a>
                          </li>
                          
                          <li class="nav-item" role="presentation">
                            <a class="nav-link" href="#stock_out"  id="stockout" role="tab" data-toggle="tab" onclick="StockOutBttm()"><i class='bx bx-category' id="v-i"></i><br><p id="v-p">Stock Out</p></a>
                          </li>
                        </ul>

                <!--Add stock content-->
                  <div class="tab-content">
               

                          <!-- Add stock pane-->
                              <div id="add_stock" class="tab-pane active" role="tabpanel">
                              <h4>Add Stock</h4>

                                    <!--First row-->
                                  <div class="row" >

                              <!-- first column-->
                                <div class="col" style="background-color:white; width:10px;">
                                <form class="addstock" method = "post" enctype="multipart/form-data">

                                <div class="col-lg-6">
                                              <div class="form-group">
                                               
                                                <input type='file' id="imgInp" name="imgInp" style="display:none" />
                                                <!-- preview image here-->
                                                <img id="addpho" style= "object-fit:cover;" src="image/load.png" 
                                                ondrop="drop(event)" 
                                                alt="Product Image" height="200px" width="100%" />                                               
                                              </div>
                                            </div>
                                       



                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Stock Name:</label>
                                                <input type='text' name="gen"
                                                  id='gen' class='form-control'
                                                  placeholder='Stock Name'
                                                  onchange="GetDetail(this.value)" value="">
                                                <span id="gen_result"></span>
                                              </div>
                                            </div>
                                       
                                        
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Brand Name:</label>
                                                <input type="text" name="brand"
                                                  id="brand" class="form-control"
                                                  placeholder= 'Brand Name'
                                                  value="">
                                              </div>
                                            </div>
                                     
                                       
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Description:</label>
                                                <input type="text" name="description"
                                                  id="description" class="form-control"
                                                  placeholder= 'Description'
                                                  value="">
                                              </div>
                                              </div>
                                            
                                        
                                           
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Quantity:</label>
                                                <input type="number" name="quantity"
                                                  id="quantity" min="0" class="form-control"
                                                  
                                                  value="" >
                                              </div>
                                            </div>
                                       
                                            
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Unit:</label>
                                                <input type="text" name="unit"
                                                  id="unit" class="form-control"
                                                  placeholder='Unit'
                                                  value="">
                                              </div>
                                            </div>
                             
                                             
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Unit Price:</label>
                                                <input type="number" name="unit_price"
                                                  id="unit_price" class="form-control" min="0" step=".001"
                                                  placeholder='Unit Price'  
                                                  value="">
                                              </div>
                                            </div>
                                        
                                     
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Total Cost:</label>
                                                <input type="text" name="total_cost"
                                                  id="total_cost" class="form-control" 
                                                  placeholder='Unit Price'
                                                  value="" readonly>
                                              </div>
                                            </div>
                                      

                                    
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Date Arrive:</label>
                                                <input type="date" name="date_arrive"
                                                  id="date_arrive" class="form-control"
                                                  placeholder='Date Arrive'
                                                  value="">
                                              </div>
                                            </div>
                                     

                                        
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label>Inventory Type:</label>
                                                <input type="text" name="typeid"
                                                  id="typeid" class="form-control"
                                                  placeholder='Inventory Type'
                                                  value="">
                                              </div>
                                            </div>
                                     

                                         
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                
                                                
                                                  </form>
                                              </div>
                                            </div>
                                        
                                      



                                </div>
                                <!-- first column end-->

                                <!-- second column-->
                                <div class="col" style="background-color:white; margin-left: -30%;">
                                <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
                                <form method="post">
                                <table class="table" style="margin-top: 3%;">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th>Product Image</th>
                                      <th>Product Details</th>
                                      <th>Quantity</th>
                                      <th>Unit Cost</th>
                                      <th>Total Price</th>
                                      <th>Date Arrived</th>
                                      <th>Input Date</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
                include('connection.php');
               
                
               
                $query=mysqli_query($conn,"SELECT * FROM stocks ORDER BY date_arrived DESC");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>
                                   
                                   <tr>

                                    <td><input type="checkbox"></td>
                                    <td><img src="<?php echo $row['photo']; ?>" style="object-fit:cover;" width="100px" height="100px"></td>
                                    <td>
                                    <input type="hidden" value="<?php echo $row['id'];?>">
                                    <input type="hidden" value="<?php echo $row['stock_name'];?>">
                                    <input type="hidden" value="<?php echo $row['brand'];?>">
                                    <input type="hidden" value="<?php echo $row['description'];?>">
                                    <input type="hidden" value="<?php echo $row['quantity'];?>">
                                    <input type="hidden" value="<?php echo $row['unit_price'];?>">
                                    <input type="hidden" value="<?php echo $row['total_price'];?>">
                                    <input type="hidden" value="<?php echo $row['date_arrived'];?>">
                                    <input type="hidden" value="<?php echo $row['input_date'];?>">
                                      <b><?php echo $row['stock_name'];?></b><br> <?php echo $row['brand'];?> <?php echo $row['description'];?></td>

                                    
                                    <td><?php echo $row['quantity'];?> <?php echo $row['unit'];?> </td>
                                    <td><?php echo $row['unit_price'];?></td>
                                    <td><?php echo $row['total_price'];?></td>
                                    <td><?php echo $row['date_arrived'];?></td>
                                    <td><?php echo $row['input_date'];?>
                                    <div class="ico">
                                             
                                             <a href="a-Delstock.php?id=<?php echo $row['id'];?>"><i class='bx bx-trash-alt' title="delete"></i></a>
                                            
                                             <button type="button" data-toggle="modal" data-target="#"><i class='bx bx-info-circle' title="information"></i></button>
                                             <button type="button"><i class='bx bx-history' title="history"></i></button>
                                             </div></td>




                                    </tr>
               
                                    <?php
                 
                     }

                  ?>

                                  </tbody>
                                  </table>
                    </form>
                                    




                                </div>
                                <!-- end of second column-->
                              </div>
                              <!-- first row end-->



                              </div>
                          <!-- End add stock pane-->
                    
                          <!--Stock out pane -->
                              <div id="stock_out" class="tab-pane " role="tabpanel">
                                <h1>Stock Out</h1>

                              </div>
                          <!-- end stock out pane -->
               
                  </div>
              <!--end stock content -->
            </div>
           <!--End Stock tab pane-->

       
        <!--end tab content for stocks -->
                          
                                 
<!-- --------------------------------- End Stock Tab pane-------------------------------- -->
                        

            <!-- Category Tab pane-->
            <div id="category" class="tab-pane" role="tabpanel">
              <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
             <h2>Category</h2>
            </div>



            <!-- Unit Tab pane-->
            <div id="unit" class="tab-pane" role="tabpanel">
                <!--search bar in manage items tab pane-->
                <input type="text" class="searchbar" id="search_stock"  placeholder="Search..">
                <h2>Unit tab pane</h2>
                
              
            </div>
         
        
    <!--End user account card-->

  
  
  </div>
   </div>
    
  </div>
 

 
  <!--End container fluid dashboard-->
            
  </section>

 <!-- script for tabs-->
 
 <script src="assets/js/script.js"></script>
 <script src="assets/bootstrap/js/stocktab.js"></script>
 <script src = "assets/bootstrap/js/border.js"></script>
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>
 <script src = "assets/bootstrap/js/loader.js"></script>

 <script type="text/javascript">
$("#brand").keyup(function () {

  var brand = $("#brand").val();
  if ( brand.length > 0 )
  {
    $("#brand").css("border-color","green");
  }
  else{
    $("#brand").css("border-color","grey");
  }
});

$("#gen").keyup(function () {

var gen = $("#gen").val();
if ( gen.length > 0 )
{
  $("#gen").css("border-color","green");
}
else{
  $("#gen").css("border-color","grey");
}
});

$("#unit").change(function () {

var unit = $("#unit").val();
if ( unit.length > 0 )
{
  $("#unit").css("border-color","green");
}
else{
  $("#unit").css("border-color","grey");
}
});
 
 </script>


<script>
        // onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("unit").value = "";
				document.getElementById("typeid").value = "";
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("unit").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"typeid").value = myObj[1];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "autofill.php?gen=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}


	</script>


<script type="text/javascript">
  $(function() {
     $( "#gen" ).autocomplete({
       source: 'autocomplete.php',
     });
  });
</script>


<script type="text/javascript">
  $(function() {
     $( "#brand" ).autocomplete({
       source: 'brandcomplete.php',
     });
  });
</script>


<script type="text/javascript">
$("#quantity,#unit_price").keyup(function () {
    $('#total_cost').val($('#quantity').val() * $('#unit_price').val());
});
 
 </script>

 <script type="text/javascript">
	 	document.querySelectorAll('input').forEach((input) => {
	  input.addEventListener('blur', function() {
	    this.classList.toggle('green', this.value.length > 0);
	  });
	});
 </script>

<!--
<script type="text/javascript">
$("#quantity,#unit_price").keyup(function () {
    $('#total_cost').val($('#quantity').val() * $('#unit_price').val());
});
 
 </script>
-->

 <script type="text/javascript">
	 	document.querySelectorAll('input').forEach((input) => {
	  input.addEventListener('blur', function() {
	    this.classList.toggle('green', this.value.length > 0);
	  });
	});
 </script>


 
</body>
</html>
