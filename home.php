<?php
include 'config.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/* 📊 DATA FOR CHARTS */

// Total records
$total = $conn->query("SELECT COUNT(*) FROM records")->fetchColumn();

// Age distribution
$ages = $conn->query("SELECT age, COUNT(*) as count FROM records GROUP BY age");
$ageLabels = [];
$ageData = [];

foreach ($ages as $row) {
    $ageLabels[] = $row['age'];
    $ageData[] = $row['count'];
}

// City distribution
$cities = $conn->query("SELECT city, COUNT(*) as count FROM records GROUP BY city");
$cityLabels = [];
$cityData = [];

foreach ($cities as $row) {
    $cityLabels[] = $row['city'];
    $cityData[] = $row['count'];
}
?>

<?php include 'header.php'; ?>

<div class="card">
    <h3>Welcome, <?= htmlspecialchars($_SESSION['user']) ?> 👋</h3>
    <p>Total Records: <strong><?= $total ?></strong></p>
</div>

<div class="nav">
    <a href="form.php">Add Record</a>
    <a href="fetch.php">View Records</a>
    <a href="logout.php">Logout</a>
</div>

<!-- 📊 Charts -->
<div class="card">
    <h3>Age Distribution</h3>
    <canvas id="ageChart"></canvas>
</div>

<div class="card">
    <h3>City Distribution</h3>
    <canvas id="cityChart"></canvas>
</div>

<script>
/* AGE CHART */
new Chart(document.getElementById('ageChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($ageLabels) ?>,
        datasets: [{
            label: 'Users by Age',
            data: <?= json_encode($ageData) ?>,
            backgroundColor: '#4facfe'
        }]
    }
});

/* CITY CHART */
new Chart(document.getElementById('cityChart'), {
    type: 'pie',
    data: {
        labels: <?= json_encode($cityLabels) ?>,
        datasets: [{
            data: <?= json_encode($cityData) ?>,
            backgroundColor: [
                '#4facfe','#6a11cb','#00c9a7','#ff6f91','#ffc75f'
            ]
        }]
    }
});
</script>

<?php include 'footer.php'; ?>