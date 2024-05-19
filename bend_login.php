<?php
    require_once "API.php";
    require_once "DB connection";
    function clean_input($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = preg_replace('/\b(?:https?|ftp):\/\/\S+/', '', $data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        $email = clean_input($_POST("email"));
        $password = clean_input($_PSOT("password"));

        echo $email,"<br>",$password;

?>