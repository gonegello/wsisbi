<?php require_once "a-session.php";
 include "gen_icsno.php";
?>

<?php 

// $idx = $_GET['idx'];
$sn_id = $_GET['sn_id'];



//COMPUTE Previous YEAR
//1.get the current year
$current_year = date("Y");
//2. convert the current year to int
$con_currenct_year = intval($current_year);

//3. Subtract 1 from Current Year
$last_year = $con_currenct_year - 1;

$str_last_year = strval($last_year);
$str_current_year = strval($current_year);

//  1. if last year bal > 0 or == 0
$lastbalance = mysqli_query($conn, "select * from `stock_card` where sn_id = $sn_id and s_year = '{$str_last_year}' order by id_st desc limit 1");
while($row=mysqli_fetch_array($lastbalance))
{

    //  2. get the last bal_qty on the last quan
    $last_bal_last_year = $row['bal_qty'];
}



//  3.  if last year bal is empty, set $last_bal_last_year = 0;
if(empty($last_bal_last_year))
{
    $last_bal_last_year = 0;


   
}

$que=mysqli_query($conn,"select * from `fc` where ar_id = $sn_id");
while($rw=mysqli_fetch_array($que))
{
   $article = $rw['article'];
   $descr = $rw['descr'];
   $stock_num = $rw['stock_num'];

   

   
}

include('connection.php');
$output = '';
if(isset($_POST["csvv"])){
$query = mysqli_query($conn, "select * from `stock_card`
where stock_card.sn_id = $sn_id and stock_card.s_year = '{$current_year}' and stock_card.iar_i is not null
order by stock_card.date_ind asc ");

$output .='
<table class="table" border ="1">

<div class="section-to-print">
<div class="row">
    <div class="col">
       
    </div>
</div>

<table>
    <tr>
        <td colspan="7" style="border-bottom:3px solid black;"></td>
</tr>

<tr>
        <td colspan="7" style="text-align:center;border-right:3px solid black;border-left:3px solid black;">
        <h2 style="padding-bottom:0;">STOCK CARD</h2>
        <h4 style="padding-top:0;">'.$univ_name.'</h4>
        <h4 style="padding-top:0;">'.$univ_ad.'</h4>

    </td>
</tr>

<tr>
    <td colspan="3" style="border-top:3px solid black;border-left:3px solid black;border-right:2px solid black;">Item :'.$article.'</td>
    <td colspan="2" style="border-top:3px solid black;border-right:2px solid black;">Description :'.$descr.'</td>
    <td colspan="2" style="border-top:3px solid black;border-left:2px solid black;border-right:3px solid black;">Stock No. '.$stock_num.'<br>Re-order Point</td>

</tr>


<tr>
    <td colspan="3" style="border-left:3px solid black;border-right:2px solid black;border-bottom:2px solid black;text-align:center;font-size:20px;font-weight:bold;">
    '.$article.'</td>
    <td colspan="2" style="border-right:2px solid black;border-bottom:2px solid black;font-size:20px;text-align:center;font-weight:bold;">
    '.$descr.'
</td>
    <td colspan="2" style="border-left:2px solid black;border-right:3px solid black;border-bottom:2px solid black;"></td>

</tr>

<tr>
    <td rowspan="2" style="border-left:3px solid black;border-bottom:2px solid black;">Date</td>
    <td rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;">Reference<br>IAR#/RIS#</td>
    <td rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;">Receipt<br>Qty.</td>
    <td colspan="2" style="border-left:2px solid black;border-bottom:2px solid black;">Supplier/Employee/Officer</td>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Balance</td>
    <td rowspan="2" style="border-left:2px solid black;border-bottom:2px solid black;border-right:3px solid black;">No. of Days<br>to Consume</td>

</tr>

<tr>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Qty.</td>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Supplier/Requisitioning Officer</td>
    <td style="border-left:2px solid black;border-bottom:2px solid black;">Qty.</td>

</tr>


<tr>
    <td colspan="2" style="border-left:3px solid black;border-bottom:2px solid black;">Total Brought Forward:</td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">

</td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">

</td>
    <td style="border-bottom:2px solid black;border-left:2px solid black;border-right:3px solid black;"></td>

</tr>

  <!-- for looping-->
          ';
          

            $s_stat = "iar";
            $i = 0;
            $query = mysqli_query($conn, "select * from `stock_card`
            where stock_card.sn_id = $sn_id and stock_card.s_year = '{$current_year}' and stock_card.iar_i is not null
            order by stock_card.date_ind asc ");
            while($row= mysqli_fetch_array($query))
            { 

                $s_id = $row['id_st'];
                $iar_id = $row['iar_i'];
                $ris_id = $row['ris_i'];
                
                if ($row['s_stat'] == "iar")
                {
                    $iar = mysqli_query($conn, "select * from `iar` join xris on xris.id_iar = iar.iar_id 
                    join stock_card on stock_card.iar_i = iar.iar_id where xris.id_iar = $iar_id
                    group by iar_id");
                    while($i = mysqli_fetch_array($iar))
                    {
                        $output .='
                        
                         <tr>

                         <td style="border-left:3px solid black;border-right:2px solid black;border-bottom:2px solid black;
                         color:deeppink;font-weight:bold;text-align:center;">'.$i['date'].'</td>
                         <td style="border-bottom:2px solid black;font-weight:bold;color:deeppink;">'.$i['iar_no'].'</td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;
                         color:deeppink;font-weight:bold;text-align:center;text-align:center;">'.$row['quan'].'</td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;"></td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;color:deeppink;font-weight:bold;text-transform:uppercase;">'.$i['supplier'].'</td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;font-weight:bold;color:deeppink;">'.$row['bal_qty'].'
                       </td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;border-right:3px solid black;"></td>
             
                         </tr>';
                    }
                 
                }
                if($row['s_stat'] == "ris")
                {
                    $ris = mysqli_query($conn, "select * from `ris` join req on req.id_ris = ris.idris join stock_card on stock_card.ris_i = ris.idris 
                    join people on people.idc = ris.req_by
                    where req.id_ris = $ris_id group by idris");
                    while($r = mysqli_fetch_array($ris))
                    {
                        $output .='
                         <tr>

                         <td style="border-left:3px solid black;border-right:2px solid black;border-bottom:2px solid black;
                         text-align:center;">'.$r['iss_date'].'</td>
                         <td style="border-bottom:2px solid black;">'.$r['ris_no'].'</td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;"></td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">'.$r['quan'].'</td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;">'.$r['fullname'].'</td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;text-align:center;">'.$row['bal_qty'].'
                       </td>
                         <td style="border-bottom:2px solid black;border-left:2px solid black;border-right:3px solid black;"></td>
             
                         </tr>';
                    }
                 
                }

                
                $output .='

                
       
               ';
                   
                


         





      






        

    }
$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $output;


}















?>