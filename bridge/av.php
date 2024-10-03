<?php
// Include necessary files for session, database connection, and other utilities
include "inc/session.php";
include "inc/function.php";
include "inc/db.php";

// Set the current page URL for tracking
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];

// Function to confirm user login
Confirm_Login();

if (isset($_POST["add"])) {
    // Get form data from the POST request
    $bridge_id = $_POST['bridge_id'];
    $uptime_hours = $_POST['uptime_hours'];
    $downtime_hours = $_POST['downtime_hours'];
    
    // Calculate total hours (uptime + downtime)
    $total_hours = $uptime_hours + $downtime_hours;

    // Insert data into the database (availability table)
    $sql = "INSERT INTO availability (bridge_id, uptime_hours, downtime_hours, total_hours) 
            VALUES (:bridge_id, :uptime_hours, :downtime_hours, :total_hours)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bridge_id', $bridge_id);
    $stmt->bindValue(':uptime_hours', $uptime_hours);
    $stmt->bindValue(':downtime_hours', $downtime_hours);
    $stmt->bindValue(':total_hours', $total_hours);

    // Execute the query and check the result
    $result = $stmt->execute();

    if ($result) {
        $_SESSION["SuccessMessage"] = "Availability record added successfully";
        Redirect_to("av.php");
    } else {
        echo '<div class="alert alert-danger">Oops, something went wrong</div>';
    }
}

// Function to calculate availability percentage
function calculateAvailability($bridge_id, $pdo) {
    // Query to fetch total uptime and downtime from the database
    $query = "SELECT SUM(uptime_hours) AS total_uptime, SUM(downtime_hours) AS total_downtime 
              FROM availability 
              WHERE bridge_id = :bridge_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':bridge_id', $bridge_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get total uptime and downtime
    $total_uptime = $row['total_uptime'];
    $total_downtime = $row['total_downtime'];
    
    // Calculate total hours (uptime + downtime)
    $total_hours = $total_uptime + $total_downtime;
    
    // Calculate availability percentage
    if ($total_hours > 0) {
        $availability = ($total_uptime / $total_hours) * 100;
    } else {
        $availability = 100; // If no downtime, availability is 100%
    }

    return number_format($availability, 2);
}

// Fetch bridge ID from the GET request
$bridge_id = $_GET['bridge_id'] ?? null;

if ($bridge_id) {
    // Calculate availability for the selected bridge
    $availability = calculateAvailability($bridge_id, $pdo);
    echo "<h3>Bridge Availability: " . $availability . "%</h3>";
} else {
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability Performance</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container mt-5">
        <h1 class="text-center">Availability Performance Record</h1>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            Add Availability Record
        </button>

        <!-- Table to Display Availability Records -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Bridge Name</th>
                    <th>Uptime (Hours)</th>
                    <th>Downtime (Hours)</th>
                    <th>Total Hours</th>
                    <th>Availability (%)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT bridges.name, availability.uptime_hours, availability.downtime_hours, 
                           availability.total_hours
                    FROM availability
                    JOIN bridges ON availability.bridge_id = bridges.id";
            $stmt = $pdo->query($sql);
            $id = 0;

            // Fetch each record and calculate availability
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id++;
                $total_hours = $row["uptime_hours"] + $row["downtime_hours"];
                $availability = ($row["uptime_hours"] / $total_hours) * 100;
                echo "
                    <tr>
                        <td>$id</td>
                        <td>{$row['name']}</td>
                        <td>{$row['uptime_hours']}</td>
                        <td>{$row['downtime_hours']}</td>
                        <td>$total_hours</td>
                        <td>" . number_format($availability, 2) . "%</td>
                    </tr>
                ";
            }
            ?>
            </tbody>
        </table>

        <!-- Modal to Add Availability Record -->
        <div class="modal fade" id="addRecordModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Availability Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="av.php">
                            <div class="mb-3">
                                <label for="bridge_id" class="form-label">Bridge Name</label>
                                <select name="bridge_id" class="form-control" required>
                                    <?php
                                    $sql = "SELECT id, name FROM bridges";
                                    $stmt = $pdo->query($sql);
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="uptime_hours" class="form-label">Uptime (Hours)</label>
                                <input type="number" name="uptime_hours" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="downtime_hours" class="form-label">Downtime (Hours)</label>
                                <input type="number" name="downtime_hours" class="form-control" required>
                            </div>
                            <button type="submit" name="add" class="btn btn-primary">Add Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
