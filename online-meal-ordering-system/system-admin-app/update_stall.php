<?php
session_start();
include("conn.php");
$errors = array();
?>


<?php //edit post
	if (isset($_POST['stallreg'])) {
		$stallidid = mysqli_real_escape_string($con, $_POST['stallidid']);
  		$stallname = mysqli_real_escape_string($con, $_POST['stallname']);
  		$stallowner = mysqli_real_escape_string($con, $_POST['stallowner']);
  		$stallname = mysqli_real_escape_string($con, $_POST['stallname']);
  		$category = mysqli_real_escape_string($con, $_POST['category']);
  		$stalldescription = mysqli_real_escape_string($con, $_POST['stalldescription']);
  		$stallcontact = mysqli_real_escape_string($con, $_POST['stallcontact']);
  		$stallemail = mysqli_real_escape_string($con, $_POST['stallemail']);

  		$stall_check = "SELECT * FROM stall";
      	$result = mysqli_query($con, $stall_check);
      	$post = mysqli_fetch_assoc($result);

      	if($post = mysqli_fetch_assoc($result)){
	    $sql = "UPDATE stall SET Stall_Owner = '$stallowner' , Stall_Name = '$stallname' , Stall_Category = '$category'  , Stall_Description = '$stalldescription' , Stall_Contact = '$stallcontact' , Stall_Email = '$stallemail' WHERE Stall_ID = '$stallidid'";
		$result2 = mysqli_query($con, $sql);
		echo "<script> alert ('Update Successful !');</script>";
		//echo ('Error: ' .mysqli_error($con));
		echo "<script>window.location.href = 'database1.php';</script>";
		}
		else
		{
	      	echo "<script>alert('Update Fail !')</script>";
	      	//echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'database1.php';</script>";	     
	    }
	}
else
		{
	      	echo "<script>alert('Update Fail !')</script>";
	      	//echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'database1.php';</script>";	     
	    }
?>