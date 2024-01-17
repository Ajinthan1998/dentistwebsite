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
   <title>services</title>
   <link rel="stylesheet" href="">
   <link rel="stylesheet" href="css/style7.css">
</head>
<body>
<?php include 'header.php'; ?>

<section class="services" id="">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/icon-1.svg" alt="">
         <h3>Alignment specialist</h3>
         <p>We see adults and children unable to access a regular dentist (subject to eligibility) for routine dental care</p>
      </div>

      <div class="box">
         <img src="images/icon-2.svg" alt="">
         <h3>Cosmetic dentistry</h3>
         <p>The service provides a range of oral surgical procedures for patients referred by their general dental practitioner</p>
      </div>

      <div class="box">
         <img src="images/icon-3.svg" alt="">
         <h3>Oral hygiene experts</h3>
         <p>We encourage and support our local communities to develop tooth friendly practices</p>
      </div>

      <div class="box">
         <img src="images/icon-4.svg" alt="">
         <h3>Root canal specialist</h3>
         <p>We deliver dental care from various sites across the all Sri lanka.</p>
      </div>

      <div class="box">
         <img src="images/icon-5.svg" alt="">
         <h3>Live dental advisory</h3>
         <p>Our team is passionate about delivering a highly effective, evidence based and sustainable service for our NHS users</p>
      </div>

      <div class="box">
         <img src="images/icon-6.svg" alt="">
         <h3>Cavity inspection</h3>
         <p>The aim is to make you as comfortable as possible and to offer pain relief until you can be seen by a regular dentist</p>
      </div>

   </div>

</section>
<?php include 'footer.php'; ?>

</body>
</html>
