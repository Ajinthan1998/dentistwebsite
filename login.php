<?php

include 'connection.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   $select_doctor = mysqli_query($conn, "SELECT * FROM `doctor` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['user_name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['user_id'];
         header('location:admin/admin_home.php');

      }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['phone_no']=$row['phone_no'];
            $_SESSION['email']=$row['email'];
            header('location:home.php');
         }
   
         
   }

   elseif(mysqli_num_rows($select_doctor) > 0){
      $row = mysqli_fetch_assoc($select_doctor);
   
         $_SESSION['doct_name'] = $row['doct_name'];
         $_SESSION['doct_email'] = $row['email'];
         $_SESSION['doct_id'] = $row['doct_id'];
         header('location:doct.php');

   }
   else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style7.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form1">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="submit" name="submit" value="login now" class="home-btn">
      <br><br>
      <input type="reset" class="reset-btn">
      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>

</div>
<?php include 'footer.php'; ?>

</body>
</html>