<?php 
include "num2word.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voucher Details</title>
    <style>
        .container {
            display: flex;
            margin-top: 20px;
        }

        .left-column {
            flex: 1;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .right-column {
            flex: 2;
            padding: 20px;
            margin-left: 20px;
        }

        .item-details-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .additional-info {
            margin-top: 20px;
            text-align: right;
        }

        .info-pair {
            display: inline-block;
            margin-right: 10px;
        }

        .info-pair h4 {
            display: inline;
            margin-right: 10px;
        }

        .right-column table {
            width: 80%; /* Set a specific width to make the table in the right column smaller */
        }

    </style>
</head>
<body>

<?php
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

// Get voucher_id from URL
$voucher_id = isset($_GET['voucher_id']) ? intval($_GET['voucher_id']) : 0;

if ($voucher_id > 0) {
    // Query to get receiver_name based on voucher_id
    $receiver_query = "SELECT receiver_name FROM voucher WHERE voucher_id = $voucher_id";
    $receiver_result = $conn->query($receiver_query);

    if ($receiver_result->num_rows > 0) {
        $receiver_row = $receiver_result->fetch_assoc();
        $receiver_name = $receiver_row['receiver_name'];
    } else {
        $receiver_name = "Receiver not found";
    }

    // Query to get voucher details
    $details_query = "SELECT voucher_id, received_date, account FROM voucher WHERE voucher_id = $voucher_id";
    $details_result = $conn->query($details_query);

    // Query to get voucher item details
    $item_details_query = "SELECT item, measure_unit, required_amount, given_amount, unit_cost FROM voucher_details WHERE voucher_id = $voucher_id";
    $item_details_result = $conn->query($item_details_query);

    // Query to get received_office and manager
    $office_query = "SELECT received_office FROM voucher WHERE voucher_id = $voucher_id";
    $office_result = $conn->query($office_query);
    
    $total_points = $item_details_result->num_rows;

} else {
    $receiver_name = "Invalid voucher_id";
}
?>

<div class="container">
    <div class="left-column">
        <h3>Receiver Name:</h3>
        <p><?php echo htmlspecialchars($receiver_name); ?></p>
    </div>
    <div class="right-column">
            <?php if (isset($details_result) && $details_result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Voucher ID</th>
                    <th>Received Date</th>
                    <th>Account</th>
                </tr>
                <?php while($row = $details_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['voucher_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['received_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['account']); ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No details found for this voucher.</p>
        <?php endif; ?>
    </div>
</div>

<div class="item-details-container">
    <h3>Voucher Item Details</h3>
    <?php if (isset($item_details_result) && $item_details_result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Number</th>
                <th>Item</th>
                <th>ID</th>
                <th>Measuring Unit</th>
                <th>Required Amount</th>
                <th>Required Amount Written</th>
                <th>Given Amount</th>
                <th>Given Amount Written</th>
                <th>Unit Cost</th>
                <th>Total</th>
            </tr>
            <?php $row_number = 1; ?>
            <?php while($row = $item_details_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row_number++; ?></td>
                <td><?php echo htmlspecialchars($row['item']); ?></td>
                <td></td>
                <td><?php echo htmlspecialchars($row['measure_unit']); ?></td>
                <td><?php echo htmlspecialchars($row['required_amount']); ?></td>
                <td><?php echo htmlspecialchars(convert_number($row['required_amount'], "male")); ?></td>
                <td><?php echo htmlspecialchars($row['given_amount']); ?></td>
                <td><?php echo htmlspecialchars(convert_number($row['given_amount'], "male")); ?></td>
                <td><?php echo htmlspecialchars($row['unit_cost']); ?></td>
                <td><?php echo htmlspecialchars($row['unit_cost'] * $row['given_amount']); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No item details found for this voucher.</p>
    <?php endif; ?>
</div>

<div class="additional-info">
    <div class="info-pair">
    <h4> عدد الفقرات المطلوبة كتابة: <?php echo htmlspecialchars(convert_number($total_points, "male")); ?> </h4>
        <h4><?php echo htmlspecialchars($total_points); ?> عدد الفقرات المطلوبة رقما  </h4>
        
    </div>
    <?php if (isset($office_result) && $office_result->num_rows > 0): ?>
        <?php $office_row = $office_result->fetch_assoc(); ?>
        <p>:مسؤول المخزن <?php echo htmlspecialchars($office_row['received_office']); ?>المخول باستلام المادة: </p>
        <p>الموافقة على صرف المادة</p>
        <p>نسخة منه:- للشؤون المالية السيد رئيس الجامعة</p>
    <?php else: ?>
        <p>Office details not found.</p>
    <?php endif; ?>
</div>

<?php
$conn->close();
?>

</body>
</html>
