<?php session_start();
include("conn.php");
if(!isset($_SESSION['login_staff'])){
      header("location:../meal-ordering-app/staff_login.php");
      session_write_close();
      exit();
    }
include("base.php")
?>
<div class="allall">
<div class="container tatata">

<?php
if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['login_staff']);
   header("location:../meal-ordering-app/staff_login.php");
 }
?>
<center>
<div class="haisec">
  <br>
  <div>
    <h3>Upload Post Form</h3>
  </div>  
<form class="cus_form img-thumbnail login_form" action="post_up.php" method="post" enctype="multipart/form-data"  onsubmit="return validateForm()" name="myForm"><br>
  <div>
    <label>Title for Post :</label><br>
    <input type="text" name="postname" id="postname" placeholder="Enter Post Title here..." pattern="[a-z]{1-100}[A-Z]{1-100}" title="Name must include 'Capital Letter'" required>
  </div><br><br>
  <div>
    <label>Post Description :</label><br>
    <textarea type="text" name="postdescription" id="postdescription" placeholder="Enter Post Description here..." rows="3" required></textarea>
  </div><br><br>
  <div>
    <input type="file" name="postimg" id="postimg" required>
  </div><br><br><br>
  <button class="btn btn-outline-secondary btnnnn" type="submit" name="upload">Upload</button>
  <br><br><br>
</form>


</div>
</center>

</div>
</div>