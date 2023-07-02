<?php

// Start the session
session_start();

//the page title of every page
$pageTitle = "Top-up";

include("base.php");
include("ap_card_server.php");
 ?>
<div class="container">

<h3>Top-up</h3>
<!-- //credit card top- up -->
<div class="top_up_frame img-thumbnail">
  <h4>Card Details</h4><hr>

  <p>We accept</p>
  <img style="margin:-18px 0 0 0;"src="images/credit_card.png" alt="">
<br><br>
 <form method="post">
  <div class="form-row">

    <div class="col-md-7 mb-3">
        <label for="validationCustomUsername">Top-up Amount</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend" style="width:50px;">RM</span>
          </div>
          <input type="number" name="top_up_amount" min="50" max="1000" class="form-control" id="validationCustomUsername" placeholder="Amount" aria-describedby="inputGroupPrepend" required>
        </div>
      </div>

    <div class="form-group col-md-7">
      <label for="inputPassword4">Name on card</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Ex. John Snow" required>
    </div>

  </div>
  <div class="form-group">
    <label for="inputAddress">Card Number</label>
    <input type="text" pattern="[0-9]{16}" required="required" class="form-control" id="inputAddress" title="Ex. 3452XXXXXXXXXXXX" placeholder="Ex. 3452XXXXXXXXXXXX" >
    <span id="passwordHelpBlock" class="form-text text-muted">
      *No spaces or dashe (Ex.1235XXXXXXXXXXXX)
    </span>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Expire Date</label>
      <input type="text" class="form-control" id="inputCity" placeholder="MM/YY" title="Ex. 12/11"pattern="[0-9]{2}/[0-9]{2}" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Bank Type</label>
      <select id="inputState" class="form-control" required>
        <option>MayBank</option>
        <option>CIMB Bank</option>
        <option>Public Bank Berhad</option>
        <option>RHB Bank</option>
        <option>Hong Leong Bank</option>
        <option>AmBank</option>
        <option>Affin Bank</option>
        <option>Bank Islam Malaysia</option>
        <option>HSBC Bank Malaysia</option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">CVV Code</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Ex.563" title="Ex. 637" pattern="[0-9]{3}" required>
    </div>
  </div>

  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <button type="submit" class="btn btn-primary btn-lg" name="pay_topup" style="float:left;margin: 0 5px 0 40%;">Pay Now</button>
</form>
<a href="top_up.php?cancel_top_up" class="btn btn-warning float-left btn-lg">Cancel</a>

</div>
<p>* To Refund your Credit inside the AP-Card, Please go to Financial Department. Thank You!</p>










</div>


<!-- success top-up -->
<div class="modal fade" id="success_top_up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Top-up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Top-up Successful!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- cancel top up -->
<div class="modal fade" id="cancel_top_up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Top-up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Transaction Cancel!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
