<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Profile";

include("base.php");
include("my_account_server.php");
 ?>

<?php
  $customer_tp = $_SESSION['customer_tp'];
  $customer_balance = $_SESSION['customer_balance'];
  $get_tp = mysqli_query($con, "SELECT * FROM customer WHERE Customer_ID= '$customer_tp' ");

  if(mysqli_num_rows($get_tp) == 1 ){

      $row = mysqli_fetch_array($get_tp);

      $customer_name = $row['Customer_Name'];
      $customer_password = $row['Customer_Password'];
      $customer_role= $row['Customer_Role'];
      $customer_gender = $row['Customer_Gender'];
      $customer_ic_no = $row['Customer_IC_No'];
      $customer_contact= $row['Customer_Contact'];
      $customer_email = $row['Customer_Email'];
      $customer_description = $row['Customer_Description'];
      $customer_image= $row['Customer_File'];

  }
 ?>

 <div class="container">

 <h3 style="margin: 5px 0 5px 5px;">Account Setting</h3>

 <div class="Account_Frame img-thumbnail">
   <h5>Personal Details</h5>

<!-- profile detail -->
   <div class="edit_details float-left">
     <form class=""  method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default" >TP Number</span>
        </div>
        <input type="text" value="<?php echo $customer_tp; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
        </div>
        <input type="text" value="<?php echo $customer_name; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Role</span>
        </div>
        <input type="text" value="<?php echo $customer_role; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
        </div>
        <input type="text" value="<?php echo $customer_gender; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default"> I/C No</span>
        </div>
        <input type="text" value="<?php echo $customer_ic_no; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default">Contact Number</span>
        </div>
        <input style="width:100px;" type="tel"  pattern="[0-9]{3}-[0-9]{7}" required="required" name="customer_contact" value="<?php echo $customer_contact; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        <span id="passwordHelpBlock" class="form-text text-muted">
          Please insert the right phone format: E.g: 012-5566733
        </span>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
        </div>
        <input type="email" required="required" name="customer_email" value="<?php echo $customer_email; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text" id="inputGroup-sizing-default">Intake</span>
        </div>
        <input type="text" value="<?php echo $customer_description; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Credit Balance</span>
            <span class="input-group-text" style="width:50px;">RM</span>
          </div>
          <input type="text" value="<?php echo $customer_balance; ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" disabled>
        </div>

        <button type="submit" class=" btn_submit_detail btn btn-success btn-lg" id='btn_submit_detail' name="submit_edit_details" >Submit</button>
      </form>
  </div>

<!-- profile picture -->
    <form class=""  method="post" enctype="multipart/form-data">
        <div class="customer_frame float-left" >
        <img src="../system-admin-app/images/<?php echo $customer_image; ?>" alt="" class="customer_profile_picture img-thumbnail">
        <input type="file" name="profile_picture" value="" required="required" class="btn btn-danger" style="width:300px;height:45px;margin:5px 0 0 0; ">
        <input type="submit" name="profile_picture_submit" value="Submit" class="btn btn-danger" style="width:100px;margin:5px 0 0 0;">
        </div>
    </form>

 </div>


<!-- change password -->
  <div class="change_password_frame img-thumbnail">
    <h4 style="border-bottom: 1px solid grey;height:40px;">Change Password</h4>

      <?php include("errors.php"); ?>

        <form class=""  method="post" >
          <div class="form-group">
          <label for="exampleInputEmail1" style="margin:5px 0 0 0;">Current Password</label>
          <input name="current_password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password">
          </div>

          <div class="form-group">
          <label for="exampleInputPassword1">New Password</label>
          <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="New Password" >
          <small id="emailHelp" class="form-text text-muted">Password must atleast 8 character.</small>
          </div>

          <div class="form-group">
          <label for="exampleInputPassword1">Re-enter New Password</label>
          <input name="re_enter_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-enter New Password" >
          </div>

          <button type="submit" class="btn btn-success btn-lg" id='back_here' name="change_password_submit">Save Password</button>
      </form>
  </div>









































 </div>

 <!-- SUCCESS CHANGE DETAILS Modal -->
 <!-- Modal -->
 <div class="modal fade" id="success_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Alert</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        Profile Change Successful!
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-dismiss="modal">Got it!</button>
       </div>
     </div>
   </div>
 </div>

 <!-- SUCCESS CHANGE PASSWORD -->
 <div class="modal fade" id="success_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        Password successfully change!
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
