<?php
    if(isset($messages)){
        foreach($messages as $messages){
            echo ' 
            <div class="messages">
                <span>'.$messages.'</span>
                 <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
             </div>
            ';
        }

        
    }
    ?>
    <header class="header">
        <div class="flex">
            <a href="admin_page.php" class="logo">ADMIN <span>PANEL</span></a>
            <nav class="navbar">
                <a href="admin_page.php">Home</a>
                <a href="admin_products.php">Food Menu</a>
                <a href="admin_orders.php">Orders</a>
                <a href="view_reservations.php">Reservation</a>
                <a href="admin_users.php">Users</a>
                <a href="admin_contacts.php">Messages</a>
            </nav>

            <div class="icons">          
                <div id="menu-btn" class="fas-fa-bars"><i class="material-icons">dehaze</i></div>
                <div id="user-btn" class="fas-fa-user"><i class="material-icons" style="font-size:36px">person</i></div>
            </div>  

            <div class="account-box">
                <p>Username : <span><?php echo $_SESSION['admin_name'];?></span></p>
                <p>Email : <span></span><?php echo $_SESSION['admin_email'];?></span></p>
                <a href="logout.php" class="delete-btn">Logout</a>
                <div>New <a href="login.php">Login</a> | <a href="register.php"> Register</a>
                </div>
            </div>
        </div>
    </header>