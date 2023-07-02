<?php session_start();

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_stall']);
   header("location:../meal-ordering-app/staff_login.php");
 }
include("conn.php");
include("base.php");?>



	<div class="caca">

		<nav class="navbar navbar-light cacaca">
			<div class="narvar-brand">
				<a class="navbar-brand"><b>Welcome Back!    <?php echo $_SESSION['login_stall'];?></b></a>
				<div class="card qeqwe">
					<div class="card-body">
						<p class="card-text"><?php echo $_SESSION['login_description'];?></p>
					</div>
				</div>
			</div>
		</nav>

	<div class="container">
		<div class="connocon" class="food_item_frame">
			<?php 
				$foodcategory = mysqli_real_escape_string($con, $_SESSION['login_category']);
				$food_check = "SELECT * FROM food WHERE Food_Category= '$foodcategory' ";
				$result = mysqli_query($con, $food_check);

				if(mysqli_num_rows($result)<=0)
				{
				  die("<script>alert('No Food in the system now ! Add more !');</script>");
				}
				while($result1 = mysqli_fetch_array($result))
				{	$image = $result1['Food_File'];
    				$name = $result1['Food_Name'];
    				$price = $result1['Unit_Price'];
    				$id = $result1['Food_ID'];
    				echo "<form action='update2.php' method='post' id='availableform' required>";
    				echo "<div class='ichiban'>";
    				echo "<div class='img-thumbnail erchiban'>";
    				echo "<div class='sanchiban'>";
			 		echo "<img class='img-thumbnail sichiban' src='images/".$image."'>";
			 		echo "<div class='middle3'>";
				    echo "<div ><a href='edit.php?id=".$result1['Food_ID']."' name='edit' class='btnm btn btn-outline-secondary'>Edit</a></div>";
				    echo "</div>";
			 		echo "</div>";
			  		echo "<div class='food_price wuchiban'><input type='hidden' name='foodder' value='".$name."'>".$name."</div>";
			  		echo "<div class='liuchiban'><input type='radio' name='available' value='available' required>Available</div>";
			  		echo "<div class='qichiban'><input type='radio' name='available' value='unavailable' required>Unavailable</div>";
			  		echo "<button class='btn btn-outline-secondary  hitouch' type='submit' name='submit' value='submit'>Update</button>";
			  		echo "</div>";
			  		echo "</div>";
			  		echo "</form>";
			  	}
    		?>
		</div>
	</div>
	</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">^</button>

</div>

