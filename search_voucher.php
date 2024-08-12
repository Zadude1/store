<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Vouchers</title>
    <!-- Include your CSS file if needed -->
    <link rel="stylesheet" href="stylenew.css">

    <!-- Include jQuery library -->
    <script src="jquery.min.js"></script>
    
    <!-- jQuery UI Autocomplete -->
    <link rel="stylesheet" href="jquery-ui.css">
    <script src="jquery-ui.js"></script>

    <!-- Autocomplete script -->
    <script>
        $(document).ready(function(){
            // Autocomplete for voucher_id
            $('#voucher_id').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'autocomplete.php',
                        dataType: 'json',
                        data: {
                            type: 'voucher_id',
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1
            });

            // Autocomplete for received_office
            $('#received_office').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'autocomplete.php',
                        dataType: 'json',
                        data: {
                            type: 'received_office',
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1
            });

            // Autocomplete for receiver_name
            $('#receiver_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'autocomplete.php',
                        dataType: 'json',
                        data: {
                            type: 'receiver_name',
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1
            });

            // Autocomplete for sender_name
            $('#sender_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'autocomplete.php',
                        dataType: 'json',
                        data: {
                            type: 'sender_name',
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1
            });

            // Autocomplete for item
            $('#item').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'autocomplete.php',
                        dataType: 'json',
                        data: {
                            type: 'item',
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1
            });
        });
    </script>
</head>
<body>

<h2>Search Vouchers</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    <label for="voucher_id">Voucher ID:</label>
    <input type="text" id="voucher_id" name="voucher_id" autocomplete="off">
    <br><br>
    
    <label for="received_office">Received Office:</label>
    <input type="text" id="received_office" name="received_office" autocomplete="off">
    <br><br>
    
    <label for="receiver_name">Receiver Name:</label>
    <input type="text" id="receiver_name" name="receiver_name" autocomplete="off">
    <br><br>
    
    <label for="sender_name">Sender Name:</label>
    <input type="text" id="sender_name" name="sender_name" autocomplete="off">
    <br><br>
    
    <label for="item">Item:</label>
    <input type="text" id="item" name="item" autocomplete="off">
    <br><br>
    
    <label for="from_date">From Date:</label>
    <input type="date" id="from_date" name="from_date">
    
    <label for="to_date">To Date:</label>
    <input type="date" id="to_date" name="to_date">
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
    $received_office = isset($_GET['received_office']) ? $_GET['received_office'] : '';
    $receiver_name = isset($_GET['receiver_name']) ? $_GET['receiver_name'] : '';
    $sender_name = isset($_GET['sender_name']) ? $_GET['sender_name'] : '';
    $item = isset($_GET['item']) ? $_GET['item'] : '';
    $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
    $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';

    // Build the SQL query based on the search criteria
    $sql = "SELECT v.*, vd.*, (vd.given_amount * vd.unit_cost) AS total 
            FROM voucher v
            JOIN voucher_details vd ON v.voucher_id = vd.voucher_id
            WHERE 1";

    if (!empty($voucher_id)) {
        $sql .= " AND v.voucher_id = $voucher_id";
    }

    if (!empty($received_office)) {
        $sql .= " AND v.received_office LIKE '%$received_office%'";
    }

    if (!empty($receiver_name)) {
        $sql .= " AND v.receiver_name LIKE '%$receiver_name%'";
    }

    if (!empty($sender_name)) {
        $sql .= " AND v.sender_name LIKE '%$sender_name%'";
    }

    if (!empty($item)) {
        $sql .= " AND vd.item LIKE '%$item%'";
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
        echo "<tr>
                <th>Voucher ID</th>
                <th>Received Office</th>
                <th>Receiver Name</th>
                <th>Received Date</th>
                <th>Account</th>
                <th>Sender Name</th>
                <th>Item</th>
                <th>Measure Unit</th>
                <th>Required Amount</th>
                <th>Given Amount</th>
                <th>Unit Cost</th>
                <th>Total</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>";
        $totalSum = 0; // Variable to store the total sum of 'total'

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["voucher_id"] . "</td>";
            echo "<td>" . $row["received_office"] . "</td>";
            echo "<td>" . $row["receiver_name"] . "</td>";
            echo "<td>" . $row["received_date"] . "</td>";
            echo "<td>" . $row["account"] . "</td>";
            echo "<td>" . $row["sender_name"] . "</td>";
            echo "<td>" . $row["item"] . "</td>";
            echo "<td>" . $row["measure_unit"] . "</td>";
            echo "<td>" . $row["required_amount"] . "</td>";
            echo "<td>" . $row["given_amount"] . "</td>";
            echo "<td>" . $row["unit_cost"] . "</td>";
            echo "<td>" . $row["total"] . "</td>";
            echo "<td><a href='voucher_edit.php?voucher_id=" . $row["voucher_id"] . "'>Edit</a></td>";
            echo "<td><a href='voucher_delete.php?voucher_id=" . $row["voucher_id"] . "' onclick='return confirm(\"Are you sure you want to delete this voucher?\");'>Delete</a></td>";
            echo "</tr>";

            // Calculate total sum
            $totalSum += $row["total"];
        }

        // Display total sum row
        echo "<tr><td colspan='11'><strong>Total Sum</strong></td><td><strong>$totalSum</strong></td><td colspan='2'></td></tr>";
        
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }

    $conn->close();
}
?>

</body>
</html>
