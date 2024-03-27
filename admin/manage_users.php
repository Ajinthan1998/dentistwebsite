<?php

include '../connection.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:../login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE user_id = '$delete_id'") or die('query failed');
   header('location:manage_users.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="add-foods">
   <a href="manage_doctors.php" div="btn" >Manage Doctors</a>
</section>

<section class="users">


   <h1 class="title"> user accounts </h1>

   <div class="box-container">
    <table class="center">
        <tr>
            <th>User id</th>
            <th>Username</th>
            <th>Email</th>
            <!-- <th>User type</th> -->
            <th>Manage User</th>
        </tr>
    
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
        <tr>
            <td><?php echo $fetch_users['user_id']; ?></td>
            <td><?php echo $fetch_users['user_name']; ?></td>
            <td><?php echo $fetch_users['email']; ?></td>
            <td><a href="manage_users.php?delete=<?php echo $fetch_users['user_id']; ?>" onclick="return confirm('Confirm to Remove this user?');" class="delete-btn">delete user</a></td>
        </tr>
      
      <?php
         };
      ?>
    </table>
   </div>

</section>

<!-- custom admin js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>