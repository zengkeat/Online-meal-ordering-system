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
			    Credit Transaction
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
			  			<h3 class="fff">Customer Credit Transaction</h3>
			  			<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search Credit Transaction here..">
			  		</form>
			  	</div>
			</div>		
<div class="tatatata">
		<table class="table table-striped" id="myTable">
			<form><thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Customer ID</th>
					<th scope="col">Staff ID</th>
					<th scope="col">Action</th>
					<th scope="col">Amount</th>
					<th scope="col">Date</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM credit_transaction";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('No credit transaction record now !');</script>");
					}
					while($record = mysqli_fetch_array($result)){
							$ctid = $record['CreditT_ID'];
							$cid = $record['Customer_ID'];
							$sid = $record['Staff_ID'];
							$action = $record['Action'];
							$amount = $record['Amount'];
							$date = $record['Date'];
							echo "<tr>";
							echo "<td>";
							echo "".$ctid."";
							echo "</td><td>";
							echo "".$cid."";
							echo "</td><td>";
							echo "".$sid."";
							echo "</td><td>";
							echo "".$action."";
							echo "</td><td>";
							echo "".$amount."";
							echo "</td><td>";
							echo "".$date."";
							echo "</td>";
							echo "</tr>";
					}

				?>
			</tbody></form>
		</table>
</div>

</div>


</div>
