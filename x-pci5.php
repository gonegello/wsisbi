

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

?>


    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title></title>

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

/* CSS */
.line-button {
  background-color: #FFFFFF;
  border: 0;
  margin-right:1%;
  border-radius: .5rem;
  box-sizing: border-box;
  color: #111827;
  font-size: .875rem;
  font-weight: 600;
  line-height: 1.25rem;
  padding: .75rem 1rem;
  text-align: center;
  text-decoration: none #D1D5DB solid;
  text-decoration-thickness: auto;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.line-button:hover {
  background-color: rgb(249,250,251);
}

.line-button:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.line-button:focus-visible {
  box-shadow: none;
}


table {
  border-collapse: collapse;
  width: 100%;
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

        table{
           

        }
        #search_stock{
            border:1px solid #ededed;
            border-radius:50px;
        }
    </style>
 
    <body style="background:whitesmoke;">
    <?php 
    include "a-sidebar.php"; 
    
    ?>
   

    <section class="home-section">
    <div class="container-fluid" style="background-color:whitesmoke;">
    <div class="card-shadow">
    
                                                
<?php 
          //if pci is successful
          if(isset($_SESSION['addedpci']))
             {
      ?>
              <div class="alert alert-success alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Success!</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"> <i class='bx bx-check'></i></h1>
              </div>
              </div><hr><i><?=$_SESSION['addedpci'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['addedpci']);
            }
      ?>


<?php 
          //if pci is unsuccessful
          if(isset($_SESSION['unsuccessfull']))
             {
      ?>
              <div class="alert alert-danger alert-dismissible fade show" id="div-success" role="alert" 
              style="margin-top:3%;margin-left:10%;margin-right:10%;">
              <div class="row">
              <div class="col">
              <h1>Error!</h1>
              </div>
              <div class="col">
              <h1 style="float:right;"></h1>
              </div>
              </div><hr><i><?=$_SESSION['unsuccessfull'];?></i>
              </div>
             
      <?php 
          unset($_SESSION['unsuccessfull']);
            }
      ?>


 



<div class="row" style="margin-left:10%;margin-right:10%;margin-top:2%;position:-webkit-sticky;position:sticky;top:0;">
                    
                    <a href="x-pci.php?#c1" class="line-button" role="button" > Cluster 01</a>
                    <a href="x-pci5.php?#c5" class="line-button" role="button" style = "background:#E6A519;color:white;"> Cluster 05 <i class='bx bx-check'></i></a>
                    <a href="x-pci7.php?#c7" class="line-button" role="button"> Cluster 07 </a>
                
                    
                </div>




                
<div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">
     
     
     <div class="card-body" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:royalblue;">
         <div class="row" style="margin-top:4%;">
           <div class="col" style="text-align:center;color:white;">
           <i class='bx bx-pen' style="padding:12px 12px;border-radius:50%;font-size:100px;"></i><br>
           <h4 style="color:white;">Acceptance Of Supplies</h4><span style="color:white;">Article Input</span>
           </div>
         </div>
        <div class="row" style="margin-top:4%;">
          <div class="col" style="text-align:center;">
          <a href="#">Ready for IAR</a>
          </div>
           
        </div>
        </div>


        <div class="card-body" style="background:whitesmoke;" id="f05">
        <div class="row">
          <div class="col">
              <h5 style="">Article Input</h5>
   
    </div>
          <div class="col" style="text-align:right;">
          <?php 
          //if an item is sent to archive
          if(isset($_SESSION['addedpci']))
             {
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['addedpci'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['addedpci']);
            }
      ?>

          </div>
        </div>
       
        </div>
        <div class="card-body">

        <form  action="addpci.php" class="addstock" method = "post">


<div class="row">
    <div class="col">
    <label>Fund Cluster:</label><br>
        <select class = "selectme" name="fund_c" id="fund_c" onchange="GetFundID(this.value)">
        <?php echo $fund_c;?>
    </select>

    </div>

    <div class="col">

    <label>Article:</label><br>
            <input type="text" name="article" style="font-style:italic;color:#5DBB63;"
            placeholder="Article" id="article" value=""
            required/>

    </div>


    <div class="col">

    
    <label>Description:</label><br>
            <input type="text" name="descr" style="font-style:italic;color:#5DBB63;"
            placeholder="Description" id="descr" value=""
            required/>


    </div>
</div>


     

        <div class="row" style="margin-top:2%;">

        <div class="col">

        <label>Stock Number:</label><br>
        <input type="text" name="stock_num" id="stock_num" placeholder="Stock Number">
    
           
        </div>

        <div class="col">
        <label>Unit of Measure:</label><br>
            <input type="text" name="unit_meas" 
            placeholder="Unit of Measure" id="unit_meas" value="" required/>
       
        </div>

        <div class="col">
        <label>Unit Value:</label><br>
        <input type="number" name="unit_val"
        id="unit_val" placeholder="Unit Cost"
        min="0" step=".01" value="" required/>   
           
        </div>


    </div><!-- second row inside the form-->



    <div class="row" style="margin-top:2%;">

        <div class="col">
        <label>Balance Per Card :</label><br>
            <input type="number" name="bpc" value=""
            id = "bpc" placeholder="Balance Per Card">
           
        </div>

        <div class="col">
        <label>On Hand Per Count :</label><br>
            <input type="number" name="ohpc" value=""
            id = "ohpc" placeholder="On Hand Per Count">
            
        </div>

        <div class="col">
        <input type="hidden" name="fund_id" id="fund_id" value="1" placeholder="Fund ID"><!--fund cluster ID -->
            



        </div>
        
    </div><!--third row inside the form-->

    <div class="row">
        <div class="col">

        </div>
        <div class="col">
        <input type="submit" name="save" id="save" value="Save Item">
        </div>
    </div>
    </form>
        </div>


        

        <div class="card-body" style="background:whitesmoke;" id="c5">
        <div class="row">
          <div class="col">
              <h5 style="">Cluster 05</h5>
              <span><a href="x-pc.php?fc=05&fc_id=2"><i class='bx bx-file'></i>GENERATE REPORT</a></span>
   
    </div>
          <div class="col">
          <input type="text" name="search_stock5" id="search_stock5" style="background:white;" placeholder="Search Stock">
          </div>
        </div>
       
        </div>
        <div class="card-body">
            
        <table  id="table-data" >
                    <tr>
                    <th>Article</th>
                        <th>Description</th>
                        <th>Stock Number</th>
                        <th>Unit of Measure</th>
                        <th>Unit Value</th>
                        <th>Balance Per Card</th>
                        <th>On Hand Per Count</th>
                        
                    </tr>

                    <?php
                include('connection.php');
                $fc_id = "2";
                $i = 0;
                $query=mysqli_query($conn,"SELECT * FROM fc WHERE cluster_id = $fc_id  ORDER BY stock_num ASC LIMIT 20");
                while($row=mysqli_fetch_array($query))
                {
                 $i = $i + 1;
                    ?>

                    <tr>
                      <td><?php echo $i;?>).</td>
                       <td><?php echo $row['article'];?></td>
                       <td><?php echo $row['descr'];?></td>
                       <td><?php echo $row['stock_num'];?></td>
                       <td><?php echo $row['unit_meas'];?></td>
                       <td><?php echo $row['unit_val'];?></td>
                       <td><?php echo $row['bpc'];?></td>
                       <td><?php echo $row['ohpc'];?></td>

                       

                

                    </tr>

                <?php
                }
                ?>

        </table>
        </div>



        </div>
        </div>
               




    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>
 

 <script>
     function GetDetails(str){
        if(str.length == 0){
            document.getElementById("unit").value = "";
            document.getElementById("sn_id").value = "";
            document.getElementById("stock_num").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("unit").value = myObj[0];
                    document.getElementById("sn_id").value = myObj[1];
                    document.getElementById("stock_num").value = myObj[2];


                }
            };

            xmlhttp.open("GET", "fill.php?item=" + str, true);
            xmlhttp.send();

        }
     }
 </script>

<script>
     function GetFundID(str){
        if(str.length == 0){
            document.getElementById("fund_id").value = "";
         //   document.getElementById("sendtem").value = "";
            return;
        }
        else{

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
            
                if (this.readyState == 4 && this.status == 200){
                    
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("fund_id").value = myObj[0];

                   // document.getElementById("sendtem").value = myObj[1];


                }
            };

            xmlhttp.open("GET", "fillfundID.php?fund=" + str, true);
            xmlhttp.send();

        }
     }
 </script>
 



 <script type="text/javascript">
        $(document).ready(function(){
            $("#search_stock5").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'search-xpci5.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#table-data").html(response);
                    }
                });
            });
        });
  </script>




</body>
</html>
