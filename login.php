<?php
session_start();
include 'db_connect.php'; // Ensure this file connects to MySQL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $check_email_stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $email_result = $check_email_stmt->get_result();
    $email_data = $email_result->fetch_assoc();

    if ($email_data['count'] == 0) {
        echo "No account is registered with this email!";
        exit();
    }

    $check_email_stmt->close();

    // Securely fetch user data
    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            echo "Invalid password!";
        }
    }

    $stmt->close();
}
?>
