

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";
    


    $ar_id = $_GET['ar_id'];

    
    $query = mysqli_query($conn, "select *from `fc` where ar_id = $ar_id");
    while($row=mysqli_fetch_array($query)){

        $article = $row['article'];
        $descr = $row['descr'];
        $stock_num = $row['stock_num'];
        $unit_meas = $row['unit_meas'];
        $unit_val = $row['unit_val'];
        $bpc = $row['bpc'];
        $ohpc = $row['ohpc'];




    }
    

?>


    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <title>Edit Article</title>

    <?php require_once "a-linkstyle.php";
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/a-stockroom.css">
    <link rel="stylesheet" href="assets/bootstrap/css/iar.css">

    <script src="assets/bootstrap/js/jquery-ui.min.js"></script>
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <style>
        a:hover{
            font-size:32px;
        }

    </style>
  
 
    <body style="background:whitesmoke;">
        <div class="row"style="margin-right:10%;margin-left:10%;margin-top:2%;">
           <div class="col">
            <a href="x-pci.php#list" style="background:white;font-size:30px;padding:5px 11px;color:grey;border-radius:50%;">
            <i class='bx bx-left-arrow-alt'></i></a>
           </div>
           <div class="col" style="margin-left:-90%;">
           <h1 style="color:grey;"><i class="bx bx-notepad"></i> Article <span style = "font-size:20px;"> / Update <?php echo $article;?></span></h1>
           </div>
        </div>
    <div class="row" style="margin-top:2%;margin-left:10%;margin-right:10%;">
        <div class="col">

            <div class="card-body" style="background:#A3A3FF;border-top-left-radius:10px;border-top-right-radius:10px;">
            <h5 style="color:white;">Update Article <?php echo $article;?></h5>

            </div>
        <div class="card-body">

<form  action="update-art.php" method="post">
  

<div class="row" style="margin-top:2%;">
<div class="col">
<label for = "fund_c">Fund Cluster:</label>
<select class = "selectme" name="fund_c" id="fund_c" onchange="GetFundID(this.value)">
<?php echo $fund_c;?>
</select>

</div>

<div class="col">

<label for = "article">Article:</label>
    <input type="text" name="article" style="font-style:italic;color:#5DBB63;"
    placeholder="Article" id="article" value="<?php echo $article;?>"
    required/>

</div>


<div class="col">


<label for="descr">Description:</label>
    <input type="text" name="descr" style="font-style:italic;color:#5DBB63;"
    placeholder="Description" id="descr" value="<?php echo $descr;?>"
    required/>


</div>
</div>




<div class="row" style="margin-top:2%;">

<div class="col">

<label for="stock_num">Stock Number:</label>
<input type="text" name="stock_num" id="stock_num" value="<?php echo $stock_num;?>" placeholder="Stock Number">

   
</div>

<div class="col">
<label for="unit_meas">Unit of Measure:</label>
    <input type="text" name="unit_meas" 
    placeholder="Unit of Measure" id="unit_meas" value="<?php echo $unit_meas;?>" required/>

</div>

<div class="col">
<label for="unit_val">Unit Value:</label>
<input type="number" name="unit_val"
id="unit_val" placeholder="Unit Cost"
min="0" step=".01" value="<?php echo $unit_val;?>" required/>   
   
</div>


</div><!-- second row inside the form-->



<div class="row" style="margin-top:2%;">

<div class="col">
<label for="bpc">Balance Per Card :</label>
    <input type="number" name="bpc" value="<?php echo $bpc;?>"
    id = "bpc" placeholder="Balance Per Card">
   
</div>

<div class="col">
<label for="ohpc">On Hand Per Count :</label>
    <input type="number" name="ohpc" value="<?php echo $ohpc;?>"
    id = "ohpc" placeholder="On Hand Per Count">
    
</div>

<div class="col">
<input type="hidden" name="fund_id" id="fund_id" value="1" placeholder="Fund ID"><!--fund cluster ID -->
<input type="hidden" name="ar_id" id="ar_id" value="<?php echo $ar_id;?>">
    



</div>

</div><!--third row inside the form-->

<div class="row">
<div class="col">

</div>
<div class="col">
<input type="submit" name="save" id="save" value="Update Article">
</div>
</div>
</form>
</div>
        </div>
    </div>





























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
 





</body>
</html>
