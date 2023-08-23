

<?php
    include "a-session.php";  
    include "a-count.php"; 
    include "select.php";

    $date = date("m-d-Y"); //date for code generation
    $year = date("Y-m-d"); //year for code generation
    date_default_timezone_set('Asia/Manila');

    
    

?>



                       
<?php
//include "property_number.php";
//include "stock_number.php";
include "x-ris-no.php";

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

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
td{
    font-style:italic;
}
#addcus{
    background:white;
    border:none;
    outline:none;
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

                    <?php require_once "tool-link.php";?>

   




                <div class="card-body" style="margin-left:5%;margin-right:5%;border-radius:10px;
                border-bottom-left-radius:0px;border-bottom-right-radius:0px;
                border:1px solid #ededed;border-top:0px;margin-top:2%;">
                <div class="row">

                <div class="col">
                <h2>Set Custodian</h2>
                <span>ICS & PAR</span>
                </div>

                <div class="col" style="text-align:right;font-size:40px;">
                
                <input type="text" placeholder="Search..">
                
                </div>




                </div>
                

                
               
                </div>

                <div class="card-body" style="margin-left:5%;margin-right:5%;border-radius:10px;
                border-top-left-radius:0px;border-top-right-radius:0px;
                border:1px solid #ededed;border-top:0px;margin-bottom:2%;">
                

        



                <table>
                    <tr>
                        <th></th>
                        <th>Item Details</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        
                        <th>PO No.</th>
                        <th>PO Date.</th>
                        <th>Action</th>
                    </tr>

                    <?php
                include('connection.php');
                $stat = "1";
                $query=mysqli_query($conn,"SELECT * FROM xicspar JOIN fund_c ON fund_c.fundc_id = xicspar.fc_id JOIN classification ON classification.classID = xicspar.class_id
                 WHERE stat = $stat AND xicspar.id_iar IS NOT NULL  ORDER BY idx DESC");
                while($row=mysqli_fetch_array($query))
                {
                    $stock_id = $row['idx'];
                    $req = "SELECT * FROM icspar_details WHERE x_id = $stock_id AND custodian IS NULL";

                    if($r = mysqli_query($conn,$req))
                    {
                        $numd =mysqli_num_rows($r);
                    }
                    ?>
                    
                    
                    <tr>
                       
                        <td><input type="checkbox" name="checkb"></td>
                        <td><?php echo $row['item_details'];?></td>
                        <td><?php echo $row['in_quan']; echo " "; echo $row['unit'];?></td>
                        <td>
                        <?php echo $numd; echo " Available";?>
                        </td>
                       
                        <td><?php echo $row['po_num'];?></td>
                        <td><?php echo $row['po_date'];?></td>
                        <td><a href="x-full-prop.php?idx=<?php echo $row['idx'];?>&item=<?php echo $row['item_details'];?>&num=<?php echo $numd;?>
                        &po_num=<?php echo $row['po_num'];?>&po_date=<?php echo $row['po_date'];?>">View</a></td>
                      

                

                    </tr>
                 

                <?php
              
                }
                ?>

        </table>

        </div>




               

            

        </div><!--row container end-->


        



    </div>
    </div>
            
  </section>



 <!-- sidebar script-->
 <script src="assets/js/script.js"></script>
 <!-- upload stock image-->
 <script src = "assets/bootstrap/js/stockroomphoto.js"></script>

 <script src = "assets/js/autocoms.js"></script>









</body>
</html>
