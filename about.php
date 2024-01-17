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
   <title>Document</title>
   <link rel="stylesheet" href="css/style8.css">
</head>
<body>
<?php include 'header.php'; ?>

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">


         <div class="content">
            <h2>About us</h2>
            <h3>True Healthcare For Your Family</h3>
            <p>Our Dental Clinics invites you as a patient! We utilize the most recent dental innovation to offer incredible dental consideration to give a charming, calm ordeal. <br>For your benefit, our clinics offer nighttimes and Saturday arrangements just as electronic protection preparing for simple and fast installment.
            <br>We pride ourselves on the consideration of our patients. We welcome patients all things considered and give benefits in both English and French. We enjoy incredible making your first dental involvement with us pleasant and keeping up long-haul associations with all of our patients.
            <br>Our theory for our clinics is the thing that we take a stab at ordinary. “A family situated practice in an amicable and minding condition devoted to brilliance.” We anticipate making cheerful, solid, and splendid grins for you and your family in the years ahead.</p>
            <a href="#contact.php" class="link-btn">Contact us</a>
         </div>

      </div>

   </div>

</section>

<section class="reviews" id="">

   <h1 class="heading"> satisfied clients </h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Very good dental treatment. Also very very friendly and polite Doctor. Excellent explain.
            Totally very good service.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Very good dental treatment. Also very very friendly and polite Doctor. Excellent explain.
            Totally very good service.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Very good dental treatment. Also very very friendly and polite Doctor. Excellent explain.
            Totally very good service.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
         <span>satisfied client</span>
      </div>

   </div>

</section>



<?php include 'footer.php'; ?>

</body>
</html>