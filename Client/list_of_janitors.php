<!DOCTYPE html>
<html lang="en">
<head>
    <title>Client Dashboard</title>
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
                            <p class="fs-1"style="margin-left:100px">List of Janitors</p>
                        </li>
                    </ul>
                        <div class="ml-auto">
                            <img src="../photos/Company_logo.png" alt="logo" class="img-fluid" style="max-height: 80px;">
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
                                                            <th scope="col">Employee No.</th>
                                                            <th scope="col">First Name</th>
                                                            <th scope="col">Middle Name</th>
                                                            <th scope="col">Last Name</th>
                                                            <th scope="col">Contact Number</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Rate</th>
                                                            <th scope="col">Actions</th>

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
                                                                    echo "<td>" . $row["applicant_id"] . "</td>";  // employee no
                                                                    echo "<td>" . $row["comp_name"] . "</td>";     // first name
                                                                    echo "<td>" . $row["contact"] . "</td>";        // Middle name
                                                                    echo "<td>" . $row["email"] . "</td>";          // Last Name
                                                                    echo "<td>" . $row["location"] . "</td>";       // Contact Number
                                                                    echo "<td>" . $row["applicant_id"] . "</td>";       // Email
                                                                    echo "<td>" . $row["applicant_id"] . "</td>";       // Rate
                                                                    echo "<td><button type='button' class='btn btn-Warning btn-sm' data-toggle='modal' data-target='#letterofcomplaint'>Letter of Complaint</button></td>"; // Actions
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

    <!-- Letter of complaint modal-->
        <div class="modal fade" id="letterofcomplaint" tabindex="-1" aria-labelledby="letterofcomplaintLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Letter of Complaint</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="" enctype="">
                            <div class="mb-2">
                                <label for="Subject" class="form-label">Subject</label>
                                <input type="text" class="form-control bg-transparent border border-white text-white" id="Subject" required>
                            </div>
                            <div class="mb-5">
                                <label for="Content" class="form-label">Content</label>
                                <textarea name="message" class="form-control bg-transparent border border-white text-white" id="Content" placeholder="Write Your Complaint Here..." style="height:170px" required></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="file" class="form-label">Can also submit a letter here:</label>
                                <input type="file" class="form-control bg-transparent border border-white text-white"  id="file" name="file_submission" required>
                            </div>
                        </form>
                    
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Send</button>
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
