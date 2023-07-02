<?php
session_start();
include("conn.php");
$errors = array();
 if (isset($_POST['submit'])) {
  	$image = $_FILES['image']['name'];
  	$file_tmp_name = $_FILES["image"]['tmp_name'];
  	$foodname = mysqli_real_escape_string($con, $_POST['foodname']);
	$fooddescription = mysqli_real_escape_string($con, $_POST['fooddescription']);
	$login_category = mysqli_real_escape_string($con, $_SESSION['login_category']);
	$foodprice = mysqli_real_escape_string($con, $_POST['foodprice']);
	$login_stallid = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
     $food_check = "SELECT * FROM food WHERE Food_Name= '$foodname' ";
      $result = mysqli_query($con, $food_check);
      $foodidid = rand(100,999);
      $food = mysqli_fetch_assoc($result);
      $foodid = "F".$foodidid;
      $foodstatus = "unavailable";
      echo "$foodid";
	     if ($food['Food_Name'] === $foodname) 
	     { echo "<script>alert('Food already exists')</script>";
	       echo "<script>window.location.href = 'manage.php';</script>";	     }
		else
		{ $sql = "INSERT INTO food (Food_ID, Stall_ID, Food_Name, Food_Category, Unit_Price, Food_Description, Food_File, Food_Status)
		VALUES
		('$foodid', '$login_stallid', '$foodname',  '$login_category', '$foodprice', '$fooddescription', '$image', '$foodstatus')";
		$location = "images/$image";
		move_uploaded_file($file_tmp_name,$location);
		echo "<script> alert ('Post Successful!');</script>";
		echo "<script>window.location.href = 'manage.php';</script>";
		}
if (!mysqli_query($con, $sql)) {
  die('Error: ' .mysqli_error($con));
}
mysqli_close($con);
}
?>
