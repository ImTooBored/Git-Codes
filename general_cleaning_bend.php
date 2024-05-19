<!DOCTYPE html>
<html>
<head>
  <title>Output</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: black;
      color: white;
      font-family: Consolas, Courier New, monospace;
    }
  </style>
</head>
<body> 
<?php
require_once 'DB connection.php';

function clean_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/\b(?:https?|ftp):\/\/\S+/', '', $data);
    return $data;
}

$submissionSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: output POST data
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    // Clean the input data
    $firstName = clean_input($_POST["firstName"]);
    $location = clean_input($_POST["location"]);
    $email = clean_input($_POST["email"]);
    $contact = clean_input($_POST["contact"]);
    $date = date('Y-m-d');
    $result = "Pending";

    // Prepare and execute SQL statement to insert file data into the database
    $stmt = $conn->prepare("INSERT INTO application (frstname, contact, email, location, application_date, type, result)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $type = "general_cleaning";
        $stmt->bind_param("sssssss", $firstName, $contact, $email, $location, $date, $type, $result);

        if ($stmt->execute()) {
            $submissionSuccess = true;
        } else {
            echo "<p>Error: Unable to insert data. " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Error: Unable to prepare statement. " . $conn->error . "</p>";
    }
}
?>

<?php if ($submissionSuccess): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Application submitted successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'HOMEPAGE.php';
                }
            });
        });
    </script>
<?php endif; ?>

</body>
</html>