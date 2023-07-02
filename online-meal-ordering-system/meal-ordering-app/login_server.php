<!-- https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database -->
<?php
session_start();

include('conn.php');

$errors = array();

//LOGIN CUSTOMER
 if (isset($_POST['l_customer'])) {
   $username = mysqli_real_escape_string($con, $_POST['username']);
   $password = mysqli_real_escape_string($con, $_POST['password']);

   if (empty($username)) {
   	array_push($errors, "Username is required");
   }
   if (empty($password)) {
   	array_push($errors, "Password is required");
   }

   if (count($errors) == 0) {
   	$password = md5($password);
    // select/grab/find the same ROW where "username" and "password" is equal to the
    // $username and $password that user type in.
   	$sql = "SELECT * FROM customer WHERE customer_id='$username' AND customer_password='$password'";
    //perform database query
   	$results = mysqli_query($con, $sql);

    //**test
    // $row = mysqli_num_rows($results);
    // print($row);

    // count how many row that "$result" match.
    //if the "$result" row that match to the database is == 1, then the user is valid,
    // to make sure there is only one "username" and 'password' row that match.
   	if (mysqli_num_rows($results) == 1) {

      $_SESSION['login_name'] = $username;
      // get the username from the database who login, and the username unique in the users table model
      $get_login_username = mysqli_query($con,"SELECT * FROM customer WHERE customer_id = '$username'");

      // fetch the row as an array
      $row =mysqli_fetch_array($get_login_username);
      // print_r($row);
      // then, get the "username" who login in the array, exp: [username] => Giam Zeng Keat
      $login_user = $row["Customer_Name"];
      $customer_tp = $row["Customer_ID"];


      $_SESSION['login_customer'] = $login_user;
      $_SESSION['customer_tp'] = $customer_tp;

      header('location: home.php');

   	}else {
   		array_push($errors, "Wrong username/password combination");
   	}
   }
 }

 // LOGIN STAFF
 if (isset($_POST["l_staff"])){
   $username = mysqli_real_escape_string($con,$_POST["username"]);
   $password = mysqli_real_escape_string($con,$_POST["password"]);
   $role = $_POST['categories'];

   if(empty($username)){
     array_push($errors, "Username is required");
   }
   if(empty($password)){
     array_push($errors, "Password is required");
   }

   if(count($errors)== 0){

     $password = md5($password);

     $sql = "SELECT * FROM staff WHERE staff_username='$username' AND staff_password='$password' AND staff_role='$role' ";
     $sql2 = "SELECT * FROM stall WHERE stall_username='$username' AND stall_password='$password'";
     //perform database query
     $results = mysqli_query($con, $sql);
     $results2 = mysqli_query($con, $sql2);

     if(mysqli_num_rows($results)==1){

       // to get the original username
       $get_login_username = mysqli_query($con,"SELECT * FROM staff WHERE staff_username = '$username'");

       // fetch the row as an array
       $row =mysqli_fetch_array($get_login_username);
       // print_r($row);
       // then, get the "username" who login in the array, exp: [username] => Giam Zeng Keat
       $login_user = $row["Staff_Username"];
       $login_id = $row["Staff_ID"];

       $_SESSION['login_staff'] = $login_user;
       $_SESSION['login_staff_id'] = $login_id;

        if($role == "System Admin"){
          header('location: ../system-admin-app/post.php');
        }else{
          header('location: ../financial-dept-app/finance_home.php');
        }


     }elseif(mysqli_num_rows($results2) == 1){

       // to get the stall owner name
       $get_login_username = mysqli_query($con,"SELECT * FROM stall WHERE stall_username = '$username'");

       // fetch the row as an array
       $row =mysqli_fetch_array($get_login_username);
       // print_r($row);
       // then, get the "stall_owner" who login in the array, exp: [stall_owner] => Giam Zeng Keat
       $login_user = $row["Stall_Owner"];
       $login_description = $row["Stall_Description"];
       $login_category = $row["Stall_Category"];
       $login_stallid = $row["Stall_ID"];
       $login_password = $row["Stall_Password"];
       $login_name = $row['Stall_Owner'];

       $_SESSION['login_stall'] = $login_user;
       $_SESSION['login_description'] = $login_description;
       $_SESSION['login_category'] = $login_category;
       $_SESSION['login_stallid'] = $login_stallid;
       $_SESSION['login_password'] = $login_password;
       $_SESSION['login_owner'] = $login_name;


       if($role != "System Admin" and $role != "Finance Department"){
         header('location: ../vendor-dept-app/home.php');
       }else{
          array_push($errors, "Wrong username/password/role combination");
       }

     }else{

       array_push($errors, "Wrong username/password/role combination");
     }

   }
 }
 ?>
