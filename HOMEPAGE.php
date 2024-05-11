<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home </title>
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
                    <a href="#" class="btn btn-primary ml-2">HIRE PERSONELL</a>
                </div>
            </div>
        </div>
    </main>


     <!-- Application Modal -->
     <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="applicationModalLabel"  style="color: #d4b0b5;">APPLICATION FORM</h5>
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
                <a class="btn btn-primary" href="GETHIRED.php" role="button">SUBMIT</a>
                </div>
            </div>
        </div>
    </div>




    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
