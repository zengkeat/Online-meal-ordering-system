<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Order History";

include("base.php");
include("my_account_server.php");

 ?>
 <div class="container">
 <h3>Order History</h3>

 <div class="" style="overflow:hidden;">
   <small style="float:left;font-size:17px;">Only your 5 most recent orders are displayed.</small>
   <a style="float:right;" href="order_history.php?show_all"> Show all</a>
   <a style="float:right;" href="order_history.php?hide_all">Hide all &nbsp|&nbsp</a>
 </div>

 <div class="order_history_frame img-thumbnail">

   <h5>Order <span style="float:right; margin:0 260px 0 0;">Action</span></h5>
   <hr>
   <?php

     $customer_tp = $_SESSION['customer_tp'];
     //filter the current login customer from order table
     date_default_timezone_set("Asia/Kuala_Lumpur");
     $today_datetime = date("Y-m-d H:i:s");

     if(isset($_GET['show_all'])){
       $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID = '$customer_tp' ORDER BY Order_date DESC ");
     }elseif(isset($_GET['hide_all'])){
        $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID = '$customer_tp' ORDER BY Order_date DESC LIMIT 5");
     }else{
       $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID = '$customer_tp' ORDER BY Order_date DESC LIMIT 5");
     }

     if(mysqli_num_rows($get_order)>0 ){

     // then, loop throught the rows.
     while($row = mysqli_fetch_array($get_order)){

     //get all the data from that row
     $order_id = $row['Order_ID'];
     $food_id = $row['Food_ID'];
     $order_date = $row['Order_date'];
     $get_time = $row['Order_Get_Time'];
     $tracking_number = $row['Order_Tracking_Number'];
     $estimated_time = $row['Order_Estimated_Time'];
     $Prepare_time = $row['Order_Prepare_Time'];
     $total_item = $row['Total_Item'];
     $order_price = $row['Order_Total_Price'];
     $order_remark  =$row['Order_Remark'];

     // only show the order history that is over the prepare time, means the order cannot be cancel anymore.
     if($today_datetime > $Prepare_time ){

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

         echo "<div class='order_history_info' >";
         foreach(array_unique($food_array) as $food_n){
              //count how many specific $food_name is in the array
              $count_duplicated_food = count_array_values($food_array, $food_n);
              echo $count_duplicated_food."x ".$food_n.", ";
          }
          echo "<br>";
          echo "Tracking Number: $tracking_number<br>";
          echo "Order Date: $order_date<br>";
          echo "Total item: $total_item<br>";
          echo "</div>";

           echo "<div class='order_history_price'>";
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

           echo "<button style='float:left;margin: 0 5px 0 0;' class='btn btn-success' name='order_invoice_btn'>View Order Details</button>";
           $check_favo = mysqli_query($con,"SELECT * FROM favourite_order WHERE Order_ID = '$order_id' AND Customer_ID = '$customer_tp' ");
           if(mysqli_num_rows($check_favo)>=1){
             echo "<button type='submit' style='float:left' class='btn btn-danger' name='set_favorite' disabled><i class='fas fa-heart' style='color:white;border:white;color:red;font-size:20px;'></i></button>";
           }else{
             echo "<button type='submit' style='float:left' class='btn btn-danger' name='set_favorite' ><i class='fas fa-heart' style='color:white;border:white;color:white;font-size:20px;'></i></button>";
           }
           echo "</form>";
           echo "</div>";

         }else{
           // if the order havent reach the prepare time yet, then also show the order but the button is "Pending".
           $split_food_id = str_split($food_id, 4);
           $food_array =array();
           foreach($split_food_id as $f_id){
               $get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'");
               $food_name_row = mysqli_fetch_array($get_food_id);
               $food_name = $food_name_row['Food_Name'];
               // push the all the food name into the $food_array
               array_push($food_array, $food_name);
           }

           echo "<div class='order_history_info' >";
           foreach(array_unique($food_array) as $food_n){
                //count how many specific $food_name is in the array
                $count_duplicated_food = count_array_values($food_array, $food_n);
                echo $count_duplicated_food."x ".$food_n.", ";
            }
            echo "<br>";
            echo "Tracking Number: $tracking_number<br>";
            echo "Order Date: $order_date<br>";
            echo "Total item: $total_item<br>";
            echo "</div>";

             echo "<div class='order_history_price'>";
             echo "RM$order_price<br>";
            echo "<button type='submit' style='float:left' class='btn btn-success' name='set_favorite' disabled>Pending</button>";
             echo "</div>";
         }
   }
   }else{
       echo "<h1>Did you know?</h1>";
       echo "You haven't order anything from us yet! !<br>";
       echo "You can save your favorite meals in your order history.";
   }
    ?>

 </div>






<?php
include("order_invoice_template.php");

 ?>




































 </div>
