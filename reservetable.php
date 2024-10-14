<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dateTime = $_POST['dateTime'];
    $tableSize = $_POST['tableSize'];

    $sql = "INSERT INTO reservations (name, email, phone, dateTime, tableSize) VALUES ('$name', '$email', '$phone', '$dateTime', '$tableSize')";

    if ($conn->query($sql) === TRUE) {
        header("Location: reservation.php?message=success");
    } else {
        header("Location: reservation.php?message=error");
    }

    $conn->close();
}
?>