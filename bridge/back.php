<?php include 'db.php'; ?>

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

<table border="1">
    <tr>
        <th>Bridge Name</th>
        <th>Metric Name</th>
        <th>Value</th>
        <th>Date Recorded</th>
    </tr>

    <?php foreach ($performance_records as $record): ?>
    <tr>
        <td><?= $record['bridge_name']; ?></td>
        <td><?= $record['metric_name']; ?></td>
        <td><?= $record['value']; ?></td>
        <td><?= $record['recorded_at']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
    else:
        echo "<p>No performance records found for the selected period.</p>";
    endif;
}
?>
