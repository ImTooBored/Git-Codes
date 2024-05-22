<?php
// Start output buffering
ob_start();

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once 'DB connection.php';
$result="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $applicantId = $_POST['applicant_id'];
    $result = $_POST['result'];

    // Update the database
    $sql = "UPDATE application SET result='$result' WHERE applicant_id='$applicantId'";

    if ($conn->query($sql) === TRUE) {
        echo "Result updated successfully";
    } else {
        echo "Error updating Result: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['interview_date']) && isset($_POST['applicant_id'])) {
    // Get form data
    $applicant_id = $_POST['applicant_id'];
    $interview_date = $_POST['interview_date'];

    // Prepare and bind
    $sql = "UPDATE application SET interview_date = ?, result = 'Pending' WHERE applicant_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $interview_date, $applicant_id);

        if ($stmt->execute()) {
            // Redirect back to the main page or display a success message
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HR DASHBOARD</title>
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
<header class="navbar navbar-expand-lg ">
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
            <?php include('Sidebar.php') ?>
        </div>
        <div class="col-lg-9 mt-3">
            <div class="card">
                <div class="card-body" style="max-height: 60vh;">
                    <form method="GET" action="">
                        <div class="row mb-3">
                            <div class="col-sm-6 col-md-3">
                                <select class="form-select bg-transparent border border-black text-black" id="type" name="type" required>
                                    <option value="p_client" <?php echo (isset($_GET['type']) && $_GET['type'] == 'p_client') ? 'selected' : ''; ?>>Potential Client</option>
                                    <option value="p_employee" <?php echo (isset($_GET['type']) && $_GET['type'] == 'p_employee') ? 'selected' : ''; ?>>Potential Employee</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <select class="form-select bg-transparent border border-black text-black" id="result" name="result" required>
                                    <option value="Pending" <?php echo (isset($_GET['result']) && $_GET['result'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="For Interview" <?php echo (isset($_GET['result']) && $_GET['result'] == 'For Interview') ? 'selected' : ''; ?>>For Interview</option>
                                    <option value="Accept" <?php echo (isset($_GET['result']) && $_GET['result'] == 'Accept') ? 'selected' : ''; ?>>Accepted</option>
                                    <option value="Reject" <?php echo (isset($_GET['result']) && $_GET['result'] == 'Reject') ? 'selected' : ''; ?>>Rejected</option>
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
                                <?php
                                require_once 'DB connection.php';

                                $type = isset($_GET['type']) ? $_GET['type'] : ''; // Variable for type filter
                                $result = isset($_GET['result']) ? $_GET['result'] : ''; // Variable for result filter

                                // SQL query construction
                                $sql = "SELECT * FROM application WHERE type = '$type'";

                                if ($result == 'For Interview') {
                                    $sql .= " AND result = 'Pending' AND interview_date IS NOT NULL";
                                } elseif (!empty($result)) {
                                    $sql .= " AND result = '$result' AND (interview_date IS NULL OR result != 'Pending')";
                                }

                                echo "<thead>";
                                if ($type == 'p_client') {
                                    echo "<tr>
                                            <th scope='col'>Applicant no.</th>
                                            <th scope='col'>Company Name</th>
                                            <th scope='col'>Contact Number</th>
                                            <th scope='col'>Email</th>
                                            <th scope='col'>Location</th>
                                            <th scope='col'>Application Date</th>
                                            <th scope='col'>Position</th>
                                            <th scope='col'>Hiring Count</th>";
                                    if ($result != 'Accept' && $result != 'Reject') {
                                        echo "<th scope='col'>Set Interview Date</th>
                                              <th scope='col'>Status</th>";
                                    }
                                    echo "</tr>";
                                } elseif ($type == 'p_employee') {
                                    echo "<tr>
                                            <th scope='col'>Applicant no.</th>
                                            <th scope='col'>First Name</th>
                                            <th scope='col'>Middle Name</th>
                                            <th scope='col'>Last Name</th>";
                                    if ($result != 'Accept' && $result != 'Reject') {
                                        echo "<th scope='col'>Set Interview Date</th>
                                              <th scope='col'>Status</th>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</thead>";
                                echo "<tbody>";

                                if ($conn) {
                                    $query_result = $conn->query($sql);

                                    if ($query_result && $query_result->num_rows > 0) {
                                        while ($row = $query_result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["applicant_id"] . "</td>";
                                            if ($type == 'p_client') {
                                                echo "<td>" . $row["comp_name"] . "</td>";
                                                echo "<td>" . $row["contact"] . "</td>";
                                                echo "<td>" . $row["email"] . "</td>";
                                                echo "<td>" . $row["location"] . "</td>";
                                                echo "<td>" . $row["application_date"] . "</td>";
                                                echo "<td>" . $row["to_hire"] . "</td>";
                                                echo "<td>" . $row["num_hire"] . "</td>";
                                            } elseif ($type == 'p_employee') {
                                                echo "<td>" . $row["frstname"] . "</td>";
                                                echo "<td>" . $row["midinit"] . "</td>";
                                                echo "<td>" . $row["lastname"] . "</td>";
                                            }
                                            if ($result != 'Accept' && $result != 'Reject') {
                                                if (!empty($row["interview_date"])) {
                                                    echo "<td>" . $row["interview_date"] . "</td>";
                                                } else {
                                                    echo "<td>
                                                            <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#interviewModal" . $row["applicant_id"] . "'>
                                                                <i class='bi bi-calendar'></i>
                                                            </button>
                                                            <div class='modal fade' id='interviewModal" . $row["applicant_id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-fixed'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLabel'>Set Interview Date</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <form method='POST' action='DASHBOARD.php'>
                                                                                <div class='mb-3'>
                                                                                    <label for='interviewDate' class='form-label'>Interview Date</label>
                                                                                    <input type='date' class='form-control' id='interviewDate' name='interview_date' required>
                                                                                    <input type='hidden' name='applicant_id' value='" . $row["applicant_id"] . "'>
                                                                                </div>
                                                                                <button type='submit' class='btn btn-primary'>Save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>";
                                                }
                                                echo "<td>
                                                        <button type='button' class='btn btn-secondary btn-sm' data-bs-toggle='modal' data-bs-target='#attachmentModal" . $row["applicant_id"] . "'>Update</button>
                                                      </td>";
                                            }
                                            echo "</tr>";

                                            // Attachment Modal
                                            echo "<div class='modal fade' id='attachmentModal" . $row["applicant_id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-fixed'>
                                                    <div class='modal-content custom-modal-background'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLabel'>Applicant Attachment</h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <div class='row'>
                                                                <div class='col-md-12'>
                                                                    <img src='./attachments/" . $row["attachment"] . "' alt='Attachment' class='img-fluid'>
                                                                </div>
                                                            </div>
                                                            <div class='row mt-3'>
                                                                <div class='col-md-12'>
                                                                    <p>Attachment:</p>
                                                                    <p>Description or additional information about the attachment can be displayed here.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form method='POST' action='DASHBOARD.php'> 
                                                            <div class='modal-footer d-flex justify-content-between'>
                                                                <button type='submit' name='result' value='Accept' class='btn btn-success'>Accept</button>
                                                                <button type='submit' name='result' value='Reject' class='btn btn-danger'>Reject</button>
                                                                <!-- Include a hidden input field for applicant_id -->
                                                                <input type='hidden' name='applicant_id' value='" . $row['applicant_id'] . "'>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='9' class='p-3'>No results found</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='9' class='p-3'>Database connection failed</td></tr>";
                                }

                                if ($conn) {
                                    $conn->close();
                                }
                                echo "</tbody>";
                                ?>
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
