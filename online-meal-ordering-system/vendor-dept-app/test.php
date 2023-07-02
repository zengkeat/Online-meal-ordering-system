<?php session_start();
include('base.php');
?>
<div class="idkhowla">
<?php
$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
  $customer_tp = $_SESSION['customer_tp'];

  //filter the current login customer put in the favourite table.
  $get_favo = mysqli_query($con, "SELECT * FROM food WHERE Stall_ID = '$id'");

  // then, loop throught the rows.
  while($row = mysqli_fetch_array($get_favo)){

  //get the order_id from the row.
  $order_id = $row["Food_ID"];

  // retrive the food_id, price, and total item from that particular order_id
  $get_order = mysqli_query($con, "SELECT * FROM orders");

  $f_row = mysqli_fetch_array($get_order);

  $food_id = $f_row['Food_ID'];
  $total_item = $f_row['Total_Item'];
  $order_price = $f_row['Order_Total_Price'];

  // because the food_id contains many food, so split it by 4 character which is our legth of the food id.
  // after using str_split, the ""$split_food_id" will turn to an array that store the split information.
  $split_food_id = str_split($food_id, 4);

  // after splitting the food_id into array, then now we can retrieve the food name from the food_id
if($food_id === $order_id){

  $food_array =array();
  foreach($split_food_id as $f_id){
      $get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'");
      $food_name_row = mysqli_fetch_array($get_food_id);
      $food_name = $food_name_row['Food_Name'];
      // push the food name into the $food_array
      array_push($food_array, $food_name);
  }

  echo "<div class='favorite_info' >";
  foreach($food_array as $food_n){
    echo "$food_n,";
   }
   echo "<br>";
   echo "total item: $total_item";
   echo "</div>";

   echo "<div class='favorite_detail'>";
    echo "RM$order_price<br>";
    echo "<button>Order</button>";
    echo "</div>";
    echo "<hr style='margin-top:80px;'>";
}
}
 ?>
</div>