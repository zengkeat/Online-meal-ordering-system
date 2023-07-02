<?php session_start();
	if (isset($_GET['logout'])) {
	   session_destroy();
	   unset($_SESSION['login_staff']);
	   header("location: staff_login.php");
	 }
	include("conn.php");
	include("base.php");
?>
<div class="allall">

	
<div class="container">
	<nav>
		<a href="upload_post.php"><input class="btn btn-outline-secondary wiwi" type="button" value="Click here to Upload new post !"></a>
	</nav>
	<div class="popo food_item_frame">
			<?php 
				$userid = mysqli_real_escape_string($con, $_SESSION['login_staff']);
				$post_check = "SELECT * FROM post";
				$result = mysqli_query($con, $post_check);

				if(mysqli_num_rows($result)<=0)
				{
				  die("<script>alert('No Food in the system now ! Add more !');</script>");
				}
				while($post = mysqli_fetch_array($result))
				{	$title = $post['Post_Title'];
    				$description = $post['Post_Description'];
    				$image = $post['Post_File'];
    				$id = $post['Post_ID'];
    				echo "<div class='bigbox'>";
    				echo "<div class='img-thumbnail smallbox'>";
    				echo "<div class='boximg'>";
			 		echo "<img class='img-thumbnail menu_food_images imgimg' src='images/".$image."' name='image'>";
			 		echo "<div class='bibioimg'>";
			 		echo "<div class='middle'>";
			 		echo "<a href='edit_post.php?id=".$id."' name='edit'><button class='btnnn'>Edit</button></a>";
			 		echo "</div></div>";
			 		echo "<div class='bibioimg1'>";
			 		echo "<div class='middle1'>";
			 		echo "<a href='delete.php?id=".$id."' name='delete'><button class='btnn'>Delete</button></a>";
			 		echo "</div></div>";
			 		echo "</div>";
			  		echo "<div class='food_price'><input type='hidden' name='foodder' style='text-overflow:ellipsis' value='".$title."'>".$title."</div>";
			  		echo "<div class='food_description'><input type='hidden' name='foodder' value='".$title."'>".$description."</div>";
			  		echo "</div>";
			  		echo "</div>";
			  		echo "<input type='hidden' name='submit' value='submit'>";
			  	}
    		?>
		</div>
	</div>





</div>
</div>