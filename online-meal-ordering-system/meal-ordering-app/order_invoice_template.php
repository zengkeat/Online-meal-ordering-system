<?php

if (isset($_POST["order_invoice_btn"])) {

  $today_date = date("d/m/Y");
  $order_id = $_POST["hidden_order_id"];
  $get_time = $_POST["hidden_get_time"];
  $estimated_time = $_POST["hidden_esti_time"];
  $tracking_number = $_POST["hidden_trac_num"];
  $total_item = $_POST["hidden_total_item"];
  $food_id = $_POST["hidden_food_id"];
  $order_price = $_POST["hidden_total_price"];

  $order_datetime = $_POST["hidden_order_date"];
  // $order_date = date("d/m/Y",strtotime($order_datetime));
  // $order_time = date("H:i:s",strtotime($order_datetime));

  $tp_number = $_SESSION['customer_tp'];
  $customer_name = $_SESSION['login_customer'];


  echo '<script type="text/javascript">';
  echo '$(document).ready(function() {';
  echo '$("#order_invoice").modal("show");';
  echo '});';
  echo '</script>';
}

 ?>
 <!-- order invoice Modal -->
 <div class="modal fade" id="order_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalScrollableTitle">Order Invoice</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body"  >
         <!-- start content -->

         <!-- address and general info -->
         <img src="images/apu_logo.jpg" alt="" class="float-left" style="width:125px;height:125px;margin:0 10px 0 20px;">
         <h3> <strong> Asia Pacific University</strong></h3>

         <div class="float-left" style="margin:0 100px  0 0;">
           <span>Taman Technology Malaysia</span><br>
           <span>57000 Kuala Lumpur</span><br>
           <span>Wilayah Persekutuan Kuala Lumpur</span>
           </div>

           <div class=" float-left">
             <span><strong>Date: </strong><?php  echo $today_date?> </span><br>
             <span><strong>Type:</strong> Customer Order Invoice</span><br>
             <span><strong>Order ID: </strong><?php echo $order_id ?> </span>
           </div>
           <hr style="background-color:black;height:1px; margin: 120px 0 0 0;">

           <!-- order information -->
           <div class="float-left" style="margin: 25px 0 0 30px;width:450px;">
          <span><strong>TP Number: </strong> <?php echo $tp_number ?></span><br>
          <span><strong>Name: </strong> <?php echo $customer_name ?></span><br>
          <span><strong>Order Time: </strong> <?php  echo $order_datetime ?></span><br>
          <span><strong>Get-Time: </strong> <?php  echo $get_time ?></span><br>
          <span><strong>Estimated Time: </strong> <?php echo $estimated_time ?></span><br>
          </div>

          <div class="float-left" style="margin: 25px 0 0 0;">
         <span><strong>Tracking Number: </strong> <?php echo $tracking_number ?></span><br>
         <span><strong>Total Item: </strong> <?php echo $total_item ?></span><br>
         <span><strong>Ordering Channel: </strong>AP-Grab Meal</span><br>
         </div>

         <!-- table -->
         <table class="table table-striped table-hover" style="margin: 200px 0 0 0;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Food</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Total Price</th>
              </tr>
            </thead>
            <tbody>

              <?php

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

              $i = 0;
              foreach(array_unique($food_array) as $food_n){
                   //count how many specific $food_name is in the array
                   $count_duplicated_food = count_array_values($food_array, $food_n);
                   $get_food_unit_price = mysqli_query($con, "SELECT * FROM food WHERE Food_Name = '$food_n'");
                   $food_unit_price = mysqli_fetch_array($get_food_unit_price);
                   $unit_price = $food_unit_price['Unit_Price'];
                   $i++;

              ?>
              <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $food_n ?></td>
                <td><?php echo $count_duplicated_food ?></td>
                <td>RM<?php echo $unit_price ?></td>
                <td>RM<?php echo sprintf("%.2f", $unit_price * $count_duplicated_food) ?></td>
              </tr>

              <?php } ?>

              <tr>
                  <td colspan="4" style="text-align:left;font-size:25px;"><strong>TOTAL</strong></td>
                  <td ><strong>RM<?php echo sprintf("%.2f", $order_price) ?></strong></td>
              </tr>

            </tbody>
        </table>
        <hr style="margin: -2px 0 0 0;">
        <div class="" style="margin:50px 0 0 0;">
          <h5 class="float-right" style="margin: 0 70px 0 0;">RECEIVED BY</h5>
          <hr class="float-right" style="width:250px;height:1px;background-color:black;margin: 50px 0 0 500px;">
        </div>

         <!-- end content -->
       </div>
       <div class="modal-footer">
          <?php
          if($_SERVER['REQUEST_URI'] == '/sdp/ap-grab%20meal/track_order.php'){

          }else{
            echo "<button type='button' class='btn btn-primary'>Print Order Invoice</button>";
          }

          ?>

          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

       </div>
     </div>
   </div>
 </div>

