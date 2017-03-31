<?php
    require "header.php";
        mysql_select_db('diamondtents_dkn', $con) or die(mysql_error());
	$fetch="SELECT * from users WHERE is_admin='client'";

	
	$result=mysql_query($fetch,$con);

	echo mysql_error();
	if(isset($_POST['block'])){
		$val = $_POST['block_val'];
		$update = "UPDATE `users` SET `is_block`=1 WHERE `username`='$val'";
		mysql_query($update,$con);
                header('location:manage_customers.php');
	}
	if(isset($_POST['unblock'])){
		$val = $_POST['block_val'];
		$update = "UPDATE `users` SET `is_block`=0 WHERE `username`='$val'";
		mysql_query($update,$con);
                header('location:manage_customers.php');
	}

	?>
	

        <!-- /.container -->
    </nav>
	
    <div class="container" style="background: white">
        <h2>Manage Customers</h2>
          <table class="table">
            <thead>
              <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Zip</th>
                <th>Block</th>

                
                              
              </tr>
            </thead>
            <tbody>
			
			<?php while($value = mysql_fetch_array($result)){
				
                echo '<tr><td>'.$value['username'].'</td>';
				echo ' <td>'.$value['name'].'</td>';
				echo ' <td>'.$value['tel'].'</td>';
				echo '<td>'.$value['email'].'</td>';
				echo '<td>'.$value['address'].'</td>';
				echo '<td>'.$value['city'].'</td>';
				echo '<td>'.$value['province'].'</td>';
				echo '<td>'.$value['postal'].'</td>';
				echo '<form method="post" name="b">';
				if($value['is_block']==1){
				 echo '<td><input type="hidden" name="block_val" value="'.$value['username'].'"><input type="submit" name="unblock" class="btn btn-success" value="Unblock"></td></tr>';
				}
				else{
				 echo '<td><input type="hidden" name="block_val" value="'.$value['username'].'"><input type="submit" name="block" class="btn btn-danger" value="Block"></td></tr>';
				}
                echo '</form>';    
			
		
				
				
			}?>
              
                
              
              
            </tbody>
          </table>               

    </div>

    <!-- /.container -->
<?php
    require "footer.php";
?>
