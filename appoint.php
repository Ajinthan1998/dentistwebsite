<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit;
}

if (isset($_POST['submit'])) {
   // Sanitize form inputs
   $patient_name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $diseases = mysqli_real_escape_string($conn, $_POST['diseases']);
   $doct = mysqli_real_escape_string($conn, $_POST['doctor']);
   $date = mysqli_real_escape_string($conn, $_POST['appoint_date']);

   // Insert appointment data into the database
   $insert_query = "INSERT INTO `appoint` (user_id, patient_name, phone_no, address, order_date, doct_name, diseases) 
                    VALUES ('$user_id', '$patient_name', '$phone_no', '$address', '$date', '$doct', '$diseases')";

   if (mysqli_query($conn, $insert_query)) {
      // Appointment inserted successfully
      header('location:appoint.php');
      exit;
   } else {
      // Error occurred while inserting appointment
      die('Error: ' . mysqli_error($conn));
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Appointment</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style8.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<section class="appoint" id="appoint">
   <div class="form2">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <h2 class="heading">Make Appointment</h2>
         <span>Enter patient name:</span>
         <input type="text" name="name" placeholder="Enter patient name" class="box" required>
         <span>Enter your phone number:</span>
         <input type="tel" name="phone_no" placeholder="Enter phone number" class="box" required>
         <span>Enter your address:</span>
         <input type="text" name="address" placeholder="Enter address" class="box" required>
         <span>Enter diseases:</span>
         <input type="text" name="diseases" placeholder="Enter diseases" class="box" required>
         <select name="doctor" class="box" required>
            <option value="" disabled selected hidden>Select your doctor</option>
            <?php
            $select_doctor = mysqli_query($conn, "SELECT * FROM `doctor` WHERE availability='YES'") or die('Query failed');
            while ($doct = mysqli_fetch_assoc($select_doctor)) {
               ?>
               <option value="<?php echo $doct['doct_name']?>"><?php echo $doct['doct_name']?></option>
               <?php
            }
            ?>
         </select>
         <span>Appointment date:</span>
         <input type="datetime-local" name="appoint_date" class="box" required>
         <input type="submit" value="Make Appointment" name="submit" class="link-btn">
      </form>  
   </div>
</section>

<?php include 'footer.php'; ?>

<script src="js/script2.js"></script>
<script>
   document.querySelector('#close-customize').onclick = () => {
      document.querySelector('.edit-product-form').style.display = 'none';
      window.location.href = 'appoint.php';
   }
</script>
 
</body>
</html>
