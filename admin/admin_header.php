<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>


<header class="header">
<link rel="stylesheet" href="../css/style8.css">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">Admin Panel</a>

         <nav class="navbar">
            <a href="admin_home.php">Home</a>
            <a href="manage_users.php">Users</a>
         </nav>

         <div class="icons">
           
            <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
            
            <?php     
            if(isset( $_SESSION['admin_id'])){ 
               ?>
               <div id="user-btn" class="fas fa-user-circle ">
                  <span class="user">
                  <?php echo $_SESSION['admin_name']; ?>
                  </span>
               </div>
               <div class="i-box">
               <a href="../logout.php" class="delete-btn">logout</a>
            </div>
            <?php
            }
            ?>
      

      </div>

   </div>
   

</header>