<?php
require 'db.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['account_type'] !== 'admin') {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (username, password, account_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashed_password, $account_type);

    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin_css.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <form method="post" action="admin_dashboard.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="account_type">Account Type:</label>
        <select id="account_type" name="account_type" required>
            <option value="admin">Admin</option>
            <option value="user1">User1</option>
            <option value="user2">User2</option>
            <option value="user3">User3</option>
        </select><br><br>
        <input type="submit" value="Add User">
    </form>
</body>
</html>
