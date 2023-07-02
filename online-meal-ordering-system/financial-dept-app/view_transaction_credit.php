<?php
  $pageTitle = "Transaction Credit";
?>
<?php
include('base.php');
include('conn.php');
 ?>

<div class="trans-container ">

  <div class="view-header" style="margin-top:30px; text-align:center;">
    <h1>Credit Invoice</h1>
  </div>

 <div class="trans-nav">
  <div class="dropbtn dropdown">
    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Filter
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="view_transaction_order.php">Food Order</a>
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
   <table class='table table'>
     <thead>
     <tr>
     <th scope='col' style="width:150px;">Credit ID</th>
     <th scope='col' style="width:170px;">Customer ID</th>
     <th scope='col' style="width:150px;">Staff ID</th>
     <th scope='col' style="width:150px;">Action</th>
     <th scope='col' style="width:130px;">Amount</th>
     <th scope='col' style="width:240px;">Date</th>
     <th scope='col'>Detail</th>
     </tr>
     </thead>
  <?php
  if(isset($_POST['gobtn'])){
    $id = $_POST['search'];
    $sql = mysqli_query($con, "SELECT * FROM credit_transaction WHERE CreditT_ID = '$id' or Customer_ID = '$id' ORDER BY Date DESC");
    if (mysqli_num_rows($sql)){
      while ($row = mysqli_fetch_array($sql)){
        echo "<form action='invoice_credit_transaction.php' method='post'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$row['CreditT_ID']."</td>";
        echo "<td>".$row['Customer_ID']."</td>";
        echo "<td>".$row['Staff_ID']."</td>";
        echo "<td>".$row['Action']."</td>";
        echo "<td>".$row['Amount']."</td>";
        echo "<td>".$row['Date']."</td>";
        echo "<td><a href='invoice_credit_transaction.php?id=".$row['CreditT_ID']." 'class='btn btn-warning'>Invoice</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</form>";
      }
    }elseif (mysqli_num_rows($sql) == 0){
      echo "<script>alert('Search Not Found')</script>";
      echo "<script>window.location.href='view_transaction_credit.php';</script>";
    }
  }else{
  $sql2 = mysqli_query($con, "SELECT * FROM credit_transaction ORDER BY Date DESC");
  // $counter = 0;
  // $max = 8;
  while ($row2 = mysqli_fetch_array($sql2) ){
    echo "<form action='invoice_credit_transaction.php' method='post'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>".$row2['CreditT_ID']."</td>";
    echo "<td>".$row2['Customer_ID']."</td>";
    echo "<td>".$row2['Staff_ID']."</td>";
    echo "<td>".$row2['Action']."</td>";
    echo "<td>".$row2['Amount']."</td>";
    echo "<td>".$row2['Date']."</td>";
    echo "<td><a href='invoice_credit_transaction.php?id=".$row2['CreditT_ID']." 'class='btn btn-warning'>Invoice</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</form>";

  }
}


  ?>
    </table>
</div>

</div>
