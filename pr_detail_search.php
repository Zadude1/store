<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Purchase Requests</title>
    <!-- Include your CSS file if needed -->
    <link rel="stylesheet" href="stylenew.css">

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- jQuery UI Autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Autocomplete script -->
    <script>
        $(document).ready(function(){
            // Autocomplete for ask_by
            $('#ask_by').autocomplete({
                source: 'autocomplete_employees.php?type=ask_by'
            });

            // Autocomplete for member1
            $('#member1').autocomplete({
                source: 'autocomplete_employees.php?type=member1'
            });

            // Autocomplete for member2
            $('#member2').autocomplete({
                source: 'autocomplete_employees.php?type=member2'
            });

            // Autocomplete for member_a
            $('#member_a').autocomplete({
                source: 'autocomplete_employees.php?type=member_a'
            });

            // Autocomplete for beneficiary
            $('#beneficiary').autocomplete({
                source: 'autocomplete_employees.php?type=beneficiary'
            });

            // Autocomplete for item
            $('#item').autocomplete({
                source: 'autocomplete_grn_items.php'
            });
        });
    </script>
</head>
<body>

<h2>Search Purchase Requests</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    <label for="id_pr">Purchase Request ID:</label>
    <input type="text" id="id_pr" name="id_pr" autocomplete="off">
    <br><br>
    
    <label for="pr_date">PR Date:</label>
    <input type="date" id="pr_date" name="pr_date">
    <br><br>
    
    <label for="ask_by">Ask By:</label>
    <input type="text" id="ask_by" name="ask_by" autocomplete="off">
    <br><br>
    
    <label for="member1">Member 1:</label>
    <input type="text" id="member1" name="member1" autocomplete="off">
    <br><br>
    
    <label for="member2">Member 2:</label>
    <input type="text" id="member2" name="member2" autocomplete="off">
    <br><br>
    
    <label for="member_a">Member A:</label>
    <input type="text" id="member_a" name="member_a" autocomplete="off">
    <br><br>
    
    <label for="beneficiary">Beneficiary:</label>
    <input type="text" id="beneficiary" name="beneficiary" autocomplete="off">
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
    $id_pr = isset($_GET['id_pr']) ? $_GET['id_pr'] : '';
    $pr_date = isset($_GET['pr_date']) ? $_GET['pr_date'] : '';
    $ask_by = isset($_GET['ask_by']) ? $_GET['ask_by'] : '';
    $member1 = isset($_GET['member1']) ? $_GET['member1'] : '';
    $member2 = isset($_GET['member2']) ? $_GET['member2'] : '';
    $member_a = isset($_GET['member_a']) ? $_GET['member_a'] : '';
    $beneficiary = isset($_GET['beneficiary']) ? $_GET['beneficiary'] : '';
    $item = isset($_GET['item']) ? $_GET['item'] : '';
    $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
    $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';

    // Build the SQL query based on the search criteria
    $sql = "SELECT pr.*, prd.*, (prd.quantity * prd.unit_cost) AS total 
            FROM purchase_request pr
            JOIN purchase_request_details prd ON pr.id_pr = prd.id_pr
            WHERE 1";

    if (!empty($id_pr)) {
        $sql .= " AND pr.id_pr = '$id_pr'";
    }

    if (!empty($pr_date)) {
        $sql .= " AND pr.pr_date = '$pr_date'";
    }

    if (!empty($ask_by)) {
        $sql .= " AND pr.ask_by LIKE '%$ask_by%'";
    }

    if (!empty($member1)) {
        $sql .= " AND pr.member1 LIKE '%$member1%'";
    }

    if (!empty($member2)) {
        $sql .= " AND pr.member2 LIKE '%$member2%'";
    }

    if (!empty($member_a)) {
        $sql .= " AND pr.member_a LIKE '%$member_a%'";
    }

    if (!empty($beneficiary)) {
        $sql .= " AND pr.beneficiary LIKE '%$beneficiary%'";
    }

    if (!empty($item)) {
        $sql .= " AND prd.item LIKE '%$item%'";
    }

    if (!empty($from_date) && !empty($to_date)) {
        $sql .= " AND pr.pr_date BETWEEN '$from_date' AND '$to_date'";
    }

    // Execute the query
    $result = $conn->query($sql);

    // Display results in a table
    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr>
                <th>PR ID</th>
                <th>PR Date</th>
                <th>Ask By</th>
                <th>Member 1</th>
                <th>Member 2</th>
                <th>Member A</th>
                <th>Beneficiary</th>
                <th>Item</th>
                <th>Description</th>
                <th>Measurement Unit</th>
                <th>Quantity</th>
                <th>Cause</th>
                <th>Unit Cost</th>
                <th>Total</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>";
        $totalSum = 0; // Variable to store the total sum of 'total'

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_pr"] . "</td>";
            echo "<td>" . $row["pr_date"] . "</td>";
            echo "<td>" . $row["ask_by"] . "</td>";
            echo "<td>" . $row["member1"] . "</td>";
            echo "<td>" . $row["member2"] . "</td>";
            echo "<td>" . $row["member_a"] . "</td>";
            echo "<td>" . $row["beneficiary"] . "</td>";
            echo "<td>" . $row["item"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["measurement_unit"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["cause"] . "</td>";
            echo "<td>" . $row["unit_cost"] . "</td>";
            echo "<td>" . $row["total"] . "</td>";
            echo "<td><a href='edit_pr.php?id_pr=" . $row["id_pr"] . "'>Edit</a></td>";
            echo "<td><a href='delete_pr.php?id_pr=" . $row["id_pr"] . "' onclick='return confirm(\"Are you sure you want to delete this purchase request?\");'>Delete</a></td>";
            echo "</tr>";

            // Calculate total sum
            $totalSum += $row["total"];
        }

        // Display total sum row
        echo "<tr><td colspan='14'><strong>Total Sum</strong></td><td><strong>$totalSum</strong></td><td colspan='2'></td></tr>";
        
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }

    $conn->close();
}
?>
</body>
</html>
