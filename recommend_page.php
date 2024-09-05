<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}


include 'components/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="boot.css">
</head>

<body>
    <div class="box-container">
        <?php include 'components/user_header.php'; ?>
        <section class="products" style="padding-top: 0; min-height:100vh;">
            <div class="box-container">
                    <?php

                    if ($user_id && isset($_COOKIE[$user_id])) {
                        $cookie = $_COOKIE[$user_id];
                        $command = " ". shell_exec("python cookie_shot.py \"$cookie\"");
                        #echo $command;
                        $command = substr($command,0,-3);
                        $re = explode(',',$command);
                        #echo sizeof($re),"</br>";
                        foreach ($re as $result) {
                            $result =substr($result, 1);
                            $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$result}%' limit 1");
                            $select_products->execute();
                            $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form action="" method="post" class="box">
                                <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                                <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                                <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                                <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                                <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                                <img src="<?= $fetch_product['image_01']; ?>" alt="">
                                <div class="name"><?= $fetch_product['name']; ?></div>
                                <div class="flex">
                                    <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
                                    <input type="number" name="qty" class="qty" min="1" max="99"
                                        onkeypress="if(this.value.length == 2) return false;" value="1">
                                </div>
                                <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                            </form>
                            <?php

                            #echo strlen($result),$result, "</br>";
                        }
                    } else
                        echo "First login then search something to get recomendaton!!"

                            ?>
                </div>
            </section>
    </body>

    </html>