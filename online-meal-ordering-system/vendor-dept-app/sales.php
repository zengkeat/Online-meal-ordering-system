<?php
session_start();
include("conn.php");
$errors = array();
 if (isset($_POST['submit'])) {

  	$orderid = mysqli_real_escape_string($con, $_POST['orderid']);
	$foodidid = mysqli_real_escape_string($con, $_POST['foodidid']);
	$total = mysqli_real_escape_string($con, $_POST['total']);
	$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
	$item_quantity = mysqli_real_escape_string($con, $_POST['count']);
	
	echo "$item_quantity";
	echo $_POST['foodidid'];
	print("$total");

     	$sales_check = "SELECT * FROM sales WHERE Order_ID = '$orderid' and Stall_ID = '$id' ";
      	$result = mysqli_query($con, $sales_check);
      	$sales = mysqli_fetch_assoc($result);
      	//echo "$orderid,$foodidid,$total,$id";
		    if ($sales['Order_ID'] == $orderid) 
		    { 	echo "<script>alert('Sales already exists')</script>";
		       	echo "<script>window.location.href = 'prepare.php';</script>";	     
			}
			else
			{ 	$sql = "INSERT INTO sales (Stall_ID, Order_ID, Food_ID, Sales_Date, Profit)
			VALUES
			('$id', '$orderid', '$foodidid', now(), '$total' )";
			$result = mysqli_query($con, $sql);
			echo "<script> alert ('Done !');</script>";
			// echo ('Error: ' .mysqli_error($con));
			echo "<script>window.location.href = 'prepare.php';</script>";
			}
//if (!mysqli_query($con, $sql)) {
//  die('Error: ' .mysqli_error($con));
//}
//mysqli_close($con);
}
?>
