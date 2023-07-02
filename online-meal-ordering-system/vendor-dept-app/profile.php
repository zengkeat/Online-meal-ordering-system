<?php session_start();

include("base.php")
?>
<?php 
$stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
$stall_check = "SELECT * FROM stall WHERE Stall_ID = '$stallid' ";
$sql = mysqli_query($con, $stall_check);

while($result = mysqli_fetch_array($sql))
{	$owner = $result['Stall_Owner'];
   	$name = $result['Stall_Name'];
   	$category = $result['Stall_Category'];
   	$description = $result['Stall_Description'];
   	$contact = $result['Stall_Contact'];
   	$email = $result['Stall_Email'];
	}
 ?>
<div class="wholep">
	<nav class="navbar navbar-light ayoyolaoshi">
		<div>
			<a class="navbar-brand">Stall Prifile</a>
		</div>
	</nav>
	<div class="container heihei">
		<div class="img-thumbnail heithumb">
			<div class="profile img-thumbnail heiboy">
				<div class="idkwor"><a class="navbar-brand">About Stall</a></div>
				<img class="img-thumbnail tiredla" src="images/stall1.jpg" alt="Stall">
			</div>
		<?php
			echo "<div class='worfot'>";
			echo "<div class='thumbthumb'><a class='navbar-brand'>Name of Stall</a></div><div style='width:82%;float:left;position:relative'><a class='navbar-brand'>:  ".$name."</a></div><br>";
			echo "<div class='thumbthumb'><a class='navbar-brand'>Owner Name</a></div><div style='width:82%;float:left;position:relative'><a class='navbar-brand'>:  ".$owner."</a></div><br>";
			echo "<div class='thumbthumb'><a class='navbar-brand'>Stall Categoory</a></div><div style='width:82%;float:left;position:relative'><a class='navbar-brand'>:  ".$category."</a></div><br>";
			echo "<div class='thumbthumb'><a class='navbar-brand'>Srall Description</a></div><div style='width:82%;float:left;position:relative'><a class='navbar-brand'>:  ".$description."</a></div><br><br><br>";
			echo "<div class='thumbthumb'><a class='navbar-brand'>Contact Number</a></div><div style='width:82%;float:left;position:relative'><a class='navbar-brand'>:  ".$contact."</a></div><br>";
			echo "<div class='thumbthumb'><a class='navbar-brand'>Stall E-mail</a></div><div style='width:82%;float:left;position:relative'><a class='navbar-brand'>:  ".$email."</a></div>";
			echo "</div>";
		?>
			<a class="navbar btn-secondary cancel" href="changepass.php">Change Password</a>
		</div>
	</div>
</div>


</div>