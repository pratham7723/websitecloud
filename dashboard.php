<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
echo "<h2>Welcome, " . $_SESSION['user_name'] . "</h2>";
echo "<a href='logout.php'>Logout</a>";
?>
