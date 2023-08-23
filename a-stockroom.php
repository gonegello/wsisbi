

<?php
    include "a-session.php";  
    include "a-count.php";     
    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation

?>


<?php
//give value to the next stock id for stock_pn
include "connection.php";
$next = mysqli_query($conn, "select * from `stocks` order by s_id desc limit 1");
while($rw = mysqli_fetch_array($next))
{
    //find the last id
    $last_stock_id = $rw['s_id'];

}
    //convert last id to int
    $convert_lsi = intval($last_stock_id);
    //add 1 to predict the next id number
    $next_stock_id = $convert_lsi + 1;


    //university abb
    $abb = mysqli_query($conn, "select *from `university` order by iduniv desc limit 1");
    while ($row = mysqli_fetch_array($abb))
    {
        $uni_ab = $row['abb'];
    }


?>

                       
<?php
include "property_number.php";
include "stock_number.php";

?>





    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>Stock Room</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
    #gen_result{
        
        
    }
    .crud-link{
        font-size:20px;
        padding:8px 11px;
        
       
    }
    .crud-link:hover{
        color:green;
        border-radius:50px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
    }
    #search{
        margin-top:1%;
        border-radius:50px;
        width:80%;
        float:right;
    }

    [data-title]:hover:after {
            visibility: visible;
        }
          
        [data-title]:after {
            content: attr(data-title);
            background-color: rgb(40,40,40);
            opacity:0.9;
            color: white;
            font-size: 15px;
            position:absolute;
            padding: 4px 8px 4px 8px;
            visibility: hidden;
            border-radius:3px;
            box-shadow: 1px 1px 3px #222222;
        }

    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    include "a-overview.php";
    include 'modaladd_gen.php';
    include 'modaladd_category.php';
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
     
        <div class="row">
           
            <div class="col">
                <?php require_once "quicktool.php"; ?>
                
                <div id="additemdiv">
                
                <div class="card-body" style="margin-left:10%;margin-right:10%;margin-top:2%;border-radius:10px;border:1px solid #ededed;">
                <form  action="addstock.php" class="addstock" method = "post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col">
                        <h4>Add Item</h4>
                    </div>
                    <div class="col">
                    <button type="button" id="add" title="close?"><i class='bx bx-x' style="font-size:20px;"></i></button>
                    </div>

                </div>
                
                    <div class="row" style="margin-top:2%;">

                        <div class="col">
                        <input type='file' id="imgInp" name="imgInp" style="display:none" />
                        <!-- preview image here-->
                        <img id="addpho" style= "object-fit:cover;border:1px solid #ededed;border-radius:5px;" src="image/add.png" 
                        alt="Product Image" height="200px" width="100%" />  
                        </div>

                        <div class="col"><!-- -->
                        <label>Category:</label><br>
                        <input type="text" name="category" id="category" placeholder="Category"
                        onchange = "GetCategoryId(this.value)">
                        <span id="cat_result" style="display:none;"></span>
                        
                        <!--brand name-->
                        <label style="margin-top:5%;">Brand Name:</label>
                        <input type="text" name="brand" id = "brand" placeholder="Brand"><br>
                        </div>

                        <div class="col">
                        <!--stockname-->
                        <label>Stockname:</label><br>
                        <input type="text" name="gen" id ='gen' placeholder="Stock Name"
                        onchange= "GetDetail(this.value)" value="">
                        <span id="gen_result" style="background:white;">
                        
                        
                    </span><br>
                        <!--description-->
                        <label style="margin-top:5%;">Description:</label><br>
                        <input type="text" name="description" id="description"
                        placeholder="Description" value="">
                        </div>


                        </div><!-- first row inside the form-->
                        

                        <div class="row" style="margin-top:1%;">
                        
                        
                        <div class="col">
                        <!-- quantity -->
                            <label>Quantity:</label><br>
                            <input type="number" name="quantity" 
                            placeholder="Quantity" min="0" id="quantity" value="" required/>
                        </div>

                        <div class="col">
                        <!-- Unit -->
                            <label>Unit:</label><br>
                            <input type="text" name="unit"
                            id="unit" placeholder="Unit" value="" required/>
                        </div>




                        <div class="col">
                        <!-- unit price-->
                        <label>Unit Price:</label><br>
                        <input type="number" name="unit_price"
                        id="unit_price" placeholder="Unit Cost"
                        min="0" step=".01" value="" required/>
                        
                        </div>


                    </div><!-- second row inside the form-->

                    <div class="row" style="margin-top:1%;">
                        <div class="col">
                            <!--total cost -->
                            <label>Total Cost:</label>
                            <input type="number" name="total_cost"
                            id="total_cost" step=".01" placeholder="Total Cost" value=""
                            readonly>
                        </div>

                        <div class="col">
                            <!-- Date arrived -->
                            <label>Date Arrived:</label><br>
                            <input type="date" name="date_arrive" value=""
                            id = "date_arrive" placeholder="Date Arrived">

                        </div>
                        <div class="col">
                            <!--Officer -->
                            <label>Officer ID:</label><br>
                            <input type="text" name="officer_id" id="officer_id"
                             value="<?php echo $id;?>" readonly>
                            <!--<button type="button" id="add"><i class='bx bx-plus' style="font-size:23px;"></i></button>-->
                            <input type="hidden" name="typeid" id="typeid" value="">

                            <!--Category Id -->
                            <input type ="hidden" name="category_id" id ="category_id">
                            <input type ="hidden" name="sscon" id ="sscon" value="0">

                            <!--for auto generation stocks -->
                            <input type = "hidden" name="s_id" id="s_id" placeholder="s_id" value="<?php echo $next_stock_id;?>">
                            <input type = "hidden"  name="p_code" id="p_code" value="<?php echo $covertedpcode;?>">
                            <input type = "hidden"  name="s_code" id="s_code" value="<?php echo $converted_sn;?>">
                            <input type = "hidden"  name="abb" id="abb" value="<?php echo $uni_ab;?>">




                            



                            

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

                        
                </div><!-- first card body-->
                </div>

                <?php 
          //if an item is sent to archive
          if(isset($_SESSION['archived']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Saved To Archive</h1>
              </div>
              <div class="col">

              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              
              </div>
              </div><hr><i><?=$_SESSION['archived'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['archived']);
            }
      ?>

<?php 
          //if an item is sent to archive
          if(isset($_SESSION['addedStock']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Item Added !</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['addedStock'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['addedStock']);
            }
      ?>





                <div class="card-body" style="margin-left:10%;margin-right:10%;margin-top:2%;border-radius:none;border:1px solid #ededed;
                border-top-left-radius:10px;border-top-right-radius:10px;border-bottom:none;">
                
                <div class="row" style="">

                    <div class="col" >
                        <h4>Stockroom
                        </h4><br><a href="a-item-archives.php" title="Archived items are found here.">Archived Items</a>
                    </div>
                    <div class="col">
                        <input type="text" id="search" placeholder="Search Item..">
                    </div>
                </div>
        </div>


        <?php
      if ($active_stocks == 0){
        echo '<div class="card-body" style="border:1px solid #ededed;margin-left:10%;margin-right:10%;border-bottom-right-radius:10px;
        border-bottom-left-radius:10px;border-top:none;">
        <div class="row">
        <div class="col">
        </div>
        <div class="col" style="text-align:center;">
        <img src="image/empty.jpg" style ="oject-fit:cover;width:300px;margin-top:10%;"><br><br>
        <br><span style="color:grey;">No Items</span><br><br><br>
        </div>
        <div class="col">
        </div>
        </div>
        
        </div>';
      }

      ?>

                
                <?php
                include('connection.php');
                $condition = "0";
                $query=mysqli_query($conn,"SELECT * FROM stocks JOIN category on category.idcategory = stocks.category_id join admin on admin.id = stocks.officer  WHERE sscon = $condition  ORDER BY date_arrived DESC");
                while($row=mysqli_fetch_array($query))
                {
                 
                    ?>
                
                    
                <div class="card-body" style="border:1px solid #ededed;margin-right:10%;margin-left:10%;">
                
                        <div class="row">
                        <div class = "col">
                        <img src="<?php echo $row['photo']; ?>" style="object-fit:cover;" width="100px" height="100px">
                        </div>



                        <div class="col">
                        <span class="below"><?php echo $row['stock_name'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">stockname</span>
                        
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['brand'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">brand</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['description'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">description</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['quantity'];?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">quantity</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['unit']?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">unit</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['unit_price']?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">unit_price</span>
                        </div>
                        <div class="col">
                        <span class="below"><?php echo $row['total_price']?></span><br>
                        <span style="font-style:italic;color:grey;font-size:10px;">total price</span>
                        </div>
                    

                        <?php 
                        if($row['status'] == "available"){
                            echo '<div class="col">
                            <span class="below" style="font-size:13px;padding:4px 6px;border-radius:
                            5px;color:white;background:#50C878;">'.$row['status'].'</span><br>
                            <span style="font-style:italic;color:grey;font-size:10px;">status</span>
                            </div>';
                        }
                        else{
                            echo '<div class="col">
                            <span class="below" style="font-size:13px;padding:4px 6px;border-radius:
                            5px;color:white;background:#CD5C5C;">'.$row['status'].'</span><br>
                            <span style="font-style:italic;color:grey;font-size:10px;">status</span>
                            </div>';
                        }
                        ?>
                        
                        <div class="col">
                        <!---->
                        <a href="#" class="crud-link" data-title="View Item?" data-toggle="modal" data-target="#stockinfo<?=$row['s_id'];?>"><i class='bx bx-info-circle'></i></a>
                        <a href="#" id="archive" class="crud-link" data-title="Save to Archive?" data-toggle="modal" data-target="#stockArchive<?=$row['s_id'];?>"><i class='bx bx-archive-in'></i></a>
                        <a href="#" class="crud-link" data-title ="Update Item? "data-toggle="modal" data-target="#stockedit<?=$row['s_id'];?>"><i class='bx bxs-edit'></i></a>
                        
                        <form method="post" action="generate.php">
                        <input type="hidden" value="<?php echo $row['s_id'];?>" name="s_id">
                        <input type = "hidden" value="<?php echo $row['in_quantity'];?>" name="in_quantity">
                        <input type = "hidden" value="<?php echo $covertedpcode;?>" name="p_code">
                        
                        <?php
                        /*
                        if($row['int_typeid'] == "1" || $row['int_typeid'] == "3")
                        {

                        echo '<button type="submit" name="generate">generate</button>';
                        
                        }*/

                        ?>
                        
                    </form>
                        </div>
                    

                        
                     </div>
                
                    

                    </div>
                

                <?php 
                        include 'modal_a_stockroomedit.php';
                        include 'modal_a_stockroominfo.php';
                        include 'modal_archive.php';
                      

                }
                ?>



          
        
        
            </div><!-- first col-->

            

        </div><!--row container end-->


        



    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>
 <!--all autocomplete inputs in stockroom -->
 <script src = "assets/js/autocoms.js"></script>
 <!-- auto fill stockname unit type id-->
<script>
     // onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event


		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("unit").value = "";
				document.getElementById("typeid").value = "";
                //document.getElementById("addgen").style.display = "flex";
                
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

<script>


function GetCategoryId(str) {
			if (str.length == 0) {
				document.getElementById("category_id").value = "";
			
                //document.getElementById("addgen").style.display = "flex";
                
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
					
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"category_id").value = myObj[0];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "autofillcategory.php?category=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}


</script>




<script>
    const hideadd_div = document.getElementById("additemdiv");
    const c_btn = document.getElementById("add");

    c_btn.onclick = function(){
        hideadd_div.style.display = "none";
    }

</script>

<script>
    const hideadd_div1 = document.getElementById("additemdiv");
    const openBtn = document.getElementById("additems");

    hideadd_div1.style.display = "none"
    openBtn.onclick = function(){
        hideadd_div.style.display = "block";
    }

</script>
<script>
$('#archivein').click(function() {
    $.ajax({
        url: 'archive_in.php',
        type: 'POST',
        data: {
            //email: 'email@example.com',
            //message: 'hello world!'
        },
       // success: function(msg) {
          //  alert('Email Sent');
        }               
    });
});

</script>




</body>
</html>
