<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id))
{
    header('location:login.php');
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dateTime = $_POST['dateTime'];
    $tableSize = $_POST['tableSize'];

    $sql = "INSERT INTO reservations (name, user_id, email, phone, dateTime, tableSize) VALUES ('$name', '$user_id', '$email', '$phone', '$dateTime', '$tableSize')";

    if ($conn->query($sql) === TRUE) {
        header("Location: reservation.php?message=success");
    } else {
        header("Location: reservation.php?message=error");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="table_menu.css">
    <link rel="stylesheet" href="reservation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .message {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #d4d4d4;
            border-radius: 5px;
            text-align: center;
        }
        .message.success {
            background-color: #dff0d8;
            color: #3c763d;
            border-color: #d6e9c6;
        }
        .message.error {
            background-color: #f2dede;
            color: #a94442;
            border-color: #ebccd1;
        }
    </style>
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

<section class="banner-book">
    <div class="book">
        
        BOOK YOUR TABLE NOW
    
</div>
    

    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message'] == 'success') {
            echo '<div class="message success">New reservation created successfully</div>';
        } elseif ($_GET['message'] == 'error') {
            echo '<div class="message error">Error creating reservation. Please try again.</div>';
        }
    }
    ?>

    <div class="card-container">
        <div class="card-img"></div>
        <div class="card-content">
            <h3>Reservation</h3>
            <form action="reservation.php" method="POST">
                <div class="form-row">
                    <input type="text" name="name" id="name" placeholder="Your Name" required>
                    <input type="email" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-row">
                    <input type="text" name="phone" id="phone" placeholder="Your Phone Number" required>
                    <input type="datetime-local" name="dateTime" id="dateTime" required>
                </div>
                <div class="form-row">
                    <select name="tableSize" id="tableSize" required>
                        <option value="" disabled selected>Table Size</option>
                        <option value="2">2 People</option>
                        <option value="4">4 People</option>
                        <option value="6">6 People</option>
                        <option value="8">8 People</option>
                    </select>
                    <input type="submit" value="BOOK TABLE">
                </div>
            </form>
        </div>
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
