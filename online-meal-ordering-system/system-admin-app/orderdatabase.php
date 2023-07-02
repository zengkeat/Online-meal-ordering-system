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
			    Customer Order
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
			  			<h3 class="fff">Customer Order Report</h3>
			  			<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search Order here..">
			  		</form>
			  	</div>
			</div>		
<div class="tatatata">
		<table class="table table-striped" id="myTable" style="width: 100%;"> 
			<form><thead class="thead-dark">
				<tr>
					<th scope="col">Order ID</th>
					<th scope="col">Customer ID</th>
					<th scope="col">Item</th>
					<th scope="col">Order Date</th>
					<th scope="col">Get Time</th>
					<th scope="col">Tracking Number</th>
					<th scope="col">Order Price</th>
					<th scope="col"  style="width:200px;">Order Remark</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM orders";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('No order record now !');</script>");
					}
					while($customer = mysqli_fetch_array($result)){
							$oid = $customer['Order_ID'];
							$cid = $customer['Customer_ID'];
							$titem = $customer['Total_Item'];
							$date = $customer['Order_date'];
							$estimated = $customer['Order_Estimated_Time'];
							$tracknum = $customer['Order_Tracking_Number'];
							$price = $customer['Order_Total_Price'];
							$remark = $customer['Order_Remark'];
							echo "<tr>";
							echo "<td>";
							echo "".$oid."";
							echo "</td><td>";
							echo "".$cid."";
							echo "</td><td>";
							echo "".$titem."";
							echo "</td><td>";
							echo "".$date."";
							echo "</td><td>";
							echo "".$estimated."";
							echo "</td><td>";
							echo "".$tracknum."";
							echo "</td><td>";
							echo "".$price."";
							echo "</td><td class='yuiyui'>";
							echo "".$remark."";
							echo "</td>";
							echo "</tr>";
					}

				?>
			</tbody></form>
		</table>
</div>


</div>

</div>
