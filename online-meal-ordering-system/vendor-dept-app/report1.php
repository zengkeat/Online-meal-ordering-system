<?php session_start();

include("base.php")
?>

<div class="wholep">
		<div class="container heihei">

			<div class="bomm">
			  	<form action="database.php" method="post">
			  		<h3 class="fff">Sales Report</h3>
			  		<div class="dropdown">
			  	<a class="btn btn-outline-secondary mar dropdown-toggle idwnbym" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Monthly Report
			  	</a>

			  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			    	<a class="dropdown-item" href="report.php">Order Record</a>
			    	<a class="dropdown-item" href="report1.php">Monthly Report</a>
			  	</div>
			</div>
			<br>
			  				<div class="spiderman5">
								<!-- <a href="manage.php"><button class="spiderman3 btn-outline-secondary">Manage Item</button></a> -->
							</div>
			  	</form>
			</div><center><h2>
		<div class="spider321">
		<table class="table" id="myTable">
			<thead>
				<th scope="col">Month</th>
				<th scope="col">Sales Date</th>
				<th scope="col">Profit</th>
			</thead>
			<tbody>
		<tr>
		<th>January</th>
          <th>1/1/2019 - 31/1/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 1, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 2, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>February</th>
          <th>1/2/2019 - 28/2/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 2, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>March</th>
          <th>1/3/2019 - 31/3/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 4, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>April</th>
          <th>1/4/2019 - 30/4/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 4, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 5, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>May</th>
          <th>1/5/2019 - 31/5/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 5, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 6, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>June</th>
          <th>1/6/2019 - 30/6/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 6, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 7, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>July</th>
          <th>1/7/2019 - 31/7/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 7, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 8, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>August</th>
          <th>1/8/2019 - 31/8/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 8, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 9, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>September</th>
          <th>1/9/2019 - 30/9/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 9, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 10, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>October</th>
          <th>1/10/2019 - 31/10/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 10, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 11, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
        <tr>
		<th>November</th>
          <th>111/2019 - 30/11/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 11, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 12, 1, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>
		<tr>
		<th>December</th>
          <th>1/12/2019 - 31/12/2019</th>

          <?php
          $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
            $month_start = date("Y-m-d", mktime(0, 0, 0, 12, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 1, 1, 2020));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$id'");
            $values = mysqli_fetch_array($sql);

            if (mysqli_num_rows($sql)>= 1){
		            while ($values = mysqli_fetch_array($sql)) {
		              $price = $values['Profit'];
		              $sum += $price;
		            }
		            echo "<th>".$sum."</th>";
		        }else{
		            echo "<th>TBD</th>";
		        }
          ?>

        </tr>

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
