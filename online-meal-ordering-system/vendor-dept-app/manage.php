<?php session_start();

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_stall']);
   header("location: staff_login.php");
 }

include("base.php");
?>

<div class="whole">
	<nav class="navbar navbar-light ayoyolaoshi">
		<div>
			<a class="navbar-brand">Here you can view your item list and also add more new food item in your stall!</a>
		</div>
	</nav>
<div class="container haizzzaaa">
	<div class="spiderman2">
		<div class="spiderman1">
			<a href="topsales.php"><button class="spiderman3 btn-outline-secondary">Top Sales</button></a>
		</div>
	<div class="tablecon alaloi">
				
		<table class="table">
			<form method="post">
			<?php
				$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
				$sql = "SELECT * FROM food WHERE Stall_ID = '$id'";
				$result = mysqli_query($con, $sql);
				if(mysqli_num_rows($result)<=0)
				{
				  	echo"<script>alert('No Food in the system now ! Add more !');</script>";
				  	echo "<tr>";
                    echo "<td>";
                    echo "No Food Now !";
                    echo "</td>";
                    echo "</tr>";
				}
				while($food = mysqli_fetch_array($result)){
					if(($food['Stall_ID']) === ($_SESSION['login_stallid'])){
						$name = $food['Food_Name'];
						$fid = $food['Food_ID'];
						echo "<tbody>";
						echo "<tr>";
						echo "<td>";
						echo "<input type='hidden' name='foodidlai' value='".$fid."'>";
						echo "<a class='havnomen'>".$name."</a>";
						echo "<a href='delete.php?id=".$fid."' name='delete' class='btnm btn btn-outline-danger'>Delete</a>";
						echo "<a href='edit.php?id=".$fid."' name='edit' class='btnm btn btn-outline-info'>Edit</a>";
						echo "</td>";
						echo "</tr>";
						echo "</tbody>";
					}
				}


			?>
			</form>
		</table>
</div>
</div>

<div>
	<div class="add_form">
		<div>
			<h2>Add New Food Item</h2>
			<br>
		</div>
			<form action="addfood.php" class="login_form" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm" >
				<div>
					<label for="foodname">Food Name :</label>
					<input type="text" name="foodname" id="foodname" placeholder="Enter Name for Food..." required>
				</div>
				<div>
					<label for="fooddescription">Description :</label>
					<textarea type="text" name="fooddescription" id="fooddescription" placeholder="Enter Food Description here..." rows="3" required></textarea>
				</div>
				<div>
					<label for="foodprice">Food Unit Price :</label>
					<input type="text" name="foodprice" id="foodprice"  placeholder="Enter Food Price..." required>
				</div>
				<br>
				<div class="left">
					<input type="file" name="image" id="image" required>
				</div>
				<br><br>
				<button type="submit" name="submit">Add New Item</button>
				<div class="card1">
				<div class="card">
					<div class="card-body">
						<a class="navbar-brand">Note :</a>
						<br><br>
						<p class="card-text">'Add New Item' into your stall webpage.</p>
					</div>
				</div>
				</div>
			</form>
	</div>
</div>
</div>






</div>
<script>
function validateForm() {
  var x = document.forms["myForm"]["foodname","fooddescription","foodprice","image"].value;
  if (x == "") {
    alert("All textbox must be filled !");
    return false;
  }
}
</script>
