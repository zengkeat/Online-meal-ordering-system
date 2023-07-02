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
			    Food Item
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
			  			<h3 class="fff">Food Item List</h3>
			  			<input class="ff" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search Food Item here..">
			  		</form>
			  	</div>
			</div>		
<div class="tatatata">
		<table class="table table-striped" id="myTable">
			<form><thead class="thead-dark">
				<tr>
					<th scope="col">Food ID</th>
					<th scope="col">Stall ID</th>
					<th scope="col">Food Name</th>
					<th scope="col">Category</th>
					<th scope="col">Unit Price</th>
					<th scope="col">Description</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
					$sql = "SELECT * FROM food";
					$result = mysqli_query($con, $sql);
					if(mysqli_num_rows($result)<=0)
					{
					  die("<script>alert('No Food Item in the database now !');</script>");
					}
					while($food = mysqli_fetch_array($result)){
							$fid = $food['Food_ID'];
							$sid = $food['Stall_ID'];
							$name = $food['Food_Name'];
							$category = $food['Food_Category'];
							$price = $food['Unit_Price'];
							$description = $food['Food_Description'];
							$status = $food['Food_Status'];
							echo "<tr>";
							echo "<td>";
							echo "".$fid."";
							echo "</td><td>";
							echo "".$sid."";
							echo "</td><td>";
							echo "".$name."";
							echo "</td><td>";
							echo "".$category."";
							echo "</td><td>";
							echo "".$price."";
							echo "</td><td>";
							echo "".$description."";
							echo "</td><td>";
							echo "".$status."";
							echo "</td>";
							echo "</tr>";
					}

				?>
			</tbody></form>
		</table>
</div>

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
