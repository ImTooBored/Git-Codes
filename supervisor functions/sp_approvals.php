<!DOCTYPE html>
<html lang="en">
<head>
    <title>Supervisor Approvals</title>
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
    <body class="container-fluid min-vw-100 p-0" style="background-color: #11113a; overflow-x:hidden;">
        <header class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav mx-auto align-items-center">
                        <li class="nav-item text-white">
                            <p class="fs-1"style="margin-left:100px">Approvals</p>
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
                            <div class="col-sm-6 col-md-3 align-items-center">
                                <div class="fs-5">General Cleaning</div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <select class="form-select bg-transparent border border-black text-black" id="result" name="result" required>
                                    <option value="pending" <?php echo (isset($_GET['result']) && $_GET['result'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="accept" <?php echo (isset($_GET['result']) && $_GET['result'] == 'accept') ? 'selected' : ''; ?>>Accepted</option>
                                    <option value="reject" <?php echo (isset($_GET['result']) && $_GET['result'] == 'reject') ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center" style="max-height: 45vh;">
                        <div class="table-responsive w-80">
                            <table class="table table-bordered table-striped text-center overflow-auto">
                                <?php
                                require_once 'DB connection.php';

                                // Check if accept or reject button was clicked and update the database
                                if (isset($_POST['update_result'])) {
                                    $applicant_id = $_POST['applicant_id'];
                                    $new_result = $_POST['new_result'];

                                    $update_sql = "UPDATE application SET result = '$new_result' WHERE applicant_id = '$applicant_id'";
                                    if ($conn->query($update_sql) === TRUE) {
                                        echo "<div class='alert alert-success'>Record updated successfully</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error updating record: " . $conn->error . "</div>";
                                    }
                                }

                                $result = isset($_GET['result']) ? $_GET['result'] : ''; // Variable for result filter

                                // SQL query construction
                                $sql = "SELECT * FROM application WHERE type = 'general_cleaning' AND result = '$result'";

                                echo "<thead>";
                                echo "<tr>
                                        <th scope='col'>First Name</th>
                                        <th scope='col'>Last Name</th>
                                        <th scope='col'>Middle Initial</th>
                                        <th scope='col'>Contact Number</th>
                                        <th scope='col'>Email Address</th>
                                        <th scope='col'>Location</th>
                                        <th scope='col'>Application Date</th>
                                        <th scope='col'>Action</th>
                                    </tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                if ($conn) {
                                    $query_result = $conn->query($sql);

                                    if ($query_result && $query_result->num_rows > 0) {
                                        while ($row = $query_result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["frstname"] . "</td>";
                                            echo "<td>" . $row["lastname"] . "</td>";
                                            echo "<td>" . $row["midinit"] . "</td>";
                                            echo "<td>" . $row["contact"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["location"] . "</td>";
                                            echo "<td>" . $row["application_date"] . "</td>";
                                            echo "<td>
                                                    <div class='d-flex justify-content-between'>
                                                        <form method='POST' action=''>
                                                            <input type='hidden' name='applicant_id' value='" . $row['applicant_id'] . "'>
                                                            <input type='hidden' name='new_result' value='accept'>
                                                            <button type='submit' name='update_result' class='btn btn-success me-3 btn-sm'>Accept</button>
                                                        </form>
                                                        <form method='POST' action=''>
                                                            <input type='hidden' name='applicant_id' value='" . $row['applicant_id'] . "'>
                                                            <input type='hidden' name='new_result' value='reject'>
                                                            <button type='submit' name='update_result' class='btn btn-danger me-3 btn-sm'>Reject</button>
                                                        </form>
                                                    </div>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8' class='p-3'>No results found</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='p-3'>Database connection failed</td></tr>";
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






        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    </body>
</html> 
