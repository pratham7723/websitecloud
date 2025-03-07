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

// Handle User Update (Name, Email, Role)
if (isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];
    $new_role = $_POST['new_role'];

    mysqli_query($conn, "UPDATE users SET name='$new_name', email='$new_email', role='$new_role' WHERE id=$user_id");
    header("Location: admin.php");
    exit();
}

// Handle Review Update
if (isset($_POST['update_review'])) {
    $review_id = $_POST['review_id'];
    $updated_review = $_POST['updated_review'];
    $updated_rating = $_POST['updated_rating'];

    mysqli_query($conn, "UPDATE reviews SET review='$updated_review', rating='$updated_rating' WHERE id=$review_id");
    header("Location: admin.php");
    exit();
}

// Handle Review Deletion
if (isset($_POST['delete_review'])) {
    $review_id = $_POST['review_id'];
    mysqli_query($conn, "DELETE FROM reviews WHERE id=$review_id");
    header("Location: admin.php");
    exit();
}

// Search functionality
$search_user = isset($_GET['search_user']) ? $_GET['search_user'] : "";
$search_review = isset($_GET['search_review']) ? $_GET['search_review'] : "";

// Fetch users with search filter
$users_query = "SELECT id, name, email, role FROM users WHERE name LIKE '%$search_user%' OR email LIKE '%$search_user%'";
$users = mysqli_query($conn, $users_query) or die(mysqli_error($conn));

// Fetch reviews with search filter
$reviews_query = "SELECT id, name, email, review, rating FROM reviews WHERE name LIKE '%$search_review%' OR review LIKE '%$search_review%'";
$reviews = mysqli_query($conn, $reviews_query) or die(mysqli_error($conn));
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
        input, select { padding: 5px; width: 100%; }
        .search-box { margin-bottom: 15px; }
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

    <!-- Search Users -->
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search_user" placeholder="Search User by Name or Email" value="<?= htmlspecialchars($search_user) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Manage Users -->
    <h3>Manage Users</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Update</th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($users)) { ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">
                        <input type="text" name="new_name" value="<?= htmlspecialchars($user['name']) ?>" required>
                </td>
                <td>
                        <input type="email" name="new_email" value="<?= htmlspecialchars($user['email']) ?>" required>
                </td>
                <td>
                        <select name="new_role">
                            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                </td>
                <td>
                        <button type="submit" name="update_user">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Search Reviews -->
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search_review" placeholder="Search Review by Name or Content" value="<?= htmlspecialchars($search_review) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Manage Reviews -->
    <h3>Manage Reviews</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Review</th><th>Rating</th><th>Update</th><th>Delete</th>
        </tr>
        <?php while ($review = mysqli_fetch_assoc($reviews)) { ?>
            <tr>
                <td><?= htmlspecialchars($review['id']) ?></td>
                <td><?= htmlspecialchars($review['name']) ?></td>
                <td><?= htmlspecialchars($review['email']) ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="review_id" value="<?= htmlspecialchars($review['id']) ?>">
                        <input type="text" name="updated_review" value="<?= htmlspecialchars($review['review']) ?>" required>
                </td>
                <td>
                        <input type="number" name="updated_rating" value="<?= htmlspecialchars($review['rating']) ?>" min="1" max="5" required>
                </td>
                <td>
                        <button type="submit" name="update_review">Update</button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="review_id" value="<?= htmlspecialchars($review['id']) ?>">
                        <button type="submit" name="delete_review">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
