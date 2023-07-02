<?php
while($row = mysqli_fetch_array($sql)){

echo "<form method='post'> ";
echo "<div class='food_item img-thumbnail '>";

// food title and the information button
echo "<p style='font-size:20px;'>".$row['Food_Name']."
<button type='button' class='btn btn-secondary btn_information' data-container='body' data-toggle='popover' data-placement='bottom' data-content='".$row['Food_Description']."'>
  i
</button></p>";

echo "<img class='menu_food_images' src='../vendor-dept-app/images/".$row['Food_File']."' >";

echo "<div class='food_price'>";
echo "<p class='food_unit_price float-left' style=''>RM".$row['Unit_Price']."</p>";

// if the food is available then show "Add", else, disable the button and show"Unavailable".
if($row["Food_Status"] == "available"){
// hidden field for getting value when button is "issset"
echo "<button type='submit' class='add_food_btn btn btn-warning' name='add_food_btn'>Add</button>";
echo "<input type='number' name='food_quantity' style='width:50px;' class='food_input_amount float-right' value='1' min='1' max='5' >";

echo "<input type='hidden' name='hidden_id' value='".$row['Food_ID']."'> ";
echo "<input type='hidden' name='hidden_name' value='".$row['Food_Name']."'> ";
echo "<input type='hidden' name='hidden_price' value= '".$row['Unit_Price']."'> ";
echo "<input type='hidden' name='hidden_image' value= '".$row['Food_File']."'> ";

}else{
echo "<button type='button' class='add_food_btn btn btn-secondary'  disabled>Unavailable</button>";
}
echo "</div>";

echo "</div>";
 echo "</form>";
}
 ?>
