
<?php
include('conn.php');
function count_array_values($my_array, $match){
    $count = 0;

    foreach ($my_array as $key => $value){
        if ($value == $match){
            $count++;
        }
    }

    return $count;
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
    <title>Invoice Order</title>
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
      $g_id = $_GET['id'];

      $sql = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$g_id' ");
      $i = 1;

    while ($row = mysqli_fetch_array($sql)){
      $order_id = $row['Order_ID'];
      $food_id = $row['Food_ID'];
      $order_date = $row['Order_date'];
      $cust_id = $row['Customer_ID'];
      $track_num = $row['Order_Tracking_Number'];
      $total_item = $row['Total_Item'];
      $get_time = $row['Order_Get_Time'];
      $estimated_time = $row['Order_Estimated_Time'];
      $order_price = $row['Order_Total_Price'];

      $update = date("h:i:s", strtotime($order_date));
      $update2 = date("Y/m/d", strtotime($order_date));
    }

    $sql2 = mysqli_query($con, "SELECT * FROM customer WHERE Customer_ID = '$cust_id'");

    while($row2 = mysqli_fetch_array($sql2)){
      $cust_name = $row2['Customer_Name'];
    }

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
        <p><strong>Date: </strong><?php echo date('d/m/Y'); ?></p>
        <p><strong>Type: </strong>Customer Order Invoice</p>
        <p><strong>Order ID: </strong><?php echo $order_id ?></p>
      </div>

    </div>
<hr style="height:1px; margin: 190px 0 0 0;">




      <div class="mid-info">
    <div class="mid-info1">
    <p><strong>TP Number: </strong><?php echo $cust_id; ?></p>
    <p><strong>Name: </strong><?php echo $cust_name; ?></p>
    <p><strong>Order Time: </strong><?php echo $update;?></p>
    <p><strong>Get Time: </strong><?php echo $get_time;?></p>
    </div>
    <div class="mid-info2">
      <p><strong>Estimated Time: </strong><?php echo $estimated_time; ?></p>
      <p><strong>Tracking Number: </strong><?php echo $track_num; ?></p>
      <p><strong>Total Item: </strong><?php echo $total_item; ?></p>
      <p><strong>Channel: </strong>AP-Grab Meals</p>
    </div>
  </div>





    <div class="report-table">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Food</th>
          <th scope="col">Quantity</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Total Price</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $split_food_id = str_split($food_id, 4);

        $food_array =array();

        foreach($split_food_id as $f_id){
            $get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'");
            $food_name_row = mysqli_fetch_array($get_food_id);
            $food_name = $food_name_row['Food_Name'];

            array_push($food_array, $food_name);
          }

          foreach (array_unique($food_array) as $food_n) {
            $count_duplicated_food = count_array_values($food_array, $food_n);
            $sql3 = mysqli_query($con, "SELECT * FROM food WHERE Food_Name = '$food_n'");
            while($row3 = mysqli_fetch_array($sql3)){
              $food_price = $row3['Unit_Price'];
            }

            $total_unit_price = $food_price * $count_duplicated_food;

        ?>

        <?php
        echo "<tr>";
        echo "<th scope='row'>$i</th>";
        echo "<td>".$food_n."</td>";
        echo "<td>".$count_duplicated_food."</td>";
        echo "<td>RM ".$food_price."</td>";
        echo "<td>RM ".$total_unit_price."</td>";
        echo "</tr>";
        $i++;
      }
    }else{
        echo "<script>alert('No invoice order chosen.')</script>";
        echo "<script>window.location.href='view_transaction_customer.php';</script>";
      }

        ?>
        <tr>
            <td colspan="4" style="text-align:right;font-size:25px;"><strong>GRAND TOTAL</strong></td>
            <td ><strong>RM<?php echo sprintf("%.2f", $order_price) ?></strong></td>
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
  <button type="button" class="btn btn-outline-primary"><a href="view_transaction_customer.php">Cancel</a></button>
  </div>


</div>

  </body>
</html>
