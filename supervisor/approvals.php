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

</body>
</html>

<?php
    require_once 'DB connection.php';
    $sql = "SELECT subject,content,date FROM NOTIFICATION
            WHERE type = 'supervisor'";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo "<br>".$row["subject"].$row["date"]."<br>".$row["content"]."<br>";
    //     }
    // } else {
    //     echo "0 results";
    // }




?>