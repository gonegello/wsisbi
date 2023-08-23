<?php
	include 'connection.php';
	$sql = "SELECT * FROM user ORDER BY id DESC LIMIT 10";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($rw = $result->fetch_assoc()) {
?>	
	
    <tr>
              <td><i class='bx bx-user-pin'></i></td>
            <td><?php echo $rw['username'];?></td>

            <td>
              <?php
              if($rw['status'] == 1)
              {
                echo '********';
              }
              else{
                echo $rw['password'];
              }

              ?>
            </td>

            <td><?php echo $rw['userole'];?></td>
            <td>
              <?php

              if($rw['status'] == 1)
              {
                echo '
                <span>Updated</span>
                ';
              }
              if($rw['status'] == "not-updated")
              {
                echo '<span>Not Updated</span>';
              }
              ?>

          </td>
          <td>
            <?php
            if($rw['status'] == "not-updated")
            {

              echo '
            
                <a href="#"  class="opptions" title="Update?"><i class="bx bx-edit"></i></a>
                <a href="#"  class="opptions" title="Delete?"><i class="bx bx-trash"></i></a>
  ';
            } 

            ?>
          </td>


            </tr>
<?php	
include "m_deluser.php";
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>
  