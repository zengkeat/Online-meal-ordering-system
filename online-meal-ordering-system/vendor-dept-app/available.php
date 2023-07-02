<?php
session_start();

include('conn.php');

$errors = array();



$sql = "select * from food";
$result = mysqli_query($con, $sql);
$catego = mysqli_real_escape_string($_SESSION['login_category']);

if(mysqli_num_rows($result)<=0)
{
  die("<script>alert('No Food in the system now ! Add more !');</script>");

}
if (isset($_GET['submit'])) {
	if()
		while($rows = mysqli_fetch_array($result)){
			if($rows['Food_Category']== $catego){
			  echo "<div class='food_item img-thumbnail' style='max-width:300px;float:left'>
			  <img src='images/".$rows['Food_File']."' class='menu_food_images'>";
			  echo "<div class='food_price'><p class='food_price'>".$rows['Unit_Price']."</p></div></div>";
}
}
}





?>