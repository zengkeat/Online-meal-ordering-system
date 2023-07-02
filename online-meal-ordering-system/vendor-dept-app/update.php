<?php session_start();

include("conn.php");
$errors = array();

$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
$sql2 = "SELECT * FROM stall WHERE Stall_ID = '$id'";
$result2 = mysqli_query($con, $sql2);
$stall = mysqli_fetch_array($result2);
$sql1 = "SELECT * from food WHERE Stall_ID = '$id'";
$result1 = mysqli_query($con,$sql1);
$food1 = mysqli_fetch_array($result1);



//change password
$pass = mysqli_real_escape_string($con, $_SESSION['login_password']);
$oldpass = mysqli_real_escape_string($con, $_POST['currentpass']);
$newpass = mysqli_real_escape_string($con, $_POST['newpass']);
$renewpass = mysqli_real_escape_string($con, $_POST['renewpass']);
$newpassword = md5($newpass);

if(($stall['Stall_ID']) === ($_SESSION['login_stallid'])){

	$curpass = md5($oldpass);
	if($pass === $curpass){

		if($newpass === $renewpass){

	$sql = "UPDATE stall SET Stall_Password = '$newpassword' WHERE Stall_ID = '$id'";
	$result = mysqli_query($con,$sql);
	echo "<script>alert('Update Success !');</script>";
	echo "<script>window.location.href = 'staff_login.php';</script>";
	session_destroy();
		}
		else{
			echo "<script>alert('New Password are not match!');</script>";
			//echo ('Error: ' .mysqli_error($con));
			echo "<script>window.location.href = 'home.php';</script>";
		}

	}
	else{
		echo "<script>alert('Current Used Password are not match!');</script>";
		//echo ('Error: ' .mysqli_error($con));
		echo "<script>window.location.href = 'home.php';</script>";
	}

}
else{
	echo "<script>alert('Update Fail la!');</script>";
	//echo ('Error: ' .mysqli_error($con));
	echo "<script>window.location.href = 'home.php';</script>";
}





?>

