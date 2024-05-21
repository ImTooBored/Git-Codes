<!DOCTYPE html>
<html lang="en">
    <body>
            <!-- sidebar -->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-left align-items-sm-start">
                            <li class="w-100">
                                 <p class="fs-3 text-center  text-dark">DASHBOARD</p>                        
                            </li>
                            <li class="mt-2">
                                <a href="notification.php" class="nav-link px-0 align-middle">
                                    <i class=" fs-4 bi bi-bell-fill"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Notifications</span>
                                </a>
                            </li>
                            <li class="mt-2">
                                <a href="list_of_janitors.php" class="nav-link px-0 align-middle">
                                    <i class=" fs-4 bi bi-person-lines-fill"></i>
                                    <span class="ms-1 d-sm-inline text-dark">List of Janitors</span>
                                </a>
                            </li>
                            <li class="mt-2 mb-5">
                                <a href="#" class="nav-link px-0 align-middle"  data-bs-toggle="modal" data-bs-target="#requestreliever">
                                    <i class="fs-4 bi-person-check"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Request for Reliever</span>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown pb-4  text-dark">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle h3 text-primary"></i>

                            <?php // echo '<span class="ms-2 text-dark">' .  $adminFirstName  . '</span>'; ?>
                                                                        <!-- sa db ni siya kuhaon -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small  text-dark shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="../LOGOUT.php">Log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    </body>

    <!-- Letter of complaint modal-->
    <div class="modal fade" id="requestreliever" tabindex="-1" aria-labelledby="requestrelieverLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request for Reliever</h5>
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
</html>