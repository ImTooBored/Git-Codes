<?php
    require_once "API.php";
    require_once "DB connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        echo $email,"<br>",$password;
    }
?>