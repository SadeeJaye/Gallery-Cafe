<?php

@include 'config.php';

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
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="usermenu.php">Menu</a></li>
                    <li><a href="ordered.php">Ordered</a></li>
                    <li><a href="reserved.php">Reserved</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <a href="index.php" class="cta">Log Out</a>
        </div>
    </header>
</body>
</html>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Welcome to Gallery Cafe</h1>
                <p>Indulge in our exquisite coffee, artisanal pastries, and cozy ambiance.</p>
                <a href="usermenu.php" class="cta">View Menu</a>
            </div>
        </div>
    </section>
</body>
</html>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe - Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="gallery" class="gallery-section">
        <div class="container">
            <h2>Our Gallery</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="G1.jpg" alt="Image 1">
                    <div class="overlay">
                        <div class="text">Image 1 Description</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="G2.jpg" alt="Image 2">
                    <div class="overlay">
                        <div class="text">Image 2 Description</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="g3.jpg" alt="Image 3">
                    <div class="overlay">
                        <div class="text">Image 3 Description</div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="gallery 04.jpg" alt="Image 4">
                    <div class="overlay">
                        <div class="text">Image 4 Description</div>
                    </div>
                </div>
                <!-- Add more gallery items as needed -->
            </div>
        </div>
    </section>
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
