<?php
/*
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
 } else {
    $user_id = '';
 }
 
$cookie[] = $_COOKIE[$user_id];

echo $cookie;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>
</body>
</html>
<?php 
if (isset($_POST['search_btn'])){
    $echo =$_POST['search_btn'] . ' '. $_SESSION;
    $_SESSION['ca'] =$echo;
}
echo $car;
?>
