<?php
session_start();

// Access restriction
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: form.php");
    exit();
}

// Retrieve data
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$cookie_name = isset($_COOKIE['name']) ? $_COOKIE['name'] : 'Cookie not set';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Welcome, <strong><?php echo htmlspecialchars($name); ?></strong>!</p>
    <p>Your email: <?php echo htmlspecialchars($email); ?></p>
    <p>Cookie value: <?php echo htmlspecialchars($cookie_name); ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>