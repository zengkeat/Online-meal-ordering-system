<?php session_start();

include("conn.php");
$errors = array();

//Edit Food Item
if(isset($_POST['update'])){
$editimage = $_FILES['image']['name'];
$file_tmp_name = $_FILES["image"]['tmp_name'];
$ididid = mysqli_real_escape_string($con, $_POST['idid']);
$editfood = mysqli_real_escape_string($con, $_POST['foodname']);
$editdescription = mysqli_real_escape_string($con, $_POST['fooddescription']);
$editprice = mysqli_real_escape_string($con, $_POST['foodprice']);
$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
$sql1 = "SELECT * from food WHERE Food_Name = '$editfood'";
$result1 = mysqli_query($con,$sql1);
$stall = mysqli_fetch_array($result1);
$foodie = $stall['Food_Name'];
$_SESSION['foodie'] = $editfood;


	$sql = "UPDATE food SET Food_Description = '$editdescription', Unit_Price = '$editprice', Food_File = '$editimage' WHERE Food_ID = '$ididid'";
	$result = mysqli_query($con,$sql);
	$location = "images/$editimage";
	move_uploaded_file($file_tmp_name,$location);
	echo "<script>alert('Edit Success !');</script>";
  	//echo ('Error: ' .mysqli_error($con));
	echo "<script>window.location.href = 'manage.php';</script>";
}
else{
	echo "<script>alert('Edit Fail !');</script>";
  	//echo ('Error: ' .mysqli_error($con));
	echo "<script>window.location.href = 'manage.php';</script>";
}

?>