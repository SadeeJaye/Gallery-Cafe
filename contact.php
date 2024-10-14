<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe Header</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="#" class="logo">
                <img src="image.png" alt="Gallery Cafe Logo">
            </a>
                                <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="event.php">Events</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="cta">Log In</a>
            <a href="register.php" class="cta">Register</a>
        </div>
    </header>
</body>
</html>


<main>
        <section class="contact">
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form action="#" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    
                    <button type="submit">Send Message</button>
                </form>
            </div>
            
            <div class="contact-info">
                <h2>Contact Information</h2>
                <p><strong>Address:</strong> 123 Coffee Lane, Brewtown</p>
                <p><strong>Phone:</strong> (555) 123-4567</p>
                <p><strong>Email:</strong> contact@gallerycafe.com</p>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8310375457026!2d-122.41764368468024!3d37.77532357975977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808f4c56a9d3%3A0x28a3f21f2722e6e5!2s123%20Coffee%20Lane%2C%20Brewtown!5e0!3m2!1sen!2sus!4v1629876543210!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="social-media">
                    <a href="#" class="social-icon">FB</a>
                    <a href="#" class="social-icon">TW</a>
                    <a href="#" class="social-icon">IG</a>
                </div>
                <p><strong>Business Hours:</strong></p>
                <p>Mon-Fri: 7am - 7pm</p>
                <p>Sat-Sun: 8am - 8pm</p>
            </div>
        </section>
    </main>
    

