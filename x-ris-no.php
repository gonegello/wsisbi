<?php
                        //generate ris no.
                        include "connection.php";
                        $last = mysqli_query($conn, "select * from `ris_details` order by r_id desc limit 1"); 
                        //i used limit 1 to identify the last generated number
                        while($row=mysqli_fetch_array($last))
                        {
                            
                            //find and get the last property number in stock details
                            $ris_code = $row['ris_no'];
                        }

                       
                        //use explode to to separate the last 3 digit not including the date and store it on a variable
                        [$y, $m, $rcodelast] = explode('-', $ris_code);

                        //pcodelast is converted into int data
                        $covertedrcode = intval($rcodelast);
                       // $covertedrcode = $covertedrcode + 1;
                      //  $covertedpcode = $covertedpcode+1;
                       // $tryadding = $covertedpcode + 10;
                      

                        //print_r($pcodelast);
                         ?>