<?php
include 'config.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM records WHERE id=?");
$stmt->execute([$id]);

header("Location: fetch.php");
?>   