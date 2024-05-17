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
                                    <div class="col-sm-6 col-md-3">
                                            <select class="form-select bg-transparent border border-black text-black" id="" name="" required>
                                                <option value="Potential Client">Potential client</option>
                                                <option value="Potential Employee">Potential employee</option>
                                                <option value="Potential Employee">General Cleaning</option>
                                            </select>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <select class="form-select bg-transparent border border-black text-black" id="" name="" required>
                                            <option value="Pending">Pending</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center" style="max-height: 45vh;">
                                    <div class="table-responsive w-80">
                                        <table class="table table-bordered table-striped text-center overflow-auto ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Applicant no.</th>
                                                    <th scope="col">Company Name</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Location</th>
                                                    <th scope="col">Attachment</th>
                                                    <th scope="col">Application Date</th>
                                                    <th scope="col">To Hire</th>
                                                    <th scope="col">Number to Hire</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                            echo "<td><a href='view.file.php?id=" . $row["attachment"] . "' class='btn btn-primary btn-sm'>View Attachment</a></td>";
                                                            // echo '<img style="max-width: 700px; max-height: 700px;" src="data:image/jpeg;base64,' . $row['attachment'] . '" alt="Image">';
                                                            echo "<td>" . $row["application_date"] . "</td>";
                                                            echo "<td>" . $row["to_hire"] . "</td>";
                                                            echo "<td>" . $row["num_hire"] . "</td>";
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
                                            </tbody>
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
