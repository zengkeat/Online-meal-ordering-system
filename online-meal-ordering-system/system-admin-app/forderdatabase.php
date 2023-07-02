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
			    Customer Favorite Order
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
			  			<h3 class="fff">Customer Favourite Order Report</h3>
			  			<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search Customer Favourite Order here..">
			  		</form>
			  	</div>
			</div>		
<div class="tatatata">
		<table class="table table-striped" id="myTable">
			<form><thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Order ID</th>
					<th scope="col">Customer ID</th>
					<th scope="col">Time Recorded</th>
					<th scope="col">Total Item</th>
					<th scope="col">Price</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM favourite_order";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('No customer favorite order record now !');</script>");
					}
					while($forder = mysqli_fetch_array($result)){
							$fid = $forder['Favourite_ID'];
							$oid = $forder['Order_ID'];
							$cid = $forder['Customer_ID'];
							$timestamp = $forder['Favourite_Timestamp'];
							$sql1 = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$oid'");
							$order = mysqli_fetch_array($sql1);
							$item = $order['Total_Item'];
							$price = $order['Order_Total_Price'];
							echo "<tr>";
							echo "<td>";
							echo "".$fid."";
							echo "</td><td>";
							echo "".$oid."";
							echo "</td><td>";
							echo "".$cid."";
							echo "</td><td>";
							echo "".$timestamp."";
							echo "</td><td>";
							echo "".$item."";
							echo "</td><td>";
							echo "".$price."";
							echo "</td>";
							echo "</tr>";
					}

				?>
			</tbody></form>
		</table>
</div>

</div>


</div>
