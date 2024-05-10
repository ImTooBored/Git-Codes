<?php
include "DB-connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["Phonenum"];
    $inquiry = $_POST["inquiry"];

    $sql = "INSERT INTO inquiries (name, email, phone_number, message, status) VALUES ('$name', '$email', '$phone', '$inquiry', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the index page with a success parameter
        header("Location: index.php?inquiry_success=true");
        exit(); // Ensure that no further code is executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>