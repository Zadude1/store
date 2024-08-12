<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_pr'])) {
    $id_pr = $_GET['id_pr'];

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

    // Delete related records in purchase_request_details first
    $sql_delete_details = "DELETE FROM purchase_request_details WHERE id_pr = ?";
    $stmt_delete_details = $conn->prepare($sql_delete_details);
    $stmt_delete_details->bind_param("i", $id_pr);

    if ($stmt_delete_details->execute()) {
        // Proceed to delete from purchase_request
        $sql_delete_pr = "DELETE FROM purchase_request WHERE id_pr = ?";
        $stmt_delete_pr = $conn->prepare($sql_delete_pr);
        $stmt_delete_pr->bind_param("i", $id_pr);

        if ($stmt_delete_pr->execute()) {
            // Redirect back to the search page or a success page
            header("Location: search_pr.php");
            exit();
        } else {
            echo "Error deleting purchase request: " . $stmt_delete_pr->error;
        }

        $stmt_delete_pr->close();
    } else {
        echo "Error deleting purchase request details: " . $stmt_delete_details->error;
    }

    $stmt_delete_details->close();
    $conn->close();
} else {
    // If id_pr parameter is not set, redirect to an error page or back to the search page
    header("Location: search_pr.php");
    exit();
}
?>
