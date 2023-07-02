<?php
  $pageTitle = "Customer Invoice";
?>
<?php
include('base.php');
include('conn.php');
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>



<div class="trans-container ">

  <div class="view-header" style="margin-top:30px; text-align:center;">
    <h1>Customer Invoice</h1>
  </div>

     <div class="trans-nav">
      <div class="dropbtn dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Filter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="view_transaction_order.php" >Food Order</a>
          <a class="dropdown-item" href="view_transaction_customer.php" >Customer Invoice</a>
          <a class="dropdown-item" href="view_transaction_credit.php" >Credit Invoice</a>
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
       <th scope='col' style="width:130px;">Order ID</th>
       <th scope='col' style="width:130px;">Total Item</th>
       <th scope='col' style="width:240px;">Date</th>
       <th scope='col' style="width:240px;">Tracking Number</th>
       <th scope='col'>Price</th>
       <th scope='col'>Detail</th>
       </tr>
       </thead>
      <?php
      if (!isset($_POST['gobtn'])){
          echo "<tbody>";
          echo "<tr >";
          echo "<td style='width:300px;'>Please Insert a TP Number</td>";
          echo "</tr>";
          echo "</tbody>";
        }else{
            $id = $_POST['search'];
            $get_cust = mysqli_query($con, "SELECT * FROM orders WHERE Customer_ID = '$id' ORDER BY Order_date DESC");
            if (mysqli_num_rows($get_cust)){
              while ($row = mysqli_fetch_array($get_cust)){
                echo "<form action='invoice_order.php' method='post'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<td>".$row['Order_ID']."</td>";

                echo "<td>".$row['Total_Item']."</td>";
                echo "<td>".$row['Order_date']."</td>";
                echo "<td>".$row['Order_Tracking_Number']."</td>";
                echo "<td>".$row['Order_Total_Price']."</td>";
                echo "<td><a href='invoice_order.php?id=".$row['Order_ID']." 'class='btn btn-warning'>Invoice</a></td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</form>";
              }
            }else{
                echo "<script>alert('Search Not Found')</script>";
                echo "<script>window.location.href='view_transaction_customer.php';</script>";

              }
            }
      ?>
        </table>
    </div>


</div>







   </body>
 </html>
