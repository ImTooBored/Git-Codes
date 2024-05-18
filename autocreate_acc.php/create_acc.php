<?php
require_once 'DB connection.php';
function getLastAccountNumber() {
    $db_host = '213.171.200.31';
    $db_name = 'calvoK';
    $db_user = 'IScalvoK';
    $db_pass = '20Ca7^o23';

    // Create a MySQLi database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT acc_id
            FROM account
            ORDER BY acc_id DESC
            LIMIT 1";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            preg_match_all('!\d+!', $row["acc_id"], $matches);
            return $id = intval($matches[0][0])+ 1; // Convert the first matched number to an integer
        }
    } else {
        return null;
    }
}


$sql = "SELECT comp_name, contact, email, location, application_date
        FROM application
        WHERE result = 'Accept'
        AND type = 'p_client'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>comp_name</th>
                <th>email</th>
                <th>location</th>
                <th>application date</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["comp_name"]."</td>
                <td>".$row["contact"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["location"]."</td>
                <td>".$row["application_date"]."</td>
                </tr>";
    }
    echo "</table> <br>";
}
// $row = $result->fetch_assoc();
// if ($row["type"] == 'p_client' && $row["result"] == 'Accept'){
echo getLastAccountNumber();

$test = "SELECT a.email
        FROM application a, account acc
        WHERE a.email = acc.email";
$result = $conn->query($test);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "naay sulod";
    }
}else{
    echo "sulod sa else";
    $test = "SELECT * FROM application WHERE type = 'p_client' AND result = 'Accept'";
    $result = $conn->query($test);
    if ($result && $result->num_rows > 0) {
        // Fetch email from the first row
        $row = $result->fetch_assoc();
        $email = $row['email'];    
        $id = getLastAccountNumber();
        $add_acc = "INSERT INTO account (acc_id, email, password) 
                    VALUES (:id, :email, :password)";
        $stmt = $conn->prepare($sql);
        $id = getLastAccountNumber(); // Replace with your acc_id value
        $email = $email; // Replace with your email value
        $password = "samplepassword1";
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    }
}


?>