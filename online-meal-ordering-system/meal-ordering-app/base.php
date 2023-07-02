<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <title> <?php echo $pageTitle; ?> </title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="my_account.css">
    <link rel="stylesheet" href="ap_card.css">
  </head>
  <body>

<!-- //for preventing user access explore.php or account.php without login -->
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
include("conn.php");
if(!isset($_SESSION['login_customer'])){
      header('location:customer_login.php');
      session_write_close();
      exit();
    }
    //get credit balance;
    //why not get in the login_server.php when login? because the credit balance will not reload if get at there.
    // get in base.php so everytime it will be reload;
    $username = $_SESSION['login_name'];
    $get_login_username = mysqli_query($con,"SELECT * FROM customer WHERE customer_id = '$username'");
    $row =mysqli_fetch_array($get_login_username);
    $customer_balance = $row["Customer_Credit_Balance"];
    $_SESSION['customer_balance'] = $customer_balance;


?>

    <!-- navigation bar -->
    <div class="container ">

      <!-- Top information -->
      <div class="top_info" >
        <p>Welcome Back <?php echo $_SESSION["login_customer"]; ?> |
        Credit Balance: RM <?php echo $_SESSION["customer_balance"]; ?> |
        <a href="home.php?logout='1'">Sign Out</a> |
        <a href="track_order.php">Track Order</a>
        </p>
      </div>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light ">
  <a  class="navbar-brand " href="home.php"><img src="images/apu_logo.jpg" width="40" height="37" class="d-inline-block align-top" alt="" >&nbsp AP-Grab Meal</a>

  <!-- for collapse or mobile view -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active ">
        <a class="nav-link" id="nav-menu" href="menu.php?Chinese">Menu <span class="sr-only"></span></a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" id="nav-account" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="track_order.php">Track Order</a>
          <a class="dropdown-item" href="order_history.php">Order History</a>
          <a class="dropdown-item" href="my_favourite.php">My Favorites</a>
          <a class="dropdown-item" href="profile.php">Profile</a>
        </div>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          AP-Card
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="top_up.php">Top-Up</a>
          <a class="dropdown-item" href="transaction.php">Transaction History</a>
        </div>
      </li>

    </ul>
  </div>
</nav>
</div>
  </body>
</html>
