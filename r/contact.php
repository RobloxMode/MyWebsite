<?php
// Database connection
$servername = "localhost";  // Replace with your server details
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "holyface_db";    // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    // Insert data into the database
    $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$name', '$email', '$number')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: admin_dashboard.php");  // Redirect to the admin dashboard
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
