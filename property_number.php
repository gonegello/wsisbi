<?php
                        //generate property number for par and ics
                        include "connection.php";
                        $last = mysqli_query($conn, "select * from `stock_pn` order by pn_id desc limit 1"); 
                        //i used limit 1 to identify the last generated number
                        while($row=mysqli_fetch_array($last))
                        {
                            
                            //find and get the last property number in stock details
                            $prop_code = $row['property_number'];
                        }

                       
                        //use explode to to separate the last 3 digit not including the date and store it on a variable
                        [$y, $m, $d, $pcodelast] = explode('-', $prop_code);

                        //pcodelast is converted into int data
                        $covertedpcode = intval($pcodelast);
                       // $tryadding = $covertedpcode + 10;
                      

                        //print_r($pcodelast);
                         ?>