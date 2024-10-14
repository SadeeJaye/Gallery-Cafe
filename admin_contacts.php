<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `massages` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style2.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="messages">

   <h1 class="title">messages</h1>

   <div class="box-container">

      <?php
       $select_massages = mysqli_query($conn, "SELECT * FROM `massages`") or die('query failed');
       if(mysqli_num_rows($select_massages) > 0){
          while($fetch_massages = mysqli_fetch_assoc($select_massages))
      ?>
      <div class="box">
         <p>user id : <span><?php echo $fetch_massages['user_id']; ?></span> </p>
         <p>name : <span><?php echo $fetch_massages['name']; ?></span> </p>
         <p>number : <span><?php echo $fetch_massages['number']; ?></span> </p>
         <p>email : <span><?php echo $fetch_massages['email']; ?></span> </p>
         <p>message : <span><?php echo $fetch_massages['message']; ?></span> </p>
         <a href="admin_contacts.php?delete=<?php echo $fetch_massages['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
      </div>
      <?php
         }
      else{
         echo '<p class="empty">you have no messages!</p>';
      }
      ?>
   </div>

</section>













<script src="admin_script.js"></script>

</body>
</html>