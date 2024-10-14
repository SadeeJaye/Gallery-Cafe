<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
    exit(); // Ensure no further code is executed after redirect
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta class="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<?php @include 'admin_header.php'; ?>

<section class="dashboard">
   <h1 class="title">Dashboard</h1>

   <div class="box-container">
      <!-- Example box for total pending orders -->
      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            while ($fetch_pendings = mysqli_fetch_assoc($select_pendings)) {
                $total_pendings += $fetch_pendings['total_price'];
            }
         ?>
         <h3>Rs: <?php echo number_format($total_pendings, 2); ?> /-</h3>
         <p>Total Pendings</p>
      </div>

      <!-- Example box for total completed orders -->
      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            while ($fetch_completes = mysqli_fetch_assoc($select_completes)) {
                $total_completes += $fetch_completes['total_price'];
            }
         ?>
         <h3>Rs: <?php echo number_format($total_completes, 2); ?> /-</h3>
         <p>Completed Payments</p>
      </div>

      <!-- Box for total number of orders -->
      <div class="box">
         <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Orders Placed</p>
      </div>

      <!-- Box for total number of products -->
      <div class="box">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>Products Added</p>
      </div>

      <!-- Box for total number of reservations -->
      <div class="box">
         <?php
            $select_reservations = mysqli_query($conn, "SELECT * FROM `reservations`") or die('query failed');
            $number_of_reservations = mysqli_num_rows($select_reservations);
         ?>
         <h3><?php echo $number_of_reservations; ?></h3>
         <p>Total Reservations</p>
      </div>

      <!-- Box for total number of normal users -->
      <div class="box">
         <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>Normal Users</p>
      </div>

      <!-- Box for total number of admin users -->
      <div class="box">
         <?php
            $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admin = mysqli_num_rows($select_admin);
         ?>
         <h3><?php echo $number_of_admin; ?></h3>
         <p>Admin Users</p>
      </div>

      <!-- Box for total number of staff users -->
      <div class="box">
         <?php
            $select_staff = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'staff'") or die('query failed');
            $number_of_staff = mysqli_num_rows($select_staff);
         ?>
         <h3><?php echo $number_of_staff; ?></h3>
         <p>Staff Users</p>
      </div>

      <!-- Box for total number of user accounts -->
      <div class="box">
         <?php
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Total Accounts</p>
      </div>

    
   </div>
</section>

<section class="footer">
    <div class="box-container">
        <!-- Footer content... -->
    </div>

    <div class="credit">&copy; copyright @ <?php echo date('Y'); ?> by <span>The Gallery Cafe</span></div>
</section>

<script src="admin_script.js"></script>
</body>
</html>
