<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Track Order";

include("base.php");
include("my_account_server.php");
// include("menu_server.php");
 ?>
<div class="container">
<h3>Recent Order</h3>
<small style="font-size:18px;">Only your today order will be show here.</small>

<div class="track_order_frame img-thumbnail">
  <h5 style="margin: 10px 0 0 25px;">Today Order <span style="float:right; margin:0 260px 0 0;">Action</span></h5>
  <hr>
  <?php

    $customer_tp = $_SESSION['customer_tp'];

    //filter the current login customer from order table
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today_date = date("Y-m-d");
    $today_time = date("H:i:s");
    $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID = '$customer_tp' and DATE(Order_date) = '$today_date' ORDER BY Order_date DESC ");


      if(mysqli_num_rows($get_order)>0){
    // then, loop throught the rows.
    while($row = mysqli_fetch_array($get_order)){

    //get all the data from that row
    $order_id = $row['Order_ID'];
    $food_id = $row['Food_ID'];
    $order_date = date("H:i:s",strtotime($row['Order_date']));
    $get_time = $row['Order_Get_Time'];
    $estimated_time = date("H:i:s",strtotime($row['Order_Estimated_Time']));
    $tracking_number = $row['Order_Tracking_Number'];
    $Prepare_time = date("H:i:s",strtotime($row['Order_Prepare_Time']));
    $total_item = $row['Total_Item'];
    $order_price = $row['Order_Total_Price'];
    $order_remark  =$row['Order_Remark'];


    // because the food_id contains many food, so split it by 4 character which is our legth of the food id.
    // after using str_split, the ""$split_food_id" will turn to an array that store the split information.
    $split_food_id = str_split($food_id, 4);

    // after splitting the food_id into array, then now we can retrieve the food name from the food_id
    $food_array =array();
    foreach($split_food_id as $f_id){
        $get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'");
        $food_name_row = mysqli_fetch_array($get_food_id);
        $food_name = $food_name_row['Food_Name'];
        // push the all the food name into the $food_array
        array_push($food_array, $food_name);
    }

    echo "<div class='track_order_info' style='color:#636363;'>";
    foreach(array_unique($food_array) as $food_n){
         //count how many specific $food_name is in the array
         $count_duplicated_food = count_array_values($food_array, $food_n);
         echo "<span style='color:black;'>".$count_duplicated_food."x ".$food_n.", "."</span>";
     }
     echo "<br>";
     echo "Tracking Number: <span style='color:black;'>$tracking_number</span><br>";
     echo "Order Time: <span style='color:black;'>$order_date</span><br>";
     echo "Get-Time:<span style='color:black;'> $get_time later</span><br>";
     echo "Estimated-Time:<span style='color:black;'> $estimated_time later</span><br>";
     echo "Total item: <span style='color:black;'>$total_item</span><br>";
     echo "You are allow to cancel the order<span style='color:black;'> BEFORE $Prepare_time</span>";
     echo "</div>";

      echo "<div class='track_order_price'>";
      echo "<span style='font-size:25px;'>RM$order_price</span><br>";

      echo "<form class=''  method='post'>";

      echo "<input type='hidden' name = 'hidden_order_id' value= '$order_id'>";
      echo "<input type='hidden' name = 'hidden_order_date' value= '$order_date'>";
      echo "<input type='hidden' name = 'hidden_get_time' value= '$get_time'>";
      echo "<input type='hidden' name = 'hidden_esti_time' value= '$estimated_time'>";
      echo "<input type='hidden' name = 'hidden_trac_num' value= '$tracking_number'>";
      echo "<input type='hidden' name = 'hidden_total_item' value= '$total_item'>";
      echo "<input type='hidden' name = 'hidden_food_id' value= '$food_id'>";
      echo "<input type='hidden' name = 'hidden_total_price' value= '$order_price'>";

      // refund money to customer balance when cancel the order
      $refund = $_SESSION['customer_balance'] + $order_price;
      echo "<input type='hidden' name = 'hidden_order_price' value= '$refund'>";
      echo "<button style='float:left;margin: 0 5px 0 0;' class='btn btn-success' name='order_invoice_btn'>View Order Details</button>";

      // get the complete datetime, because after 12am which is 00:00:00, the $today_time will always bigger than $Prepare_time.
      $Prepare_datetime = $row['Order_Prepare_Time'];
      //get the hidden prepare detatime also to validate at the my_account_server there.
      echo "<input type='hidden' name = 'hidden_prepare_datetime' value= '$Prepare_datetime'>";
      $today_datetime = date("Y-m-d H:i:s");
      if ($today_datetime > $Prepare_datetime) {
      echo "<button type='submit' style='float:left' class='btn btn-danger' name='cancel_order' disabled>Done</button>";
      }else{
      echo "<button type='submit' style='float:left' class='btn btn-danger' name='cancel_order' >Cancel</button>";
      }
      echo "</form>";

      echo "</div>";


  }

  }else{
    echo "<h1 style='margin: 0px 0 0 25px;'>Did you know?</h1>";
    echo "<p style='margin: 0px 0 0 25px;'>You haven't order anything from us yet! !</p><br>";
  }
   ?>

   <p style="margin: 0px 0 0 25px;">Reminder: You can only cancel your order 15 Min BEFORE the Estimated-Time, after that your order <BR>will be NOT be available ot cancel, Thanks! </p>
</div>





<?php
include("order_invoice_template.php");

 ?>










































</div>
