<!DOCTYPE html>
<html lang="en">
            <!-- sidebar -->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-left align-items-sm-start">
                            <li class="mt-6">
                                <a href="DASHBOARD.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-person-badge"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Application Management</span>
                                </a>
                            </li>
                            <li class="mt-3">
                                <a href="employee.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-people"></i>
                                    <span class="ms-1 d-sm-inline text-dark">List of Employees</span>
                                </a>
                            </li>
                            <li class="mt-3">
                                <a href="companies.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-buildings"></i>
                                    <span class="ms-1 d-sm-inline text-dark">List of Companies</span>
                                </a>
                            </li>
                            <li class="mt-3">
                                <a href="" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-patch-check"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Approvals</span>
                                </a>
                            </li>
                            <li class="mt-3">
                                <a href="" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-chat-dots"></i>
                                    <span class="ms-1 d-sm-inline text-dark">Message</span>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown pb-4  text-dark mt-5">
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