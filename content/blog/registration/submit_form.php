<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    $servername = "localhost";
    $username = "blog_user"; // Change this if your MySQL username is different
    $password = "madcowboy92";     // Change this if your MySQL password is set
    $dbname = "ssg_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["firstName"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $message = $_POST["message"];
    
        // SQL query to insert data into the table
        $sql = "INSERT INTO register (first_name, surname, email, message)
                VALUES ('$firstName', '$surname', '$email', '$message')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
    
}
?>
