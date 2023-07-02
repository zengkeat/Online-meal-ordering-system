<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title></title>
<link rel="stylesheet" type="text/css" href="home.css"/>
<link rel="stylesheet" type="text/css" href="post.css"/>
<link rel="stylesheet" type="text/css" href="edit.css"/>
<link rel="stylesheet" type="text/css" href="register.css"/>
<link rel="stylesheet" type="text/css" href="post.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<style>
body{
  font-family: 'Acme', sans-serif;
}
</style>



<body><div class="king">
  <?php
include("conn.php");
if(!isset($_SESSION['login_staff'])){
      header("location:../meal-ordering-app/staff_login.php");
      session_write_close();
      exit();
    }
?>

<?php
if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_staff']);
   header("location:../meal-ordering-app/staff_login.php");
 }
?>

<div class="aha">
<form>
<div class="sidebar">
	<center>
		<h4>
			<div class="wowo"><h5>Admin</h5></div>
        <?php 
          $url = $_SERVER["REQUEST_URI"]; 
          $pos1 = strrpos($url, "cus_register.php"); 
          $pos2 = strrpos($url, "database1.php"); 
          $pos3 = strrpos($url, "stall_register.php"); 
          $pos4 = strrpos($url, "database.php"); 
          $pos5 = strrpos($url, "post.php"); 
          $pos6 = strrpos($url, "upload_post.php"); 
          $pos7 = strrpos($url, "stall_register.php"); 
          $pos8 = strrpos($url, "edit_cus.php"); 
          if($pos5 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn active' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          }elseif($pos1 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn btbtbtbtn' href='post.php'>Posts</a>";
            echo "<a class='btn active' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          }elseif($pos2 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn btbtbtbtn' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn active' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          } elseif($pos3 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn btbtbtbtn' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn active' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          }elseif($pos4 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn btbtbtbtn' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn active' href='database.php'>Record</a>";
            echo "</div>";
          }elseif($pos5 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn active' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          } elseif($pos6 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn active' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          }elseif($pos7 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn btbtbtbtn' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn btbtbtbtn' href='database.php'>Record</a>";
            echo "</div>";
          }elseif($pos8 != false){
            echo "<div class='wowo'>";
            echo "<a class='btn btbtbtbtn' href='post.php'>Posts</a>";
            echo "<a class='btn btbtbtbtn' href='cus_register.php'>Account Registration</a>";
            echo "<a class='btn btbtbtbtn' href='database1.php'>Stall</a>";
            echo "<a class='btn active' href='database.php'>Record</a>";
            echo "</div>";
          }     
        ?>
		</h4>
	</center>
</div>
</form>

	<div class="againfk">

		<nav class="navbar">
			<a class="navbar-brand">AP-Grab Meals</a>
      <p class="navbar hopeso">Welcome back! Admin<a href="base.php?logout='1'" class="cancel cancelcel">Sign Out</a></p>
		</nav>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
</div>



<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</div></body>
</html>
