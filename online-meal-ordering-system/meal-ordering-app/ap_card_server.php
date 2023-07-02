<?php

// when clicking pay now at top pu page
if (isset($_POST["pay_topup"])) {

  $top_up_amount = $_POST['top_up_amount'];
  $customer_credit = $_SESSION['customer_balance'];
  $customer_id = $_SESSION['customer_tp'];


  $total_credit_balance = $top_up_amount+$customer_credit;
  mysqli_query($con,"UPDATE customer SET Customer_Credit_Balance = '$total_credit_balance' WHERE Customer_ID ='$customer_id' ");
  mysqli_query($con, "INSERT INTO credit_transaction (Customer_ID, Staff_ID, Action, Amount, Date) VALUES ('$customer_id','0', 'Top-Up', '$top_up_amount', NOW()) ");

  // triger the modal
  echo '<script type="text/javascript">';
  echo '$(document).ready(function() {';
  echo '$("#success_top_up").modal("show");';
  echo '});';
  echo '</script>';

  header("Refresh:2");
}


// when clicking cacncel top up 
if (isset($_GET["cancel_top_up"])) {

  // triger the modal
  echo '<script type="text/javascript">';
  echo '$(document).ready(function() {';
  echo '$("#cancel_top_up").modal("show");';
  echo '});';
  echo '</script>';

  header("Refresh:2; url=home.php");
}



 ?>
