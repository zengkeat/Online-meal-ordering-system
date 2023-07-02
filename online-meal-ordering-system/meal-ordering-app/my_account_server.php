<?php
    $errors = array();
// when clicking cancel order button in Track order page
if (isset($_POST["cancel_order"])) {

  $today_datetime = date("Y-m-d H:i:s");
  $prepare_datetime = $_POST["hidden_prepare_datetime"];
  $order_id = $_POST["hidden_order_id"];
  $refund_amount = $_POST["hidden_order_price"];
  $customer_id = $_SESSION['customer_tp'];

  if ($today_datetime > $prepare_datetime) {
    // code...
  }else{
    // delete the order
    $sql = mysqli_query($con, "DELETE FROM orders WHERE Order_ID = '$order_id' ");
    // updates the money back to customer credit
    $refund = mysqli_query($con,"UPDATE customer SET Customer_Credit_Balance = '$refund_amount' WHERE Customer_ID ='$customer_id' ");
    header("location: track_order.php");
  }

}

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

 // when clicking Set Favourite button in Order history page
 if (isset($_POST["set_favorite"])) {
   $order_id = $_POST["hidden_order_id"];
   $customer_id = $_SESSION['customer_tp'];
   $sql = mysqli_query($con, "INSERT INTO favourite_order (Order_ID, Customer_ID) VALUES ('$order_id', '$customer_id') ");
   // header("location: track_order.php");
 }

// when clicking order now at favourite page
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

// when clicking remove Favourite button in favourite page
if (isset($_POST["favorite_delete"])) {
  $favo_id = $_POST["hidden_favorite_id"];
  $sql = mysqli_query($con, "DELETE FROM favourite_order WHERE Favourite_ID = '$favo_id' ");
}


// when clicking submit when edit detail in profile page
if (isset($_POST["submit_edit_details"])) {
  $customer_id = $_SESSION['customer_tp'];
  $get_contact = $_POST["customer_contact"];
  $get_email = $_POST["customer_email"];

  if(empty($get_contact) or empty($get_email)){

  }else{
    $sql = mysqli_query($con, "UPDATE customer SET Customer_Contact= '$get_contact', Customer_Email='$get_email' WHERE Customer_ID = '$customer_id' ");
    // triger the modal
    echo '<script type="text/javascript">';
    echo '$(document).ready(function() {';
    echo '$("#success_detail_modal").modal("show");';
    echo '});';
    echo '</script>';

    header("Refresh:2; url=profile.php" );
  }
}


// profile picture insert after pressing submit button
  if(isset($_POST["profile_picture_submit"])){
    $customer_id = $_SESSION['customer_tp'];
    $file_name = $_FILES["profile_picture"]['name'];
    $file_tmp_name = $_FILES["profile_picture"]['tmp_name'];

    if (empty($file_name)) {

    }else{
       $location = "../system-admin-app/images/$file_name";
       mysqli_query($con, "UPDATE customer SET Customer_File='$file_name' WHERE Customer_ID='$customer_id' ");
     }

    if (move_uploaded_file($file_tmp_name,$location)){
      echo '<script>window.location="profile.php"</script>';
          }
}

// submit for change password
  if(isset($_POST["change_password_submit"])){

    $customer_id = $_SESSION['customer_tp'];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $re_enter_password = $_POST["re_enter_password"];

    $sql = mysqli_query($con, "SELECT Customer_Password FROM customer WHERE Customer_ID='$customer_id' ");
    $row = mysqli_fetch_array($sql);
    $old_password = $row["Customer_Password"];
    $encrypt_current_password = md5($current_password);

    $count_password = str_split($new_password);

    if (empty($current_password)) {
      array_push($errors, "Please enter your current password.");
    }elseif($encrypt_current_password != $old_password){
        array_push($errors, "Current Password is incorrect.");
    }

    if (empty($new_password)) {
       array_push($errors, "Please enter your new password.");
     }elseif($count_password<=7){
       array_push($errors, "Password must atleast 8 character.");
     }

    if (empty($re_enter_password)) {
      array_push($errors, "Please re-enter your new password.");
    }elseif($new_password != $re_enter_password){
      array_push($errors, "The two new passwords do not match.");
    }

    // Finally, change password if there are no errors in the form
    if (count($errors) == 0) {
    	$password = md5($new_password);//encrypt the password before saving in the database

      mysqli_query($con, "UPDATE customer SET Customer_Password ='$password' WHERE Customer_ID='$customer_id' ");
      // triger the modal
      echo '<script type="text/javascript">';
      echo '$(document).ready(function() {';
      echo '$("#success_password").modal("show");';
      echo '});';
      echo '</script>';
   }else{
     echo '<script>window.location="profile.php#back_here"</script>';
   }


}


 ?>
