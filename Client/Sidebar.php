<?php
session_start();
require_once 'DB connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $req_hire = $_POST['req_hire'];
  $purpose = $_POST['purpose'];
  $starting_date = $_POST['starting_date'];
  $ending_date = $_POST['ending_date'];

  

  $sql = "INSERT INTO request_form (req_hire, purpose, starting_date, ending_date) 
          VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $req_hire, $purpose, $starting_date, $ending_date);

  if ($stmt->execute()) {
    echo "New record created successfully";
    // Redirect to notification.php after successful insert
    header("Location: notification.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

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
                            <h5 class="modal-title" id="requestrelieverLabel">Company Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="Sidebar.php" method="POST" enctype="multipart/form-data" id="requestForm">
                                <div class="mb-2">
                                    <h5 class="d-flex justify-content-center" style="color: #d4b0b5;">Request Form</h5>
                                </div>
                                <div class="mb-2 text-white">
                                    <label for="req_hire" class="form-label">Request to Hire</label>
                                    <select class="form-select bg-transparent border border-white text-white" id="req_hire" name="req_hire" required>
                                        <option value="" class="bg-dark" disabled selected>Please Choose</option>
                                        <option value="Janitor" class="bg-dark">Janitor</option>
                                        <option value="Messenger" class="bg-dark">Messenger</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <input type="text" class="form-control bg-transparent border border-white text-white" id="purpose" name="purpose" required>
                                </div>
                                <div class="mb-3">
                                    <label for="starting_date" class="form-label">Contract Start Date</label>
                                    <input type="date" class="form-control bg-transparent border border-white text-white" id="starting_date" name="starting_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ending_date" class="form-label">Contract End Date</label>
                                    <input type="date" class="form-control bg-transparent border border-white text-white" id="ending_date" name="ending_date" required>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
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
</html>