<?php
session_start();
include 'db_connect.php'; // Ensure this file connects to MySQL

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $check_email_stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $email_result = $check_email_stmt->get_result();
    $row = $email_result->fetch_assoc();

    if (!$row) {
        $error = "No account is registered with this email!";
    } else {
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] == 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: dashboard.php");
                exit();
            }
        } else {
            $error = "Invalid password!";
        }
    }

    $check_email_stmt->close();
}

// Store error message in session and redirect to login page
if (!empty($error)) {
    $_SESSION['error'] = $error;
    header("Location: login.php");
    exit();
}
?>
