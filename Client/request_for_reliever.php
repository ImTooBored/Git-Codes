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
                            <p class="fs-1"style="margin-left:100px">Request For Reliever</p>
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
                    <div class="card bg-light text-dark shadow-sm" style="max-height: 60vh; height: 100%; min-height: 400px;">
                        <div class="card-body">
                        
                        </div>
                    </div>
                </div>
            </div>
        </main>

<!-- Letter of complaint modal-->
        <div class="modal fade" id="requestreliever" tabindex="-1" aria-labelledby="requestrelieverLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Company Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="" enctype="multipart/form-data">
                            <div class="mb-2">
                                <h5 class="d-flex justify-content-center" style="color: #d4b0b5;">Request Form</h5>
                            </div>
                            <div class="mb-2 text-white">
                                <label for="Subject" class="form-label" >Request to Hire</label>
                                    <select class="form-select bg-transparent border border-white text-white" id="type" name="type" required>
                                        <option value="" class="bg-dark" disabled selected>Please Choose</option>
                                        <option value="" class="bg-dark">Janitor</option>
                                        <option value="" class="bg-dark">Messenger</option>
                                    </select>
                            </div>
                            <div class="mb-2">
                                <label for="Content" class="form-label">Purpose</label>
                                <input type="text" class="form-control bg-transparent border border-white text-white" id="purpose" name="purpose" required>
                            </div>
                            <div class="mb-3">
                                <label for="contractStartDate" class="form-label">Contract Start Date</label>
                                <input type="date" class="form-control bg-transparent border border-white text-white" id="contractStartDate" name="contractStartDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="contractEndDate" class="form-label">Contract End Date</label>
                                <input type="date" class="form-control bg-transparent border border-white text-white" id="contractEndDate" name="contractEndDate" required>
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
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
