<?php
include 'components/connect.php';
sleep(1);
$page = $_POST['page'];
$limit = 5;
$row = ($page-1)*$limit;
$select_products = $conn->prepare("SELECT * FROM `products` limit $row , $limit");
$select_products->execute();
if ($select_products->rowCount() > 0) {
   while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <form action="" method="post" class=""
         style="margin: 10px;border-radius: 20px;box-shadow: var(--box-shadow); padding:10px;width: 49vh;">
         <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
         <div style=" display: flex; justify-content: center; ">
            <img style="width: 200px;height: 200px;object-fit: scale-down; border-radius:5px;" src="<?= $fetch_product['image_01']; ?>"
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
               style="font-size: 16px;font-weight: bold; cursor: pointer;border-radius: 5px;height: 23%;"
               onkeypress="if(this.value.length == 2) return false;" value="1">
         </div>
         <div style="display:flex; justify-content: center;">
            <input type="submit" value="add to cart" class="btn" name="add_to_cart">
         </div>
      </form>
      <h1>
      <?php
      
   }}
?>
<!--echo $page ,"khatam ";-->
</h1>