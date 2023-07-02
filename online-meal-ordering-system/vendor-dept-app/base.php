<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title></title>
<link rel="stylesheet" type="text/css" href="home.css"/>
<link rel="stylesheet" type="text/css" href="manage.css"/>
<link rel="stylesheet" type="text/css" href="profile.css"/>
<link rel="stylesheet" type="text/css" href="changepass.css"/>
<link rel="stylesheet" type="text/css" href="edit.css"/>
<link rel="stylesheet" type="text/css" href="prepare.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<style>
  body{
    font-family: 'ZCOOL XiaoWei', serif;
  }
</style>




<body>
  <?php
include("conn.php");
if(!isset($_SESSION['login_stall'])){
      header("location:../meal-ordering-app/staff_login.php");
      session_write_close();
      exit();
    }
?>

<?php
if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_stall']);
   header("location:../meal-ordering-app/staff_login.php");
 }
?>

<div class="maxmaxmax">
<form>
<div class="sidebar">
	<center>
		<h4>
			

            <?php 
            $url = $_SERVER["REQUEST_URI"]; 
            $pos = strrpos($url, "home.php"); 
            $pos1 = strrpos($url, "prepare.php"); 
            $pos2 = strrpos($url, "manage.php"); 
            $pos3 = strrpos($url, "profile.php"); 
            $pos4 = strrpos($url, "edit.php"); 
            $pos5 = strrpos($url, "topsales.php");
            $pos6 = strrpos($url, "report.php");
            $pos7 = strrpos($url, "report1.php");
              if($pos != false){
                echo "<div class='paddddd'><h5>This is Home Page !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
    				    echo "<a class='btn active' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
    				    echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
    				    echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn wolala' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos1 != false){
                echo "<div class='paddddd'><h5>Prepare List !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn active' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
                echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn wolala' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos2 != false){
                echo "<div class='paddddd'><h5>Item Management Page<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn active' href='manage.php'>Manage Item</a>";
                echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn wolala' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos3 != false){
                echo "<div class='paddddd'><h5>Stall Profile !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
                echo "<a class='btn active' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn wolala' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos4 != false){
                echo "<div class='paddddd'><h5>Stall Profile !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
                echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn wolala' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos5 != false){
                echo "<div class='paddddd'><h5>Top Sales Item !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
                echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn wolala' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos6 != false){
                echo "<div class='paddddd'><h5>Top Sales Item !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
                echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn active' href='report.php'>Report</a>";
                echo "</div>";
              }elseif($pos7 != false){
                echo "<div class='paddddd'><h5>Top Sales Item !<br>=</h5></div>";
                echo "<div class='paddd'>";
                echo "<div class='babachiban'>";
                echo "<a class='btn wolala' href='home.php'>Home</a>";
                echo "<a class='btn wolala' href='prepare.php'>Prepare List</a>";
                echo "<a class='btn wolala' href='manage.php'>Manage Item</a>";
                echo "<a class='btn wolala' href='profile.php'>Stall Profile</a>";
                echo "<a class='btn active' href='report.php'>Report</a>";
                echo "</div>";
              }

              $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
              $sql = "SELECT * FROM food WHERE Stall_ID = '$id'";
              $result = mysqli_query($con, $sql);
              if(mysqli_num_rows($result)<=0)
              {
                  echo "<table class='table'>";
                  echo"<script>alert('No Food in the system now ! Add more !');</script>";
                  echo "<tr>";
                  echo "<td>";
                  echo "No Food Now !";
                  echo "</td>";
                  echo "</tr>";
                  echo "</table>";
              }else{
                while($food = mysqli_fetch_array($result)){
                  if(($food['Stall_ID']) === ($_SESSION['login_stallid'])){
                    $name = $food['Food_Name'];
                    $fid = $food['Food_ID'];
                    echo "<table class='table gglela'>";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<input type='hidden' name='foodidlai' value='".$fid."'>";
                    echo "<h7 class='havnomen'>".$name."</h7>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                    echo "</table>";
                  }
                }
              }
              ?>

  			</div>
		</h4>
	</center>
</div>
</form>

	<div class="nacnac">

		<nav class="navbar">
			<a class="navbar-brand">AP-Grab Meals</a>
      <p class="navbar idkhtd">Welcome Back  <?php echo $_SESSION["login_stall"];?><a href="home.php?logout='1'" class="cancel cancellogout">Sign Out</a></p>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>
</html>
