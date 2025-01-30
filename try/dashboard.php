<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

echo "<h1>Welcome to the Travel Dashboard</h1>";
echo "<p><a href='logout.php'>Logout</a></p>";
?>
