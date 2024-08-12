<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store"; // Replace with your actual database name

// Get the type of autocomplete and the search term
$type = $_GET['type'] ?? '';
$term = $_GET['term'] ?? '';

// Initialize an empty array for results
$results = [];

// Check if the type is valid
if (!empty($type) && in_array($type, ['voucher_id', 'received_office', 'receiver_name', 'sender_name', 'item'])) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct the SQL query based on the type
    switch ($type) {
        case 'voucher_id':
            $sql = "SELECT DISTINCT voucher_id FROM voucher WHERE voucher_id LIKE '%$term%'";
            break;
        case 'received_office':
            $sql = "SELECT DISTINCT received_office FROM voucher WHERE received_office LIKE '%$term%'";
            break;
        case 'receiver_name':
            $sql = "SELECT DISTINCT receiver_name FROM voucher WHERE receiver_name LIKE '%$term%'";
            break;
        case 'sender_name':
            $sql = "SELECT DISTINCT sender_name FROM voucher WHERE sender_name LIKE '%$term%'";
            break;
        case 'item':
            $sql = "SELECT DISTINCT item FROM voucher_details WHERE item LIKE '%$term%'";
            break;
        default:
            break;
    }

    // Execute the query
    $result = $conn->query($sql);

    // Fetch results into an array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            switch ($type) {
                case 'voucher_id':
                    $results[] = $row['voucher_id'];
                    break;
                case 'received_office':
                    $results[] = $row['received_office'];
                    break;
                case 'receiver_name':
                    $results[] = $row['receiver_name'];
                    break;
                case 'sender_name':
                    $results[] = $row['sender_name'];
                    break;
                case 'item':
                    $results[] = $row['item'];
                    break;
                default:
                    break;
            }
        }
    }

    // Close connection
    $conn->close();
}

// Output results as JSON
echo json_encode($results);
?>
