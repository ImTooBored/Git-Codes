<?php
session_start();
require_once 'DB connection.php';

// Check if the user is logged in
if (!isset($_SESSION['account_id'])) {
    header("Location: HOMEPAGE.php");
    exit(); // Ensure no further code is executed
}
?>


!DOCTYPE html>
<html lang="en">
<head>
    <title>Supervisor Dashboard</title>
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
                            <p class="fs-1"style="margin-left:100px">Notification</p>
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
                        <div class="card-body p-4" style="max-height: 60vh;">
                            <div class="overflow-auto mb-3" style="max-height: 45vh;">
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center" data-bs-toggle="modal" data-bs-target="#viewModal">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            <p class="border border-primary rounded p-2 d-flex justify-content-between align-items-center">
                                <span>Sample Text</span>
                                <i class="bi bi-three-dots"></i>
                            </p>
                            </div>
                            <!-- Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Duis aliquet viverra est, quis facilisis justo tempor quis.
              Sed orci ipsum, luctus euismod ultricies non, consequat eget odio. 
              Donec a est sagittis, aliquet tortor id, euismod justo. Donec in ex nunc.
              Aenean vitae iaculis sapien. Vestibulum scelerisque eget augue eget pharetra. 
              Duis tincidunt diam purus. Quisque semper fringilla hendrerit. 
              Proin luctus tristique augue at sagittis. Donec mauris nisl, imperdiet et cursus
               et, semper eget dui. Nunc bibendum tortor diam, vel viverra turpis ullamcorper sit amet.
                Curabitur tincidunt condimentum libero. Praesent pulvinar vulputate massa,
                 a efficitur ligula sodales a. Ut blandit, nunc quis faucibus pulvinar, magna 
                 libero interdum enim, et tincidunt dolor nibh et justo. Morbi suscipit orci pretium 
                 mi congue ultrices. Morbi lobortis, est sit amet pulvinar rutrum, purus leo imperdiet felis, id ornare ex arcu vitae lorem. 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Review</button>
                <button type="button" class="btn btn-primary">Accept</button>
                <button type="button" class="btn btn-primary">Decline</button>
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
