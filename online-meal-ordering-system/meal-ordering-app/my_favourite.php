<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "My Favourite";

include("base.php");
include("my_account_server.php");
include("menu_server.php");

 ?>

 <div class="container">
 <h4 style="width:75%;float:left;">My Favourite</h4>

 <div class="my_favourite_frame img-thumbnail">
   <h5>Order <span style="float:right; margin:0 180px 0 0;">Action</span></h5>
   <hr>

   <?php

   $customer_tp = $_SESSION['customer_tp'];

   //filter the current login customer put in the favourite table.
   $get_favo = mysqli_query($con, "SELECT * FROM favourite_order WHERE Customer_ID = '$customer_tp' ORDER BY Favourite_Timestamp DESC");

   if(mysqli_num_rows($get_favo)>0){
   // then, loop throught the rows.
   while($row = mysqli_fetch_array($get_favo)){

   //get the order_id and favourite_id(use for delete) from the favorite row.
   $order_id = $row["Order_ID"];
   $favo_id = $row["Favourite_ID"];

   // retrive the food_id, price, and total item from that particular order_id
   $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$order_id' ");

   $f_row = mysqli_fetch_array($get_order);

   $food_id = $f_row['Food_ID'];
   $total_item = $f_row['Total_Item'];
   $order_price = $f_row['Order_Total_Price'];
   $order_date = $f_row['Order_date'];

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

     echo "<div class='my_favourite_info' >";
     foreach(array_unique($food_array) as $food_n){
          //count how many specific $food_name is in the array
          $count_duplicated_food = count_array_values($food_array, $food_n);
          echo $count_duplicated_food."x ".$food_n.", ";
      }

    echo "<br>";
    echo "Order Date: $order_date<br>";
    echo "total item: $total_item";
    echo "</div>";

    echo "<div class='my_favourite_price'>";
    echo "<span style='font-size:25px;'>RM$order_price</span><br>";

    echo "<form class=''  method='post'>";
    echo "<button type='submit' style='float:left;margin: 0 5px 0 0;' class='btn btn-success' name='order_favorite' >Order Now</button>";
    echo "<input type='hidden' name = 'hidden_order_id' value= '$order_id'>";
    echo "<button type='submit' style='float:left' class='btn btn-danger' name='favorite_delete' >Remove</button>";
    echo "<input type='hidden' name = 'hidden_favorite_id' value= '$favo_id'>";
    echo "</div>";
    echo "</form>";
 }
 }else{
     echo "<h1>Did you know?</h1>";
     echo "You havent set any Favorite order yet !<br>";
     echo "You can save your favorite meals in your order history.";
 }
    ?>

 </div>

<!-- my favourite fooc cart start from here -->
 <h4 style="margin: 0 0 0 850px;">My Order</h4>

 <div class="food_cart img-thumbnail" style="margin: 0 0 0 15px;">
 <p>When you want to get your meal?</p>
 <!-- display current time -->
 <?php
 $startTime = date("d/m/Y H:i:s");
 echo "<strong>Current Time:<br>".$startTime."</strong>";
 ?>

 <form class="" method="post">
 <select name="get_time" class="custom-select"  style="margin:10px 0 10px 0px;">
   <option selected>Get-Time</option>
   <option value="30 minutes">30 Min later</option>
   <option value="45 minutes">45 Min later</option>
   <option value="1 hour">1 Hour later</option>
   <option value="1 hour 15 minutes">1 Hour and 15 Min later</option>
   <option value="1 hour 30 minutes">1 Hour and 30 Min later</option>
   <option value="1 hour 45 minutes">1 Hour and 45 Min later</option>
   <option value="2 hours">2 Hour later</option>
 </select>


 <!-- food item order detail -->
 <?php
 if(!empty($_SESSION["food_cart"])){

   $total_price = 0;
   $total_quantity = 0;

 // food item list
 echo "<div style='width:245px;overflow:hidden;'>";
 foreach($_SESSION["food_cart"] as $keys => $values){
   echo "<p style=' float:left;white-space:nowrap;width:160px;overflow:hidden;text-overflow:ellipsis;'>".$values['item_quantity']."x <span>".$values['item_name']."</span>";
   echo "<p style='float:right;'>RM ".number_format($values['item_quantity'] * $values["item_price"], 2)."</p>";

   $total_price = $total_price + ($values["item_quantity"] * $values["item_price"]);
   $total_quantity = $total_quantity + $values["item_quantity"];
 }
 echo "</div>";
 }
 ?>
 <!-- total food quantity -->
 <p>Total Item:
   <?php  if(isset($total_quantity)){
     echo $total_quantity;
   }else{
     echo "0";
   }; ?>
 </p>

 <hr>
 <!-- total_price -->
 <h4 style="margin: 0 0 20px 0;">Total: <span style="font-size:30px;float:right;color:green;">RM
   <?php  if(isset($total_price)){
     echo $total_price;
   }else{
     echo "0.00";
   }; ?>
 </span></h4>
 <!-- <p style="font-size:15px;">Order minimum at least RM 10.00</p> -->

 <!-- checkout button -->
 <?php
 if(isset($total_price)){

 if($total_price == 0.00 ){

   echo "<button type='submit' class='btn btn-danger btn-lg btn-block' style='font-weight:bold;' disabled>CHECKOUT</button>";

 }else{
    echo "<button type='submit' class='btn btn-danger btn-lg btn-block' style='font-weight:bold;' name='checkout_btn'>CHECKOUT</button>";
 }

 }else{
   echo "<button type='submit' class='btn btn-danger btn-lg btn-block' style='font-weight:bold;' disabled>CHECKOUT</button>";
 }
  ?>

 </form>


 <!-- individual food order detail -->
 <hr style="border-color:black;">
 <?php
 if(!empty($_SESSION["food_cart"])){

 foreach($_SESSION["food_cart"] as $keys => $values){
  ?>

 <div style="margin:10px;"class="food_cart_image">

 <p style="float:left;height:15px;"> <?php echo $values['item_quantity']."&nbsp;&nbsp;&nbsp; "; ?></p>
 <p style="float:left;height:15px;"><?php echo $values['item_name']; ?></p>
 <img src="../vendor-dept-app/images/<?php echo $values['item_image']; ?>" class="food_detail_image" alt="no food imgaes!">

 <div class="food_item_delete">
   <form class="float-left"  method="post" style="">
         <input type="hidden" name="hidden_delete_food_id" value="<?php echo $keys; ?>">
     <button type="submit" class="btn btn-warning" name="delete_food_btn" style="margin:10px;">Delete</button>
   </form>
 <p style="float:right;margin:20px;color:green;font-weight:bold;"><?php echo "RM".number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
 </div>

 </div>
 <hr style="border-color: black;">
 <?php
 }
 }

  ?>

 </div>











































 </div>
 <!-- Modal -->
 <div class="modal fade" id="GetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Not Insert Get-time</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Please choose a time when you want to get your meals at "Get-Time" options.
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
