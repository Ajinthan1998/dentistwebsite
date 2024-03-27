<?php

include '../connection.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- admin css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>


<section class="dashboard">

      

   <h1 class="title">dashboard</h1>

   <div class="box2">
         
      </div>

   <div class="box-container">
        <div class="box">
            <?php 
                $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                $number_of_users = mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $number_of_users; ?></h3>
            <p>Normal users</p>
        </div>

        <div class="box">
            <?php 
                $select_doctor = mysqli_query($conn, "SELECT * FROM `doctor` ") or die('query failed');
                $number_of_doctor = mysqli_num_rows($select_doctor);
            ?>
            <h3><?php echo $number_of_doctor; ?></h3>
            <p>Doctors</p>
        </div>


      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `appoint`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Appointments</p>
      </div>

   
   </div>

</section>

<!-- js file for admin panel  -->
<script src="../js/admin_script.js"></script>



</body>
</html>

