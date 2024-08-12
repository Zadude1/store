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

$input = $_GET['input'];

// Query to fetch suggestions from 'materials' table
$sql = "SELECT name FROM materials WHERE name LIKE '%$input%' LIMIT 10";
$result = $conn->query($sql);

$suggestions = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = array('name' => $row['name']);
    }
}

$conn->close();

// Return suggestions as JSON
header('Content-Type: application/json');
echo json_encode($suggestions);
?>
