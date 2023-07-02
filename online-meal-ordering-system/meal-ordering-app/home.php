<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Home Page";

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_customer']);
   header("location: customer_login.php");
 }
include("base.php");
include("my_account_server.php");
include("menu_server.php");
 ?>

<br>
<!-- slide show -->
<div class="container">

<div class="bd-example" style="width:1110px;height:740px;margin: -20px 0 0 0;">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/apu_people.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>APU Cafetaria</h5>
          <p>Our cafeteria serves a wide range of halal Asian and Western food.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img style="height:740px;" src="images/apu_event.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 >APU Explore the world with us!</h5>
          <p>Explore the world of opportunities with APU!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img  src="images/apu_cafeteria.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>APU Cafeteria</h5>
          <p>Cafeteria is a popular hang-out spot for students during breaks, as they munch on some snacks and delectable treats while
            having a group discussion or while working on their assignments.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- show first three post in the database -->
<?php
// filter the post by the newset and limit the filter result as 3, in others words, show only 3 latest post.
$query = mysqli_query($con, "SELECT * FROM post ORDER BY Post_Timestamp DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
echo "<img class='home-news img-thumbnail' src='../system-admin-app/images/".$row['Post_File']."' >";
}

?>

<!-- My favourite -->
<div class="my-favorite" >

<h3>My Favorite</h3>
<hr>
<?php

  $customer_tp = $_SESSION['customer_tp'];

  //filter the current login customer put in the favourite table.
  $get_favo = mysqli_query($con, "SELECT * FROM favourite_order WHERE Customer_ID = '$customer_tp' ORDER BY Favourite_Timestamp DESC LIMIT 2");

  if(mysqli_num_rows($get_favo)>0){
  // then, loop throught the rows.
  while($row = mysqli_fetch_array($get_favo)){

  //get the order_id from the row.
  $order_id = $row["Order_ID"];

  // retrive the food_id, price, and total item from that particular order_id
  $get_order = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$order_id' ");

  $f_row = mysqli_fetch_array($get_order);

  $food_id = $f_row['Food_ID'];
  $total_item = $f_row['Total_Item'];
  $order_price = $f_row['Order_Total_Price'];

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


   echo "<div class='favorite_info' >";
   foreach(array_unique($food_array) as $food_n){
        //count how many specific $food_name is in the array
        $count_duplicated_food = count_array_values($food_array, $food_n);
        echo $count_duplicated_food."x ".$food_n.", ";
    }
   echo "<br>";
   echo "total item: $total_item";
   echo "</div>";

    echo "<div class='favorite_detail'>";
    echo "<span style='font-size:20px;'>RM$order_price</span><br>";

    echo "<form class=''  method='post'>";
    echo "<button type='submit' style='float:left' class='btn btn-success' name='order_favorite' >Order Now</button>";
    echo "<input type='hidden' name = 'hidden_order_id' value= '$order_id'>";
    echo "</form>";

    echo "</div>";
    echo "<hr style='margin-top:100px;'>";
}
}else{
    echo "<h1>Did you know?</h1>";
    echo "You havent set any Favorite order yet !<br>";
    echo "You can save your favorite meals in your order history.";
    echo "<hr>";
}
 ?>
</div>
<br>

<!-- QUICK ORDER MEALS -->
<div class="quick-order">
<h3 style="">Quick Order A Meal From APU Cafeteria!</h3>

  <?php
  $sql = mysqli_query($con, "SELECT * FROM food WHERE Food_Status = 'available' ORDER BY RAND() LIMIT 8 ");

echo "<div class='outside_container '>";
  while($row = mysqli_fetch_array($sql)){
    // echo "<img src='images/".$row['Food_File']."' style='height:100px;width:100px;'>";
    // echo "<button type='button' class='btn btn-danger'>Order</button>";

    echo "<form method='post'>";
    echo "<div class='picture_container '>";

    echo "<img src='../vendor-dept-app/images/".$row['Food_File']."' alt='Avatar' class='post_image img-thumbnail' style='width:100%''>";

    echo "<div class='middle '>";
    echo "<div ><button type='submit' class='btn_order ' name='add_food_btn'>Order</button></div>";
    echo "</div>";

    echo "<div class='image_text_container img-thumbnail'>";
    echo "<h3 class='transparent_h3'>".$row['Food_Name']."</h3>";
    echo "<p class='transparent_p'>RM".$row['Unit_Price']."</p>";
    echo "</div>";
    echo "</div>";

    echo "<input type='hidden' name='hidden_id' value='".$row['Food_ID']."'> ";
    echo "<input type='hidden' name='hidden_name' value='".$row['Food_Name']."'> ";
    echo "<input type='hidden' name='hidden_price' value= '".$row['Unit_Price']."'> ";
    echo "<input type='hidden' name='hidden_image' value= '".$row['Food_File']."'> ";
    echo "<input type='hidden' name='food_quantity' style='width:50px;' class='float-right' value='1' >";
     echo "</form>";
  }
echo "</div>";


   ?>
</div>

<!-- how does qp-grab meals work -->
<div class="how_work">
  <h3 style="">How does AP-Grab Meal works?</h3>
  <hr>
  <div class="jumbotron">
    <h4>Did you know how AP-Grab Meals Works?</h4>
    <p class="lead"> Choose your food --> Select a time to get your meals --> Checkout --> Get your food at the cafeteria!</p>
    <hr class="my-4">
    <p>With AP-Grab Meal, your food will always be fresh and delicious!</p>
    <a class="btn btn-primary btn-lg" href="menu.php?Chinese" role="button">Start Order</a>
  </div>
</div>














</div>
