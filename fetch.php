<?php
include 'config.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/* 🔍 SEARCH LOGIC (ADD THIS AT TOP) */
$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $stmt = $conn->prepare("SELECT * FROM records 
        WHERE name LIKE ? OR email LIKE ? OR city LIKE ?");
    $stmt->execute(["%$search%", "%$search%", "%$search%"]);
} else {
    $stmt = $conn->query("SELECT * FROM records");
}
?>

<?php include 'header.php'; ?>

<h3>Records</h3>

<!-- 🔍 SEARCH BAR (ADD THIS ABOVE TABLE) -->
<form method="GET">
    <input type="text" name="search" placeholder="Search records..."
           value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>

<div class="table-container">
<table>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Age</th>
    <th>City</th>
    <th>Message</th>

    <!-- ✅ ADD THIS COLUMN -->
    <th>Actions</th>
</tr>

<?php foreach ($stmt as $row): ?>
<tr>
    <!-- ✅ SECURE OUTPUT -->
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= htmlspecialchars($row['phone']) ?></td>
    <td><?= htmlspecialchars($row['age']) ?></td>
    <td><?= htmlspecialchars($row['city']) ?></td>
    <td><?= htmlspecialchars($row['message']) ?></td>

    <!-- ✏️❌ ADD THIS BLOCK -->
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a>
        <a href="delete.php?id=<?= $row['id'] ?>"
           onclick="return confirm('Are you sure?')">❌ Delete</a>
    </td>
</tr>
<?php endforeach; ?>

</table>
</div>

<?php include 'footer.php'; ?>