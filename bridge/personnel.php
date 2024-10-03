<?php
// code for session
include "inc/session.php";
// code for function
include "inc/function.php";

// code for database
include "inc/db.php";

$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];

Confirm_Login();


if (isset($_POST["add"])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    // insert Data Into the Database
    $sql = "INSERT INTO personnel (name, role)";
    $sql .= " VALUES(:name, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("name", $name);
    $stmt->bindValue("role", $role);
    $results = $stmt->execute();

    if ($results) {
        $_SESSION["SuccessMessage"] = " Added Successfully";
        Redirect_to("personnel.php");
    } else {
        echo '<div class="alert alert-danger">OOOps something went wrong</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bridge Data Management</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="prepdoect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <?php
    include "inc/navbar.php";
    include "inc/sidebar.php";
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Personnell  Management</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Create 
                </button>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task List</h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM personnel";
                                $iduser = 0;
                                $stmt = $pdo->query($sql);
                                while ($rows = $stmt->fetch()) {
                                    $iduser++;
                                    echo '
                                    <tr>
                                        <td>' . $iduser . '</td>
                                        <td>' . $rows["name"] . '</td>
                                        <td>' . $rows["role"] . '</td>
                                        
                                        <td><a href="deletetask.php?id=' . $rows["id"] . '"><span class="btn btn-danger">Delete</span></a></td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create Task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST" action="personnel.php">
                                            <div class="col-12">
                                                <label for="elect_sytem" class="form-label"> Name</label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="air_condition" class="form-label">Role</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="role" class="form-control" id="air_condition" required>
                                                </div>
                                            </div>
                                            
                                            
                                         
                    
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" name="add" type="submit">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Basic Modal-->
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
