<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee List</title>
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
        <header class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav mx-auto align-items-center">
                        <li class="nav-item text-white">
                            <p class="fs-1"style="margin-left:100px">Company List</p>
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
                                    <div class="row mb-3">
                                        <div class="d-flex justify-content-center" style="max-height: 45vh;">
                                            <div class="table-responsive w-80">
                                                <table class="table table-bordered table-striped text-center overflow-auto ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Company</th>
                                                            <th scope="col">Company Representative</th>
                                                            <th scope="col">Contact Details</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Location</th>
                                                            <th scope="col">list of Employee</th>

                                                        </tr>
                                                    </thead>
                                                    <!-- <tbody>
                                                        <?php
                                                        require_once 'DB connection.php';

                                                        if ($conn) {
                                                            $sql = "SELECT applicant_id, comp_name, contact, email, location, attachment, application_date, to_hire, num_hire 
                                                                    FROM application
                                                                    WHERE type = 'p_client'";

                                                            $result = $conn->query($sql);

                                                            if ($result && $result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<tr>";
                                                                    echo "<td>" . $row["applicant_id"] . "</td>";
                                                                    echo "<td>" . $row["comp_name"] . "</td>";
                                                                    echo "<td>" . $row["contact"] . "</td>";
                                                                    echo "<td>" . $row["email"] . "</td>";
                                                                    echo "<td>" . $row["location"] . "</td>";
                                                                    echo "<td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#listofemployee'>List of Employees</button></td>";
                                                                    echo "</tr>";
                                                                }
                                                            } else {
                                                                echo "<tr><td colspan='6' class='p-3'>No results found</td></tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='6' class='p-3'>Database connection failed</td></tr>";
                                                        }

                                                        if ($conn) {
                                                            $conn->close();
                                                        }
                                                        ?>
                                                    </tbody> -->
                                                </table>
                                            </div>
                                        </div>
                                    </div>                    
                            </div>
                        </div>
                    </div>
                </div>
    </main>

    <!-- modal for showing employees -->
    <div class="modalfade" id="listofemployee" tabindex="-1" aria-labelledby="listofemployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center mt-5">
                                <div class="col-md-6 " style="width: 30rem; ">
                                    <div class="card text-center bg-dark text-white p-5">
                                        <!-- Inserting the icon using an img tag -->
                                        <div class="card-body">

                                            <!-- <p class="card-text">php gamiton ani anteh for retrieving data</p> -->
                                            
                                            <a href="HOMEPAGE.php" class="btn btn-primary">Apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
