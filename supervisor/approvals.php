<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification and Approvals</title>
</head>
<body>

<div class="button-container">
    <a href="notification.php" class="button">Notification</a> <br>
    <a href="approvals.php" class="button">Approvals</a>
</div>

<?php
require_once 'DB connection.php';

$sql = "SELECT subject, content, date_time 
        FROM APPROVALS
        WHERE status = 'pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Subject</th>
                <th>Content</th>
                <th>Date and Time</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["subject"]."</td>
                <td>".$row["content"]."</td>
                <td>".$row["date_time"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
