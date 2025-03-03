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

// Handle User Addition
if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    mysqli_query($conn, "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    header("Location: admin.php");
    exit();
}

// Handle Product Addition with Image Upload
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
    
    mysqli_query($conn, "INSERT INTO products (name, price, image) VALUES ('$product_name', '$product_price', '$target_file')");
    header("Location: admin.php");
    exit();
}

// Handle Product Price Update
if (isset($_POST['update_price'])) {
    $product_id = $_POST['product_id'];
    $new_price = $_POST['new_price'];
    mysqli_query($conn, "UPDATE products SET price='$new_price' WHERE id=$product_id");
    header("Location: admin.php");
    exit();
}

// Fetch users and products safely
$users = mysqli_query($conn, "SELECT id, name, email, role FROM users") or die(mysqli_error($conn));
$products = mysqli_query($conn, "SELECT id, name, price, image FROM products") or die(mysqli_error($conn));
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
        img { max-width: 100px; height: auto; }
    </style>
</head>
<body>
<header class="animate">
    <a href="#" class="logo"><img src="shopy cloud logo.png" height="70px" width="120px"></a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="#products">Products</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Admin Dashboard</h2>
    
    <h3>Add User</h3>
    <form method="post">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit" name="add_user">Add User</button>
    </form>

    <h3>Add Product</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="number" name="product_price" placeholder="Price" required>
        <input type="file" name="product_image" accept="image/*" required>
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <h3>Update Product Price</h3>
    <table>
        <tr>
            <th>ID</th><th>Product Name</th><th>Current Price</th><th>Image</th><th>New Price</th><th>Action</th>
        </tr>
        <?php while ($product = mysqli_fetch_assoc($products)) { ?>
            <tr>
                <td><?= htmlspecialchars($product['id']) ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td>₹<?= htmlspecialchars($product['price']) ?></td>
                <td><img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image"></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                        <input type="number" name="new_price" placeholder="New Price" required>
                        <button type="submit" name="update_price">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
