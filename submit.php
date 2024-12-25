<?php
// Database credentials
$host = "sql12.freesqldatabase.com"; // Replace with your database host
$username = "sql12752283";           // Replace with your database username
$password = "jGctZs1gaH";            // Replace with your database password
$database = "sql12752283";           // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? 'Anonymous'; // Default to 'Anonymous' if name not provided
    $email = $_POST['email'];
    $message = $_POST['message'];
    $option = $_POST['option'];

    // Prepare SQL statement
    $sql = "INSERT INTO contacts (name, email, message, option_selected) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $message, $option);

    // Execute the query
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
