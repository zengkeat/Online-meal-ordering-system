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
    <title></title>
      <link rel="stylesheet" href="try.css">
  </head>
  <body>
    <?php
      $month_start = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2019));
      $month_end = date("Y-m-d", mktime(0, 0, 0, 3, 31, 2019));
      $sql = mysqli_query($con, "SELECT * FROM orders WHERE DATE(Order_date) >= '$month_start' AND Date(Order_date) <= '$month_end'");
      while($row = mysqli_fetch_array($sql)){
      $ordersid =  $row['Order_ID'];
    }
    $split_food_order = str_split($ordersid, 5);
    $order_array =array();
    foreach($split_food_order as $f_order){
      array_push($order_array, $f_order);
    }
    foreach (array_unique($order_array) as $order_n) {
      $count_duplicated_order = count_array_values($order_array, $order_n);
    }
    echo $count_duplicated_order;
    ?>


  </body>
</html>
