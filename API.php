<?php
require_once("DB connection.php");

function check_email($email) {
    global $conn;

    $sql = "SELECT email FROM application WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function account_exist($email, $password) {
    global $conn;

    $sql = "SELECT email, password 
            FROM account 
            WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST['email'];
//     if (check_email($email)) {
//         echo "The email $email exists in the database.";
//     } else {
//         echo "The email $email does not exist in the database.";
//     }
// }
?>
