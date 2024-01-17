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
   <title>myappoint</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style8.css">

</head>
<body>
   
<?php include 'header.php'; ?>


<section class="myorder">
   <div class="caption">
   <h1>My Appointments</h1>
   </div>

   <div class="box-container">
    <?php
   $appoint_query = mysqli_query($conn, "SELECT * FROM `appoint` WHERE user_id = '$user_id'") or die('query failed');
   ?>
      <!-- <div class="myview"> -->
         
      <table>
           <tr>
            <th>User name</th>
            <th>Address</th>
            <th>Your diseases</th>
            <th>Doctor</th>
            <th>Appointment date & time</th>
           </tr>
           <?php
       
         if(mysqli_num_rows($appoint_query) > 0){
            while($fetch_appoint = mysqli_fetch_assoc($appoint_query)){
         ?>
           <tr>               
            <td><span><?php echo $fetch_appoint['patient_name']; ?></span></td>
            <td><span><?php echo $fetch_appoint['address']; ?></span></td>
            <td> <span><?php echo $fetch_appoint['diseases']; ?></span> </td>
            <td> <span><?php echo $fetch_appoint['doct_name']; ?></span> </td>
            <td><?php echo $fetch_appoint['order_date']; ?></span> </td>           
           </tr>
       
      <?php
       }
      }else{
         echo '<p class="empty">no appointments placed yet!</p>';
      }

      ?> 
      
      </table> 
   </div>

</section>



<?php include 'footer.php'; ?>
<script src="js/script1.js"></script>

</body>
</html>