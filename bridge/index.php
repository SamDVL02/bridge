<?php
// Include necessary files
include "inc/session.php";
include "inc/function.php";
include "inc/db.php"; // Ensure the database connection is included

$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();

$sql_tasks = "SELECT COUNT(*) AS total_tasks FROM maintenance";
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$sql_avg_availability = "SELECT AVG((uptime_hours / (uptime_hours + downtime_hours)) * 100) AS avg_availability FROM availability";

// Execute the queries
$stmt_tasks = $pdo->query($sql_tasks);
$total_tasks = $stmt_tasks->fetch(PDO::FETCH_ASSOC)['total_tasks'];

$stmt_users = $pdo->query($sql_users);
$total_users = $stmt_users->fetch(PDO::FETCH_ASSOC)['total_users'];

$stmt_avg_availability = $pdo->query($sql_avg_availability);
$avg_availability = $stmt_avg_availability->fetch(PDO::FETCH_ASSOC)['avg_availability'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bridge</title>
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

    <style>

.card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .card-body {
            text-align: center;
        }
        .container {
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <?php
    include "inc/navbar.php";
    include "inc/sidebar.php";
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Admin Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="row">
        <!-- Task Card -->
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Tasks</h5>
                    <h2><?php echo $total_tasks; ?></h2>
                    <p>Maintenance Tasks Completed</p>
                </div>
            </div>
        </div>

        <!-- User Card -->
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <h2><?php echo $total_users; ?></h2>
                    <p>Registered Users</p>
                </div>
            </div>
        </div>

        <!-- Availability Performance Card -->
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Average Availability</h5>
                    <h2><?php echo number_format($avg_availability, 2); ?>%</h2>
                    <p>Average Availability of Bridges</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Carousel -->
    <h1 class="text-center">IMAGES OF STONE MASONRY ARCH BRIDGES</h1>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image2.png" class="d-block w-100" alt="First Image">
            </div>
            <div class="carousel-item">
                <img src="images.jpg" class="d-block w-100" alt="Second Image">
            </div>
            <div class="carousel-item">
                <img src="images.jpg" class="d-block w-100" alt="Third Image">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
