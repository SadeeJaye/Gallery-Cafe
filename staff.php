<?php
@include 'config.php';

session_start();

$staff_id = $_SESSION['staff_id'];

if (!isset($staff_id)) {
    header('location:login.php');
    exit(); // Ensure no further code is executed after redirect
}

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_query = "DELETE FROM `reservations` WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header('Location: staff.php?message=deleted');
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Portal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="view_reservation.css">
</head>
<body>
<header class="header">
        <div class="flex">
            <a href="admin_page.php" class="logo">STAFF <span>PANEL</span></a>
            <nav class="navbar"> 
            </nav>

            <div class="icons">          
                <div id="menu-btn" class="fas-fa-bars"><i class="material-icons">dehaze</i></div>
                <div id="user-btn" class="fas-fa-user"><i class="material-icons" style="font-size:36px">person</i></div>
            </div>  

            <div class="account-box">
                <p>Username : <span><?php echo $_SESSION['staff_name'];?></span></p>
                <p>Email : <span></span><?php echo $_SESSION['staff_email'];?></span></p>
                <a href="logout.php" class="delete-btn">Logout</a>
                <div>New <a href="login.php">Login</a> | <a href="register.php"> Register</a>
                </div>
            </div>
        </div>
    </header>

<section class="dashboard">
    <h2 class="title">View Reservations</h2>

    <?php if (isset($_GET['message']) && $_GET['message'] == 'deleted'): ?>
        <p class="success-message">Reservation deleted successfully.</p>
    <?php endif; ?>

    <?php
    $sql = "SELECT * FROM `reservations`";
    $result = $conn->query($sql);
    ?>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date & Time</th>
                    <th>Table Size</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['dateTime']); ?></td>
                        <td><?php echo htmlspecialchars($row['tableSize']); ?></td>
                        <td>
                            <a href="staff.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservation?');" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reservations found.</p>
    <?php endif; ?>

    <?php
    // Close the database connection
    $conn->close();
    ?>
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
