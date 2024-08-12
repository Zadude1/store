<?php
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

// Fetch data from materials table
$sql = "SELECT name FROM materials WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$term = '%' . $_GET['term'] . '%'; // Sanitize user input for security
$stmt->bind_param("s", $term);
$stmt->execute();
$result = $stmt->get_result();

// Build array of results
$items = array();
while ($row = $result->fetch_assoc()) {
    $items[] = $row['name'];
}

// Return JSON response
echo json_encode($items);

$stmt->close();
$conn->close();
?>
