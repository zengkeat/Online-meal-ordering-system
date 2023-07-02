<?php session_start();
include("conn.php");
if(!isset($_SESSION['login_staff'])){
      header("location:../meal-ordering-app/staff_login.php");
      session_write_close();
      exit();
    }
    include("base.php")
?>

	<?php
	if (isset($_GET['logout'])) {
	   session_destroy();
	   unset($_SESSION['login_staff']);
	   header("location: staff_login.php");
	 }
	include("conn.php");

?>
<div class="allall">

<div class="container tatata">
	<br>
<div><center>
	<div>
		<h3>Stall Conversion Form</h3>
	</div>
	<?php
		if (isset($_GET['id'])){
			$fid = $_GET['id'];
			$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
			$sql = "SELECT * FROM stall WHERE Stall_ID = '$fid'";
			$result = mysqli_query($con, $sql);
			$post = mysqli_fetch_assoc($result);
			if(count($result) == 1 ){
				$idid = $post['Stall_ID'];
				$_SESSION['postid'] = $idid;
				$owner = $post['Stall_Owner'];
				$name = $post['Stall_Name'];
				$category = $post['Stall_Category'];
				$description = $post['Stall_Description'];
				$contact = $post['Stall_Contact'];
				$email = $post['Stall_Email'];
			}
			}
	?>
<form class="cus_form img-thumbnail login_form"  onsubmit="return validateForm()" name="myForm" action="update_stall.php" method="post" enctype="multipart/form-data"><br>
	<div class="lflflflf">
		<label>Stall ID (view only) :</label>
		<input name="stallidid" value="<?php echo $post['Stall_ID']; ?>" readonly />
	</div>
	<div class="lflflflf">
		<label>Stall Owner Name:</label><br>
		<input type="text" name="stallowner" id="stallowner" placeholder="Enter Stall Owner Name here..." value="<?php echo $post['Stall_Owner']; ?>" pattern="[a-z]{1,100}+[A-Z]{1,100}" title="Name must include 'Capital Letter'" required>
	</div><br>
	<div class="lflflflflf">
		<label>Stall Name here :</label><br>
		<input type="text" name="stallname" id="stallname" placeholder="Enter Stall Name here..." value="<?php echo $post['Stall_Name']; ?>" pattern="[a-z]{1,100}+[A-Z]{1,100}" title="Name must include 'Capital Letter'" required>
	</div><br>
	<div>
		<label>Stall Category :</label><br>
		<input type="text" name="category" id="category" placeholder="Enter Stall Category here..." value="<?php echo $post['Stall_Category']; ?>" required readonly>
	</div><br>
	<div>
		<label>Stall Description :</label><br>
		<input type="text" name="stalldescription" id="stalldescription" placeholder="Enter Stall Description here..." value="<?php echo $post['Stall_Description']; ?>" required>
	</div><br>
	<div>
		<label>Contact Numeber :</label><br>
		<input type="text" name="stallcontact" id="stallcontact" placeholder="Enter Stall Contact Number here..." value="<?php echo $post['Stall_Contact']; ?>" pattern="[0-9]{10,11}" title="Only Number allow!" required>
	</div><br>
	<div>
		<label>Stall E-mail here :</label><br>
		<input type="email" name="stallemail" id="stallemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Stall E-mail here..." value="<?php echo $post['Stall_Email']; ?>" required>
	</div><br>
	<button class="btn btn-outline-secondary butttt" type="submit" name="stallreg">Update</button>
	<br><br>

</form>


</center></div>
</div>