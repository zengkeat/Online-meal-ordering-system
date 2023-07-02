<?php session_start();

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_staff']);
   header("location: staff_login.php");
 }
include("conn.php");
include("base.php");?>
<div class="allall">
			
<div class="container tatatatata">	
<div class="dropdown">
			  	<div >
				  	<form action="database.php" method="post">
				  		<h3 class="fff">Stall in APU !</h3><input type="text" class="ff"  id="myInput" onkeyup="myFunction()" placeholder="Search Stall here..">
				  	</form>
			  	</div>
			</div>	
		<table class="table table-striped" id="myTable">
			<form><thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Stall Name</th>
					<th scope="col">Category</th>
					<th scope="col">Description</th>
					<th scope="col">Phone</th>
					<th scope="col">E-mail</th>
					<th scope="col">Edit</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM stall";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('Something missing ! Go find ur stall owner back!');</script>");
					}
					while($customer = mysqli_fetch_array($result)){
							$stallid = $customer['Stall_ID'];
							$owner = $customer['Stall_Owner'];
							$sname = $customer['Stall_Name'];
							$category = $customer['Stall_Category'];
							$description = $customer['Stall_Description'];
							$contact = $customer['Stall_Contact'];
							$email = $customer['Stall_Email'];
							echo "<tr>";
							echo "<td>";
							echo "".$stallid."";
							echo "</td><td>";
							echo "".$owner."";
							echo "</td><td>";
							echo "".$sname."";
							echo "</td><td>";
							echo "".$category."";
							echo "</td><td>";
							echo "".$description."";
							echo "</td><td>";
							echo "".$contact."";
							echo "</td><td>";
							echo "".$email."";
							echo "</td><td>";
							echo "<a href='stall_register.php?id=".$stallid."' name='edit' class='btnm btn btn-outline-secondary'>Edit</a>";
							echo "</td>";
							echo "</tr>";
					}

				?>
			</tbody></form>
		</table>




</div>
</div>
