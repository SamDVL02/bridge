<?php
// Include session, functions, and database pdoection
include "inc/session.php";
include "inc/function.php";
include "inc/db.php";

$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];

Confirm_Login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Performance Metrics Report</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="prepdoect">
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

  <!-- ======= Header ======= -->
  <?php
    include "inc/navbar.php";
    include "inc/sidebar.php";
  ?>

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h2>Performance Metrics Report</h2>

              <form method="post" action="">
                  <label for="start_date">Start Date:</label>
                  <input type="date" name="start_date" required>
                  <label for="end_date">End Date:</label>
                  <input type="date" name="end_date" required>
                  <button type="submit">Generate Report</button>
              </form>

              <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
            
                $sql = "SELECT bridges.name as bridge_name, performance.* 
                        FROM performance 
                        JOIN bridges ON performance.bridge_id = bridges.id 
                        WHERE recorded_at BETWEEN ? AND ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$start_date, $end_date]);
                $performance_records = $stmt->fetchAll();
            
                if ($performance_records):
              ?>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                    <th>Bridge Name</th>
        <th>Metric Name</th>
        <th>Value</th>
        <th>Date Recorded</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($performance_records as $record): ?>
    <tr>
        <td><?= $record['bridge_name']; ?></td>
        <td><?= $record['metric_name']; ?></td>
        <td><?= $record['value']; ?></td>
        <td><?= $record['recorded_at']; ?></td>
    </tr>
    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php
                  else:
                      echo "<p>No maintenance records found for the selected period.</p>";
                  endif;
              }
              ?>

            </div>
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
