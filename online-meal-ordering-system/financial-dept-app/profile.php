<?php
  $pageTitle = "Profile";
?>
<?php
include('base.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php

include('conn.php');

if(isset($_POST['searchbtn'])){

  $get_search = strtoupper($_POST['search_user']);
  $_SESSION['search_user'] = $get_search;
  $sql = mysqli_query($con, "SELECT * FROM customer WHERE customer_id =  '$get_search'");
  if (mysqli_num_rows($sql) == 0){
      echo "<script>alert('Search Not Found!')</script>";
      echo "<script>window.location.href='finance_home.php';</script>";
  }
  $row= mysqli_fetch_array($sql);
  $customer_pic = $row['Customer_File'];
}


?>

<!-- submit reload -->
<?php

if (isset($_GET['confirm-reload']) =='Submit'){

  $get_search = $_SESSION['search_user'];

  $get_date = date('Y-m-d H:i:s');
  $staff_login = $_SESSION['login_staff_id'];
  $sql = mysqli_query($con, "SELECT * FROM customer WHERE customer_id ='$get_search'");
  $row = mysqli_fetch_array($sql);
  $customer_credit = $row["Customer_Credit_Balance"];

  $amount = $_GET['reload-amount'];

  $customer_balance = $customer_credit+$amount;

  $sql_2 = mysqli_query($con, "UPDATE customer SET Customer_Credit_Balance = '$customer_balance' WHERE Customer_ID = '$get_search'");

  if ($sql_2){

    $sql_3 = mysqli_query($con, "INSERT INTO credit_transaction (Customer_ID, Staff_ID, Action, Amount, Date) VALUES ('$get_search','$staff_login', 'Top-Up', '$amount', '$get_date')");
    if($sql_3){
    echo "<script>alert('Transaction Successfully')</script>";
    echo "<script>window.location.href='view_transaction_credit.php';</script>";
  }
  }else{
    echo "<script>alert('Failed Transaction')</script>";
    echo "<script>window.location.href='finance_home.php';</script>";
  }
}

?>

<!-- This is for refund account -->
<?php

if (isset($_GET['confirm-refund']) =='Submit'){

  $get_search = $_SESSION['search_user'];

  $get_date = date('Y-m-d H:i:s');
  $staff_login = $_SESSION['login_staff_id'];
  $sql = mysqli_query($con, "SELECT * FROM customer WHERE customer_id ='$get_search'");
  $row = mysqli_fetch_array($sql);
  $customer_credit = $row["Customer_Credit_Balance"];

  $amount = $_GET['refund-amount'];

  $customer_balance = $customer_credit-$customer_credit;

  $sql_2 = mysqli_query($con, "UPDATE customer SET Customer_Credit_Balance = '$customer_balance' WHERE Customer_ID = '$get_search'");
  if ($sql_2){
    $sql_3 = mysqli_query($con, "INSERT INTO credit_transaction (Customer_ID, Staff_ID, Action, Amount, Date) VALUES ('$get_search','$staff_login', 'Refund', '$customer_credit', '$get_date')");
    if ($sql_3)
    echo "<script>alert('Transaction Successfully')</script>";
    echo "<script>window.location.href='view_transaction_credit.php';</script>";
  }else{
    echo "<script>alert('Failed Transaction')</script>";
    echo "<script>window.location.href='finance_home.php';</script>";
  }
}


    echo "<div class='out-container container'>";
    echo "<div class='row'>";
    echo "<div class='panel panel-default'>";
    echo "<div class='panel-heading'>  <h2><strong>User Profile</strong></h2></div>";
    echo "<div class='panel-body'>";
    echo "<img alt='User Pic' src='../system-admin-app/images/$customer_pic' id='profile-image1' class='img-circle img-responsive'>";
    echo "<hr>";
    echo "<ul class='info-container details'>";
    echo "<p>ID:&nbsp <span class='glyphicon glyphicon-user one' style='width:50px;'> </span>".$row['Customer_ID']."</p>";
    echo "<p>Name:&nbsp <span class='glyphicon glyphicon-user one' style='width:50px;'> </span>".$row['Customer_Name']."</p>";
    echo "<p>Email:&nbsp <span class='glyphicon glyphicon-user one' style='width:50px;'> </span>".$row['Customer_Email']."</p>";
    echo "<p>Role:&nbsp <span class='glyphicon glyphicon-user one' style='width:50px;'> </span>".$row['Customer_Role']."</p>";
    echo "<p>Description:&nbsp <span class='glyphicon glyphicon-user one' style='width:50px;'> </span>".$row['Customer_Description']."</p>";
    echo "</ul>";
    echo "</hr>";
    echo "<div class='profile-container container'>";
    echo "<h6>Credit Balance: RM ".$row['Customer_Credit_Balance']."</h6>";
    echo "</div>";
    echo "<div class='re-button'>";
    echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#reload-modal'>Reload</button>";
    echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#refund-modal'>Refund</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

?>
<!-- This is the modal for reload -->
    <div class="modal fade" id="reload-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reload Credit Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="balance-before" class="col-form-label">Balance before: RM <?php echo $row['Customer_Credit_Balance'] ?></label>
          </div>
          <div class="form-group">
            <form method="post" >
            <label for="reload-amount" class="col-form-label">Reload amount:</label>
            <input type="text" class="form-control" name="reload-amount">
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="confirm-reload">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#reload-modal').on('shown.bs.modal' )
</script>

<!-- This is the modal for refund -->
    <div class="modal fade" id="refund-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refund Credit Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div>
            <p><strong>Important Note: </strong>If refund is submitted, balance of the user will be back to zero!</p>
          </div>
          <div class="form-group">
            <label for="balance-before" class="col-form-label">Balance before: RM <?php echo $row['Customer_Credit_Balance'] ?></label>
          </div>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="confirm-refund">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#refund-modal').on('shown.bs.modal' )
</script>
<!-- end of refund modal -->


  </body>
</html>
