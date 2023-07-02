<?php
session_start();
include("conn.php");
$errors = array();
?>


<?php //edit post
	if (isset($_POST['update'])) {
		$image = $_FILES['editimg']['name'];
  		$file_tmp_name = $_FILES["editimg"]['tmp_name'];
  		if (empty($image)) $image = "images/default.jpg";
  		$ididid = mysqli_real_escape_string($con, $_POST['ididid']);
  		$posttitle = mysqli_real_escape_string($con, $_POST['posttitle']);
  		$postdescription = mysqli_real_escape_string($con, $_POST['postdescription']);

  		$post_check = "SELECT * FROM post";
      	$result = mysqli_query($con, $post_check);
      	$post = mysqli_fetch_assoc($result);

      	if($post = mysqli_fetch_assoc($result)){
	    $sql = "UPDATE post SET Post_Description = '$postdescription' , Post_Timestamp = now() , Post_File = '$image' WHERE Post_Title = '$posttitle'";
		$location = "images/$image";
		move_uploaded_file($file_tmp_name,$location);
		$result2 = mysqli_query($con, $sql);
		echo "<script> alert ('Update Successful !');</script>";
		//echo ('Error: ' .mysqli_error($con));
		echo "<script>window.location.href = 'post.php';</script>";
		}
		else
		{
	      	echo "<script>alert('Update Fail !')</script>";
	      	//echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'post.php';</script>";	     
	    }
	}
else
		{
	      	echo "<script>alert('Update Fail !')</script>";
	      	//echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'post.php';</script>";	     
	    }
?>