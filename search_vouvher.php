<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Vouchers</title>
    <!-- You can link your CSS file here if needed -->
    <link rel="stylesheet" href="stylenew.css">
</head>
<body>

<h2>Search Vouchers</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    <label for="voucher_id">Voucher ID:</label>
    <input type="text" id="voucher_id" name="voucher_id" value="<?php echo isset($_GET['voucher_id']) ? $_GET['voucher_id'] : ''; ?>">
    <br><br>
    
    <label for="receiver_name">Receiver Name:</label>
    <input type="text" id="receiver_name" name="receiver_name" value="<?php echo isset($_GET['receiver_name']) ? $_GET['receiver_name'] : ''; ?>">
    <br><br>
    
    <label for="sender_name">Sender Name:</label>
    <input type="text" id="sender_name" name="sender_name" value="<?php echo isset($_GET['sender_name']) ? $_GET['sender_name'] : ''; ?>">
    <br><br>
    
    <label for="from_date">From Date:</label>
    <input type="date" id="from_date" name="from_date" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''; ?>">
    
    <label for="to_date">To Date:</label>
    <input type="date" id="to_date" name="to_date" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''; ?>">
    <br><br>
    
    <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
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

    // Initialize variables to store search criteria
    $voucher_id = isset($_GET['voucher_id']) ? $_GET['voucher_id'] : '';
    $receiver_name = isset($_GET['receiver_name']) ? $_GET['receiver_name'] : '';
    $sender_name = isset($_GET['sender_name']) ? $_GET['sender_name'] : '';
    $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
    $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';

    // Build the SQL query based on the search criteria
    $sql = "SELECT v.*, vd.* 
            FROM voucher v
            JOIN voucher_details vd ON v.voucher_id = vd.voucher_id
            WHERE 1";

    if (!empty($voucher_id)) {
        $sql .= " AND v.voucher_id = $voucher_id";
    }

    if (!empty($receiver_name)) {
        $sql .= " AND v.receiver_name LIKE '%$receiver_name%'";
    }

    if (!empty($sender_name)) {
        $sql .= " AND v.sender_name LIKE '%$sender_name%'";
    }

    if (!empty($from_date) && !empty($to_date)) {
        $sql .= " AND v.received_date BETWEEN '$from_date' AND '$to_date'";
    }

    // Execute the query
    $result = $conn->query($sql);

    // Display results in a table
    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Voucher ID</th><th>Received Office</th><th>Receiver Name</th><th>Received Date</th><th>Account</th><th>Sender Name</th><th>Measure Unit</th><th>Required Amount</th><th>Given Amount</th><th>Unit Cost</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["voucher_id"] . "</td>";
            echo "<td>" . $row["received_office"] . "</td>";
            echo "<td>" . $row["receiver_name"] . "</td>";
            echo "<td>" . $row["received_date"] . "</td>";
            echo "<td>" . $row["account"] . "</td>";
            echo "<td>" . $row["sender_name"] . "</td>";
            echo "<td>" . $row["measure_unit"] . "</td>";
            echo "<td>" . $row["required_amount"] . "</td>";
            echo "<td>" . $row["given_amount"] . "</td>";
            echo "<td>" . $row["unit_cost"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }

    $conn->close();
}
?>

</body>
</html>
