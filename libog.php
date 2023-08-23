<?php



        //if last year item has no balance get the first current balance
        $currentbal = mysqli_query($conn, "select * from `stock_card` where sn_id = $sn_id and s_year = '{$current_year}' order by id_st asc limit 1");
        while($row=mysqli_fetch_array($currentbal))
        {
 
            //get the last bal_qty on the last quan
            $current_year_bal = $row['bal_qty'];
        }

        //if first current bal of the year is not empty
        if( $current_year_bal > 0)
        {
            //get the last current bal for current year
            $last_current = mysqli_query($conn, "select * from `stock_card` where sn_id= $sn_id and s_year = '{$current_year} order by id_st desc limit 1'");
            while($lc = mysqli_fetch_array($last_current))
            {
                $last_current_bal = $lc['bal_qty'];
            }
        }


        
     


    
        
    
        $view_first_iar = mysqli_query($conn,"select * from `stock_card` where sn_id = $sn_id and s_year = '{$current_year}' and iar_i is not null order by id_st asc limit 1");
        while($wor = mysqli_fetch_array($view_first_iar))
        {

            //get iar_id
            $first_iar = $wor['iar_i'];
            $first_item_id = $wor['id_item'];
            $first_bal = $wor['bal_qty'];
        }


 


         //IF PREVIOUS YEAR BAL == 0 AND CURRENT YEAR BAL == 0 , VIEW FIRST STOCK IAR
        
           $iar = $first_iar;
           $item_id = $first_item_id;
           $quantity = $first_bal;


            //get iar details
        $getiar_details = mysqli_query($conn, "select * from `iar` where iar_id = $iar");
        while($rr =mysqli_fetch_array($getiar_details))
        {
            $iar_no = $rr['iar_no'];

        }

        //get item details

        $get_itemd = mysqli_query($conn, "select * from `xris` where idx = $item_id");
        while($line = mysqli_fetch_array($get_itemd))
        {
            $supplier = $line['supplier'];
            $first_date = $line['date'];
        }
        

        
                            
       


       



?>