<!-- top up transaction invoice -->
<?php

if (isset($_POST["top_up_invoice_btn"])) {

  $today_date = date("d/m/Y");
  $transaction_id = $_POST["hidden_transaction_id"];
  $amount = $_POST["hidden_amount"];
  $top_up_datetime = $_POST["hidden_date"];
  $top_up_date = date("d/m/Y",strtotime($top_up_datetime));
  $top_up_time = date("H:i:s",strtotime($top_up_datetime));

  $staff_name = "";
  $staff_id = $_POST["hidden_staff_id"];
  if ($staff_id != "0") {
    $sql = mysqli_query($con, "SELECT * FROM staff WHERE Staff_ID = '$staff_id' " );
    $name = mysqli_fetch_array($sql);
    $staff_name = $name["Staff_Username"];
  }else{
    $staff_name = 'None (Online Top-up)';
  }


  $tp_number = $_SESSION['customer_tp'];
  $customer_name = $_SESSION['login_customer'];


  echo '<script type="text/javascript">';
  echo '$(document).ready(function() {';
  echo '$("#top_up_invoice").modal("show");';
  echo '});';
  echo '</script>';

}

 ?>
 <!-- top-up transaction Modal -->
 <div class="modal fade" id="top_up_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalScrollableTitle">Order Invoice</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body"  >
         <!-- start content -->

         <!-- address and general info -->
         <img src="images/apu_logo.jpg" alt="" class="float-left" style="width:125px;height:125px;margin:0 10px 0 20px;">
         <h3> <strong> Asia Pacific University</strong></h3>

         <div class="float-left" style="margin:0 100px  0 0;">
           <span>Taman Technology Malaysia</span><br>
           <span>57000 Kuala Lumpur</span><br>
           <span>Wilayah Persekutuan Kuala Lumpur</span>
           </div>

           <div class=" float-left">
             <span><strong>Date: </strong><?php  echo $today_date?> </span><br>
             <span><strong>Type:</strong> Top-Up Invoice</span><br>
             <span><strong>Transaction ID: </strong><?php echo $transaction_id ?> </span>
           </div>
           <hr style="background-color:black;height:1px; margin: 120px 0 0 0;">

           <!-- order information -->
           <div class="float-left" style="margin: 25px 0 0 30px;width:450px;">
          <span><strong>TP Number: </strong> <?php echo $tp_number ?></span><br>
          <span><strong>Name: </strong> <?php echo $customer_name ?></span><br>
          <span><strong>Top-Up Date: </strong> <?php  echo $top_up_date ?></span><br>
          <span><strong>Top-Up Time: </strong> <?php  echo $top_up_time ?></span><br>
          <span><strong>Staff: </strong> <?php echo $staff_name ?></span><br>
          </div>


         <!-- table -->
         <table class="table table-striped table-hover" style="margin: 200px 0 0 0;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Action</th>
                <th scope="col">Amount</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <th scope="row">1</th>
                <td><?php echo $transaction_id ?></td>
                <td>Top-Up</td>
                <td>RM<?php echo sprintf("%.2f", $amount) ?></td>
                <td>RM<?php echo sprintf("%.2f", $amount) ?></td>
              </tr>

              <tr>
                <th colspan="5" scope="row" style="height:54px;"></th>
              </tr>
              <tr>
                <th colspan="5" scope="row" style="height:54px;"></th>
              </tr>
              <tr>
                <th colspan="5" scope="row" style="height:54px;"></th>
              </tr>



              <tr>
                  <td colspan="4" style="text-align:left;font-size:25px;"><strong>TOTAL</strong></td>
                  <td ><strong>RM<?php echo sprintf("%.2f", $amount) ?></strong></td>
              </tr>

            </tbody>
        </table>
        <hr style="margin: -2px 0 0 0;">
        <div class="" style="margin:50px 0 0 0;">
          <h5 class="float-right" style="margin: 0 70px 0 0;">RECEIVED BY</h5>
          <hr class="float-right" style="width:250px;height:1px;background-color:black;margin: 50px 0 0 500px;">
        </div>

         <!-- end content -->
       </div>
       <div class="modal-footer">
         <button type='button' class='btn btn-primary'>Print Top-Up Invoice</button>
         <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
