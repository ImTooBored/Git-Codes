<?php
require_once 'DB connection.php';
require_once 'API.php';

function clean_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/\b(?:https?|ftp):\/\/\S+/', '', $data);
    return $data;
}

$submissionSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean the input data
    $firstName = clean_input($_POST["firstName"]);
    $middleName = clean_input($_POST["middleName"]);
    $lastName = clean_input($_POST["lastName"]);
    $email= clean_input($_POST["email"]);
    $contact = clean_input($_POST["contactNumber"]);
    $date = date('Y-m-d');
    $imageName = $_FILES["file_submission"]["name"];
    $imageData = file_get_contents($_FILES["file_submission"]["tmp_name"]);
    $imageData = base64_encode($imageData);
    $result = "Pending";
    // Prepare and execute SQL statement to insert file data  into the database

    $email_test = check_email($email);
    if ($email_test){
        $submissionSuccess = false;
        ?>
        <?php if ($submissionSuccess == false): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Email already exists',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'HOMEPAGE.php';
                        }
                    });
                });
            </script>
            <?php endif;?>
<?php
    }else{
    $stmt = $conn->prepare("INSERT INTO application (frstname,lastname,midinit, contact, email, location, attachment, application_date, type, result)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $type = "p_employee";
        $stmt->bind_param("ssssssssss", $firstName,$lastName,$middleName, $contact, $email, $location, $imageData, $date, $type, $result);

        if ($stmt->execute()) {
            $submissionSuccess = true;
        } else {
            // echo "<p>Error: Unable to insert data. " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        // echo "<p>Error: Unable to prepare statement. " . $conn->error . "</p>";
    }   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>
<body>
    <!-- Your form goes here -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php if ($submissionSuccess == true): ?>
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
