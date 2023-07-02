<?php
session_start();
include("conn.php");
$errors = array();
?>


<?php //edit user
	if (isset($_POST['update'])) {
		$userid = mysqli_real_escape_string($con, $_POST['userid']);
  		$usercontact = mysqli_real_escape_string($con, $_POST['usercontact']);
  		$useremail = mysqli_real_escape_string($con, $_POST['useremail']);
  		$userdescription = mysqli_real_escape_string($con, $_POST['userdescription']);

  		$user_check = "SELECT * FROM customer";
      	$result = mysqli_query($con, $user_check);
      	$user = mysqli_fetch_array($result);

      	if($user = mysqli_fetch_array($result)){
  		$sql = "UPDATE customer SET Customer_Contact = '$usercontact' , Customer_Email = '$useremail' , Customer_Description = '$userdescription' WHERE Customer_ID = '$userid'";
		$result1 = mysqli_query($con, $sql);
		echo "<script> alert ('Update Successful !');</script>";
		//echo ('Error: ' .mysqli_error($con));
		echo "<script>window.location.href = 'database.php';</script>";
		}
		else
		{
	      	echo "<script>alert('Update Fail !')</script>";
	      	//echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'database.php';</script>";	     
	    }
	
}
else{
	echo "<script>alert('Update Fail !')</script>";
	//echo ('Error: ' .mysqli_error($con));
	echo "<script>window.location.href = 'database.php';</script>";	    
}
?>