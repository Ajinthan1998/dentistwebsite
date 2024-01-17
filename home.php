<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style8.css">

</head>
<body>

<?php
session_start();
if(!isset($_SESSION['user_id'])){
   ?>
      <div class="logi">

         <p>
         <a href="login.php">login</a> 
         <a href="register.php">register</a> 
         </p>

      </div>
   <?php
}
?>


<?php include 'header.php'; ?>

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>LET US BRIGHTEN YOUR SMILE.</h3>
            <p>Every time you smile at someone, it is an action of love, a gift to that person, a beautiful thing.</p>
            <a href="appoint.php" class="link-btn">make appointment</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<?php include 'footer.php'; ?>


<script src="js/script.js"></script>

</body>
</html>    
