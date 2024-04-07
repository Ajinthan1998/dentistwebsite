<?php
// Include the database connection and start the session
include 'connection.php';
session_start();

// Redirect to login if doctor is not logged in
if (!isset($_SESSION['doct_name'])) {
   header('location: login.php');
   exit; // Stop further execution
}

// Retrieve doctor's name from session
$doct_name = $_SESSION['doct_name'];

// Handle appointment deletion
if (isset($_POST['delete_appointment'])) {
   $appoint_id = $_POST['appointment_id'];

   // Perform delete query based on appointment ID and doctor name
   $delete_query = mysqli_query($conn, "DELETE FROM `appoint` WHERE appoint_id = '$appoint_id' AND doct_name = '$doct_name'");

   if ($delete_query) {
      // Appointment deleted successfully
      header('location: doct.php'); // Redirect to same page after deletion
      exit;
   } else {
      echo 'Failed to delete appointment.';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Appointments</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style8.css">
   <script>
      function confirmDelete() {
         return confirm('Are you sure you want to delete this appointment?');
      }
   </script>
</head>
<body>
<header class="header">
   <div class="container">
      <a href="#home" class="logo">Dental Care</a>
      <div class="icons">
         <?php
         // Check if doctor is logged in (check doct_name in session)
         if(isset($_SESSION['doct_name'])) {
            echo '<div id="user-btn" class="fas fa-user-circle">';
            echo '<span class="user">' . $_SESSION['doct_name'] . '</span>';
            echo '</div>';
            echo '<div class="i-box">';
            echo '<a href="logout.php" class="delete-btn">Logout</a>';
            echo '</div>';
         } else {
            // If not logged in, display login link
            echo '<a href="login.php" class="login-btn">Login</a>';
         }
         ?>
      </div>
   </div>
</header>

<section class="myorder">
   <div class="caption">
      <h1>My Appointments</h1>
   </div>

   <div class="box-container">
      <table>
         <tr>
            <th>Patient Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Diseases</th>
            <th>Appointment Date & Time</th>
            <th>Action</th>
         </tr>
         <?php
         // Retrieve appointments for the logged-in doctor
         $appoint_query = mysqli_query($conn, "SELECT * FROM `appoint` WHERE doct_name = '$doct_name'") or die('Query failed');

         if (mysqli_num_rows($appoint_query) > 0) {
            while ($fetch_appoint = mysqli_fetch_assoc($appoint_query)) {
               ?>
               <tr>
                  <td><span><?php echo htmlspecialchars($fetch_appoint['patient_name']); ?></span></td>
                  <td><span><?php echo htmlspecialchars($fetch_appoint['phone_no']); ?></span></td>
                  <td><span><?php echo htmlspecialchars($fetch_appoint['address']); ?></span></td>
                  <td><span><?php echo htmlspecialchars($fetch_appoint['diseases']); ?></span></td>
                  <td><span><?php echo htmlspecialchars($fetch_appoint['order_date']); ?></span></td>
                  <td>
                     <form method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="appointment_id" value="<?php echo $fetch_appoint['appoint_id']; ?>">
                        <button type="submit" name="delete_appointment" class="delete-btn">Delete</button>
                     </form>
                  </td>
               </tr>
               <?php
            }
         } else {
            echo '<tr><td colspan="6"><p class="empty">No appointments found!</p></td></tr>';
         }
         ?>
      </table>
   </div>
</section>

<?php include 'footer.php'; ?>
<script src="js/script1.js"></script>

</body>
</html>
