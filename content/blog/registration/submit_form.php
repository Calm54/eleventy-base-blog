<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    $conn = new mysqli('localhost','root','','ssg_db' );
    if($conn->connect_error){
        die('Connection Failed : ', .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, surname, email, message)
        values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $surname, $email, $message);
        $stmt->execute();
        echo "registration successfull";
        $stmt->close();
        $stmt->close();
    }
    // Process the data as needed (e.g., send an email, store in a database, etc.)
    // For testing purposes, you can simply echo the data.
  //  echo "First Name: " . $firstName . "<br>";
   // echo "Surname: " . $surname . "<br>";
  //  echo "Email: " . $email . "<br>";
   // echo "Message: " . $message . "<br>";
}
?>
