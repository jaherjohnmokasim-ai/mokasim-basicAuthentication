<?php
session_start();

// Destroy session
session_unset();
session_destroy();

// Remove cookie
setcookie("name", "", time() - 3600, "/");

// Redirect to form.php
header("Location: form.php");
exit();
?>