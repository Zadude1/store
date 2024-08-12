<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();




$sql ="SELECT * FROM employees";
$employees1 = $conn->query($sql);

$sql ="SELECT * FROM employees";
$employees2 = $conn->query($sql);

$sql ="SELECT * FROM employees";
$employees3 = $conn->query($sql);

$sql ="SELECT * FROM employees";
$employees4 = $conn->query($sql);

$sql ="SELECT * FROM employees";
$employees5 = $conn->query($sql);



$sql ="SELECT * FROM city";
$city = $conn->query($sql);

$sql ="SELECT * FROM college";
$college = $conn->query($sql);






$conn->close();
