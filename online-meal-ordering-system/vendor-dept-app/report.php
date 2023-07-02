<?php session_start();

include("base.php")
?>

<div class="wholep">
		<div class="container heihei">

			<div class="bomm">
			  	<form action="database.php" method="post">
			  		<h3 class="fff">Order Report</h3>
			  		<div class="dropdown" style="float:left">
					  	<a class="btn btn-outline-secondary mar dropdown-toggle idwnbym" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Order Record
					  	</a>

					  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					    	<a class="dropdown-item" href="report.php">Order Record</a>
					    	<a class="dropdown-item" href="report1.php">Monthly Report</a>
					  	</div>
					</div>
					<div class="dropdown" style="margin-left:150px">
					  	<a class="btn btn-outline-secondary mar dropdown-toggle idwnbym" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Select Month
					  	</a>

					  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					    	<a class="dropdown-item" href="report.php?id=jan">January</a>
					    	<a class="dropdown-item" href="report.php?id=feb">February</a>
					    	<a class="dropdown-item" href="report.php?id=march">march</a>
					    	<a class="dropdown-item" href="report.php?id=april">April</a>
					    	<a class="dropdown-item" href="report.php?id=may">May</a>
					    	<a class="dropdown-item" href="report.php?id=june">June</a>
					    	<a class="dropdown-item" href="report.php?id=july">July</a>
					    	<a class="dropdown-item" href="report.php?id=aug">August</a>
					    	<a class="dropdown-item" href="report.php?id=sep">September</a>
					    	<a class="dropdown-item" href="report.php?id=oct">October</a>
					    	<a class="dropdown-item" href="report.php?id=nov">November</a>
					    	<a class="dropdown-item" href="report.php?id=dec">December</a>
					  	</div>
					</div>

			<br>
			  				<div class="spiderman5">
								<!-- <a href="manage.php"><button class="spiderman3 btn-outline-secondary">Manage Item</button></a> -->
							</div>
			  		<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search the Date here..">
			  	</form>
			</div><center><h2>
		<div class="spider321">
		<table class="table" id="myTable">
			<thead>
				<th scope="col">Order ID</th>
				<th scope="col">Sales Date</th>
				<th scope="col">Profit</th>
			</thead>
			<tbody>
				<?php 
					if(isset($_GET['id'])){
						// $_GET['id'] = 'march' ;
						// echo "<h1>".$_GET['id']."</h1>";
						if($_GET['id'] == 'jan'){
							echo "<h1>January</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 1, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 2, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'feb'){
							echo "<h1>February</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 2, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'march'){
							echo "<h1>March</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 4, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'april'){
							echo "<h1>April</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 4, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 5, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'may'){
							echo "<h1>May</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 5, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 6, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'june'){
							echo "<h1>June</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 6, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 7, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'july'){
							echo "<h1>July</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 7, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 8, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'aug'){
							echo "<h1>August</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 8, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 9, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'sep'){
							echo "<h1>September</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 9, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 10, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'oct'){
							echo "<h1>October</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 10, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 11, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'nov'){
							echo "<h1>November</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 11, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 12, 1, 2019));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}elseif($_GET['id'] == 'dec'){
							echo "<h1>December</h1>";
							$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
							$month_start = date("Y-m-d", mktime(0, 0, 0, 12, 1, 2019));
		            		$month_end = date("Y-m-d", mktime(0, 0, 0, 1, 1, 2020));
							$stall_check = "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stallid'";
							$sql = mysqli_query($con, $stall_check);

							if(mysqli_num_rows($sql)<=0)
							{
							  echo "<td colspan='3'>No Order Record for now !</td>";
							}

							$sum = 0;
							while($result = mysqli_fetch_array($sql)){
								$date = $result['Sales_Date'];
							  	$profit = $result['Profit'];
							   	$it = $result['Stall_ID'];
							   	$order = $result['Order_ID'];
								$try_date = date($date);
								$try_date2 = $try_date;


									// if($try_date2 == $try_date){
									   	echo "<tr>";
										echo "<td style='width:150px'>";
										echo "".$order."";
										echo "</td><td style='width:350px'>";
										echo "".$try_date."";
										echo "</td><td style='width:153px'>";
										echo "".$profit."" ;
										echo "</td>";
										echo "</tr>";
										$sum += $profit;
									// }
							}
							// echo "<tr><td colspan='2'>Total =</td><td>".$sum."</td></tr>";
						}
				}else{
					echo "<td colspan='3'>Select Date to show !</td>";
				}
				?>

			</tbody>
		</table>
	</div></h2></center>
</div>


</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
