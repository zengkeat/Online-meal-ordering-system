<?php
  $pageTitle = "Daily Stall";
?>
<?php include('base.php'); ?>

<div class="report-box shadow-lg p-3 mb-5 bg-white rounded">

  <div class="report-title page-header">
    <h1>Daily Stall Report</h1>
    <a href="monthly_stall.php">Switch to Monthly</a>
  </div>
  <div class="report-info page-header">
    <p>This will show the overall stall's sales report of the food transactions <br>on a specific day.</p>
  </div>
  <div class="report-button">
    <form action="daily_stall_report.php" method="post">
    <div class="choose-date">
      Select a date:
      <input type="date" name="daily-choose">
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
    </div>

    <div class="submit-button">
    <input type="submit" class="btn2 btn-warning btn-lg" name="daily-submit" value="View">
  </div>
  </form>
  </div>

</div>
