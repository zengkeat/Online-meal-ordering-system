<?php
include('login_server.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<?php
if(!isset($_SESSION['login_staff'])){
      header("location:../meal-ordering-app/staff_login.php");
      session_write_close();
      exit();
    }
?>

<?php
if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_staff']);
   header("location:../meal-ordering-app/staff_login.php");
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title> <?php echo $pageTitle; ?> </title>
        <link rel="stylesheet" href="finance_home.css">
        <link rel="stylesheet" href="order_detail.css">
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
  </head>
  <body>

    <div class="logged-in-info">
    <p><strong>Welcome back,<?php echo $_SESSION['login_staff']; ?> |
      <a href="finance_home.php?logout='1'">Logout</a>
    </p>
    </div>

<div class="wrapper">
<div class="sidebar">
  <center>
    <h6>
      <div class="sidebar-header nav nav-pills">
               <h2>AP-GRAB MEAL</h2>
           </div>
<div class="inside-sidebar">

          <a href="finance_home.php">Search user ID</a>

        <a href="view_transaction_order.php">View Transaction</a>

          <a href="daily_sales.php">Sales Report</a>

          <a href="daily_stall.php">Stall Report</a>


</div>
</h6>
</center>
</div>
</div>

  </body>
</html>
