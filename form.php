<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = preg_match('/^[0-9]{10}$/', $_POST['phone']) ? $_POST['phone'] : false;
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $city = trim($_POST['city']);
    $msg = trim($_POST['message']);

    if ($name && $email && $phone && $age && $city && $msg) {

        $stmt = $conn->prepare("INSERT INTO records 
        (name,email,phone,age,city,message)
        VALUES (?,?,?,?,?,?)");

        $stmt->execute([$name,$email,$phone,$age,$city,$msg]);

        $message = "✅ Data inserted successfully!";
    } else {
        $message = "❌ Invalid input!";
    }
}
?>

<?php include 'header.php'; ?>

<form method="POST">
    <h3>Add Record</h3>

    <p><?= $message ?></p>

    <input type="text" name="name" placeholder="Name" required minlength="2" maxlength="50">

    <input type="email" name="email" placeholder="Email" required>

    <input type="text" name="phone" placeholder="10-digit phone"
           pattern="[0-9]{10}" maxlength="10" required>

    <input type="number" name="age" placeholder="Age"
           min="1" max="120" required>

    <input type="text" name="city" placeholder="City" required>

    <textarea name="message" placeholder="Message" required maxlength="200"></textarea>

    <button type="submit">Submit</button>
</form>

<?php include 'footer.php'; ?>