<?php session_start();
	if (isset($_GET['logout'])) {
	   session_destroy();
	   unset($_SESSION['login_staff']);
	   header("location: staff_login.php");
	 }
	include("conn.php");
	include("base.php");
?>
<div class="allall">
		
			
<div class="container tatata">
	<div class="dropdown">
			  	<a class="btn btn-outline-secondary mar dropdown-toggle idwnbym" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Customer
			  	</a>

			  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			    	<a class="dropdown-item" href="database.php">Customer</a>
			    	<a class="dropdown-item" href="fooddatabase.php">Food</a>
			    	<a class="dropdown-item" href="orderdatabase.php">Order</a>
			    	<a class="dropdown-item" href="forderdatabase.php">Favorite Order</a>
			    	<a class="dropdown-item" href="transdatabase.php">Credis Transaction</a>
			    	<a class="dropdown-item" href="salesdatabase.php">Sales</a>
			  	</div>
			  	<div class="bomm">
			  		<form action="database.php" method="post">
			  			<h3 class="fff">Customer Information</h3>
			  			<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search Customer ID here..">
			  		</form>
			  	</div>
			</div>		
		<div class="tatatata">
			<table class="table table-striped" id="myTable">
			<form><thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Role</th>
					<th scope="col">Gender</th>
					<th scope="col">I/C No</th>
					<th scope="col">Phone</th>
					<th scope="col">E-mail</th>
					<th scope="col">Description</th>
					<th scope="col">Credit Balance</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM customer";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('No customer information in the database now !');</script>");
					}
					while($customer = mysqli_fetch_array($result)){
							$cusid = $customer['Customer_ID'];
							$cusname = $customer['Customer_Name'];
							$cusrole = $customer['Customer_Role'];
							$gender = $customer['Customer_Gender'];
							$icno = $customer['Customer_IC_No'];
							$contact = $customer['Customer_Contact'];
							$email = $customer['Customer_Email'];
							$description = $customer['Customer_Description'];
							$balance = $customer['Customer_Credit_Balance'];
							echo "<tr>";
							echo "<td>";
							echo "".$cusid."";
							echo "</td><td>";
							echo "".$cusname."";
							echo "</td><td>";
							echo "".$cusrole."";
							echo "</td><td>";
							echo "".$gender."";
							echo "</td><td>";
							echo "".$icno."";
							echo "</td><td>";
							echo "".$contact."";
							echo "</td><td>";
							echo "".$email."";
							echo "</td><td>";
							echo "".$description."";
							echo "</td><td>";
							echo "".$balance."";
							echo "</td><td>";
							echo "<a href='edit_cus.php?id=".$cusid."' name='edit' class='btnm btn btn-outline-secondary gogopower'>Edit</a>";
							echo "<a href='delete.php?name=".$cusid."' name='delete' class='btnm btn btn-outline-danger gogopower'>Delete</a><br>";
							echo "</td>";
							echo "</tr>";
					}

				?>
			</tbody></form>
		</table>
	</div>
</div>




</div>

