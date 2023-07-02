<?php
session_start();
include("conn.php");
$errors = array();
 if (isset($_POST['submit'])) {



  	$foodname = mysqli_real_escape_string($con, $_POST['foodname']);
     $food_check = "SELECT * FROM fooda WHERE Food_Name= '$foodname' ";
      $result = mysqli_query($con, $food_check);
      $food = mysqli_fetch_assoc($result);

       	while ($food['Food_Name'] === $foodname) {
       		$foodname++;
       	}

	     if ($food['Food_Name'] === $foodname) 
	     { //echo "<script>alert('Food already exists')</script>";
	       echo "<script>window.location.href = 'test3.php';</script>";	     }
		else
		{ $sql = "INSERT INTO fooda (Food_Name)
		VALUES
		('$foodname')";
		echo "<script> alert ('Post Successful!');</script>";
		echo "<script>window.location.href = 'test3.php';</script>";
		}
if (!mysqli_query($con, $sql)) {
  die('Error: ' .mysqli_error($con));
}
mysqli_close($con);
}

?>
