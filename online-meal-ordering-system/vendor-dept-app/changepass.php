<?php session_start(); 

?>
  <?php
include("conn.php");
if(!isset($_SESSION['login_stall'])){
      header("location:../meal-ordering-app/staff_login.php");
      session_write_close();
      exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title></title>
<link rel="stylesheet" type="text/css" href="changepass.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
</head>
<style>
  body{
    font-family: 'ZCOOL XiaoWei', serif;
  }
</style>
<body>
<div class="container galala">
	<div>
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand">Home</a>
			<p class="navbar navbar-light wid"><?php echo $_SESSION["login_stall"];?>, do you want to change password ?</p>
		</nav>
	</div>
	<div>
		<div class="change_form out">
			<div>
				<h2 class="aaaaa">Change Password</h2>
				<br>
			</div>
			<form class="login_form int" method="post" action="update.php" onsubmit="return validateForm()" name="myForm" >
				<div>
					<label for="CurrentPassword">Current Password :</label>
					<input type="password" name="currentpass" id="CurrentPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your Current Passowrd here..." required>
				</div>
				<br>
				<div>
					<label for="NewPassword">Enter New Password :</label>
					<input type="password" name="newpass" id="NewPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your New Password here..." required>
					<div class="left">
						<div class="right">Show Password</div><input type="checkbox" class="check" onclick="myFunction()">
					</div>
				</div>
				<br>
				<br>
				<br>
				<div>
					<label for="ReenterPass">Re-enter New Password :</label>
					<input type="password" name="renewpass" id="ReenterPass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Re-enter your New Password here..." required>
				</div>
				<br>
				<br>
				<button type="submit" id="submit">Save Password</button>
			</form>
		</div>
	</div>

	

	

	<div class="card con">
		<div class="card-body">
			<a class="navbar-brand">Change Password Page</a>
			<br>
			<p class="card-text">After you change the password, you have to login by using your new password as the old password will not longer to be able to use again to login to your account.<br>
						Please think seriously before you make this decision.</p>
		</div>
	</div>
	<div>
			<div class="miqimiao">
				<a class="navbar-brand aaaaa">Note :</a>
				<div class="card">
					<div class="card-body">
						<p class="card-text">
						After you click on 'Save Password' button.<br>Your current password will be removed.<br><br>Or you can cancel here V 
						</p>
					
				</div>
				<a class="navbar btn-info cancel" href="home.php">Cancel</a>
			</div></div>
	</div>
</div>







</div>
<script>
function validateForm() {
  var x = document.forms["myForm"]["currentpass","newpass","renewpass"].value;
  if (x == "") {
    alert("All textbox must be filled !");
    return false;
  }
}
</script>
<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {	
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function myFunction() {
  var x = document.getElementById("NewPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>
</html>