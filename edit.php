<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM records WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE records 
        SET name=?, email=?, phone=?, age=?, city=?, message=? 
        WHERE id=?");

    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['age'],
        $_POST['city'],
        $_POST['message'],
        $id
    ]);

    header("Location: fetch.php");
}
?>

<?php include 'header.php'; ?>

<form method="POST">
    <h3>Edit Record</h3>

    <input type="text" name="name" value="<?= $data['name'] ?>" required>
    <input type="email" name="email" value="<?= $data['email'] ?>" required>
    <input type="text" name="phone" value="<?= $data['phone'] ?>" required>
    <input type="number" name="age" value="<?= $data['age'] ?>" required>
    <input type="text" name="city" value="<?= $data['city'] ?>" required>
    <textarea name="message"><?= $data['message'] ?></textarea>

    <button type="submit">Update</button>
</form>

<?php include 'footer.php'; ?>