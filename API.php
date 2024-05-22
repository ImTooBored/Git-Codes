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
function acc_id($email) {
    global $conn;

    $sql = "SELECT acc_id FROM account WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($acc_id);
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        $stmt->close();
        return $acc_id; // Return the account ID
    } else {
        $stmt->close();
        return false; // Return false if the account does not exist
    }
}

?>
