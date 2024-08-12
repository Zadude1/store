<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the INSERT statement
    $sql = "INSERT INTO employees (name) VALUES (?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $name);

    // Set parameters from POST data
    $name = $_POST['name'];

    // Execute the statement
    if ($stmt->execute()) {
        echo "New employee added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
