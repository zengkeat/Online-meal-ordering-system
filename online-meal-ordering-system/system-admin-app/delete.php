<?php 
session_start();
include "conn.php";
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM post WHERE Post_ID = '$id' ");
if(mysqli_affected_rows($con) <=0 )
{
	echo "<script>alert('Delete Fail !');</script>";
	echo "<script>window.location.href='post.php';</script>";
  }
else{
  	mysqli_close($con);
    echo "<script>alert('Delete Success !');</script>";
    echo "<script>window.location.href='post.php';</script>";
}
}
 ?>

<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];
    mysqli_query($con, "DELETE FROM customer WHERE Customer_ID = '$name' ");
if(mysqli_affected_rows($con) <=0 )
{
	echo "<script>alert('Delete Fail !');</script>";
	echo "<script>window.location.href='database.php';</script>";
  }
else{
  	mysqli_close($con);
    echo "<script>alert('Delete Success !');</script>";
    echo "<script>window.location.href='database.php';</script>";
}
}
 ?>