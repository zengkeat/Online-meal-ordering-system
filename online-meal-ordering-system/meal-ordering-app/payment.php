<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Payment";

include("base.php");
include('menu_server.php');

//to preventpage redirect when any variable is missing or unset which can display error.
if( !empty($_SESSION['food_cart']) and (!isset($_SESSION['get_time']) or $_SESSION['get_time'] != 'Get-Time' or empty($_SESSION['get_time']) ) ) {

  $total_price = 0;
  foreach($_SESSION["food_cart"] as $keys => $values){
    $total_price = $total_price + ($values["item_quantity"] * $values["item_price"]);
  }

  if($total_price == 0.00){
    header('location:menu.php?Chinese');
  }elseif(!isset($_SESSION['get_time'])){
    header('location:menu.php?Chinese');
  }

}elseif(empty($_SESSION['food_cart']) and empty($_SESSION['get_time'])){
echo '<script>window.location="home.php"</script>';
}else{
  header('location:menu.php?Chinese');
}

 ?>

 <div class="container">
<h4 style="width:65%;float:left;margin: 10px 0 10px 0;">Review and Confirm Order</h4>

<div class="payment_cart_frame img-thumbnail">
  <h3>My Order</h3>
  <hr >
<?php
if(!empty($_SESSION["food_cart"])){

foreach($_SESSION["food_cart"] as $keys => $values){
 ?>

<div style="margin:10px;"class="payment_food_cart">
  <h4 style="float:left;font-weight:bold;width:40px;"> <?php echo $values['item_quantity']."&nbsp;&nbsp;&nbsp; "; ?></h4>
  <img src="../vendor-dept-app/images/<?php echo $values['item_image']; ?>" class="payment_food_image img-thumbnail" alt="no food imgaes!">
  <h5 class="payment_food_title"><?php echo $values['item_name']; ?></h5>
  <p style="float:right;margin:15px 0  0 0;color:green;font-weight:bold;font-size:30px;"><?php echo "RM".number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
  <div class="food_item_delete">
    <form class="float-right"  method="post" style="margin:100px 0 0 0;">
      <input type="hidden" name="hidden_delete_food_id" value="<?php echo $keys; ?>">
      <button type="submit" class="btn btn-outline-danger" name="delete_food_btn" style="margin:10px;font-weight:bold;">Delete</button>
    </form>
  </div>
</div>
<hr style="border-color: grey;">
<?php
}}
?>
<!-- ORDER REMARK -->
<h4>Order Remarks:</h4>

<form class="" method="post">
  <div class="input-group input-group-lg" >
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-lg">Remark</span>
    </div>
    <input style="width:100px;" type="text" name="order_remark" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    <p style="font-size:15px;margin:10px;">Please note that certain special characters such as ">", "" and ";" etc are not allowed.</p>
  </div>
</div>



<!-- payment order summary -->
<!-- <h5 style="padding:5px;border:1px solid black;float:left;margin:-40px 0 0 0;">Order Summary</h5> -->
  <h4 style="padding: 10px 0 0px 730px;">Order Summary</h4>
<div class="order_summary img-thumbnail">
  <!-- show get time and estimated time  -->
  <p>Get-Time: <br> <strong><?php echo $_SESSION['get_time']; ?>  later</strong></p>
  <hr>
  <p>Estimated-Time: <br> <strong><?php echo $_SESSION['estimated_time']; ?></strong></p>
  <hr>
  <p>Tracking-Number: <br> <strong><?php echo $_SESSION['tracking_number']; ?></strong></p>
  <hr>
  <!-- food item order detail -->
  <?php
  if(!empty($_SESSION["food_cart"])){
        $total_price = 0;
        $total_quantity = 0;
      // food item list
      echo "<div style='width:365px;overflow:hidden;'>";
        foreach($_SESSION["food_cart"] as $keys => $values){
          echo "<p style='float:left;white-space:nowrap;width:250px;overflow:hidden;text-overflow:ellipsis;'>".$values['item_quantity']."x <span>".$values['item_name']."</span>";
          echo "<p style='float:right;'>RM ".number_format($values['item_quantity'] * $values["item_price"], 2)."</p>";

        $total_price = $total_price + ($values["item_quantity"] * $values["item_price"]);
        $total_quantity = $total_quantity + $values["item_quantity"];
      }
      echo "</div>";
      }?>

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
<!-- Confirm order button -->
    <input type="hidden" name="confirm_total_price" value="<?php echo $total_price; ?>">
    <input type="hidden" name="confirm_total_quantity" value="<?php echo $total_quantity; ?>">
    <button type="submit" class="btn btn-danger btn-lg btn-block" name="confirm_btn" style="font-weight:bold;margin: 0 0 10px 0;">CONFIRM ORDER</button>
  </form>
  <a href="menu.php?Chinese" style="margin: 0 0 0 100px;"><i class="arrow right"></i> ADD MORE ITEMS</a>
</div>

</div>


  <!-- credit not enough Modal -->
  <div class="modal fade" id="NotEnoughCredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Not Enough Credit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Insufficient Credit Balance, please top-up first.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- successful payment -->
  <div class="modal fade" id="SuccessPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">THANK YOU!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Payment Successful! Thank you for using AP-Grab Meals!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
