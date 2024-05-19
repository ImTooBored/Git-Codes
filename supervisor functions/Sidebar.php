<!DOCTYPE html>
<html lang="en">
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
                                <a href="performanceupload.php" class="nav-link px-0 align-middle">
                                    <i class=" fs-4 bi bi-camera-video"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Performance Upload</span>
                                </a>
                            </li>
                            <li class="mt-2 mb-5">
                                <a href="sp_approvals.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-patch-check"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Approvals</span>
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
                                <li><a class="dropdown-item" href="#">Log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

    </body>

</html>