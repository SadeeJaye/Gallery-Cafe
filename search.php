<?php

@include 'config.php';

if(isset($_POST['search'])){

    $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);
    $query = "SELECT * FROM products WHERE name LIKE '%$search_query%'";
    $result = mysqli_query($conn, $query) or die('Query failed');

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="box">';
            echo '<div class="price">Rs' . $row['price'] . '/-</div>';
            echo '<div class="images"><img src="uploaded_img/' . $row['images'] . '" alt="" class="images"></div>';
            echo '<div class="name">' . $row['name'] . '</div>';
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
            echo '<input type="hidden" name="product_name" value="' . $row['name'] . '">';
            echo '<input type="hidden" name="product_price" value="' . $row['price'] . '">';
            echo '<input type="hidden" name="product_images" value="' . $row['images'] . '">';
            echo '<input type="hidden" name="product_quantity" value="1">';
            echo '<input type="submit" value="Add to Cart" name="add_to_cart" class="btn add-to-cart-btn">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p class="empty">No results found for "' . $search_query . '"</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    
</body>
</html>