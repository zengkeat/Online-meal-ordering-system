<?php session_start();

include("base.php")?>


<div class="allall">

	

	<center><div class="container">
		<br><br>
		<?php


			if (isset($_GET['id'])){
			$fid = $_GET['id'];
			$id = mysqli_real_escape_string($con, $_SESSION['login_staff']);
			$sql = "SELECT * FROM post WHERE Post_ID = '$fid'";
			$result = mysqli_query($con, $sql);
			$post = mysqli_fetch_array($result);
			if(count($result) == 1 ){
				$idid = $post['Post_ID'];
				$_SESSION['postid'] = $idid;
				$title = $post['Post_Title'];
				$description = $post['Post_Description'];
				$images = $post['Post_File'];
			echo "<div class='edit_form'>";
			echo "<div><h2>Post Information</h2><br></div>";
			echo "<form class='login_form' method='post' action='update1.php' enctype='multipart/form-data'  onsubmit='return validateForm()' name='myForm'>";
			echo "<div class='all'>";
			echo "<div><input type='hidden' value='".$idid."' name='ididid' required>";
			echo "<label>Post Title :</label>";
			echo "<input type='text' name='posttitle' id='posttitle' placeholder='Enter Post Title here...' value='".$title."' pattern='[a-z]{1-100}[A-Z]{1-100}' title='Name must include 'Capital Letter'' required readonly>";
			echo "</div><br>";
			echo "<div>";
			echo "<label>Post Description :</label>";
			echo "<textarea type='text' name='postdescription' id='postdescription' placeholder='Enter Post Description here...' rows='3' required>";
			echo "".$description."";
			echo "</textarea>";
			echo "</div><br>";
			echo "<div>";
			echo "<label>Post Image :</label>";
			echo "<input type='file' name='editimg' id='editimg' required>";
			echo "</div><br><br>";
			echo "<button class='btn btn-outline-secondary butttt' type='submit' id='update' name='update'>Update</button>";
			echo "</div>";
			echo "</form>";
			echo "</div>";


			}
			else{
				echo "<script>alert('No data');</script>";
				echo "<script>window.location.href = 'manage.php';</script>";
			}
		}

		if(!isset($_SESSION['postid'])){
      		header('location:post.php');
      		session_write_close();
      		exit();
    }
		?><br><br>
		</div></center>










</div>
<script>
function validateForm() {
  var x = document.forms["myForm"]["ididid","posttitle","postdescription"].value;
  if (x == "") {
    alert("All textbox must be filled !");
    return false;
  }
}
</script>