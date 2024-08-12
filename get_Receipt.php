<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;




// $sql = "SELECT 
// id_r, materials.name as mater, materials.code, measr , quan_unite1, quan_frac1, quan_unite2, quan_frac2,
//            price, units, quan_receiv
//  FROM receipt_details
// INNER JOIN materials
// ON receipt_details.id_m = materials.id_m
// where receipt_details.id_r = " .$_SESSION["last_id"]. ";";
// $result = $conn->query($sql);


// $sql = "SELECT * FROM receipt
// INNER JOIN employees
// ON receipt.memberch = employees.id_s
// where receipt.id_r = " .$_SESSION["last_id"] . ";";
// $receipt = $conn->query($sql);

$sql = "SELECT * FROM receipt
INNER JOIN employees
ON receipt.memberch = employees.id_s
;";
$receipts = $conn->query($sql);

$sql = "SELECT * FROM employees";
$employees = $conn->query($sql);

$sql = "SELECT * FROM city";
$city = $conn->query($sql);

$sql = "SELECT * FROM college";
$college = $conn->query($sql);

$sql = "SELECT * FROM materials";
$materials = $conn->query($sql);


$sql = "SELECT * FROM materials";
$materialsEdit = $conn->query($sql);

/* $sql ="SELECT * FROM round";
$round = $conn->query($sql); */



$conn->close();
