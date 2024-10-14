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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>The Gallery Cafe | Sri Lanka</title>
   <link rel="Icon" href="favicon.ico">

   <!-- font awesome cdn link  -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="reserved.css">

</head>
<body>
   

<section class="placed-orders">

    <h1 class="title">Table Reserved</h1>

    <div class="box-container">

    <?php
        $select_reservation = mysqli_query($conn, "SELECT * FROM reservations WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_reservation) > 0){
            while($fetch_reservation = mysqli_fetch_assoc($select_reservation)){
    ?>
    <div class="box">
         <p>Name : <span><?php echo $fetch_reservation['name']; ?></span> </p>
         <p>Email : <span><?php echo $fetch_reservation['email']; ?></span> </p>
         <p>Mobile number : <span><?php echo $fetch_reservation['phone']; ?></span> </p>
         <p>Booking date : <span><?php echo $fetch_reservation['dateTime']; ?></span> </p>
         <p>Table size : <span><?php echo $fetch_reservation['tableSize']; ?></span> </p>    
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">no orders placed yet!</p>';
    }
    ?>
    </div>

</section>




</body>
</html>