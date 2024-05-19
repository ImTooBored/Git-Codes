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
    // Clean the input data
    $company_name = clean_input($_POST["company_name"]);
    $location = clean_input($_POST["location"]);
    $email = clean_input($_POST["email"]);
    $contact = clean_input($_POST["contact"]);
    $position = clean_input($_POST["request_to_hire"]);
    $num_personnel = clean_input($_POST["num_personnel"]);
    $date = date('Y-m-d');
    $imageName = $_FILES["file_submission"]["name"];
    $imageData = file_get_contents($_FILES["file_submission"]["tmp_name"]);
    $imageData = base64_encode($imageData);
    $to_hire = clean_input($_POST["request_to_hire"]);
    $manpower = clean_input($_POST["num_personnel"]);
    $result = "Pending";

    // Debugging output to check the value of $status
    // echo "Status: " . $status; // Check what value is being assigned to $status

    // Prepare and execute SQL statement to insert file data into the database
    $stmt = $conn->prepare("INSERT INTO application (comp_name, contact, email, location, attachment, application_date, type, result, to_hire, num_hire)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $type = "p_client";
        $stmt->bind_param("ssssssssss", $company_name, $contact, $email, $location, $imageData, $date, $type, $result, $to_hire, $manpower);

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