<?php
session_start();
include("conn.php");
$errors = array();

//customer register
 if (isset($_POST['cusreg'])) {
 	$image = $_FILES['image']['name'];
  	$file_tmp_name = $_FILES["image"]['tmp_name'];
  	if (empty($image)) $image = "default.jpg";
  	$customerid = mysqli_real_escape_string($con, $_POST['customerid']);
  	$customername = mysqli_real_escape_string($con, $_POST['customername']);
  	$role = mysqli_real_escape_string($con, $_POST['role']);
  	$gender = mysqli_real_escape_string($con, $_POST['gender']);
  	$customerdescription = mysqli_real_escape_string($con, $_POST['customerdescription']);
	$customeric = mysqli_real_escape_string($con, $_POST['customeric']);
	$customeremail = mysqli_real_escape_string($con, $_POST['customeremail']);
	$contactnumber = mysqli_real_escape_string($con, $_POST['contactnumber']);
	$login_stallid = mysqli_real_escape_string($con, $_SESSION['login_staff']);
	//echo "$login_stallid";
		if($role == "Student" ){
			$customerididid = "TP".$customerid;
		}elseif($role == "Lecturer" ){
			$customerididid = "LC".$customerid;
		}elseif($role == "Staff" ){
			$customerididid = "ST".$customerid;
		}
     	$staff_check = "SELECT * FROM staff WHERE Staff_Username= '$login_stallid' ";
	    $result = mysqli_query($con, $staff_check);
	    //$staff = mysqli_fetch_assoc($result);
	    //$testing = $staff['Staff_Role'];
	    //echo "$testing";
	    $user_check = "SELECT * FROM customer WHERE Customer_ID = '$customerididid'";
	    $result1 = mysqli_query($con, $user_check);
	    //$user = mysqli_fetch_assoc($result1);
	    
	    if (mysqli_num_rows($result1) == 1){ 
	     	echo "<script>alert('Customer account already exists');</script>";
	     	// echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'cus_register.php';</script>";	     
	    }
		else
		{ 
			//echo $customerididid;
			$pass = md5($customerididid);
			$sql = "INSERT INTO customer (Customer_ID, Customer_Name, Customer_Password, Customer_Role, Customer_Gender, Customer_IC_No, Customer_Contact, Customer_Email, Customer_Description, Customer_Credit_Balance, Customer_File )
			VALUES
			('$customerididid', '$customername', '$pass',  '$role', '$gender', '$customeric', '$contactnumber', '$customeremail', '$customerdescription', '0.00' , '$image' )";
			$location = "images/$image";
			move_uploaded_file($file_tmp_name,$location);
			$result2 = mysqli_query($con, $sql);
			echo "<script> alert ('Sign Up Successful!');</script>";
			// echo ('Error: ' .mysqli_error($con));
			echo "<script>window.location.href = 'cus_register.php';</script>";
		}
	}


?>

