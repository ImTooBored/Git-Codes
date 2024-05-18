<?php
    require_once 'DB connection.php';
    $sql = "SELECT * FROM NOTIFICATION
            WHERE type = 'supervisor'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<br>".$row["notif_id"]."<br>".$row["subject"]."<br>".$row["type"]."<br>".$row["content"]."<br>".$row["attachment"]."<br>".$row["date"];
        }
    } else {
        echo "0 results";
    }




?>