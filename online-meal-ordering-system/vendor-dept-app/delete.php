<?php 
session_start();
?>
<?php
include "conn.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM food WHERE Food_ID = '$id' ");
if(mysqli_affected_rows($con) <=0 )
{
	echo "<script>alert('Delete Fail !');</script>";
	echo ('Error: ' .mysqli_error($con));
	echo "<script>window.location.href='manage.php';</script>";
  }
else{
  	mysqli_close($con);
    echo "<script>alert('Delete Success !');</script>";
    echo "<script>window.location.href='manage.php';</script>";
}
}
 ?>
