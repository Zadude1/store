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

// Check if voucher_id is set
if (isset($_GET['voucher_id'])) {
    $voucher_id = $_GET['voucher_id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Prepare and bind statements
        $stmt1 = $conn->prepare("DELETE FROM voucher_details WHERE voucher_id = ?");
        $stmt2 = $conn->prepare("DELETE FROM voucher WHERE voucher_id = ?");
        
        if ($stmt1 && $stmt2) {
            // Bind parameters
            $stmt1->bind_param("i", $voucher_id);
            $stmt2->bind_param("i", $voucher_id);

            // Execute the statements
            $stmt1->execute();
            $stmt2->execute();

            // Commit transaction
            $conn->commit();

            // Close the statements
            $stmt1->close();
            $stmt2->close();

            // Redirect to search_vouchers.php
            header("Location: search_voucher.php");
            exit;
        } else {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
    } catch (Exception $e) {
        // Rollback transaction
        $conn->rollback();
        // Redirect to search_vouchers.php
        header("Location: search_voucher.php");
        exit;
    }
} else {
    // Redirect to search_vouchers.php if no voucher_id is provided
    header("Location: search_voucher.php");
    exit;
}

// Close connection
$conn->close();
?>
