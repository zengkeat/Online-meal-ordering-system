
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
    <title>Daily Sales Report</title>
    <link rel="stylesheet" href="sales_report.css">
  </head>
  <body>

<div class="upper-con container">

    <?php
    if(isset($_POST['daily-submit'])){
      $search_day = $_POST['daily-choose'];
      $_SESSION['daily-choose'] = $search_day;
    }

    $update2 = date("d/m/Y", strtotime($search_day));
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
        <p>Date: <?php echo $update2 ?></p>
        <p>Type: Daily Sales Report</p>
      </div>

    </div>

<hr style="height:1px; margin: 200px 0 0 0;">

<div class="mid-info3" style="float:right; margin-top:10px; margin-right:40px;">
  <p><strong>StartFrom: </strong><?php echo  $update2; ?> 12:00 AM<br>
  <p><strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp To: </strong><?php echo  $update2 ?> 11:59 PM<br>
</div>

    <div class="report-table">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Order ID</th>
          <th scope="col">Customer ID</th>
          <th scope="col">Date</th>
          <th scope="col">Tracking Number</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_POST['daily-submit'])){
          $search_date = $_POST['daily-choose'];
          $i = 1;
          $sql = mysqli_query($con, "SELECT * FROM orders WHERE DATE(Order_date) = '$search_date'");
          if(mysqli_num_rows($sql) == 0){
            echo "<script>alert('No Sales Found')</script>";
            echo "<script>window.location.href='daily_sales.php';</script>";
          }
          $sum = 0;
        while ($row = mysqli_fetch_array($sql)){
          $profit = $row['Order_Total_Price'];
        echo "<tr>";
        echo "<th scope='row'>$i</th>";
        echo "<td>".$row['Order_ID']."</td>";
        echo "<td>".$row['Customer_ID']."</td>";
        echo "<td>".$row['Order_date']."</td>";
        echo "<td>".$row['Order_Tracking_Number']."</td>";
        echo "<td>".$profit."</td>";
        echo "</tr>";
        $i++;
        $sum += $profit;
          }
        }else{
          echo "<script>alert('Please select a date.')</script>";
          echo "<script>window.location.href='daily_sales.php';</script>";
        }
        ?>
        <tr>
          <td colspan="5" style="text-align:right;font-size:25px;"><strong>TOTAL</strong></td>
          <td ><strong>RM<?php echo sprintf("%.2f", $sum) ?></strong></td>
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
    <button type="button" class="btn btn-outline-primary"><a href="daily_sales.php">Cancel</a></button>
    </div>

    </div>





  </body>
</html>
