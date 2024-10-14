<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    header('location:cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
};

if(isset($_POST['update_quantity'])){
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>The Gallery Cafe | Sri Lanka</title>
   <link rel="Icon" href="favicon.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="cart.css">

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe Header</title>
    <link rel="stylesheet" href="styles.css">
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
                    <li><a href="usermenu.php">Menu</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="event.php">Events</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
        </div>
    </header>


<section class="shopping-cart">

    <h1 class="title">products added</h1>

    <div class="box-container">

    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
    ?>
    <div  class="box">
        <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
        <a href="view_page.php?pid=<?php echo $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
        <div class = images><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="" class="images"></div>
        <div class="name"><?php echo $fetch_cart['name']; ?></div>
        <div class="price">Rs<?php echo $fetch_cart['price']; ?>/-</div>
        <form action="" method="post">
            <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
            <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="cart_quantity" class="qty">
            <input type="submit" value="update" class="option-btn" name="update_quantity">
        </form>
        <div class="sub-total"> sub-total : <span>Rs<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
    </div>
    <?php
    $grand_total += $sub_total;
        }
    }else{
        echo '<p class="empty">your cart is empty</p>';
    }
    ?>
    </div>

    <div class="more-btn">
        <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from cart?');">delete all</a>
    </div>

    <div class="cart-total">
        <p>grand total : <span>Rs<?php echo $grand_total; ?>/-</span></p>
        <a href="usermenu.php" class="option-btn">continue shopping</a>
        <a href="chechout.php" class="btn  <?php echo ($grand_total > 1)?'':'disabled' ?>">proceed to checkout</a>
    </div>

</section>





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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#contact">Contact</a></li>
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
