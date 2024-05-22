<html>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
<?php
session_start();
require_once 'DB connection.php';

if (isset($_SESSION['account_id'])) {
    $accountId = $_SESSION['account_id'];
    echo $accountId;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $req_hire = $_POST['req_hire'];
        $purpose = $_POST['purpose'];
        $starting_date = $_POST['starting_date'];
        $ending_date = $_POST['ending_date'];

        $sql = "INSERT INTO request_form (client_id, req_hire, purpose, starting_date, ending_date) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",  $accountId, $req_hire, $purpose, $starting_date, $ending_date);

        if ($stmt->execute()) {
          echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Successfully submitted',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'notification.php';
                            }
                        });
                    });
                </script>";
            exit(); // Ensure no further code is executed after redirection
        } else {
          echo "<script>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  title: 'Error!',
                  text: 'Unable to submit request',
                  icon: 'error',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'LOGIN.php';
                  }
              });
          });
      </script>";
        }

        $stmt->close();
    }
} else {
    echo "No account ID found in session.";
}

$conn->close();
?>
