<?php
include("conn.php");
session_start();
if(!isset($_SESSION['login_staff'])){
header("location:../meal-ordering-app/staff_login.php");
session_write_close();
exit();
}
include("base.php")
?>	

<div class="allall">

	<?php
		if (isset($_GET['logout'])) {
	   session_destroy();
	   unset($_SESSION['login_staff']);
    	header("location:../meal-ordering-app/staff_login.php");
	}

?>
<div class="container tatata">
	<br>
<div><center>
	<div>
		<h3>Sign Up Form</h3>
	</div>
<form class="cus_form img-thumbnail login_form" action="signup.php" method="post"  onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
	<center><input type="file" src="default.jpg" class="hihide" name="image" id="image"></center>
	<br>
	<div>
		<label>Customer Campus ID  :</label><br>
		<input type="text" name="customerid" id="customerid" placeholder="Enter Customer ID here..." pattern="[0-9]{6}" title="ID must contain Only 6 number !" required>
	</div><br>
	<div>
		<label>Customer Name :</label><br>
		<input type="text" name="customername" id="customername" placeholder="Enter Customer Name here..."  pattern="[a-z]{1,100}+[A-Z]{1,100}" title="Name must include least one 'number', and one 'uppercase' and 'lowercase' letter" required>
	</div><br><br>
	<div class="role">
	<div class="rola">
		<label>Select Customer Role :</label>
		<select name="role" class="btn btn-outline-secondary">
			<option value="Student">Student</option>
			<option value="Lecturer">Lecturer</option>
			<option value="Staff">Staff</option>
		</select>
	</div>
	<div class="rola">
		<label>Select Customer Gender :</label>
		<input type="radio" name="gender" id="gender" value="male">Male<input type="radio" name="gender" id="gender" value="female">Female
	</div></div><br><br><br><br>
	<div>
		<label>Enter Customer Description :</label><br>
		<input type="text" name="customerdescription" id="customerdescription" placeholder="Enter Customer Description here." title="Description about customer" required>
	</div><br>
	<div>
		<label>Customer I/C :</label><br>
		<input type="text" name="customeric" id="customeric" placeholder="Enter Customer I/C here..." pattern="[0-9]{12}" title="I/C Number only consist 12 number!" required>
	</div><br>
	<div>
		<label>Customer E-mail :</label><br>
		<input type="email" name="customeremail" id="customeremail" placeholder="Enter Customer E-mail here..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Example : hongchin42@gmail.com" required>
	</div><br>
	<div>
		<label>Contact Number :</label><br>
		<input type="text" name="contactnumber" id="contactnumber" placeholder="Enter Customer Contact Number here..." pattern="[0-9]{10,11}" title="Only Number allow!" required>
	</div><br>
	<div class="card-body wid img-thumbnail">
      	<a class="navbar-brand ">Note :</a>
      	<br>
      	<p class="card-text">Please fill up the form to sign up an account for new user.</p>
      </div>
      <br>
	<button class="btn btn-outline-secondary butttt" type="submit" name="cusreg">Register</button>
	<br><br>
</form>
<br>
</center></div>

</div>