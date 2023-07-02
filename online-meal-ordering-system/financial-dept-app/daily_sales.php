<?php 
  $pageTitle = "Daily Sales";
?>

<?php include('base.php'); ?>

<div class="report-box shadow-lg p-3 mb-5 bg-white rounded">

  <div class="report-title page-header">
    <h1>Daily Sales Report</h1>
    <a href="monthly_sales.php">Switch to monthly</a>
  </div>
  <div class="report-info page-header">
    <p>This will show the overall sales report of the food transactions and credit <br>transactions on a specific day.</p>
  </div>
  <div class="report-button">
    <form action="daily_sales_report.php" method="post">
    <div class="choose-date">
      Select a date:
      <input type="date" name="daily-choose">
    </div>
    <div class="submit-button">
    <input type="submit" class="btn2 btn-warning btn-lg" name="daily-submit" value="View">
  </div>

  </div>
  </form>
  </div>

</div>
