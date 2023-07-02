<?php
  $pageTitle = "Finance Home";
?>
<?php
include('base.php');
?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <title>Financial Department Homepage</title>

     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <!-- Our Custom CSS -->
     <link rel="stylesheet" href="finance_home.css">

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
 </head>
   <body>





      <div class="search-bar">
        <form action="profile.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Search User Profile</label>
            <input type="text" class="form-control" name="search_user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a TP number.">
          </div>
          <button type="submit" value="search" name="searchbtn" class="btn btn-primary">Search</button>
          <button type="reset" class="btn btn-primary">Clear</button>
        </form>
      </div>



   </body>
 </html>
