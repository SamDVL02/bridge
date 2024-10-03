<?php
// Include necessary files
include "inc/session.php";
include "inc/function.php";
include "inc/db.php";

// Set the current page URL for tracking
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];

// Function to confirm login
Confirm_Login();

if (isset($_POST["add"])) {
    // Get form data
    $bridge_id = $_POST['bridge_id'];
    $metric_name = $_POST['metric_name'];
    $value = $_POST['value'];
    $recorded_at = $_POST['recorded_at'];

    // Insert Data Into the Database
    $sql = "INSERT INTO performance (bridge_id, metric_name, value, recorded_at)
            VALUES (:bridge_id, :metric_name, :value, :recorded_at)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bridge_id', $bridge_id);
    $stmt->bindValue(':metric_name', $metric_name);
    $stmt->bindValue(':value', $value);
    $stmt->bindValue(':recorded_at', $recorded_at);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION["SuccessMessage"] = "Performance record added successfully";
        Redirect_to("perfom.php");
    } else {
        echo '<div class="alert alert-danger">Oops, something went wrong</div>';
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
            <h1>Performance Monitoring</h1>
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
                                    <th>Bridge Name</th>
                                    <th>Metric Name</th>
                                    <th>Value</th>
                                    <th>Recorded At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT p.id, b.name as bridge_name, p.metric_name, p.value, p.recorded_at 
                                        FROM performance p 
                                        JOIN bridges b ON p.bridge_id = b.id";
                                $iduser = 0;
                                $stmt = $pdo->query($sql);
                                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $iduser++;
                                    echo '
                                    <tr>
                                        <td>' . $iduser . '</td>
                                        <td>' . $rows["bridge_name"] . '</td>
                                        <td>' . $rows["metric_name"] . '</td>
                                        <td>' . $rows["value"] . '</td>
                                        <td>' . $rows["recorded_at"] . '</td>
                                        <td><a href="del.php?id=' . $rows["id"] . '"><span class="btn btn-danger">Delete</span></a></td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST" action="perfom.php">
                                            <div class="col-12">
                                                <label for="bridge_id" class="form-label">Bridge Name</label>
                                                <select name="bridge_id" required class="form-control">
                                                <?php
                                                    $sql = "SELECT * FROM bridges";
                                                    $stmt = $pdo->query($sql);
                                                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $rows["id"] . '">' . $rows['name'] . '</option>';
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="metric_name" class="form-label">Metric Name</label>
                                                <div class="input-group has-validation">
                                                <input type="text" name="metric_name" placeholder="Metric Name" class="form-control" required>
                                                </div>
                                            </div>
                                          
                                            <div class="col-12">
                                                <label for="value" class="form-label">Value</label>
                                                <input type="number" step="0.01" name="value" placeholder="Value" class="form-control" required>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="recorded_at" class="form-label">Recorded At</label>
                                                <input type="date" name="recorded_at" class="form-control" required>
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
