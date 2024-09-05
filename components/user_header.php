<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Shopie<span>.</span></a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="orders.php">Orders</a>
         <a href="shop.php">Shop</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div>
         <section class="search-form">
            <form action="search_page.php" method="post">
               <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
               <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>
         </section>
      </div>
      <div class="navbar nav-box">
      <a class="nav" href="recommend_page.php">For you only !</a>
      </div>
      <div class="icons">
         <?php
         $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $count_wishlist_items->execute([$user_id]);
         $total_wishlist_counts = $count_wishlist_items->rowCount();

         $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $count_cart_items->execute([$user_id]);
         $total_cart_counts = $count_cart_items->rowCount();
         ?>

         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span class="badge">
               <?= $total_wishlist_counts; ?>
            </span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span class="badge">
               <?= $total_cart_counts; ?>
            </span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>



      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <p>
               <?= $fetch_profile["name"]; ?>
            </p>
            <a href="update_user.php" class="btn">update profile</a>
            <div class="flex-btn">
               <button><a href="user_register.php" class="option-btn">register</a></button>
               <p></p>
               <button><a href="user_login.php" class="option-btn">login</a></button>
            </div>
            <a href="components/user_logout.php" class="delete-btn"
               onclick="return confirm('logout from the website?');">logout</a>
            <?php
         } else {
            ?>
            <p>please login or register first!</p>
            <div class="flex-btn">
               <p style="font-size: 30px;">
                  <a href="user_register.php" class="option-btn">register</a>&nbsp;/&nbsp;
                  <a href="user_login.php" class="option-btn">login</a>
               </p>
            </div>
            <?php
         }
         ?>


      </div>

   </section>

</header>