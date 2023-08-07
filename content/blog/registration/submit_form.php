<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Process the data as needed (e.g., send an email, store in a database, etc.)
    // For testing purposes, you can simply echo the data.
    echo "First Name: " . $firstName . "<br>";
    echo "Surname: " . $surname . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Message: " . $message . "<br>";
}
?>
