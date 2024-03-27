<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>appointment</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style8.css">

</head>
<body>
   

<?php include 'header.php'; ?>

<section class="appoint" id="appoint">
   <div class="form2">
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      <h2 class="heading">make appointment</h2>
      <span>Enter patient name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <span>Enter your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>Enter your phone number :</span>
      <input type="tel" name="phone_no" placeholder="enter your number" class="box" required>
      <span>Enter your Address :</span>
      <input type="text" name="address" placeholder="enter your address" class="box" required>
      <span>Enter diseases :</span>
      <input type="text" name="diseases" placeholder="enter your diseases" class="box" required>
      <select name="doctor" class="box" required>
         <option value="" disabled selected hidden>Select your doctor</option>
         <?php
          $select_doctor = mysqli_query($conn, "SELECT * FROM `doctor`") or die('query failed');
          while($doct=mysqli_fetch_assoc($select_doctor)){
            ?>
            <option value="<?php echo $doct['doct_name']?>"><?php echo $doct['doct_name']?></option>
            <?php
          }
         ?>
      </select>
      <span>Appointment date :</span>
      <input type="datetime-local" name="appoint_date" class="box" required>
      <input type="submit" value="make appointment" name="submit" class="link-btn">
   </form>  
      </div>

</section>

<?php

if(isset($_POST['submit'])){

   // Sanitize form inputs
   $patient_name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $diseases = mysqli_real_escape_string($conn, $_POST['diseases']);
   $doct = mysqli_real_escape_string($conn, $_POST['doctor']);
   $date = mysqli_real_escape_string($conn, $_POST['appoint_date']);
   
   mysqli_query($conn, "INSERT INTO `appoint`(user_id, patient_name, email, phone_no, address, diseases, order_date, doct_name) VALUES('$user_id', '$patient_name', '$email', '$phone_no','$address','$diseases','$date','$doct')") or die('query failed');
   header('location:appoint.php');
}

?>



<?php include 'footer.php'; ?>

<script src="js/script2.js"></script>
<script>
   document.querySelector('#close-customize').onclick = () =>{
   document.querySelector('.edit-product-form').style.display = 'none';
   window.location.href = 'appoint.php';
}
</script>
 
</body>
</html>
