<?php session_start();

include("conn.php");
$errors = array();

$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
$sql3 = "SELECT * from stall WHERE Stall_ID = '$id'";
$result3 = mysqli_query($con, $sql3);
$stall = mysqli_fetch_array($result3);

if(($stall['Stall_ID']) === ($_SESSION['login_stallid'])){

	if(isset($_POST['submit'])){
		$available = mysqli_real_escape_string($con, $_POST['available']);
		$foodder = mysqli_real_escape_string($con, $_POST['foodder']);
		$sql1 = "SELECT * from food WHERE Food_Name = '$foodder'";
		$result1 = mysqli_query($con, $sql1);
		$food = mysqli_fetch_array($result1);
			if($available == ''){
				"<script>alert('Please select first !');</script>";
				"<script>window.location.href = 'home.php';</script>";
			}
			else{
				if($food['Food_Name'] === $_POST['foodder']){

					$sql = "UPDATE food SET Food_Status = '$available' WHERE Food_Name = '$foodder'";
					$result = mysqli_query($con,$sql);
					echo "<script>alert('Update Success !');</script>";
					//echo ('Error: ' .mysqli_error($con));
					echo "<script>window.location.href = 'home.php';</script>";
				}
				else{
					echo "<script>alert('Update Fail la 1 !');</script>";
					echo "<script>window.location.href = 'home.php';</script>";
				}
			}
	
	}else{
		echo "<script>alert('Update Fail la 2 !');</script>";
		echo "<script>window.location.href = 'home.php';</script>";
	}

}
else{
	echo "<script>alert('Update Fail la 3 !');</script>";
	echo "<script>window.location.href = 'home.php';</script>";
}

?>