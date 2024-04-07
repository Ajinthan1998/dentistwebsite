<!-- header section starts  -->

<header class="header">
<link rel="stylesheet" href="css/style8.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <div class="container">

      <!-- <div class="row align-items-center justify-content-between"> -->

         <a href="#home" class="logo">Dental Care</a>

         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="services.php">Our services</a>
            <a href="appoint.php">Appointment</a>
            <a href="mybooking.php">My Appointment</a>
            <a href="about.php">About</a>
         </nav>

         <div class="icons">
           
            <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
            
            <?php     
            if(isset( $_SESSION['user_id'])){ 
               ?>
               <div id="user-btn" class="fas fa-user-circle ">
                  <span class="user">
                  <?php echo $_SESSION['user_name']; ?>
                  </span>
               </div>
               <div class="i-box">
               <a href="logout.php" class="delete-btn">logout</a>
            </div>
            <?php
            }
            ?>
      

      </div>

   </div>
   

</header>


<!-- header section ends -->