<!-- https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database -->
<?php
session_start();

include('conn.php');

$errors = array();

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
       $login_user = $row["staff_username"];

       $_SESSION['login_staff'] = $login_user;
       // $_SESSION['success_staff'] = $login_user;

        if($role == "System Admin"){
          header('location: others/system_admin.php');
        }else{
          header('location: others/finance.php');
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
       // $_SESSION['success_stall'] = $login_user;

       if($role != "System Admin" and $role != "Finance Department"){
         header('location: home.php');
       }else{
          array_push($errors, "Wrong username/password/role combination");
       }

     }else{

       array_push($errors, "Wrong username/password/role combination");
     }

   }
 }
 ?>
