<?php
  $pageTitle = "Monthly Stall";
?>
<?php include('base.php'); ?>

<div class="report-box shadow-lg p-3 mb-5 bg-white rounded">

  <div class="report-title page-header">
    <h1>Monthly Stall Report</h1>
    <a href="daily_stall.php">Switch to Daily</a>
  </div>
  <div class="report-info page-header">
    <p>This will show the overall stall sales report of the food transactions <br>on a specific month.</p>
  </div>
  <div class="report-button">
    <form action="monthly_stall_report.php" method="post">
      Choose Stall:
      <select name="stall-choose" class="custom-select"  style="margin:10px 0 10px 0;">
        <option value="10001">Western</option>
        <option value="10002">Malay</option>
        <option value="10003">Chinese</option>
        <option value="10004">Indian</option>
        <option value="10005">Arab</option>
        <option value="10006">Bakery</option>
        <option value="10007">Desert</option>
        <option value="10008">Beverage</option>
      </select>

    <div class="submit-button">
    <input type="submit" class="btn2 btn-warning btn-lg" name="monthly-submit" value="View">
  </div>
  </form>
  </div>

</div>
