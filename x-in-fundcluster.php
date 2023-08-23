

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

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
    <title>Item Acceptance</title>s

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>

::-webkit-input-placeholder {
   font-style: italic;
   font-size:12px;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}

    select,input[type="text"],input[type="number"],input[type="date"]{
        background:transparent;
    width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  border-bottom:1px solid #ccc;
    border-radius:none;
  border-radius: 4px;
  box-sizing: border-box;
  outline:none;
  font-style:italic;
  color:#5DBB63;
  font-size:15px;
    
}

select:focus,input[type="text"]:focus,input[type="number"]:focus,input[type="date"]:focus{
    border-bottom:1px solid green;

}
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
          
                
                <div id="additemdiv">
                
                <div class="card-body" style="margin-left:10%;margin-right:10%;margin-top:2%;border-radius:10px;border:1px solid #ededed;">
                <form  action="#" class="addstock" method = "post" enctype="multipart/form-data">
                <div class="row" style="margin-bottom:2%;">

                    <div class="col">
                        <h5>Fund Cluster</h5>
                    </div>
                    <div class="col">
                   
                    </div>

                </div>



                <div class="row">

                <div class="col"><!-- -->
                        <label>Fund Cluster:</label><br>
                        <select class = "selectme" name="fund_c" id="fund_c">
                        <?php echo $fund_c;?>
                        </select>

                        </div>


                        <div class="col">
                        <!--stockname-->
                        <label>Item Type:</label><br>
                        <select name="type" id="type">
                        <?php echo $type_cat;?>
                        </select>  <br>
    </div>


                        <div class="col">
                              <!--brand name-->
                        <label style="margin-top:5%;">Article:</label>
                        <input type="text" name="article" id="article" placeholder="Item Name"><br>
                        </div>

                      

                        <div class="col">
                        <!-- unit price-->
                        <label>Unit Value:</label><br>
                        <input type="number" name="unit_value"
                        id="unit_value" placeholder="Unit Value"
                        min="0" step=".01" value="" required/>
                        </div>
                           

                         </div><!-- first row-->



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




               

            

        </div><!--row container end-->


        



    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>








</body>
</html>
