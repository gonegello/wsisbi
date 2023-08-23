

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
    <title>Article</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  <style>
      th,td{
          border:1px solid #ededed;
          padding:10px;
      }
      #search_stockk{
          border:1px solid #A3A3FF;
          width:50%;
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

         
    <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
    <div class="col">
    <h1 style="color:grey;"><i class="bx bx-notepad"></i> Article</h1>
    </div>

    <div class="col" style="text-align:right;margin-top:2%;">
        <a href="x-full-ris.php"><span style="color:grey;"><i class="bx bx-cart"></i> RIS Stockroom</span></a>
    </div>
</div>

<div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 8px 0px;padding:0;border-radius:10px;">
     <div class="col" style="padding:0;">

     
     
     
     <div class="card-body" id="dash" style="border-bottom:1px solid #ededed;border-top-right-radius:10px;border-top-left-radius:10px;background:#A3A3FF;">
        <div class="row" style="">
        <div class="col" style="">
            <h5 style="color:white;"><i class="bx bx-notepad"></i><span> &nbsp; ARTICLE</span></h5>

          </div>
          <div class="col" style="text-align:right;">
          <a href="#f01" class="iar" style="text-decoration:none;">Add Article</a> | 
          <a href="#c1" class="iar" style="text-decoration:none;">Article List</a>
       






          </div>
           
        </div>
        </div>

        <div class="card-body" style="background:whitesmoke;" id="f01">
        <div class="row">
          <div class="col">
              <h5 style="color:grey;">Article Input</h5>
          
   
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
        id="unit_val" placeholder="Unit Value"
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
        <input type="submit" name="save" id="save" value="Save Article">
        </div>
    </div>
    </form>
        </div>


        

        <div class="card-body" style="background:whitesmoke;" id="c1">
        <div class="row">
          <div class="col">
              <h5 style="color:grey;">Article List</h5>
     
              <!--
              <span><a href="x-pc.php?fc=01&fc_id=1"><i class='bx bx-file'></i>GENERATE REPORT</a></span>
        -->
   
    </div>
    



    <div class="col" style="text-align:right;">
            <a href="#"><i class="bx bx-folder"></i> PCI Reports</a>
    </div>
          
        </div>
       
        </div>
        <div class="card-body" id="list">
            <div class="row">
            <div class="col">
                <label for ="search_stock">Search Article:</label><br>
                <input type="text" id="search_stockk" onkeyup="myFunctionn()" style="background:white;" placeholder="Find by article,description,stock number, unit..">
          </div>
            </div>
        </div>







        <div class="card-body" style="border-bottom-right-radius:10px;border-bottom-left-radius:10px;">

        <?php 
          //if an item is sent to archive
          if(isset($_SESSION['updatedpci']))
             {  
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['updatedpci'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['updatedpci']);
            }
      ?>

<?php 
          //if an item is sent to archive
          if(isset($_SESSION['deletedpci']))
             {  
      ?>
             
            
            
    <i><span style="background:#C8ECC7;color:rgb(40,40,40);padding:8px 8px;border-radius:5px;font-size:13px;
     box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);"><?=$_SESSION['deletedpci'];?><i class='bx bx-check'></i><span>
        
             
      <?php 
          unset($_SESSION['deletedpci']);
            }
      ?>



        <table id="table">
                    <tr>
                        <th></th>
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
               // $fc_id = "1";
                $i = 0;
                $query=mysqli_query($conn,"SELECT * FROM fc ORDER BY stock_num");
                while($row=mysqli_fetch_array($query))
                {
                 $i = $i + 1;
                 $art = $row['article'];
                    ?>

                    <tr>
                        <td id="<?php echo $row['ar_id'];?>"><?php echo $row['ar_id'];?>.</td>
                       <td><?php echo $row['article'];?></td>
                       <td><?php echo $row['descr'];?></td>
                       <td><?php echo $row['stock_num'];?></td>
                       <td><?php echo $row['unit_meas'];?></td>
                       <td><?php echo $row['unit_val'];?></td>
                       <td><?php echo $row['bpc'];?></td>
                       <td><?php echo $row['ohpc'];?></td>
                       <td width="8%">
                       <a href="x-edit-art.php?ar_id=<?php echo $row['ar_id'];?>" title="Update <?php echo $row['article']; echo " "; echo $row['descr'];?>?"><i class='bx bx-edit' style="font-size:20px;"></i></a>
                        <a onclick = "return confirm('Are you sure you want to delete <?php echo $art;?> article?')" href="delete-article.php?ar_id=<?php echo $row['ar_id'];?>&article=<?php echo $row['article'];?>" title="Delete <?php echo $row['article']; echo " "; echo $row['descr'];?>?"><i class='bx bx-trash' style="font-size:20px;"></i></a>

                    </td>

                       

                

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
            
    <?php
    include "bottom.php";

    ?>
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
 
 <script>

function myFunctionn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search_stockk");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td");
  if(td.length > 0){ // to avoid th
 if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1  || td[2].innerHTML.toUpperCase().indexOf(filter) > -1 || td[3].innerHTML.toUpperCase().indexOf(filter) > -1 || td[4].innerHTML.toUpperCase().indexOf(filter) > -1 )   {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }

}
}
}
</script>


<!--
 <script type="text/javascript">
        $(document).ready(function(){
            $("#search_stock").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'search-xpci.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
                        $("#table-data").html(response);
                    }
                });
            });
        });
  </script>
    -->





</body>
</html>
