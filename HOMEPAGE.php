<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php include('heads/Header.php')?>
    </header>

    <main class="bg-image row"> <!-- #bg-image style is available only in header.php -->
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-7 col-sm-12 custom-left-margin text-white">
                    <h1 class="display-4">WE ARE</h1>
                    <h1 class="display-3">HIRING</h1>
                    <h1 class="display-4">JANITORS AND MESSENGERS</h1>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-lg-7 col-sm-12 custom-left-margin text-white mt-5 align-items-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applicationModal">GET HIRED</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientsModal">HIRE PERSONNEL</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Application Modal -->
    <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="applicationModalLabel" style="color: #d4b0b5;">APPLICATION FORM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> 
                <div class="modal-body">
                    <!-- Application Form -->
                    <form action="p_employee_bend.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="firstName" name="firstName" required>
                        </div>
                        <div class="mb-2">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="middleName" name="middleName">
                        </div>
                        <div class="mb-2">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="lastName" name="lastName" required>
                        </div>
                        <div class="mb-2">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="lastName" name="lastName" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control bg-transparent border border-white text-white" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="contactNumber" name="contactNumber" required>
                        </div>
                        <div class="mb-2">
                            <label for="file" class="form-label">Upload File</label>
                            <input type="file" class="form-control bg-transparent border border-white text-white" id="file" name="file_submission" required>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- Button to submit form -->
                    <button type="submit" class="btn btn-primary">GET HIRED</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Application Submitted Modal -->
    <div class="modal" id="applicationHiredModal" tabindex="-1" aria-labelledby="applicationHiredModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6 " style="width: 30rem;">
                                <div class="card text-center bg-dark text-white p-5">
                                    <!-- Inserting the icon using an img tag -->
                                    <div class="card-body">
                                        <img src="./photos/check.png" alt="Check Mark Icon" height="100px" width="100px">
                                        <h5 class="card-title">Application Submitted</h5>
                                        <p class="card-text">Wait for notification in Email/Phone</p>
                                        <a href="HOMEPAGE.php" class="btn btn-primary">HOME</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CLIENTS REQUEST FORM -->
    <div class="modal fade" id="clientsModal" tabindex="-1" aria-labelledby="ClientsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="ClientsModalLabel" style="color: #d4b0b5;">CLIENT'S REQUEST FORM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-7 col-sm-12 custom-top-margin text-white align-items-right">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newClientsModal">New Clients Form</button>
                            </div>
                            <div class="col-lg-7 col-sm-12 custom-top-margin text-white mt-5 align-items-right">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#generalModal">General Cleaning Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div> 
    </div>

    <!-- New Client's Modal -->
    <div class="modal fade" id="newClientsModal" tabindex="-1" aria-labelledby="NewClientsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewClientsModalLabel" style="color: #d4b0b5;">NEW CLIENT'S REQUEST FORM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- New Client's Request Form -->
                    <form action="uploadtoDB.php" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="company_name" name="company_name" required>
                        </div>
                        <div class="mb-2">
                            <label for="location" class="form-label">Company Location</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="location" name="location">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control bg-transparent border border-white text-white" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control bg-transparent border border-white text-white" id="contact_number" name="contact_number" required>
                        </div>
                        <div class="mb-2">
                            <label for="file" class="form-label">Upload File</label>
                            <input type="file" class="form-control bg-transparent border border-white text-white" id="file" name="file_submission" required>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- Button to submit form -->
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- GENERAL CLEANING FORM -->
            <div class="modal fade" id="generalModal" tabindex="-1" aria-labelledby="generalModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="GeneralModal" style="color: #d4b0b5;">CLIENT'S REQUEST FORM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Client's Request Form -->
                            <form method="POST" action="general_cleaning_bend.php" enctype="multipart/form-data">
                                <!-- Name Fields -->
                                <div class="mb-2">
                                    <label class="form-label">Company Representative Name</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control bg-transparent border border-white text-white" id="frstname" name="frstname" placeholder="First Name" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control bg-transparent border border-white text-white" id="midinit" name="midinit" placeholder="Middle Initial">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control bg-transparent border border-white text-white" id="lastname" name="lastname" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control bg-transparent border border-white text-white" id="location" name="location" placeholder="Location" required>
                                </div>
                                <div class="mb-2">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control bg-transparent border border-white text-white" id="contact" name="contact" placeholder="Contact Number" required>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control bg-transparent border border-white text-white" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBgAXJpGHW8sxY7zA3RoGa9A5eYPm1Eqpy6znK36uW8vN8pK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-pH8f+ZBU8B+dOOYdJq2dCRJ6+LMcsGfm5F8j3Ga1NsT6D6SJV7owbQm35aN5bium" crossorigin="anonymous"></script>
</body>
</html>
