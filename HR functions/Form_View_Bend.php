<?php
// Start output buffering
ob_start();

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once 'DB connection.php';
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $req_id = $_POST['req_id'];
    $status = $_POST['status'];

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("UPDATE request_form SET status=? WHERE req_id=?");
    $stmt->bind_param("si", $status, $req_id);

    if ($stmt->execute() === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DASHBOARD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        rel="stylesheet">
</head>
<body class="container-fluid min-vw-100 p-0" style="background-color: #11113a; overflow-x:hidden;">
<style>
    .custom-modal-background {
        background-color: #1C1C39;
        color: white;
    }
</style>
<header class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mx-auto align-items-center">
        <li class="nav-item text-white">
            <p class="fs-1"style="margin-left:100px">DASHBOARD</p>
        </li>
    </ul>
    <div class="ml-auto">
        <img src="../photos/Company_logo.png" alt="logo" class="img-fluid" style="max-height: 80px;">
    </div>
</header>

<main class="container-fluid min-vw-100 p-0 row" style="overflow-x: hidden;">
    <div class="row">
        <div class="col-lg-3 mt-3">
            <?php include('Sidebar.php'); ?>
        </div>
        <div class="col-lg-9 mt-3">
            <div class="card">
                <div class="card-body" style="max-height: 60vh;">
                    <form method="GET" action="">
                        <div class="row mb-3">
                            <div class="col-sm-6 col-md-3">
                                <select class="form-select bg-transparent border border-black text-black" id="status" name="status" required>
                                    <option value="pending" <?php echo (isset($_GET['status']) && $_GET['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="accept" <?php echo (isset($_GET['status']) && $_GET['status'] == 'accept') ? 'selected' : ''; ?>>Accepted</option>
                                    <option value="reject" <?php echo (isset($_GET['status']) && $_GET['status'] == 'reject') ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center" style="max-height: 45vh;">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered table-striped text-center overflow-auto">
                            <thead>
                                <tr>
                                    <th scope='col'>Company Name</th>
                                    <th scope='col'>Company Representative</th>
                                    <th scope='col'>Contact Number</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Purpose</th>
                                    <th scope='col'>Starting Date</th>
                                    <th scope='col'>Ending Date</th>
                                    <?php if ($status == 'pending'): ?>
                                        <th scope='col'>Actions</th>
                                    <?php else: ?>
                                        <th scope='col'>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>

                                <tbody>
                                    <?php
                                    require_once 'DB connection.php';

                                    $status = isset($_GET['status']) ? $_GET['status'] : ''; // Variable for status filter

                                    // SQL query construction
                                    $stmt = $conn->prepare("SELECT c.Comp_Name, c.com_rep, c.Contact_Num, c.Email, r.purpose, r.starting_date, r.ending_date, r.req_id
                                                            FROM CLIENT c
                                                            JOIN request_form r ON c.acc_id = r.client_id
                                                            WHERE r.status = ?");
                                    $stmt->bind_param("s", $status);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["Comp_Name"] . "</td>";
                                            echo "<td>" . $row["com_rep"] . "</td>";
                                            echo "<td>" . $row["Contact_Num"] . "</td>";
                                            echo "<td>" . $row["Email"] . "</td>";
                                            echo "<td>" . $row["purpose"] . "</td>";
                                            echo "<td>" . $row["starting_date"] . "</td>";
                                            echo "<td>" . $row["ending_date"] . "</td>";

                                            if ($status == 'pending') {
                                                echo "<td>
                                                        <form method='POST' action=''>
                                                            <button type='submit' name='status' value='accept' class='btn btn-success'>Accept</button>
                                                            <button type='submit' name='status' value='reject' class='btn btn-danger'>Reject</button>
                                                            <input type='hidden' name='req_id' value='" . $row['req_id'] . "'>
                                                        </form>
                                                      </td>";
                                            }
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8' class='p-3'>No records found</td></tr>";
                                    }

                                    $stmt->close();
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
// Flush the output buffer
ob_end_flush();
?>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>
</html>
