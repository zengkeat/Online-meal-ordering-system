<?php 
  $pageTitle = "Details Order";
?>

<?php
  include('base.php');
  // include("conn.php");
  function count_array_values($my_array, $match){
      $count = 0;

      foreach ($my_array as $key => $value){
          if ($value == $match){
              $count++;
          }
      }

      return $count;
  }
?>
<div class="order-detail-overall">
  <div class="order-top">
<div class="order-customer-detail">
<?php
  if (isset($_GET['id'])){
    $g_id = $_GET['id'];

    $sql = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$g_id'");

    while($row = mysqli_fetch_array($sql)){

      $order_id = $row['Order_ID'];
      $food_id = $row['Food_ID'];
      $order_date = $row['Order_date'];
      $cust_id = $row['Customer_ID'];
      $track_num = $row['Order_Tracking_Number'];
      $total_item = $row['Total_Item'];
      $order_price = $row['Order_Total_Price'];
    }

    $sql2 = mysqli_query($con, "SELECT * FROM customer WHERE Customer_ID = '$cust_id'");

    while($row2 = mysqli_fetch_array($sql2)){

      $cust_name = $row2['Customer_Name'];
      $cust_pic = $row2['Customer_File'];
    }
     echo "<div class='order-cust-pic'>";
     echo "<img src='../system-admin-app/images/".$cust_pic."' class='img-circle' width='260' height='200' style='border-radius:50%';> ";
     echo "</div>";
     echo "<div class='order-cust-detail'>";
     echo "<p>ID: $cust_id</p>";
     echo "<p>Name: $cust_name</p>";
     echo "<p>Order ID: $order_id</p>";
     echo "<p>Order Date: $order_date</p>";
     echo "<p>Tracking Number: $track_num</p>";
     echo "</div>"; ?>

</div>
</div>
<hr>

  <div class="order-detail-frame">
    <?php $split_food_id = str_split($food_id, 4);

     $food_array =array();
     foreach($split_food_id as $f_id){
         $get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'");

         $food_name_row = mysqli_fetch_array($get_food_id);
         $food_name = $food_name_row['Food_Name'];


         // push the all the food name into the $food_array
         array_push($food_array, $food_name);

     }

     foreach (array_unique($food_array) as $food_n) {
       $count_duplicated_food = count_array_values($food_array, $food_n);
       $sql3 = mysqli_query($con, "SELECT * FROM food WHERE Food_Name = '$food_n'");
       while($row3 = mysqli_fetch_array($sql3)){
         $stall_id = $row3['Stall_ID'];
         $food_price = $row3['Unit_Price'];
         $food_pic = $row3['Food_File'];
       }
       echo "<div class='order-food-detail shadow p-1 mb-2 bg-white rounded'>";
       echo "<div class='order-detail-pic'>";
       echo "<img src='../vendor-dept-app/images/".$food_pic."' width='230' height='220' border='2'>";
       echo "</div>";
       echo "<div class='order-description'>";
       echo "<p>Name: $food_n</p>";
     echo "<p>Quantity: $count_duplicated_food</p>";
     echo "<p>Stall ID: $stall_id</p>";
     echo "<p>Unit Price: RM $food_price</p>";
     echo "</div>";
     echo "</div>";
   }

 }else{
   echo "<script>alert('No Order ID found.')</script>";
   echo "<script>window.location.href='view_transaction_order.php';</script>";
 }
 ?>
</div>

<div class="order-detail-price">
<p>Total Price: <strong>RM<?php echo $order_price; ?></strong></p>
</div>

<div class="backbtn">
<button type="button" class="btn btn-warning btn-lg btn-block"><a href="view_transaction_order">Back</a></button>
</div/>

</div>
