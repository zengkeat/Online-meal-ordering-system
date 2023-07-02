<?php session_start();

include("base.php")?>

<a href="admin.php?logout='1'" class="cancel">Sign Out</a>
<div class="whole">

	<nav class="navbar navbar-light bg-light">
		<div>
			<a class="navbar-brand">Hi</a>
			<div class="navbar-body">
				<p class="card-text">Here you can 'Update' user information.</p>
			</div>
		</div>
	</nav>

	<center><div class="container">
		User Inforation Edit Page
		<div class="edit_form">
			<div><h2>Update User Detail :</h2><br></div>
			<form class="login_form" method="post" action="cus_update.php" enctype="multipart/form-data"  onsubmit="return validateForm()" name="myForm">
				<div class="all">

		<?php

    	if (isset($_GET['cancel'])) {
   			session_destroy();
   			unset($_SESSION['food_name']);
   			header("location: manage.php");
 		}

			if (isset($_GET['id'])){
			$fid = $_GET['id'];
			$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
			$sql = "SELECT * FROM customer WHERE Customer_ID = '$fid'";
			$result = mysqli_query($con, $sql);
			$user = mysqli_fetch_array($result);
			if(count($result) == 1 ){
				$idid = $user['Customer_ID'];
				$_SESSION['customerid'] = $idid;
				$namename = $user['Customer_Name'];
				$contact = $user['Customer_Contact'];
				$email = $user['Customer_Email'];
				$description = $user['Customer_Description'];
			echo "<div>";
			echo "<div class='lalalabel'>";
			echo "<label>User ID :</label>";
			echo "<input type='text' name='userid' value='".$idid."' readonly>";
			echo "</div>";
			echo "<div class='lalalabel'>";
			echo "<label>User Name :</label>";
			echo "<input type='text' value='".$namename."' pattern='[a-z]{1,100}[A-Z]{1,100}' title='Name must include 'Capital Letter'' required readonly>";
			echo "</div>";
			echo "</div><br><br>";
			echo "<div>";
			echo "<label>User Contact Number :</label>";
			echo "<input type='text' name='usercontact' id='usercontact' placeholder='Enter Post Title here...' value='".$contact."' pattern='[0-9]{10,11}' title='Contact Number only consist 10-11 number !' required>";
			echo "</div><br>";
			echo "<div>";
			echo "<label>User Email :</label>";
			echo "<input type='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' name='useremail' id='useremail' placeholder='Enter Post Title here...' value='".$email."' required>";
			echo "</div><br>";
			echo "<div>";
			echo "<label>User Description :</label>";
			echo "<textarea type='text' name='userdescription' id='userdescription' placeholder='Enter Post Description here...' rows='3' required>";
			echo "".$description."";
			echo "</textarea>";
			echo "</div>";

			}
			else{
				echo "<script>alert('No data');</script>";
				echo "<script>window.location.href = 'database.php';</script>";
			}
		}

		if(!isset($_SESSION['customerid'])){
      		header('location:database.php');
      		session_write_close();
      		exit();
    	}
		?>

		<button class="left" type="submit" id="update" name="update">Update</button>
		<a href="database.php?cancel='1'" class="navbar navbar-light bg-light cancel editcancel">Cancel</a>
			</div>
		</form>
	</div>


		</div></center>


</div>
<script>
function validateForm() {
  var x = document.forms["myForm"]["userid","usercontact","useremail","userdescription"].value;
  if (x == "") {
    alert("All textbox must be filled !");
    return false;
  }
}
</script>