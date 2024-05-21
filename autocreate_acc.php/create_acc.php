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
            return $id = intval($matches[0][0])+ 1;
           
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
}else{ // for client
    echo "sulod sa else";
    $test_client = "SELECT frstname,lastname,midinit,contact, email, location, interview_date, type,
                    CASE 
                        WHEN type = 'p_employee' THEN 'E'
                        WHEN type = 'p_client ' THEN 'C'
                    END AS user_type
                    FROM application 
                    WHERE type = 'p_employee' AND result = 'Accept'";
    $id = getLastAccountNumber();
    $id = strval($id);

}


?>