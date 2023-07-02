<?php
  $pageTitle = "Order Transaction";
?>
<?php
include('base.php');
include('conn.php');
 ?>

<div class="trans-container ">

  <div class="view-header" style="margin-top:30px; text-align:center;">
    <h1>Food Order</h1>
  </div>

 <div class="trans-nav">
  <div class="dropbtn dropdown">
    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Filter
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href='view_transaction_order.php'>Food Order</a>
      <a class="dropdown-item" href="view_transaction_customer.php">Customer Invoice</a>
      <a class="dropdown-item" href="view_transaction_credit.php">Credit Invoice</a>
    </div>
  </div>



  <div class="searchbar">
    <form method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="gobtn"><i class="fa fa-search"></i>Go</button>
    </form>
</div>
</div>

<div class="trans-table">
   <table class='table table' style="width: 100%;">
     <thead>
     <tr>
     <th scope='col'>Order ID</th>
     <th scope='col'>Customer ID</th>
     <th scope='col'>Total Item</th>
     <th scope='col' style="width:160px;">Date</th>
     <th scope='col'>Tracking Number</th>
     <th scope='col'>Price</th>
     <th scope='col' style="width:240px;">Remark</th>
     <th scope='col' style="width:150px;">Detail</th>
     </tr>
     </thead>

  <?php
    if(isset($_POST['gobtn'])){
      $id = $_POST['search'];
      $_SESSION['searchid'] = $id;
      $sql = mysqli_query($con, "SELECT * FROM orders WHERE Order_ID = '$id'");
      if (mysqli_num_rows($sql) == 1){
        while ($row = mysqli_fetch_array($sql)){
          echo "<form action='details_order.php' method='post'>";
          echo "<tbody>";
          echo "<tr>";
          echo "<td name='orderid'>".$row['Order_ID']."</td>";

          echo "<td name='customerid'>".$row['Customer_ID']."</td>";
          echo "<td name='totalitem'>".$row['Total_Item']."</td>";
          echo "<td name='orderdate'>".$row['Order_date']."</td>";
          echo "<td name='tracknumber'>".$row['Order_Tracking_Number']."</td>";
          echo "<td name='price'>".$row['Order_Total_Price']."</td>";
          echo "<td name='remark'>".$row['Order_Remark']."</td>";
          echo "<td><a href='details_order.php?id=".$row['Order_ID']." 'class='btn btn-warning'>Details</a></td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</form>";
        }
      }elseif (mysqli_num_rows($sql) == 0){
        echo "<script>alert('Search Not Found')</script>";
        echo "<script>window.location.href='view_transaction_order.php';</script>";
      }
    }else{
      $sql2 = mysqli_query($con, "SELECT * FROM orders");
      while ($row2 = mysqli_fetch_array($sql2)){
        echo "<form action='details_order.php' method='post'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td name='orderid'>".$row2['Order_ID']."</td>";

        echo "<td name='customerid'>".$row2['Customer_ID']."</td>";
        echo "<td name='totalitem'>".$row2['Total_Item']."</td>";
        echo "<td name='orderdate'>".$row2['Order_date']."</td>";
        echo "<td name='tracknumber'>".$row2['Order_Tracking_Number']."</td>";
        echo "<td name='price'>".$row2['Order_Total_Price']."</td>";
        echo "<td name='remark'>".$row2['Order_Remark']."</td>";
        echo "<td><a href='details_order.php?id=".$row2['Order_ID']." 'class='btn btn-warning' >Details</a></td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</form>";
      }
    }
   ?>
    </table>
</div>

</div>
