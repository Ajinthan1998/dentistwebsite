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
   <title>Manage Doctors</title>
   <link rel="stylesheet" href="../css/admin_style.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
      // jQuery script for confirmation before deletion
      $(document).ready(function() {
         $(".delete-btn").on("click", function(e) {
            e.preventDefault();
            if (confirm('Confirm to delete this doctor?')) {
               window.location.href = $(this).attr('href');
            }
         });
      });
   </script>
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">
   <h1 class="title">Doctors Accounts</h1>
   <div class="box-container">
      <table class="center">
         <tr>
            <th>Doctor Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Availability</th>
            <th>Action</th>
         </tr>
         <?php
            $select_doctor = mysqli_query($conn, "SELECT * FROM `doctor`") or die('Query failed');
            while($fetch_doctor = mysqli_fetch_assoc($select_doctor)){
         ?>
         <tr>
            <form action="" method="POST">
               <td><input type="text" name="update_name"  value="<?php echo $fetch_doctor['doct_name']; ?>" required></td>
               <td><input type="text" name="update_phone_no" value="<?php echo $fetch_doctor['phone_no']; ?>" required></td>
               <td><input type="text" name="update_email"  value="<?php echo $fetch_doctor['email']; ?>" required></td>
               <td>
                  <select name="update_availability" required>
                     <option value="YES" <?php if ($fetch_doctor['availability'] == 'YES') echo 'selected'; ?>>YES</option>
                     <option value="NO" <?php if ($fetch_doctor['availability'] == 'NO') echo 'selected'; ?>>NO</option>
                  </select>
               </td>
               <td>
                  <input type="hidden" name="update_doct_id" value="<?php echo $fetch_doctor['doct_id']; ?>">
                  <button type="submit" name="update" class="option-btn">Update</button>
               </td>
            </form>
         </tr>
         <?php } ?>
      </table>
   </div>
</section>

<!-- custom admin js file link -->
<script src="../js/admin_script.js"></script>

</body>
</html>
