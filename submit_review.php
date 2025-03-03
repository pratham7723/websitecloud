<?php
$servername = "localhost"; // Default for XAMPP & local MySQL
$username = "root"; // Default for XAMPP & local MySQL
$password = ""; // XAMPP has no default password, leave blank
$dbname = "shopycloud"; // Name of database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $review = $_POST['review'];
    $rating = isset($_POST['rating']) ? $_POST['rating'] : NULL;

    // Prevent SQL Injection
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $number = $conn->real_escape_string($number);
    $review = $conn->real_escape_string($review);
    $rating = $conn->real_escape_string($rating);

    // Insert into database
    $sql = "INSERT INTO reviews (name, email, number, review, rating) VALUES ('$name', '$email', '$number', '$review', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Review submitted successfully!');
                window.location.href = 'index.php'; // Redirect back to home page
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href = 'index.php'; 
              </script>";
    }

    $conn->close();
}
?>
