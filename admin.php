<?php
// Ensure session starts only if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
$path = __DIR__ . '/db_connect.php';
if (file_exists($path)) {
    include $path;
} else {
    die("Error: Database connection file not found!");
}

// Ensure only admins can access the page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Handle User Update
if (isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    mysqli_query($conn, "UPDATE users SET name='$name', email='$email', role='$role' WHERE id=$user_id");
    header("Location: admin.php");
    exit();
}

// Handle Review Update
if (isset($_POST['update_review'])) {
    $review_id = $_POST['review_id'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    mysqli_query($conn, "UPDATE reviews SET review='$review', rating='$rating' WHERE id=$review_id");
    header("Location: admin.php");
    exit();
}

// Fetch users and reviews safely
$users = mysqli_query($conn, "SELECT id, name, email, role FROM users") or die(mysqli_error($conn));
$reviews = mysqli_query($conn, "SELECT id, name, email, review, rating FROM reviews") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ShopyCloud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { width: 80%; margin: auto; background: white; padding: 20px; box-shadow: 0 0 10px gray; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        button { padding: 5px 10px; cursor: pointer; background: #007bff; color: white; border: none; }
    </style>
</head>
<body>
<header class="animate">
    <a href="#" class="logo"><img src="shopy cloud logo.png" height="70px" width="120px"></a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Admin Dashboard</h2>

    <h3>Manage Users</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($users)) { ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">
                        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        <select name="role">
                            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                        <button type="submit" name="update_user">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h3>Manage Reviews</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Review</th><th>Rating</th><th>Action</th>
        </tr>
        <?php while ($review = mysqli_fetch_assoc($reviews)) { ?>
            <tr>
                <td><?= htmlspecialchars($review['id']) ?></td>
                <td><?= htmlspecialchars($review['name']) ?></td>
                <td><?= htmlspecialchars($review['email']) ?></td>
                <td><?= htmlspecialchars($review['review']) ?></td>
                <td><?= htmlspecialchars($review['rating']) ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="review_id" value="<?= htmlspecialchars($review['id']) ?>">
                        <textarea name="review" required><?= htmlspecialchars($review['review']) ?></textarea>
                        <input type="number" name="rating" value="<?= htmlspecialchars($review['rating']) ?>" min="1" max="5" required>
                        <button type="submit" name="update_review">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>