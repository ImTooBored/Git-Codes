<?php
include "DB-connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $middlename = $_POST["middlename"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // File handling
    $imageName = $_FILES["yourfile"]["name"];
    $imageData = file_get_contents($_FILES["yourfile"]["tmp_name"]);
    $imageData = base64_encode($imageData);

    // Insert data into the database
    $sql = "INSERT INTO applicant (applicant_lastname, applicant_midname, applicant_firstname, email, pnum, status, attachment) 
            VALUES ('$lastname', '$middlename', '$firstname', '$email', '$phone', 'pending', '$imageData')";

    // Move the uploaded file to the target directory
    $targetDirectory = "attachment";
    $targetFilePath = $targetDirectory . $imageName;
    if (move_uploaded_file($_FILES["yourfile"]["tmp_name"], "attachment" . $imageName)) {
        session_start();
        $_SESSION['success_message'] = "Application submitted successfully!";
    } else {
        echo "Error uploading file";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the index page
        header("Location: index.php?success=true");
        exit(); // Ensure that no further code is executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

