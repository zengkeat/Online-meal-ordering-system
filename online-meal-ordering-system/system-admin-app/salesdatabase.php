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
			    Sales
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
			  			<h3 class="fff">Sales Report</h3>
			  			<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search Sales record..">
			  		</form>
			  	</div>
			</div>		
<div class="tatatata">
		<table class="table table-striped" id="myTable">
			<form><thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Stall ID</th>
					<th scope="col">Order ID</th>
					<th scope="col">Food ID</th>
					<th scope="col">Sales Date</th>
					<th scope="col">Order Date</th>
					<th scope="col">Profit</th>
					<th scope="col">Order Remark</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM sales";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('No sales record now !');</script>");
					}
					while($sales = mysqli_fetch_array($result)){
							$sid = $sales['Sales_ID'];
							$stid = $sales['Stall_ID'];
							$iod = $sales['Order_ID'];
							$fid = $sales['Food_ID'];
							$sdate = $sales['Sales_Date'];
							$profit = $sales['Profit'];
							$sql1 = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$iod' ");
							$order = mysqli_fetch_array($sql1);
							$date = $order['Order_date'];
							$remark = $order['Order_Remark'];
							echo "<tr>";
							echo "<td>";
							echo "".$sid."";
							echo "</td><td>";
							echo "".$stid."";
							echo "</td><td>";
							echo "".$iod."";
							echo "</td><td class='yuiyui'>";
							echo "".$fid."";
							echo "</td><td>";
							echo "".$sdate."";
							echo "</td><td>";
							echo "".$date."";
							echo "</td><td>";
							echo "".$profit."";
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
