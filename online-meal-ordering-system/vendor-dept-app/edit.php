<?php session_start();

include("base.php")?>


<div class="whole">

	<nav class="navbar navbar-light ayoyolaoshi">
		<div>
			<div class="navbar-body">
				<h5><p class="card-text">Here you can 'Update' your food item information in the stall webpage.</p></h5>
			</div>
		</div>
	</nav>

	<center><div class="container">
		<br>
		<?php

    	if (isset($_GET['cancel'])) {
   			session_destroy();
   			unset($_SESSION['food_name']);
   			header("location: manage.php");
 		}

			if (isset($_GET['id'])){
			$fid = $_GET['id'];
			$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
			$sql = "SELECT * FROM food WHERE Food_ID = '$fid'";
			$result = mysqli_query($con, $sql);
			$food = mysqli_fetch_array($result);
			if(count($result) == 1 ){
				$id = $food['Food_ID'];
				$name = $food['Food_Name'];
				$_SESSION['foodie'] = $name;
				$description = $food['Food_Description'];
				$price = $food['Unit_Price'];

			echo "<div class='edit_form'>";
			echo "<div><h2>Food Item Detail</h2><br></div>";
			echo "<form class='login_form' method='post' action='update1.php' enctype='multipart/form-data'   onsubmit='return validateForm()' name='myForm' >";
			echo "<div class='all'>";
			echo "<div>";
			echo "<label>Food Name :</label>";
			echo "<input type='hidden' name='idid' id='idid' value='".$id."'>";
			echo "<input type='text' name='foodname' id='foodname' placeholder='Enter Food Name here...' value='".$name."' pattern='[a-z]{1-100}[0-9]{0-10}'' title='' required>";
			echo "</div><br>";
			echo "<div>";
			echo "<label>Food Description :</label>";
			echo "<textarea type='text' name='fooddescription' id='fooddescription' placeholder='Enter Food Description here...' rows='3' required>";
			echo "".$description."";
			echo "</textarea>";
			echo "</div>";
			echo "<div>";
			echo "<label>Food Price :</label>";
			echo "<input type='text' name='foodprice' id='foodprice' placeholder='Enter Food Price here...' pattern='[0-9]{0-10}'' title='Only Number is allow' value='".$price."' required>";
			echo "</div>";
			echo "<div>";
			echo "<label>Food Image :</label>";
			echo "<input type='file' name='image' id='image' required>";
			echo "</div><br>";
			echo "<button class='left' type='submit' name='update' id='update'>Update</button>";
			echo "<a class='navbar navbar-light bg-light cancel editcancel' href='manage.php'>Cancel</a>";
			echo "</div>";
			echo "</form>";
			echo "</div>";


			}
			else{
				echo "<script>alert('No data');</script>";
				echo "<script>window.location.href = 'manage.php';</script>";
			}
		}

		if(!isset($_SESSION['foodie'])){
      		header('location:manage.php');
      		session_write_close();
      		exit();
    }
		?>
		</div></center>
</div>
<script>
function validateForm() {
  var x = document.forms["myForm"]["idid","fooddescription","foodprice","foodprice"].value;
  if (x == "") {
    alert("All textbox must be filled !");
    return false;
  }
}
</script>