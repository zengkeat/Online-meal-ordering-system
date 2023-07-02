<?php 
session_start();
include("conn.php");
$errors = array();
//upload post
	if (isset($_POST['upload'])) {
		$postimg = $_FILES['postimg']['name'];
  		$file_tmp_name = $_FILES["postimg"]['tmp_name'];
  		if (empty($postimg)) $postimg = "images/default.jpg";
  		$postname = mysqli_real_escape_string($con, $_POST['postname']);
  		$postdescription = mysqli_real_escape_string($con, $_POST['postdescription']);
  		$id = mysqli_real_escape_string($con, $_SESSION['login_staff_id']);

  		$post_check = "SELECT * FROM post WHERE Post_Title = '$postname' ";
      	$result = mysqli_query($con, $post_check);
      	$post = mysqli_fetch_assoc($result);

  		if(mysqli_num_rows($result) == 1) 
	    {
	      	echo "<script>alert('Post Title is already exists !')</script>";
	      	//echo ('Error: ' .mysqli_error($con));
	       	echo "<script>window.location.href = 'upload_post.php';</script>";	     
	    }
		else
		{ $sql1 = "INSERT INTO post (Staff_ID, Post_Title, Post_Description, Post_Timestamp, Post_File )
		VALUES
		('$id', '$postname', '$postdescription', now() , '$postimg')";
		$location = "images/$postimg";
		move_uploaded_file($file_tmp_name,$location);
		$result2 = mysqli_query($con, $sql1);
		echo "<script> alert ('Post Successful !');</script>";
		//echo ('Error: ' .mysqli_error($con));
		echo "<script>window.location.href = 'post.php';</script>";
		}
	}
?>

