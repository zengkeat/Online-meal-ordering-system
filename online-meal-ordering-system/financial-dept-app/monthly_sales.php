<?php
  $pageTitle = "Monthly Sales";
?>
<?php include('base.php'); ?>

<div class="report-box shadow-lg p-3 mb-5 bg-white rounded">

  <div class="report-title page-header">
    <h1>Monthly Sales Report</h1>
    <a href="daily_sales.php">Switch to Daily </a>
  </div>
  <div class="report-info page-header">
    <p>This will show the overall sales report of the food transactions and credit <br>transactions on a specific month.</p>
  </div>
  <div class="report-button">
    <form action="monthly_sales_report.php" method="post">
      <div class="submit-button">
    <input type="submit" class="btn2 btn-warning btn-lg" name="monthly-submit" value="View">
    </div>
  </form>
  </div>

</div>
