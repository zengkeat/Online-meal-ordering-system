<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Transaction History";

include("base.php");
include("ap_card_server.php");
include("my_account_server.php");
 ?>
<div class="container">
  <h3>Transaction History</h3>

  <div class="" style="overflow:hidden;">
    <small style="float:left;font-size:17px;">Only your 5 most recent transaction are displayed.</small>
    <a style="float:right;" href="transaction.php?show_all"> Show all</a>
    <a style="float:right;" href="transaction.php?hide_all">Hide all &nbsp|&nbsp</a>
  </div>

  <ul class="nav nav-tabs nav-justified nav-pills" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">Order</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="top-up-tab" data-toggle="tab" href="#top-up" role="tab" aria-controls="top-up" aria-selected="false">Top-Up</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">

  <!-- order transaction -->
  <div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
  <?php
  $customer_id = $_SESSION['customer_tp'];

  if(isset($_GET['show_all'])){
    $sql = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID= '$customer_id' ORDER BY Order_Date DESC " );
  }elseif(isset($_GET['hide_all'])){
    $sql = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID= '$customer_id' ORDER BY Order_Date DESC LIMIT 5" );
  }else{
    $sql = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID= '$customer_id' ORDER BY Order_Date DESC LIMIT 5" );
  }



    if(mysqli_num_rows($sql) > 0){
      while( $row = mysqli_fetch_array($sql)){

        //get all the data from that row
        $today_datetime = date("Y-m-d H:i:s");
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

            echo "<div class='order_transaction_info' style='font-color:#636363;'>";
            echo "<span>Tracking Number: ".$row['Order_Tracking_Number']."</span><br>";
            echo "<span>Total Item: ".$row['Total_Item']."</span><br>";
            echo "<span>Order Date: ".$row['Order_date']."</span><br>";
            echo "</div>";

            echo "<form class=''  method='post' >";
            echo "<div class='order_transaction_price'>";

            echo "<input type='hidden' name = 'hidden_order_id' value= '$order_id'>";
            echo "<input type='hidden' name = 'hidden_order_date' value= '$order_date'>";
            echo "<input type='hidden' name = 'hidden_get_time' value= '$get_time'>";
            echo "<input type='hidden' name = 'hidden_esti_time' value= '$estimated_time'>";
            echo "<input type='hidden' name = 'hidden_trac_num' value= '$tracking_number'>";
            echo "<input type='hidden' name = 'hidden_total_item' value= '$total_item'>";
            echo "<input type='hidden' name = 'hidden_food_id' value= '$food_id'>";
            echo "<input type='hidden' name = 'hidden_total_price' value= '$order_price'>";

            echo "<span style='font-size:25px;color:red;'>-RM".$row['Order_Total_Price']."</span><br>";
            if ($today_datetime > $Prepare_time) {
            echo "<button class='btn btn-success' name='order_invoice_btn'>View Order Details</button>";
            }else{
            echo "<button class='btn btn-success' name='order_invoice_btn' disabled>Pending</button>";
            }

            echo "</div>";
            echo "</form>";
      }

    }else{
      echo "<h1>Did you know?</h1>";
      echo "You haven't order anything from us yet! !<br>";
    }

   ?>
  </div>

  <!-- top-up or refund transaction -->
  <div class="tab-pane fade" id="top-up" role="tabpanel" aria-labelledby="top-up-tab">
    <?php
    $customer_id = $_SESSION['customer_tp'];

    if(isset($_GET['show_all'])){
    $sql = mysqli_query($con, "SELECT * FROM credit_transaction WHERE Customer_ID= '$customer_id' and Action = 'Top-Up' ORDER BY Date DESC" );
    }elseif(isset($_GET['hide_all'])){
    $sql = mysqli_query($con, "SELECT * FROM credit_transaction WHERE Customer_ID= '$customer_id' and Action = 'Top-Up' ORDER BY Date DESC LIMIT 5" );
    }else{
    $sql = mysqli_query($con, "SELECT * FROM credit_transaction WHERE Customer_ID= '$customer_id' and Action = 'Top-Up' ORDER BY Date DESC LIMIT 5" );
    }


      if(mysqli_num_rows($sql) > 0){
        while( $row = mysqli_fetch_array($sql)){

            echo "<div class='top_up_info' style='font-color:#636363;'>";
            echo "<span>Action: ".$row['Action']."</span><br>";
            echo "<span>Date: ".$row['Date']."</span><br>";
            echo "</div>";

            echo "<form class=''  method='post' >";
            echo "<div class='top_up_price' >";
            echo "<input type='hidden' name = 'hidden_transaction_id' value= '".$row['CreditT_ID']."'>";
            echo "<input type='hidden' name = 'hidden_staff_id' value= '".$row['Staff_ID']."'>";
            echo "<input type='hidden' name = 'hidden_amount' value= '".$row['Amount']."'>";
            echo "<input type='hidden' name = 'hidden_date' value= '".$row['Date']."'>";
            echo "<span style='font-size:25px;color:green;'>+RM".$row['Amount']."</span><br>";
            echo "<button class='btn btn-success' name='top_up_invoice_btn' >View Invoice</button>";
            echo "</div>";
            echo "</form>";

        }

      }else{
        echo "<h1>Did you know?</h1>";
        echo "<p>You dont have any top-up history yet!</p>";

      }


     ?>

  </div>
  </div>

<!-- when refresh keep in the safe tab -->
  <script type="text/javascript">
  $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
      });

      // store the currently selected tab in the hash value
      $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
      var id = $(e.target).attr("href").substr(1);
      window.location.hash = id;
      });

      // on load of the page: switch to the currently selected tab
      var hash = window.location.hash;
      $('#myTab a[href="' + hash + '"]').tab('show');
  </script>

  <!-- order invoice -->
  <?php
  include("order_invoice_template.php");

   ?>











</div>
