<?php
require_once("DB connection.php");

function check_email($email) {
    // Get the global database connection
    global $conn;

    // Prepare the SQL query to select the email from the database
    $sql = "SELECT email FROM application WHERE email = ?";
    $stmt = $conn->prepare($sql);

    // Bind the email parameter to the SQL query
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Check if any row exists
    if ($stmt->num_rows > 0) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

// Example usage
$email = 'example@example.com';
if (check_email($email)) {
    echo "The email $email exists in the database.";
} else {
    echo "The email $email does not exist in the database.";
}
?>
