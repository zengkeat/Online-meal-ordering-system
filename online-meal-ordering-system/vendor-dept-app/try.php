<?php session_start(); 

?> 


<?php

// the fucntion that count the amount of specific element in the array.
function count_array_values($my_array, $match){
    $count = 0;

    foreach ($my_array as $key => $value){
        if ($value == $match){
            $count++;
        }
    }

    return $count;
}

if (isset($_POST["order_favorite"])) {

  $order_id = $_POST["hidden_order_id"];

  // retrive the food_id, price, and total item from that particular order_id
  $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$order_id' ");

  $row = mysqli_fetch_array($get_order);

  $food_id = $row['Food_ID'];

  // because the food_id contains many food, so split it by 4 character which is our legth of the food id.
  // after using str_split, the "$split_food_id" will turn to an array that store the split information.
  // E.g. from [F004F004F005F005F002]  => [F004,F004,F005,F005,F002];
  $split_food_id = str_split($food_id, 4);

  // after splitting the food_id into array, then now we can retrieve the food name from the food_id
  $food_array =array();
  foreach(array_unique($split_food_id) as $f_id){
      $get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'");
      $food_name_row = mysqli_fetch_array($get_food_id);
      // RETRIVE FOOD ID, NAME, PRICE, IMAGE
      $food_id = $food_name_row['Food_ID'];
      $food_name = $food_name_row['Food_Name'];
      $food_unit_price = $food_name_row['Unit_Price'];
      $food_image = $food_name_row['Food_File'];

      //count how many specific $f_id is in the array
      $count_duplicated_food = count_array_values($split_food_id, $f_id);

      // insert all the food details in the food_cart.
      if(isset($_SESSION["food_cart"])){

        $item_array = array(
            'item_id'               =>      $food_id,
            'item_name'               =>     $food_name,
            'item_price'          =>     $food_unit_price,
            'item_image'          =>     $food_image,
            'item_quantity'          =>     $count_duplicated_food
        );
          array_push($_SESSION['food_cart'], $item_array);

         }else{
           $item_array = array(
             'item_id'               =>      $food_id,
             'item_name'               =>     $food_name,
             'item_price'          =>     $food_unit_price,
             'item_image'          =>     $food_image,
             'item_quantity'          =>     $count_duplicated_food
        );
           $_SESSION["food_cart"][0] = $item_array;
      }

      header("location: my_favourite.php");
}
}
?>