<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}
;

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="boot.css">

</head>

<body>
   <?php include 'components/user_header.php'; ?>
   <sec class="products" style="padding-top: 0; ">

      <div class="box-container">
         <h1>
            <?php
            if ($user_id && isset($_POST['search_box'])) {
               session_start();
               $_SESSION['post'] = $_POST['search_box'];
               $add = $_COOKIE[$user_id] . ' , ' . $_POST['search_box'];
               setcookie($user_id, $add, time() + 86400, "/");
               header('location:search_page.php');
            } elseif (isset($_POST['search_box'])) {
               $_SESSION['post'] = $_POST['search_box'];
               header('location:search_page.php');
            }

            ?>
         </h1>

      </div>
      <!-- Back to top button -->
      <a id="button"></a>

   </sec>
   <div class="home-bg">

      <section class="home">

         <div class="slider-frame">
            <div class="slide-images" style="margin-top: 10px;">
               <div class="img-container" class="mySlides"
                  style="display: flex; justify-content: center; align-items: center;">
                  <img src="images/home-img-1.png">
                  <div class="content" style="display: grid;">
                     <span style="font-size: 2rem;padding: 5px;">upto 50% off</span>
                     <h3 style="font-size: 4rem;padding: 5px;">latest smartphones</h3>
                     <a href="shop.php" class="btn"
                        style="display: flex;justify-content: center;font-size: 3rem;border-radius: 50px;width: 200px;">shop
                        now</a>
                  </div>
               </div>
               <div class="img-container" class="mySlides"
                  style="display: flex; justify-content: center; align-items: center;">
                  <img src="images/home-img-2.png">
                  <div style="display: grid;">
                     <span style="font-size: 2rem;padding: 5px;">upto 50% off</span>
                     <h3 style="font-size: 4rem;padding: 5px;">latest watches</h3>
                     <a href="shop.php" class="btn"
                        style="display: flex;justify-content: center;font-size: 3rem;border-radius: 50px;width: 200px;">shop
                        now</a>
                  </div>
               </div>
               <div class="img-container" class="mySlides"
                  style="display: flex; justify-content: center; align-items: center;">
                  <img src="images/home-img-3.png">
                  <div style="display: grid;">
                     <span style="font-size: 2rem;padding: 5px;">upto 50% off</span>
                     <h3 style="font-size: 4rem; padding: 5px;">latest headsets</h3>
                     <a href="shop.php" class="btn"
                        style="display: flex;justify-content: center;font-size: 3rem;border-radius: 50px;width: 200px;">shop
                        now</a>
                  </div>
               </div>
            </div>

         </div>

      </section>

   </div>

   <section class="category">

      <h1 class="heading">shop by category</h1>

      <div class="swiper category-slider">

         <div class="swiper-wrapper">

            <a href="home.php?category=laptop" class="swiper-slide slide">
               <img src="images/icon-1.png" alt="">
               <h3>laptop</h3>
            </a>

            <a href="home.php?category=tv" class="swiper-slide slide">
               <img src="images/icon-2.png" alt="">
               <h3>tv</h3>
            </a>

            <a href="home.php?category=camera" class="swiper-slide slide">
               <img src="images/icon-3.png" alt="">
               <h3>camera</h3>
            </a>

            <a href="home.php?category=mouse" class="swiper-slide slide">
               <img src="images/icon-4.png" alt="">
               <h3>mouse</h3>
            </a>

            <a href="home.php?category=fridge" class="swiper-slide slide">
               <img src="images/icon-5.png" alt="">
               <h3>fridge</h3>
            </a>

            <a href="home.php?category=washing" class="swiper-slide slide">
               <img src="images/icon-6.png" alt="">
               <h3>washing machine</h3>
            </a>

            <a href="home.php?category=smartphone" class="swiper-slide slide">
               <img src="images/icon-7.png" alt="">
               <h3>smartphone</h3>
            </a>

            <a href="home.php?category=watch" class="swiper-slide slide">
               <img src="images/icon-8.png" alt="">
               <h3>watch</h3>
            </a>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <mid-section class="home-products">

      <h1 class="heading">latest products</h1>
      <div>
         <div style="display: flex;flex-wrap: wrap;justify-content: center; " id="products">
            <?php
            /*if (isset ($_GET['category'])) {
               $category = $_GET['category'];
               $select_products = $conn->prepare("SELECT * FROM `products` WHERE type LIKE '%{$category}%'");
               $select_products->execute();
               if ($select_products->rowCount() > 0) {
                  while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                     <form action="" method="post" class=""
                        style="margin: 10px;border-radius: 20px;box-shadow: var(--box-shadow); padding:10px; width:50vh">
                        <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                        <div style=" display: flex; justify-content: center; ">
                           <img style="width: 193px; height: 193px; border-radius:5px;" src="<?= $fetch_product['image_01']; ?>"
                              alt="">
                        </div>
                        <div style=" display: flex;lign-items: center;flex-direction: column;">
                           <section style="display: flex;">
                              <button class="fas fa-heart" style=" background: white;padding: 5px;" type="submit"
                                 name="add_to_wishlist"></button>
                              <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"
                                 style="padding: 5px;display: flex;align-items: center;"></a>
                              <div class="price" style="padding: 5px;font-size: 16px;font-weight: bold;"><span>₹</span>
                                 <?= $fetch_product['price']; ?><span>/-</span>
                              </div>
                           </section>
                        </div>
                        <div class="name"
                           style=" display: flex; justify-content: space-between;font-size: 18px;font-weight: bold;">
                           <?= $fetch_product['name']; ?>
                           <input type="number" name="qty" class="qty" min="1" max="99"
                              style="font-size: 16px;font-weight: bold;border: 1px gray solid;border-radius: 5px;height: 23%;"
                              onkeypress="if(this.value.length == 2) return false;" value="1">
                        </div>
                        <div style="display:flex; justify-content: center;">
                           <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                        </div>
                     </form>

                     <?php
                  }
               }
            } else {
               
            }*/
            ?>
         </div>
      </div>

      <div class="swiper-pagination"></div>
      <h1>
         <div class="loader" id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
         </div>
         <?php
         /*
         if ($user_id && isset($_COOKIE[$user_id])) {
            $cookie = $_COOKIE[$user_id];
            $command = shell_exec("python cookie_shot.py \"$cookie\"");
            echo $command;
         } else
            echo "First login then search something to gate recomendaton!!"
            */
         ?>
      </h1>
   </mid-section>

   <?php include 'components/footer.php'; ?>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <!--dorkar ay duto js url-->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>

   <script>
      var page_no = 1;
      var isrunning = false;

      showdata();

      $(window).scroll(function () {
         if ($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
            if (!isrunning) {

               showdata();
            }

         }
      })


      function showdata() {
         $("#loader").show();
         $.post("home_loadmore.php", { page: page_no }, (response) => {
            isrunning = true;
            $("#products").append(response);
            isrunning = false;
            $("#loader").hide();
            page_no++;
         })
      }
   </script>

   <script>
      var btn = $('#button');

      $(window).scroll(function () {
         if ($(window).scrollTop() > 10) {
            btn.addClass('show');
         } else {
            btn.removeClass('show');
         }
      });

      btn.on('click', function (e) {
         e.preventDefault();
         $('html, body').animate({ scrollTop: 0 }, '300');
      });


   </script>

   <script>


      var swiper = new Swiper(".home-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });

      var swiper = new Swiper(".category-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 2,
            },
            650: {
               slidesPerView: 3,
            },
            768: {
               slidesPerView: 4,
            },
            1024: {
               slidesPerView: 5,
            },
         },
      });

      var swiper = new Swiper(".products-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            550: {
               slidesPerView: 2,
            },
            768: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });

   </script>

</body>

</html>