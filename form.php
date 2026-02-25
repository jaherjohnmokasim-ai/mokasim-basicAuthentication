<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    
    // Validation: Fields must not be empty
    if (empty($name) || empty($email)) {
        $error = "Please fill in both Name and Email.";
    } else {
        // Save data in session
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        
        // Save name in a cookie (expires in 1 day)
        setcookie("name", $name, time() + 86400, "/");
        
        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
</head>
<body>
    <h2>Login / Data Input</h2>

    <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="post" action="">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>