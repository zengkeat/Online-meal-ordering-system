<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Monthly Stall Report</title>
    <link rel="stylesheet" href="sales_report.css">
  </head>
  <body>

<div class="upper-con container">

    <?php
    if(isset($_POST['monthly-submit'])){
      $stall_choose = $_POST['stall-choose'];
      $_SESSION['stall-choose'] = $stall_choose;
    }
    ?>

    <?php
    if (!isset($_POST['monthly-submit'])){
      echo "<script>alert('Please start from the form.')</script>";
      echo "<script>window.location.href='monthly_stall.php';</script>";
    }
     ?>

<?php
  $search_stall_name = mysqli_query($con, "SELECT * FROM stall WHERE Stall_ID = '$stall_choose' " );
  $row = mysqli_fetch_array($search_stall_name);
  $stall_name = $row['Stall_Category'];
 ?>

      <div class="top-info">

      <div class="apu-logo">
        <img src="images/apu-logo">
      </div>
      <div class="apu-address">
        <h2>Asia Pacific University</h2>
        <p>Taman Technology Malaysia</p>
        <p>57000 Kuala Lumpur</p>
        <p>Wilayah Persekutuan Kuala Lumpur</p>
      </div>
      <div class="report-datetype">
        <p>Date: <?php echo date('d/m/Y'); ?></p>
        <p>Type: Monthly Sales Report - 2019</p>
        <p>Stall: <?php echo $stall_name ?></p>
      </div>

    </div>


<hr style="height:1px; margin: 250px 0 0 0;">

    <div class="report-table">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Month</th>
          <th scope="col">Date</th>
          <th scope="col">Total Order</th>
          <th scope="col">Total Sales</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th>January</th>
          <th>1/1/2019 - 31/1/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 1, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 1, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>February</th>
          <th>1/2/2019 - 28/2/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 2, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 2, 28, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>March</th>
          <th>1/3/2019 - 31/3/2019</th>
          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 3, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>April</th>
          <th>1/4/2019 - 30/4/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 4, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 4, 30, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";
            }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
            }
          ?>

          <?php

          ?>

        </tr>
        <tr>
          <th>May</th>
          <th>1/5/2019 - 31/5/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 5, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 5, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>June</th>
          <th>1/6/2019 - 30/6/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 6, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 6, 30, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>



        </tr>
        <tr>
          <th>July</th>
          <th>1/7/2019 - 31/7/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 7, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 7, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>August</th>
          <th>1/8/2019 - 31/8/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 8, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 8, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>September</th>
          <th>1/9/2019 - 30/9/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 9, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 9, 30, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>October</th>
          <th>1/10/2019 - 31/10/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 10, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 10, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>November</th>
          <th>1/11/2019 - 30/11/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 11, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 11, 30, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>
        <tr>
          <th>December</th>
          <th>1/12/2019 - 31/12/2019</th>

          <?php
            $month_start = date("Y-m-d", mktime(0, 0, 0, 12, 1, 2019));
            $month_end = date("Y-m-d", mktime(0, 0, 0, 12, 31, 2019));
            $sum = 0;
            $sql = mysqli_query($con, "SELECT * FROM sales WHERE DATE(Sales_Date) >= '$month_start' AND Date(Sales_Date) <= '$month_end' AND Stall_ID = '$stall_choose'");
            $values = mysqli_num_rows($sql);

            if ($values){
            echo "<th>".$values."</th>";
            while ($row = mysqli_fetch_array($sql)) {
              $price = $row['Profit'];
              $sum += $price;
            }
            echo "<th>RM ".$sum."</th>";

          }else{
            echo "<th>TBD</th>";
            echo "<th>TBD</th>";
          }
          ?>

        </tr>

        <tr>
          <?php
          $sum = 0;
            $sql_sum = mysqli_query($con, "SELECT * FROM sales WHERE Stall_ID='$stall_choose' ");
           ?>
          <td colspan="3" style="text-align:right;font-size:25px;"><strong>Grand Total</strong></td>
          <td ><strong>RM<?php
          while ($sql_row = mysqli_fetch_array($sql_sum)){
            $total = $sql_row['Profit'];
            $sum += $total;
          }
          echo sprintf("%.2f", $sum) ?></strong></td>
        </tr>

      </tbody>
    </table>
    </div>

    <div class="submitted-by" >
      <div class="into-submitted">
      <h5>SUBMITTED BY</h5>
      <hr>
    </div>
    </div>

    <div class="report-button">
    <button type="button" class="btn btn-outline-primary">Print Report</button>
    <button type="button" class="btn btn-outline-primary"><a href="monthly_stall.php">Cancel</a></button>
    </div>

</div>

  </body>
</html>
