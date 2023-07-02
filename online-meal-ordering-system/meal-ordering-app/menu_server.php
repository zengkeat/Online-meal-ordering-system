<?php
if(isset($_POST["add_food_btn"])){

     if(isset($_SESSION["food_cart"])){

               $item_array = array(
                    'item_id'               =>      $_POST["hidden_id"],
                    'item_name'               =>     $_POST["hidden_name"],
                    'item_price'          =>     $_POST["hidden_price"],
                    'item_image'          =>     $_POST["hidden_image"],
                    'item_quantity'          =>     $_POST["food_quantity"]
               );
               array_push($_SESSION['food_cart'], $item_array);

               if ($_SERVER['REQUEST_URI'] == "/sdp/ap-grab%20meal/home.php") {
                  header("location:menu.php?Chinese");
               }else{
                 //get the current menu.php url because of its menu category, and redirect to the category where user
                 // add their food.
                 $menu_category = $_SERVER['REQUEST_URI'];
                 header("location:$menu_category");
               }

        }else{
          $item_array = array(
            'item_id'               =>    $_POST["hidden_id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_image'          =>     $_POST["hidden_image"],
            'item_quantity'          =>     $_POST["food_quantity"]
          );
          $_SESSION["food_cart"][0] = $item_array;

          if ($_SERVER['REQUEST_URI'] == "/sdp/ap-grab%20meal/home.php") {
             header("location:menu.php?Chinese");
          }else{
            //get the current menu.php url because of its menu category, and redirect to the category where user add their food.
            $menu_category = $_SERVER['REQUEST_URI'];
            header("location:$menu_category");
          }

     }
}

//food item delete
if(isset($_POST["delete_food_btn"])){
  $delete_id = $_POST["hidden_delete_food_id"];

  //inside $_SESSION['food_cart'] have a lot of array with value inside,
  // $keys is the array index and $values is the values inside that $keys array
  foreach($_SESSION["food_cart"] as $keys => $values){

    if($keys == $delete_id){

        unset($_SESSION["food_cart"][$keys]);
        // header('location:menu.php?Chinese');
             }

  }
}
//when click checkout button, validation of "get time".
if(isset($_POST['checkout_btn'])){

  if(isset($_POST['get_time'])){

    $get_time = $_POST['get_time'];
    $_SESSION['get_time']= $get_time;

    //get the current time
    $order_time = date("Y/m/d H:i:s");
    // add 1 hour into the current time
    $cenvertedTime = date('Y/m/d H:i:s',strtotime($get_time,strtotime($order_time)));
    $_SESSION['estimated_time'] = $cenvertedTime;

    // generate Tracking number
    $first_tracking_number = rand(10000,999999);
    $second_tracking_number = rand(1000,99999);
    $tracking_number = "T-".$first_tracking_number."-".$second_tracking_number;
    $_SESSION['tracking_number'] = $tracking_number;

    if($get_time == 'Get-Time'){
      // triger the modal
      echo '<script type="text/javascript">';
      echo '$(document).ready(function() {';
      echo '$("#GetModal").modal("show");';
      echo '});';
      echo '</script>';
    }else{
          header('location:payment.php');
    }
}
}

// WHEN CLICKING "CONFIRM ORDER" button
if(isset($_POST['confirm_btn'])){

  $total_price = $_POST['confirm_total_price'];
  $total_quantity = $_POST['confirm_total_quantity'];
  if($_SESSION['customer_balance'] <= $total_price){
    echo '<script type="text/javascript">';
    echo '$(document).ready(function() {';
    echo '$("#NotEnoughCredit").modal("show");';
    echo '});';
    echo '</script>';
  }else{
    $payment = $_SESSION['customer_balance'] - $total_price;
    $customer_id = $_SESSION['customer_tp'];
    $sql = mysqli_query($con, "UPDATE customer SET Customer_Credit_Balance = '$payment' WHERE Customer_ID='$customer_id' ");

    $food_id_array = array();
    foreach($_SESSION['food_cart'] as $keys => $values){
      $item_quantity = $values['item_quantity'];
      $arr= array();

      for($x= 0; $x < $item_quantity; $x++){
         array_push($arr,$values['item_id']);
      }
      array_push($food_id_array,$arr);
    }

    $save_id = '';
    foreach($food_id_array as $key => $value){
      foreach($value as $key => $id){
        // echo $id;
        $save_id = $save_id.$id;
      }
    }

    // to get all the data out for insert into the database.
    $customer_id = $_SESSION['customer_tp'];
    $total_price = $_POST['confirm_total_price'];
    $total_quantity = $_POST['confirm_total_quantity'];
    $order_time = date("Y/m/d H:i:s");
    $get_time = $_SESSION['get_time'];
    $tracking_number = $_SESSION['tracking_number'];
    $estimated_time = $_SESSION['estimated_time'] ;
    $order_remark = $_POST['order_remark'];
    $Prepare_time = date('Y-m-d H:i:s',strtotime('-15 minutes',strtotime($estimated_time)));

    $insert_order = mysqli_query($con, "INSERT INTO orders (Food_ID, Customer_ID, Total_Item, Order_Date, Order_Get_Time, Order_Estimated_Time,
       Order_Prepare_Time, Order_Tracking_Number, Order_Total_Price, Order_Remark) VALUES ('$save_id', '$customer_id','$total_quantity',
         '$order_time','$get_time','$estimated_time', '$Prepare_time','$tracking_number','$total_price','$order_remark') ");

         unset($_SESSION["get_time"],$_SESSION["tracking_number"],$_SESSION["estimated_time"],
         $_SESSION["food_cart"]);

    // echo '<script>alert("Payment Successful!!")</script>';
    echo '<script>window.location="thank_you.php"</script>';

  }
}

?>
