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

<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_images'];
   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM wishlist WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO wishlist(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}


if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_images'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM wishlist WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO cart(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe Header</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<header>
    <div class="header-container">
        <a href="#" class="logo">
            <img src="image.png" alt="Gallery Cafe Logo">
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="ordered.php">Ordered</a></li>
                <li><a href="reserved.php">Reserved</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <!-- Search Bar -->
        <form action="search.php" method="POST" class="search-form">
            <input type="text" name="search_query" placeholder="Search for foods..." required>
            <button type="submit" name="search" class="search-btn"><i class="fas fa-search"></i></button>
        </form>
        <!-- Cart Icon -->
        <div class="cart-icon">
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
    </div>
</header>

</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>The Gallery Cafe | Sri Lanka</title>
   <link rel="Icon" href="favicon.ico">

   <!-- font awesome cdn link  -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="usermenu.css">

</head>
<body>
  
<section class="products">

   <div class="box-container">
      <!--Srilankan food loading -->
      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM products LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
         <div class="price">Rs<?php echo $fetch_products['price']; ?>/-</div>
         <div class="images"><img src="uploaded_img/<?php echo $fetch_products['images']; ?>" alt="" class="images"></div>
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_images" class="img" value="<?php echo $fetch_products['images']; ?>">
         <input type="hidden" name="product_quantity" value="1"> <!-- Set default quantity to 1 -->
         <!-- Add to Cart Button -->
         <input type="submit" value="Add to Cart" name="add_to_cart" class="btn add-to-cart-btn">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>



   </div>

   <div class="more-btn">
      <a href="register.php" class="option-btn">Order Now</a>
   </div>

</section>

<section class="products">
    <!-- Search Form -->
    <form action="search.php" method="POST" class="search-form">
        <input type="text" name="search_query" placeholder="Search for foods..." required>
        <button type="submit" name="search" class="search-btn"><i class="fas fa-search"></i></button>
    </form>

    <!-- The rest of your product section code -->
</section>


<script src="script.js"></script>

</body>
</html>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe Footer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Other sections of your website -->

    <footer class="footer-section">
        <div class="container">
            <div class="footer-logo">
                <img src="image.png" alt="Gallery Cafe Logo">
            </div>
            <div class="footer-columns">
                <div class="footer-column">
                    <h3>About Us</h3>
                    <p>Gallery Cafe is a cozy place offering the best coffee and pastries in town. Our mission is to provide a welcoming atmosphere where everyone feels at home.</p>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#"><img src="fb.png" alt="Facebook"></a>
                        <a href="#"><img src="twitter.png" alt="Twitter"></a>
                        <a href="#"><img src="ins.png" alt="Instagram"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Gallery Cafe. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts if any -->
</body>
</html>