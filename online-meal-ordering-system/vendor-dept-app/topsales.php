<?php session_start();

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_stall']);
   header("location: staff_login.php");
 }

include("base.php");
include ("conn.php")
?>

<div class="whole">
	<nav class="navbar navbar-light ayoyolaoshi">
		<div>
			<a class="navbar-brand">Here you can view your item list and also add more new food item in your stall!</a>
		</div>
	</nav>
<div class="container haizzzaaa">
	<div class="spiderman2">
		<div class="spiderman1">
			<a href="manage.php"><button class="spiderman3 btn-outline-secondary">Manage Item</button></a>
		</div>
	<div class="tablecon alaloi">
				
		<table class="table">
			<?php
				$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
				$caca = mysqli_real_escape_string($con, $_SESSION['login_category']);
				$food_check = mysqli_query($con, "SELECT * FROM food WHERE Stall_ID = '$id'");

										function count_array_values($my_array, $match){
												$count = 0;

												foreach ($my_array as $key => $value){
														if ($value == $match){
																$count++;
														}
												}

												return $count;
										}

				// if(mysqli_num_rows($food_check)<=0)
				// {
				//   	echo"<script>alert('No Food in the system now ! Add more !');</script>";
				//   	echo "<tr>";
    //                 echo "<td>";
    //                 echo "No Food Now !";
    //                 echo "</td>";
    //                 echo "</tr>";
				// }else{

					while($food = mysqli_fetch_array($food_check)){
						// $food = mysqli_fetch_array($food_check);
						$name = $food['Food_Name'];
						// echo $name;
						$fid = $food['Food_ID'];
						// echo $fid;
						$sales_check = mysqli_query($con, "SELECT * FROM sales WHERE Stall_ID = '$id' ");
						while($sales = mysqli_fetch_array($sales_check)){
							$sales_food = $sales['Food_ID'];
							// echo $sales_food;
							$split_food_id = str_split($sales_food, 4);
							$food_array =array();
							$food_array1 = array();

							foreach($split_food_id as $f_id){

								$get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID='$f_id' and Stall_ID = '$id' and Food_ID = '$fid' " );
								$food_name_row = mysqli_fetch_array($get_food_id);
								$food_name = $food_name_row['Food_Name'];
								$food_id = $food_name_row['Food_ID'];
								array_push($food_array, $food_name);
								array_push($food_array1, $food_id);
							}
							// print_r($food_array);
							// print_r($food_array1);
							$resultarray = array();
							foreach ($food_array1 as $key => $value) {
								// foreach($value as $key_1 => $value_1){
								// echo $value;
							      array_push($resultarray,$value);
								// }
							   }
							   // print_r($resultarray);




							$foodididid = "";
							foreach($resultarray as $f_id){

								$foodididid = $foodididid.$f_id;
							}
							// echo $foodididid;
						
						$split_food_id1 = str_split($foodididid, 4);
						$food_array2 =array();
						foreach($split_food_id1 as $f_id1){
							$getfood = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id1' ");
							$food_name_row1 = mysqli_fetch_array($getfood);
							$goodname = $food_name_row1['Food_Name'];
							array_push($food_array2, $goodname);
						}
						// print_r($food_array2);

					$count_duplicated_food = "";
                    foreach (array_unique($food_array2) as $key => $food_n) {
                        $count_duplicated_food = count_array_values($food_array2, $food_n);

                        if (array_key_exists($key, $food_array2) && is_null($food_array2[$key])) {
                        }else{
                        }

                    // }echo $count_duplicated_food;
						}}
						// print_r($food_array2);




						
						if(!array_filter($food_array)){
							echo "<tbody>";
							echo "<tr>";
							echo "<td>";
							echo "<input type='hidden' name='foodidlai' value='".$fid."'>";

                    foreach (array_unique($food_array) as $key => $food_n) {
                        if (array_key_exists($key, $food_array) && is_null($food_array[$key])) {
                          echo "<a class='havnomen'>".$name."</a>";
                        }else{
                        }

                    }
							echo "<a href='topsales.php?id=".$fid."' name='itemdetail' class='btnm btn btn-outline-info'>View</a>";
							echo "</td>";
							echo "</tr>";
							echo "</tbody>";

						}elseif(!is_null($food_array)){
							echo "<tbody>";
							echo "<tr>";
							echo "<td>";
							echo "<input type='hidden' name='foodidlai' value='".$fid."'>";
                    foreach (array_unique($food_array) as $key => $food_n) {
                        if (array_key_exists($key, $food_array) && is_null($food_array[$key])) {
                        }else{
                          echo "".$name."";
                        }

                    }
							echo "<a href='topsales.php?id=".$fid."' name='itemdetail' class='btnm btn btn-outline-info'>View</a>";
							echo "</td>";
							echo "</tr>";
							echo "</tbody>";
						}





							
			}

			?>
		</table>
</div>
</div>

<div>
	<div class="add_form">
		<div>
			<h2>Item Detail</h2>
		</div>
			<form class="login_form" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm" >
				<?php 
					if(isset($_GET['id'])){
						$fidididididid = $_GET['id'];
						$itemsql = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$fidididididid' ");
						$click_item = mysqli_fetch_array($itemsql);
						$click_image = $click_item['Food_File'];
	    				$click_name = $click_item['Food_Name'];
	    				$click_price = $click_item['Unit_Price'];
	    				$click_id = $click_item['Food_ID'];
	    				$click_description = $click_item['Food_Description'];
	    				$click_status = $click_item['Food_Status'];

	    				echo "<div class='spider2'>";
	    				echo "<center><div class='img-thumbnail spider1'>";
				 		echo "<img class='img-thumbnail spider' src='images/".$click_image."'>";
				 		echo "</div>";
				 		echo "<div class='spider3'>";
				 		echo "<div class='spider4'>This food is now ".$click_status."</div><br>";
				 		echo "<div class='spider4'>Name    : ".$click_name."</div>";
					    echo "<div class='spider4'>Price   : ".$click_price."</div>";
				  		echo "<div class='spider4'>".$click_description."</div>";
				  		echo "</div>";
				  		echo "</center></div>";
					}elseif(!isset($_GET['id'])){
						echo "<center><div>";
						echo "<div><br><br><h1 class='itemsl'>";
						echo "No Item is selected !";
				  		echo "</h1><br>";
				  		echo "<h3 class='itemsl'>Selrct to show item info ..</h3>";
				  		echo "</div>";
				  		echo "</center></div>";
					}
				?>
			</form>
	</div>
</div>
</div>






</div>
<script>
function validateForm() {
  var x = document.forms["myForm"]["foodname","fooddescription","foodprice","image"].value;
  if (x == "") {
    alert("All textbox must be filled !");
    return false;
  }
}
</script>
