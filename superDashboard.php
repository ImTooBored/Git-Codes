<!DOCTYPE html>
<html lang="en">
<head>
    <title>DASHBOARD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body style="background-color: #11113a;">
    <header class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav mx-auto align-items-center">
            <li class="nav-item text-white">
                <p class="fs-1" style="margin-left:100px"><stong>DASHBOARD</strong></p>
            </li>
        </ul>
        <div class="ml-auto">
            <img src="./photos/Company_logo.png" alt="logo" class="img-fluid" style="max-height: 80px;">
        </div>
    </header>

    <main class="row mt-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                            <li class="mt-3">
                                <a href="Dashboard.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-bell"></i> 
                                    <span class="ms-1 d-none d-sm-inline text-dark">Notification</span>
                                </a>    
                            </li>
                            <li class="mt-3">
                                <a href="Performance.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-people"></i> 
                                    <span class="ms-1 d-none d-sm-inline text-dark">Performance Upload</span>
                                </a>    
                            </li>
                            <li class="mt-3">
                                <a href="Approvals.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-patch-check"></i> 
                                    <span class="ms-1 d-none d-sm-inline text-dark">Approvals</span>
                                </a>    
                            </li>
                            <li class="mt-3">
                                <a href="Messages" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-chat-dots"></i> 
                                    <span class="ms-1 d-none d-sm-inline text-dark">Message</span>
                                </a>    
                            </li>
                            <li class="mt-3">
                                <a href="" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-person-circle h3 text-primary"></i>
                                    <span class="ms-1 d-none d-sm-inline text-dark">Profile</span>
                                </a>    
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-sm-3">
                            <div class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                                <a class="nav-link px-0 align-top">
                                    <span class="ms-1 d-none d-sm-inline text-dark"><h2>Notifications</h2></span>
                                </a>  
                                <div class="row mt-2 ">
                                    <div class="d-grid gap-2 col-6 mx-auto" >
                                    <button type="button" class="btn btn-outline-secondary fs-4 bi-bell p-3" data-bs-toggle="modal" data-bs-target="#applicationModal">Notification from HR</button>
                                    <button type="button" class="btn btn-outline-secondary fs-4 bi-bell p-3" style="font-size: 1.5rem;" data-bs-toggle="modal" data-bs-target="#relieverModalTrigger">Request Reliver</button>
                                    </div>
                                </div>
                                </a>  
                            <!-- Application Modal -->
                                <div class="modal fade" id="relieverModalTrigger" tabindex="-1" aria-labelledby="relieverModalTrigger" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark text-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="relieverModalTrigger"  style="color: #d4b0b5;">To be Reviewed</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Application Form -->
                                                <form>
                                                    <div class="mb-2">
                                                        <label for="firstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control bg-transparent border border-white text-white" id="firstName" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="middleName" class="form-label">Middle Name</label>
                                                        <input type="text" class="form-control bg-transparent border border-white text-white" id="middleName">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="lastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control bg-transparent border border-white text-white" id="lastName" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control bg-transparent border border-white text-white" id="email" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="contactNumber" class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control bg-transparent border border-white text-white" id="contactNumber" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="file" class="form-label">Upload File</label>
                                                        <input type="file" class="form-control bg-transparent border border-white text-white" id="file">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <!-- Button to submit form -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="relieverModalTrigger">GET HIRED</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer></footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
