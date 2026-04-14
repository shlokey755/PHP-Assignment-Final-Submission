<?php
include 'config.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($user === "admin" && $pass === "1234") {
        $_SESSION['user'] = $user;

        setcookie("user", $user, time()+3600);

        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<?php include 'header.php'; ?>

<form method="POST">
    <h3>Login</h3>

    <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <input type="text" name="username" placeholder="Username" required>

    <input type="password" name="password" placeholder="Password" required minlength="4">

    <button type="submit">Login</button>
</form>

<?php include 'footer.php'; ?>