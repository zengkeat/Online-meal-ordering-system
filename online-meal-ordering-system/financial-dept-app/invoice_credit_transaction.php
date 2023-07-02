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
    <title>Invoice Credit Transaction</title>
    <link rel="stylesheet" href="sales_report.css">
  </head>
  <body>

<div class="upper-con container">

    <?php
    if(isset($_POST['daily-submit'])){
      $search_day = $_POST['daily-choose'];
      $_SESSION['daily-choose'] = $search_day;
    }
    ?>

    <?php
      if (isset($_GET['id'])){
        $g_id = strtoupper($_GET['id']);
        $sql = mysqli_query($con, "SELECT * FROM credit_transaction WHERE CreditT_ID = '$g_id' OR Customer_ID = '$g_id' ");
        $row = mysqli_fetch_array($sql);
        $top_up_date = date("d/m/Y",strtotime($row["Date"]));
        $top_up_time = date("H:i:s",strtotime($row["Date"]));
        $customer_id = $row["Customer_ID"];
        $action = $row["Action"];
        $staff_id = $row["Staff_ID"];
        $staff_name = "";
        if ($staff_id != "0") {
          $sql = mysqli_query($con, "SELECT * FROM staff WHERE Staff_ID = '$staff_id' " );
          $name = mysqli_fetch_array($sql);
          $staff_name = $name["Staff_Username"];
        }else{
          $staff_name = 'None (Online Top-up)';
        }

        $sql2 = mysqli_query($con, "SELECT * FROM customer WHERE Customer_ID= '$customer_id' ");
        $row2 = mysqli_fetch_array($sql2);
        $customer_name2 = $row2["Customer_Name"];
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
           <p>Type: <?php echo $action ?> Invoice</p>
           <p>Transaction ID: <?php echo $row["CreditT_ID"]; ?></p>
         </div>

         </div>




<hr style="height:1px; margin: 200px 0 0 0;">

<div class="mid-info">
<div class="mid-info1">
<p><strong>TP Number: </strong><?php echo $row['Customer_ID'] ?></p>
<p><strong>Name: </strong><?php echo $customer_name2; ?></p>
<p><strong>Top-Up Date: </strong><?php echo $top_up_date; ?></p>
</div>
<div class="mid-info2">
<p><strong>Top-Up Time: </strong><?php echo $top_up_time; ?></p>
<p><strong>Staff: </strong><?php echo $staff_name; ?></p>
</div>
</div>

    <div class="report-table">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Transaction ID</th>
          <th scope="col">Action</th>
          <th scope="col">Amount</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // if (isset($_GET['id'])){
        //   $g_id = $_GET['id'];
          // $sql = mysqli_query($con, "SELECT * FROM credit_transaction WHERE CreditT_ID = '$g_id' OR Customer_ID = '$g_id' ");
        // while ($row = mysqli_fetch_array($sql)){
          $amount = $row['Amount'];
        echo "<tr>";
        echo "<td>1</td>";
        echo "<td>".$row['CreditT_ID']."</td>";
        echo "<td>".$row['Action']."</td>";
        echo "<td>RM  ".$row['Amount']."</td>";
        echo "<td>RM  ".$row['Amount']."</td>";
        echo "</tr>";
          // }
        }else{
          echo "<script>alert('No invoice credit chosen.')</script>";
          echo "<script>window.location.href='view_transaction_credit.php';</script>";
        }
        ?>
        <tr>
            <td colspan="4" style="text-align:left;font-size:25px;"><strong>TOTAL</strong></td>
            <td ><strong>RM<?php echo sprintf("%.2f", $amount) ?></strong></td>
        </tr>
      </tbody>
    </table>
    </div>



    <div class="submitted-by" >
      <div class="into-submitted">
      <h5>RECEIVED BY</h5>
      <hr>
    </div>
    </div>

    <div class="report-button">
    <button type="button" class="btn btn-outline-primary">Print Report</button>
    <button type="button" class="btn btn-outline-primary"><a href="view_transaction_credit.php">Cancel</a></button>
    </div>


</div>
</div>

  </body>
</html>
