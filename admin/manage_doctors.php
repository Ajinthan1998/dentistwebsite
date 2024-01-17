<?php

include '../connection.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:../login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `doctor` WHERE doct_id = '$delete_id'") or die('query failed');
   header('location:manage_users.php');
}

if(isset($_POST['update'])){

   $update_doct_id = $_POST['update_doct_id'];
   $update_name = $_POST['update_name'];
   $update_phone_number= $_POST['update_phone_no'];
   $update_email=$_POST['update_email'];
   $update_availability=$_POST['update_availability'];

   mysqli_query($conn, "UPDATE `doctor` SET doct_name = '$update_name',  phone_no= '$update_phone_number', email = '$update_email',  availability= '$update_availability' WHERE doct_id = '$update_doct_id'") or die('query failed');

   header('location:manage_doctors.php');
}


if(isset($_POST['appoint'])){

   $add_name = $_POST['delb_name'];
   $add_phone_number= $_POST['delb_phone_no'];
   $add_email=$_POST['delb_email'];
   $add_password=$_POST['delb_password'];
   $add_availability=$_POST['delb_availability'];

   mysqli_query($conn, "INSERT INTO `doctor` (doct_name,  phone_nuo, email, password, availability) VALUES('$add_name', '$add_phone_number', '$add_email', '$add_password', '$add_availability')") or die('query failed');

   header('location:manage_delb.php');
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

<section class="users">

   <h1 class="title"> Doctors Accounts </h1>

   <div class="box-container">
    <table class="center">
        <tr>
            <th>Doctor id</th>
            <th>Doctor name</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Availability</th>
            <th>Manage Doctos</th>
        </tr>
    
      <?php
         $select_doctor = mysqli_query($conn, "SELECT * FROM `doctor`") or die('query failed');
         while($fetch_doctor = mysqli_fetch_assoc($select_doctor)){
      ?>
        <tr>
         <form action="" method="POST">
            <td><input type="text" name="update_doct_id" class="box" value="<?php echo $fetch_doctor['doct_id']; ?>" required></td>
            <td><input type="text" name="update_name" class="box" value="<?php echo $fetch_doctor['doct_name']; ?>" required></td>
            <td><input type="text" name="update_phone_no" class="box" value="<?php echo $fetch_doctor['phone_no']; ?>" required></td>
            <td><input type="text" name="update_email" class="box" value="<?php echo $fetch_doctor['email']; ?>" required></td>
            <td><input type="text" name="update_availability" class="box" value="<?php echo $fetch_doctor['availability']; ?>" required></td>

            <td>
            <input type="submit" value="Update"  name="update" class="option-btn">
            <!-- <a href="manage_doctors.php?delete=<?php echo $fetch_doctor['doct_id']; ?>" onclick="return confirm('Confirm to delete this doctor?');" class="delete-btn">delete</a> -->
         </form> 
         </td>
        </tr>
      
      <?php
         }
      ?>
    </table>
   </div>

</section>



<!-- custom admin js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>