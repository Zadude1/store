<!DOCTYPE html>
<html>
<head>
    <title>Search Purchase Request by ID</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2, h3 {
            color: #333;
        }
        form {
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: inline-block;
            width: 150px;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 160px);
            padding: 5px;
            margin-bottom: 10px;
        }
        .submit-button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Search Purchase Request by ID</h2>
    <form method="get" action="edit_pr.php">
        <label for="id_pr">Enter ID_PR:</label>
        <input type="number" id="id_pr" name="id_pr" required>
        <input type="submit" value="Search" class="submit-button">
    </form>
</body>
</html>
