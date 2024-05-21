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
                            <img src="./photos/Company_logo.png" alt="logo" class="img-fluid" style="max-height: 80px;">
                        </div>
        </header>

        <main class="container-fluid  min-vw-100 p-0 row" style="overflow-x: hidden;">
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
                                        <option value="reject" <?php echo (isset($_GET['result']) && $_GET['result'] == 'accept') ? 'selected' : ''; ?>>Accepted</option>
                                        <option value="accept" <?php echo (isset($_GET['result']) && $_GET['result'] == 'reject') ? 'selected' : ''; ?>>Rejected</option>
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

                                        $type = isset($_GET['type']) ? $_GET['type'] : ''; // Variable for type filter
                                        $result = isset($_GET['result']) ? $_GET['result'] : ''; // Variable for result filter
                                        // echo ;
                                        // SQL query construction
                                        $sql = "SELECT c.Comp_Name, c.com_rep, c.Contact_Num, c.location
                                                FROM APPROVALS a
                                                JOIN CLIENT c ON c.acc_id = a.comp_id
                                                WHERE a.status = '$type'";

                                        // if (!empty($result)) {
                                        //     $sql = " AND a.status = '$type'";
                                        // }
                                        echo "<thead>";
                                        if ($type == 'pending') {
                                            echo "<tr>
                                                    <th scope='col'>Company</th>
                                                    <th scope='col'>Company Representative</th>
                                                    <th scope='col'>Contact Details</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Location</th>
                                                    <th scope='col'>Action</th>
                                                </tr>";
                                        } elseif ($type == 'accept') {
                                            echo "<tr>
                                                    <th scope='col'>Company</th>
                                                    <th scope='col'>Company Representative</th>
                                                    <th scope='col'>Contact Details</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Location</th>
                                                    <th scope='col'>Action</th>
                                                </tr>";
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
                                                        echo "<td>" . $row["c.Comp_Name"] . "</td>";
                                                        echo "<td>" . $row["c.Contact_Num"] . "</td>";
                                                        echo "<td>" . $row["c.Email"] . "</td>";
                                                        echo "<td>" . $row["c.Location"] . "</td>";
                                                        echo "<td>
                                                                    <div class='d-flex justify-content-between'>
                                                                        <a href='#" . $row['application_date'] . "'>
                                                                            <button type='button' class='btn btn-danger me-3 btn-sm'>update</button>
                                                                        </a>
                                                                    </div>
                                                              </td>";
                                                    } elseif ($type == 'p_employee') {
                                                        echo "<td>" . $row["frstname"] . "</td>";
                                                        echo "<td>" . $row["midinit"] . "</td>";
                                                        echo "<td>" . $row["lastname"] . "</td>";
                                                        echo "<td>" . $row["email"] . "</td>";
                                                        echo "<td>" . $row["contact"] . "</td>";
                                                        echo "<td><a href='view.file.php?id=" . $row["attachment"] . "' class='btn btn-primary btn-sm'>View Attachment</a></td>";
                                                        echo "<td>" . $row["application_date"] . "</td>";
                                                    }
                                                    echo "</tr>";
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

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    </body>
</html> 
