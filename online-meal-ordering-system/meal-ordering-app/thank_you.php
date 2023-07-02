<?php

//Start the session
session_start();

//the page title of every page
$pageTitle = "Thanks you Page";

include("base.php");

 ?>
<div class="container" style="border-radius:20px;height:700px;background-color:white;">


<div class="" style="text-align:center;margin:30px 0 0 0;">
<h1 style="font-size:100px;"><span class="rainbow">THANK</span></h1>
<h1 style="font-size:100px;margin:-55px 0 0 0;"><span class="rainbow" >YOU</span></h1>
<h2>for using AP-Grab Meal....</h2>
<h2>Your order was completed successfully.</h2>
<a href="home.php" class="btn btn-danger btn-lg" style="border-radius:30px;width:300px;margin:50px 60px 0 0;">Go Back to Home Page</a>
<a href="track_order.php" class="btn btn-danger btn-lg" style="border-radius:30px;width:300px;margin:50px 0 0 0;">Go to Track Order Page</a>
</div>
</div>
