<?php
// Include necessary files
include "inc/session.php";
include "inc/function.php";
include "inc/db.php";

$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];

Confirm_Login();

if (isset($_POST["add"])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $quantity = $_POST['quantity'];
   
    // Insert Data Into the Database
    $sql = "INSERT INTO parts (name, location, quantity) VALUES (:name, :location, :quantity)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":location", $location);
    $stmt->bindValue(":quantity", $quantity);

    $results = $stmt->execute();

    if ($results) {
        $_SESSION["SuccessMessage"] = "Added Successfully";
        Redirect_to("parts.php");
    } else {
        echo '<div class="alert alert-danger">Oops! Something went wrong</div>';
    }
}

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql = "DELETE FROM parts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $delete_id);

    if ($stmt->execute()) {
        $_SESSION["SuccessMessage"] = "Deleted Successfully";
        Redirect_to("parts.php");
    } else {
        echo '<div class="alert alert-danger">Oops! Could not delete the record</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Parts Management</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
            <h1>Parts Management</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Create
                </button>
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM parts";
                                $iduser = 0;
                                $stmt = $pdo->query($sql);
                                while ($rows = $stmt->fetch()) {
                                    $iduser++;
                                    echo '
                                    <tr>
                                        <td>' . $iduser . '</td>
                                        <td>' . htmlspecialchars($rows["name"]) . '</td>
                                        <td>' . htmlspecialchars($rows["location"]) . '</td>
                                        <td>' . htmlspecialchars($rows["quantity"]) . '</td>
                                        <td>
                                            <a href="parts.php?delete_id=' . htmlspecialchars($rows["id"]) . '" onclick="return confirm(\'Are you sure you want to delete this item?\');">
                                                <span class="btn btn-danger">Delete</span>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="basicModalLabel">Create Part</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST" action="parts.php">
                                            <div class="col-12">
                                                <label for="name" class="form-label">Part Name</label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="location" class="form-label">Location</label>
                                                <input type="text" name="location" class="form-control" id="location" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
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
