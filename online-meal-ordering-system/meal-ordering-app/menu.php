<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Menu Page";

include("base.php");
include("menu_server.php");

if($_SERVER['REQUEST_URI'] == '/sdp/ap-grab%20meal/menu.php'){
  echo '<script>window.location="menu.php?Chinese"</script>';
}
 ?>
 <div class="container">

<!-- vertical menu navigation bar -->
<div class="menu_nav  img-thumbnail " >

 <ul class="nav flex-column ">
   <li class="nav-item menu_item ">
     <p class="nav-link" style="color:white;"> Food Stalls</p>
   </li>
   <li class="nav-item menu_item" >
     <a class="nav-link active" href="menu.php?Chinese">Chinese Cuisine</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link" href="menu.php?Malay">Malay Cuisine</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link" href="menu.php?Indian">Indian Cuisine</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link " href="menu.php?Western">Western Cuisine</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link active" href="menu.php?Arab">Arab Cuisine</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link active" href="menu.php?Bakery">Bakery</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link active" href="menu.php?Dessert">Dessert</a>
   </li>
   <li class="nav-item menu_item">
     <a class="nav-link active" href="menu.php?Beverage">Beverage</a>
   </li>
 </ul>

</div>

 <!-- food item display -->
<div class="food_item_frame">
<?php
if(isset($_GET["Chinese"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'chinese' ORDER BY Food_ID DESC");
  echo "<h5 style='margin:10px;'>Chinese Cruisine</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Malay"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'malay'");
  echo "<h5 style='margin:10px;'>Malay Cruisine</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Indian"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'indian'");
  echo "<h5 style='margin:10px;'>Indian Cruisine</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Western"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'western'");
  echo "<h5 style='margin:10px;'>Western Cruisine</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Arab"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'arab'");
  echo "<h5 style='margin:10px;'>Arab Cruisine</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Bakery"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'bakery'");
  echo "<h5 style='margin:10px;'>Bakery</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Dessert"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'dessert'");
  echo "<h5 style='margin:10px;'>Dessert</h5>";
  include('menu_item_template.php');
}elseif(isset($_GET["Beverage"])){
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Category= 'beverage'");
  echo "<h5 style='margin:10px;'>Beverage</h5>";
  include('menu_item_template.php');
}
 ?>
</div>

<!-- food cart -->
<h5 style="padding:5px;">My Order</h5>

<div class="food_cart img-thumbnail">
<p>When you want to get your meal?</p>
<!-- display current time -->
<?php
$startTime = date("d/m/Y H:i:s");
echo "Current Time:<br><strong>".$startTime."</strong>";
?>

<form class="" method="post">
<select name="get_time" class="custom-select"  style="margin:10px 0 10px 0;">
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

<script type="text/javascript">
// item description
$(function () {
$('[data-toggle="popover"]').popover()
})


</script>

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
